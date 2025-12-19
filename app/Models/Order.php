<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'phonenumber',
        'location',
        'price',
        'note'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function Orderitem()
    {
        return $this->hasMany(OrderItem::class,'order_id','id');
    }
}

