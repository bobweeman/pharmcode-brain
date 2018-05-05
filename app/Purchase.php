<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    //

    protected $fillable = [
        'drug_id', 'drug_name', 'dosage', 'quantity', 'purchase_date'
    ];
}
