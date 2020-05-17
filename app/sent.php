<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sent extends Model
{
    protected $table = 'sent';
    protected $fillable = ['recipient_id', 'status_code', 'resource_id', 'delivery_report'];

    public function recipient()
    {
        return $this->belongsTo('App\Recipient');
    }
}
