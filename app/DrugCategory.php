<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DrugCategory extends Model
{
    //
    protected $fillable  = [
        'name'
    ];


    protected $appends = [
        'memberCount'
    ];

    //creating relationships
    public function drugs(){
        return $this->hasManyThrough(Drug::class,'drug_category','id');
    }

    public function getMemberCountAttribute(){
        return $this->members()->count();
    }

}
