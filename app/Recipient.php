<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipient extends Model
{
    protected $fillable = ['name', 'phone_number', 'last_contacted', 'due_date', 'message_id'];


    public function setLastContactedAttribute($value)
    {
        $this->attributes['last_contacted'] = $value;
        $this->attributes['due_date'] = date('Y-m-d', strtotime($value .'+2 months'));
    }

    public function getValidPhoneNumberAttribute($value)
    {
        $starting_digits = substr($value, 0, 2);
        if($starting_digits == '01'){
            return '2'.$value;
        }elseif($starting_digits === '+2'){
            return substr($value, 1);
        }elseif($starting_digits == '20'){
            return $value;
        }else{
            return -1;
        }
    }
}
