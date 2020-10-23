<?php

namespace App\Http\Controllers\Item;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Item;
use Illuminate\Support\facades\Auth;
use Illuminate\Support\facades\DB;
use App\Services\CheckCart;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //ログイン者のidを取得
        $user_id = Auth::id();
        //ログインidを条件としてデータを取得し,ビューに渡す
        $carts = Cart::where('user_id', $user_id)->get();
        return view('cart.index', compact('carts'));
    }
    
    public function add(Request $request)
    {
        $user_id = Auth::id();
        $item_id = $request->item_id;
        $item = Item::findOrFail($item_id);
        DB::transaction(function () use ($item, $user_id) {
            CheckCart::addCart($item, $user_id);
        });
        return redirect('/cart')->with('status', config('message.add_cart'));
    }

    //論理削除
    public function delete(Request $request)
    {
        $user_id = Auth::id();
        $cart_id = $request->cart_id;
        $cart = Cart::findOrFail($cart_id);
        $count = $cart->qty;
        DB::transaction(function () use ($cart, $user_id, $count) {
            CheckCart::softDelete($cart, $user_id, $count);
        });
        return redirect('/cart')->with('status', config('message.delete_cart'));
    }
}
