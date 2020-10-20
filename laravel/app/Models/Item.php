<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model {
	use SoftDeletes;
	protected $table = 'items';
	protected $dates = ['deleted_at'];
	protected $fillable = ['name', 'body', 'price', 'stock'];

	public function updateItem($request, $id) {
		$this->updateOrCreate([
			'id' => $id
		],
		[
			'name' => $request->item_name,
			'body' => $request->body,
			'price' => $request->price,
			'stock' => $request->stock,
		]);
		return true;
	}
	
}
