<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipient extends Model
{
    protected $fillable = ['name', 'phone_number', 'last_contacted', 'due_date', 'message_id'];
}
