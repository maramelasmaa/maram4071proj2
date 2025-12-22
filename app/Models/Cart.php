<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id', 
        'book_id', 
        'quantity'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function book()
    {
        return $this->belongsTo(Books::class,'book_id','id');
    }

    protected $appends = ['total'];
    //doesn't save database

    public function getTotalAttribute()
    {
        $price = (int) ($this->book->price ?? 0);
        return (int) $this->quantity * $price;
    }
    public function decrease(){
        return $this->book()->update(
            [
                'qtyInStock'=>$this->book->qtyInStock - $this->quantity
            ]
        );
    }
}

