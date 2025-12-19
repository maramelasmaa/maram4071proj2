<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'orderitems';

    protected $fillable = [
        'order_id',
        'book_id',
        'quantity'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class,'order_id','id');
    }

    public function book()
    {
        return $this->belongsTo(Books::class,'book_id','id');
    }
}

