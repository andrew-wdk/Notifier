<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Settings;
use App\Recipient;
use App\Message;
use App\Sent;
use App\Mail\MessageNotSent;
use Illuminate\Support\Facades\Mail;


class SMSController extends Controller
{

    public function Authenticate()
    {
        $authorization_header = env('ORANGE_AUTHORIZATION_HEADER');
        $response = Http::withHeaders(['Authorization' => $authorization_header])
        ->asForm()->post('https://api.orange.com/oauth/v2/token', ['grant_type'=>'client_credentials']);
        $content = json_decode($response->content());
        $expiry = (strtotime(date('Y-m-d')) + $content->expires_in)->format('Y-m-d');
        $settings = Settings::first();
        if($settings){
            $settings->update(['access_token' => $content->access_token, 'access_token_expiry' => $expiry]);
        }else{
            $settings->create(['access_token' => $content->access_token, 'access_token_expiry' => $expiry]);
        }
    }

    public function checkDueDates()
    {
        $access_token_expiry = Settings::first()->access_token_expiry;
        if ($access_token_expiry == date('Y-m-d')){
            $this->Authenticate();
        }
        $recipients = Recipient::where('due_date', date("Y-m-d"))->get();

        if(!$recipients->isEmpty()){
            foreach($recipients as $recipient){
                $this->sendMessage($recipient);
            }
        }
    }

    public function sendMessage($recipient)
    {
        $message = $recipient->message_id ? Message::find($recipient->message_id) : Message::first();

        $number = $recipient->valid_phone_number;
        if($number == -1){
            Sent::create(['recipient_id' => $recipient->id, 'status_code' => -1]);
            return;
        }

        $settings = Settings::first();

        $sender_number = $settings->sender_number;

        $access_token = $settings->access_token;

        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$access_token,
            'Content-Type' => 'application/json'
        ])->post('https://api.orange.com/smsmessaging/v1/outbound/tel%3A%2B'.$sender_number.'/requests',
            ['outboundSMSMessageRequest' =>
                ['address' => 'tel:+'.$number,
                'senderAddress' => 'tel:+'.$sender_number,
                'outboundSMSTextMessage' =>
                    ['message' => $message]
                ]
        ]);

        if($response->successful()){
            $content = json_decode($response->content());
            $url = $content->outboundSMSMessageRequest->resourceURL;
            $resource_id = end(explode('/', $url));
            Sent::create(['recipient_id' => $recipient->id, 'status_code' => $response->status(), 'resource_id' => $resource_id]);
        }
        else{
            Sent::create(['recipient_id' => $recipient->id, 'status_code' => $response->status()]);
            Mail::to($settings->email)->send(new MessageNotSent($response));
        }

    }

}
