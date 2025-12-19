<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable=[
        'name',
        'edition',
        'category_id'
    ];

    public function Books()
    {
        return $this->hasMany(Books::class,'type_id','id');
    }

    public function categoryType(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
