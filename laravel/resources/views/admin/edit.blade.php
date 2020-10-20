@extends('layouts.app_admin')

@section('content')
<form method="POST" action="{{ route('admin.update', ['id' => $item->id]) }}">
{{ csrf_field() }}
	<div class="form-group">
		<label for="text1">商品名</label>
		<input type="text" id="text1" name="item_name" value="{{ $item->name }}" class="form-control">
	</div>
	<div class="form-group">
		<label for="body">商品説明</label>
		<textarea id="body" name="body" class="form-control">{{ $item->body }}</textarea>
	</div>
	<div class="form-group">
		<label for="number1">値段</label>
		<input type="number" id="number1" name="price" value="{{ $item->price }}" class="form-control">
	</div>
	<div class="form-group">
		<label for="number2">在庫数</label>
		<input type="number" id="number2" name="stock" value="{{ $item->stock }}" class="form-control">
	</div>
	<button type="submit" class="btn btn-primary">更新する</button><br>
</form>
<a href="{{ route('admin.detail', ['id' => $item->id]) }}">商品詳細画面に戻る</a>
@endsection
