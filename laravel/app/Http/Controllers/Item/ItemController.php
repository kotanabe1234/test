<?php

namespace App\Http\Controllers\Item;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Item;

class ItemController extends Controller {

	public function index() {
		$items = Item::Paginate(9);
		return view('item.index', compact('items')); 
	}
	
	public function detail($id) {
		$item = Item::find($id);
		if (!$item) {
			return redirect('admin/index')->with('error', config('message.not_item'));
		}	
		return view('item.detail', compact('item'));
	}

}
