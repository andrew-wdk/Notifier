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
}
