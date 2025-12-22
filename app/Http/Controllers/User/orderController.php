<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Books;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
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

        $cartItems = Cart::where('user_id', auth('web')->id())->with('book')->get();
        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        try {
            $order = null;
            DB::transaction(function () use ($input, $cartItems, &$order) {
                $order = Order::create([
                    'user_id' => auth('web')->id(),
                    'phonenumber' => $input['phonenumber'],
                    'location' => $input['location'],
                    'price' => 0,
                    'note' => $input['note'] ?? null,
                ]);

                $total = 0;

                foreach ($cartItems as $item) {
                    $book = Books::where('id', $item->book_id)->lockForUpdate()->first();

                    if (!$book || (int) $book->qtyInStock <= 0) {
                        throw new \RuntimeException('out_of_stock');
                    }

                    if ((int) $item->quantity > (int) $book->qtyInStock) {
                        throw new \RuntimeException('insufficient_stock');
                    }

                    OrderItem::create([
                        'order_id' => $order->id,
                        'book_id' => $item->book_id,
                        'quantity' => $item->quantity,
                    ]);

                    $book->decrement('qtyInStock', (int) $item->quantity);
                    $total += (int) ($item->total ?? 0);
                    $item->delete();
                }

                $order->update(['price' => $total]);
            });
        } catch (\RuntimeException $e) {
            if ($e->getMessage() === 'out_of_stock') {
                return redirect()->route('user.cart.index')->with('error', 'Some items are now out of stock (the last copy was taken). Please update your cart.');
            }
            if ($e->getMessage() === 'insufficient_stock') {
                return redirect()->route('user.cart.index')->with('error', 'Stock changed since you added an item. Please update your cart and try again.');
            }
            throw $e;
        }

        return redirect()->route('orders.index')->with('success', 'Order placed successfully.');
    }
    public function checkout()
    {
        return view('user.orders.checkout');
    }

}
