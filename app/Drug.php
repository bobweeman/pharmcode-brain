<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    //
    protected $fillable = [
        'name', 'type', 'composition', 'description', 'dosage', 'image_url', 'expiration_date'
    ];

    // relation of drugs to stock
    public function stock(){
        return $this->hasOne(Stock::class);
    }

    //relation of drugs to drugcategory
    public function drugCategory(){
        return $this->hasMany(DrugCategory::class);
    }
}
