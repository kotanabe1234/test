@extends('layouts.app_admin')

@section('content')
<form method="POST"action="{{ route('admin.store') }}">
{{ csrf_field() }}
	<div class="form-group">
		<label for="text1">商品名</label>
		<input type="text" id="text1" name="item_name" value="{{ old('item_name') }}" class="form-control">
	</div>
	<div class="form-group">
		<label for="body">商品説明</label>
		<textarea id="body" name="body" value="{{ old('body') }}" class="form-control"></textarea>
	</div>
	<div class="form-group">
		<label for="number1">値段</label>
		<input type="number" id="number1" name="price" value="{{ old('price') }}" class="form-control">
	</div>
	<div class="form-group">
		<label for="number2">在庫数</label>
		<input type="number" id="number2" name="stock" value="{{ old('stock') }}" class="form-control">
	</div>
	<button type="submit" class="btn btn-primary">追加する</button><br>
</form>
<a href="{{ route('admin.index') }}">商品一覧画面に戻る</a>
@endsection
