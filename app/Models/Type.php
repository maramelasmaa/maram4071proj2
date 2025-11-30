<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
      protected $fillable = [
        'category_id',
        'name',
        'edition',
    ];

    public function category (){
        return $this->belongsTo(Category::class,"category_id","id");
    }

    public function books (){
        return $this->hasMany(Book::class,"type_id","id");
    }


}
