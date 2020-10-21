<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Item;
use Illuminate\Support\facades\Auth; //追加
use Illuminate\Support\Facades\DB; //追加

class Cart extends Model {
	use SoftDeletes;
	protected $table = 'carts';
	protected $dates = ['deleted_at'];
	protected $fillable = ['user_id', 'item_id', 'qty']; //追加
	
	public function item() {
		return $this->belongsTo('App\Models\Item'); //リレーション
	}
	
	public function addCart($item_id) {
		//トランザクションを使用
		//carsデータを更新する。その際、itemsテーブルの在庫の数を減らすことに気を付ける
		DB::transaction(function() use($item_id) {
			$user_id = Auth::id();
			//デベロッパーツールで存在しない商品idを入力するとエラーが出たのでfindOrfailを使用
			$item = Item::findOrFail($item_id);
			if ($item->stock > 0) {
				$this->firstOrCreate([
					'item_id' => $item->id,
					'user_id' => $user_id
				], 
				[
					'qty' => 0
				])->increment('qty');
				$item->decrement('stock');
			}
		});
		return true;
	}

	public function softDelete($cart_id) {
		//トランザクションを使用
		//cartsテーブルから削除,itemsテーブルの在庫の数を増やすことに気を付ける
		DB::transaction(function() use($cart_id) {
			$user_id = Auth::id();
			//デベロッパーツールで存在しない商品idを入力するとエラーが出たのでfindOrfailを使用
			//論理削除を実装
			$cart = Cart::findOrFail($cart_id);
			$count = $cart->qty;
			$this->where([
				'id' => $cart->id,
				'item_id' => $cart->item_id,
				'user_id' => $user_id
			], 
			[
				'qty' => 1
			])->delete();
			//在庫の更新の数に気を付ける。2個削除されてたら、2個在庫を増やす
			Item::where(['id' => $cart->item_id])->increment('stock', $count);
		});
		return true;
	}
}
