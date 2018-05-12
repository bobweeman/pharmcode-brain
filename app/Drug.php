<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    //
    protected $fillable = [
        'name', 'type', 'composition', 'description', 'dosage', 'image_url', 'expiration_date', 'drug_category'
    ];

    // relation of drugs to stock
    public function stock(){
        return $this->belongsToMany(Stock::class);
    }

    //relation of drugs to drug category
    public function drugCategory(){
        return $this->hasOne(DrugCategory::class);
    }
}
