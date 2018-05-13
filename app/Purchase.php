<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    //
    protected $fillable = [
        'drug_id', 'drug_name', 'dosage', 'quantity', 'purchase_date'
    ];

    // relation of drugs to sales
    public function sales(){
        return $this->belongsTo(Sale::class);
    }
}
