<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateItemRequest extends FormRequest {

	public function authorize() {
		return true;
	}

	public function rules() {
		return [
			'item_name' => 'required|max:255',
			'body' => 'required|max:255',

		//価格、在庫はIntで設定しているためマイナスまたは11桁以上はエラーになるようにバリデーションをかける
			'price' => 'required|digits_between:1,10',
			'stock' => 'required|digits_between:1,10',
		];
	}
}
