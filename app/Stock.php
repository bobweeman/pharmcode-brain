<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'pharm_id', 'drug_id', 'quantity', 'price'
    ];

    // relation of stock to drugs
    public function drugs(){
        return $this->hasMany(Drug::class);
    }

    public function pharmacy(){
        return $this->belongsTo(Pharmacy::class);
    }
}
