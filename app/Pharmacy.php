<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    //

    protected $fillables=[
        'user_id', 'pharm_name', 'phone', 'email', 'address', 'website_url', 'location'
    ];

    // relation of pharmacy to subscription
    public function pharmSubscription(){
        return $this->hasOne(Subscription::class);
    }

    // relation of pharmacy to revenue 
    public function pharmRevenue(){
        return $this->hasOne(Revenue::class);
    }

    // relation of pharmcy to stock
    public function pharmStock(){
        return $this->hasMany(Stock::class);
    }

    // relation of pharmcy to drug
    public function pharmDrug(){
        return $this->hasMany(Drug::class);
    }

    // relation of pharmcy to sales
    public function pharmSales(){
        return $this->hasMany(Sales::class);
    }
}
