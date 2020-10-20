<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Http\Requests\CreateItemRequest;

class ItemController extends Controller {
	
	public function index() {
		//データベースから取得し変数に代入し、compact関数で$itemsをviewに渡す
		$items = Item::Paginate(9);
		return view('admin.index', compact('items')); 
	}
	
	public function detail($id) {
		$item = Item::find($id);
		//商品が存在しない場合は、indexにリダイレクトする
		if (!$item) {
			return redirect('admin/index')->with('error', config('message.not_item'));
		}
		return view('admin.detail', compact('item'));
	}

	public function create() {
		return view('admin.create');
	}

	public function store(CreateItemRequest $request) {
		//データを保存
		$item = new Item;
		$item->name = $request->input('item_name');
		$item->body = $request->input('body');
		$item->price = $request->input('price');
		$item->stock = $request->input('stock');
		$item->save();
		return redirect('admin/index')->with('status', config('message.add_item'));
	}

	public function edit($id) {
		$item = Item::find($id);
		//商品が存在しない場合は、indexにリダイレクトする
		if (!$item) {
			return redirect('admin/index')->with('error', config('message.not_item'));
		}
		return view('admin.edit', compact('item'));
	}
	
	public function update(CreateItemRequest $request, $id, Item $item) {
		//モデルにて商品の更新を行う
		$item->updateItem($request, $id);
		return redirect('admin/index')->with('status', config('message.update_item'));
	}		
}
