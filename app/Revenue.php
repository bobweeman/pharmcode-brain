<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    //
    protected $fillable = [
        'subscription_id', 'amount', 'date'
    ];

    //relation of subscription to revenue
    public function subscription(){
        return $this->hasMany(Subscription::class);
    }
}
