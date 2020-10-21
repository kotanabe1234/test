<?php

namespace App\Http\Controllers\Item;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Support\facades\Auth;

class CartController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
		//ログイン者のidを取得
		$user_id = Auth::id();
		//ログインidを条件としてデータを取得し,ビューに渡す
		$carts = Cart::where('user_id', $user_id)->get();
		return view('cart.index', compact('carts'));	
	}
	
	public function add(Request $request) {
		//formから送られてきたidを変数に代入する
		$item_id = $request->item_id;
		//インスタンス化
		( new Cart)->addCart($item_id);
		return redirect('/cart')->with('status', config('message.add_cart'));
	}

	//論理削除
	public function delete(Request $request) {
		$cart_id = $request->cart_id;
		( new Cart)->softDelete($cart_id);
		return redirect('/cart')->with('status', config('message.delete_cart'));
	}
	

}
