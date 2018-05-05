<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DrugCategory extends Model
{
    //
    protected $fillable  = [
        'name'
    ];

    //relation of drug to drug category
    public function drug(){
        return $this->belongsTo(Drug::class);
    }
}
