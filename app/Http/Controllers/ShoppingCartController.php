<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Product;
class ShoppingCartController extends Controller
{

    public function view() {
        $data = Category::all();
        //$cart = Cart::all();
        //$addedToCart = session()->get('cart');
        
        // dd($addedToCart);
        $cart = session()->all();
        $dataCart = session()->all();
        $count = -3;
        foreach($dataCart as $index => $product) {
            $count++;
        }
        return view('shop-cart', compact('data', 'cart', 'count'));
    }

    public function handle($id) {
        $item = Product::where('product_id', $id)->first();
        session()->put($id, $item);

        return redirect()->intended('/shop');
    }

    public function getData() {
        $data = session()->all();
        dd($data);
    }
    
    public function deleteData() {
        session()->flush();
    }

    public function deleteDataByID($id) {
        $data = session()->all();
        unset($data[$id]);

        session()->flush();
        foreach($data as $index => $product) {
            session()->put($index, $product);
        }

        return redirect()->intended('/shop-cart');
    }
}
