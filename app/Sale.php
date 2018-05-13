<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'pharm_id', 'user_id', 'drug_id', 'quantity', 'date', 'payment_status'
    ];

    // Relation of sales to stock
    public function stock(){
        return $this->hasMany(Stock::class);
    }
}
