<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classification extends Model
{
    protected $fillable = [
    'name',
];


    public function categories(){
        return $this->hasMany(Category::class,"class_id","id");
    }
}
