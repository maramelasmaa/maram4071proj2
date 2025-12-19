<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $fillable=[
        'title',
        'author',
        'description',
        'price',
        'qtyInStock',
        'year',
        'publisher',
        'picture',
        'type_id'
    ];

    public function bookType(){
        return $this->belongsTo(Type::class,'type_id','id');
    }
}
