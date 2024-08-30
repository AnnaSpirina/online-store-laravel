<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;

class CartController extends Controller
{
    public function cart() {
        $cart = session()->get('cart');
        if (session()->has('cart')){
            foreach($cart as $item){
                $product = Product::findOrFail($item['id']);
                if ($cart[$item['id']]['quantity']>$product->stock){
                    $cart[$item['id']]['quantity'] = $product->stock;
                }
                if ($cart[$item['id']]['quantity']==0){
                    unset($cart[$item['id']]);
                }
            }
            session()->put('cart', $cart);
        }
        return view('cart', compact('cart'));
    }

    public function add($id)
    {
        $product = Product::findOrFail($id);
        if (!$product || $product->stock == 0) {
            return redirect()->back()->with('outOfStock', 'Товара нет в наличии');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$id]) && $cart[$id]['quantity']<=$product->stock){
            if($cart[$id]['quantity']==$product->stock){
                return redirect()->back()->with('maximum', 'Вы достигли максимального количества данного товара');
            }
            else{
                $cart[$id]['quantity']++;
            }
        }
        else {
            $cart[$id] = [
                'id' => $product->id,
                'image' => $product->image,
                'name' => $product->name,
                'stock' => $product->stock,
                'quantity' => 1,
                'price' => $product->price,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Товар успешно добавлен в корзину');
    }

    public function remove($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('delete', 'Товар успешно удалён из корзины');
    }

    public function reduce($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            if ($cart[$id]['quantity']-1 == 0) {
                unset($cart[$id]);
            } else {
                $cart[$id]['quantity']--;
            }
        }

        session()->put('cart', $cart);
        
        return redirect()->back()->with('success', 'Корзина обновлена');
    }

    public function clear(){
        session()->forget('cart');
        return redirect()->back()->with('success', 'Корзина очищена');
    }
}