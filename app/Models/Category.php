<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=[
        'name',
        'class_id'
    ];

    public function Type()
    {
        return $this->hasMany(Type::class,'type_id',);
    }

    public function Classcategory(){
        return $this->belongsTo(Classification::class,'class_id','id');
    }
}
