<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Order;

class OrderController extends Controller
{
    public function order(){
        $cart = session()->get('cart');
        if (!session()->has('cart')){
            return redirect()->route('index');
        }
        return view('order', compact('cart'));
    }

    public function createOrder(Request $request){
        DB::transaction(function () use ($request) {
            $order = Order::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
            ]);

            $cart = session()->get('cart', []);
            
            foreach ($cart as $item) {
                $order->products()->attach($item['id'], ['quantity' => $item['quantity']]);

                $product = Product::find($item['id']);
                if ($product) {
                    $product->decrement('stock', $item['quantity']);
                }
            }
        });
        session()->forget('cart');
        return redirect()->route('index')->with('success', 'Заказ успешно оформлен');
    }
}
