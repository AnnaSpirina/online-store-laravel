<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class MainController extends Controller
{
    public function index() {
        $products = Product::get();
        return view('index', compact('products'));
    }
}
