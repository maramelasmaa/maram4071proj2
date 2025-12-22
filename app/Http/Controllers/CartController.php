<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Books;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $cart = Cart::with('book')
            ->where('user_id', auth('web')->id())
            ->get();

        $estimatedTotal = $cart->sum(fn ($item) => (int) $item->total);

        return view('user.cart.index', compact('cart', 'estimatedTotal'));
    }

    public function store(Request $request){
        $input = $request->validate([
            'book_id' => ['required', 'exists:books,id'],
            'quantity' => ['nullable', 'integer', 'min:1'],
        ]);

        $input['user_id'] = auth('web')->id();
        $input['quantity'] = (int)($input['quantity'] ?? 1);

        $cart = Cart::where('user_id', $input['user_id'])
            ->where('book_id', $input['book_id'])
            ->first();

        $book = Books::findOrFail($input['book_id']);

        if ((int) $book->qtyInStock <= 0) {
            return redirect()->back()->with('error', "Out of stock — you can't add this book right now.");
        }

        if (!$cart) {
            if ($input['quantity'] > $book->qtyInStock) {
                return redirect()->back()->with('error', "Only {$book->qtyInStock} left in stock — you can't add {$input['quantity']}.");
            }

            Cart::create($input);
            return redirect()->route('user.cart.index')->with('success', 'Added to cart.');
        }

        if ((int) $book->qtyInStock <= 0) {
            return redirect()->back()->with('error', 'This book is now out of stock (the last copy was taken).');
        }

        if ((int) $cart->quantity >= (int) $book->qtyInStock) {
            return redirect()->back()->with('error', "You already have the last available copy in your cart.");
        }

        $cartqty = $cart->quantity + 1;

        $cart->quantity = $cartqty;
        $cart->save();

        return redirect()->route('user.cart.index')->with('success', 'Updated cart.');
    }
    public function update(Request $request,string $bookid){
        $cart=Cart::where('user_id',auth('web')->id())->where('book_id',$bookid)->first();
        if (!$cart) {
            return redirect()->back()->with('error', "This item isn't in your cart.");
        }

        $book = Books::findOrFail($bookid);
        if ((int) $book->qtyInStock <= 0) {
            return redirect()->back()->with('error', 'This book is now out of stock (the last copy was taken).');
        }

        if ((int) $cart->quantity >= (int) $book->qtyInStock) {
            return redirect()->back()->with('error', "You already have the last available copy in your cart.");
        }

        $cartqty=$cart->quantity +1;
        $cart->quantity=$cartqty;
        $cart->save();
        return redirect()->route('user.cart.index')->with('success', 'Updated cart.');
    }

    public function remove(string $bookid){
        $cart=Cart::where('user_id',auth('web')->id())->where('book_id',$bookid)->first();
        $cartqty=$cart->quantity -1;
        if($cartqty<1){
            return redirect()->back()->with('error', "Quantity can't be less than 1.");
        }
        $cart->quantity=$cartqty;
        $cart->save();
        return redirect()->route('user.cart.index')->with('success', 'Updated cart.');
    }

    public function destroy(string $bookid){
        $cart=Cart::where('user_id',auth('web')->id())->where('book_id',$bookid)->first();
        $cart->delete();
        return redirect()->route('user.cart.index')->with('success', 'Removed from cart.');
    }
    
}
