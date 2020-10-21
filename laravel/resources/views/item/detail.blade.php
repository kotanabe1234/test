@extends('layouts.app')

@section('content')
<h1>商品詳細</h1>
<table class="table">
  <tbody>
    <tr>
      <th scope="row">商品名</th>
      <td>{{ $item->name }}</td>
    </tr>
    <tr>
      <th scope="row">商品説明</th>
      <td>{{ $item->body }}</td>
    </tr>
    <tr>
      <th scope="row">値段</th>
      <td>￥{{ number_format($item->price) }}</td>
    </tr>
    <tr>
    <tr>
      <th scope="row">在庫の有無</th>
			@if ($item->stock > 0)
				<td>在庫あり</td>
			@else
				<td>在庫なし</td>
			@endif
    </tr>
  </tbody>
</table>

@guest
	<div align="center">
		<form method="GET"action="{{ route('login') }}">
			{{ csrf_field() }}
			<button type="submit" class="btn btn-primary">ログイン</button>
		</form>
		<p>商品をカートに追加するにはログインしてください</p>
	</div>
@else
	@if ($item->stock > 0)
	<div align="center">
		<form method="POST"action="{{ route('cart.add') }}">
		{{ csrf_field() }}
			<input type="hidden" name="item_id" value="{{ $item->id }}">
			<button type="submit" class="btn btn-primary">カートに追加する</button>
		</form>
	</div>
	@else
		<div align="center"><button type="submit" class="btn btn-primary" disabled="disabled">入荷待ちです</button></div>
@endif
@endguest
<a href="{{ route('item.index', ['id' => $item->id]) }}">商品一覧画面に戻る</a>
@endsection
