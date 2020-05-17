<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;

class SettingsController extends Controller
{
    public function edit()
    {
        $data['settings'] = Settings::first();
        return view('settings.index', $data);
    }


    public function update(Request $request)
    {
        $settings = Settings::first();

        if($settings){
            $settings->update($request->all());
        }
        else{
            $settings = Settings::create($request->all());
        }

        return redirect()->route('settings.edit');
    }








    // public function requestCode(Request $request)
    // {
    //     $number = $request->input('number');
    //     $name = $request->input('name');
    //     $response = WhatsapiTool::requestCode($request->input('number'), 'sms');

    //     if($response['status'] == 'sent'){
    //         return view('settings.enter-code', ['status' => 'sent', 'number' => $number, 'name' => $name]);
    //     }
    //     else{
    //         return redirect('settings/index')->with('status', 'Something went wrong');
    //     }
    // }

    // public function register(Request $request)
    // {
    //     $number = $request->input('number');
    //     $name = $request->input('name');
    //     $code = $request->input('code');

    //     $response = WhatsapiTool::registerCode($number, $code);

    //     dd($response);
    // }
}
