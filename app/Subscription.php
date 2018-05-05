<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    //

    protected $fillable = [
        'pham_id', 'registration_date', 'current_subscription_date', 'expiration_date'
    ];

    public function pharmacy(){
        return $this->belongsTo(Pharmacy::class);
    }
}
