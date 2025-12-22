<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders=Order::with('Orderitem')->get();
        return view('user.orders.index',compact('orders'));
    }

    public function show(Order $order){
        $order=Order::with('Orderitem')->first();
        return view('user.orders.show',compact('order'));
    }

    public function store(Request $request){
        $input=$request->validate([
            'phonenumber'=>['required'],
            'location'=>['required'],
            'note'=>['nullable']
        ]);
        $order=Order::latest()->first();
        if(!$order){
            $orderid=1;
        }
        else{
            $orderid=$order->id;
            $orderid=$orderid+1;
        }
        $total=0;
        $cartitem=Cart::where('user_id',auth('web')->id())->with('book')->get();
        foreach($cartitem as $item){
            OrderItem::create(
                [
                    'order_id'=>$orderid,
                    'book_id'=>$item->book_id,
                    'quantity'=>$item->quantity
                ]
                );
                $item->decrease();
        $total=$total+$item->book->price;
        $item->delete();
        }
        Order::create([
            'user_id'=>auth('web')->id(),
            'phonenumber'=>$input['phonenumber'],
            'location'=>$input['location'],
            'price'       => $total,
            'note'=>$input['note'] ?? null
        ]);
        return redirect()->route('orders.index')->with('success');
    }
    public function checkout()
    {
        return view('user.orders.checkout');
    }

}
