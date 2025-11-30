<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     protected $fillable = [

        "class_id",
        "name"
        
        
    ];
    public function classification (){
        return $this->belongsTo(Classification::class,"class_id","id");
    }

    public function types(){
        return $this->hasMany(Type::class,"category_id",'id');
    }

}
