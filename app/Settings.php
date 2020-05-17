<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable = ['sender_number', 'access_token', 'email', 'send_at'];
}
