<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
   protected $fillable = [
    "title",
    "Picture",
    "author",
    "publisher",
    "description",
    "quantity",
    "price",
    "type_id"
];


    public function type (){
        return $this->belongsTo(Type::class,"type_id","id");
    }
    
}
