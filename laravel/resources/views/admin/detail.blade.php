@extends('layouts.app_admin')

@section('content')
<form method="GET" action="{{ route('admin.edit', ['id' => $item->id]) }}">
<button type="submit" class="btn btn-primary">商品を編集する</button>
</form>
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
<a href="{{ route('admin.index', ['id' => $item->id]) }}">商品一覧画面に戻る</a>
@endsection
