<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    //

    protected $fillable = [
        'pham_id', 'drug_id', 'quantity', 'price'
    ];

    // relation of stock to drugs
    public function drugs(){
        return $this->hasmany(Drug::class);
    }

    public function pharmacy(){
        return $this->belongsTo(Pharmacy::class);
    }
}
