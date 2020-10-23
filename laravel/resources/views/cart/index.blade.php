@extends('layouts.app')

@section('content')
<h1>カート一覧</h1>
//カートがなければ、カートが空ですと表示してみる
@if ($carts->isNotEmpty()) 
	<table class="table">  
		<thead>
			<tr>
				<th scope="col">商品名</th>
				<th scope="col">値段</th>
				<th scope="col">数量</th>
				<th scope="col"></th>
			</tr>
		</thead>
		<tbody>
		@foreach ($carts as $cart)
			<tr>
				<td>{{ $cart->item->name }}</td>
				<td>￥{{ number_format($cart->item->price) }}</td>
				<td>{{ $cart->qty }}</td>
				<td>
				<form method="POST"action="{{ route('cart.delete') }}">
				{{ csrf_field() }}
				<input type="hidden" name="cart_id" value="{{ $cart->id }}">
				<button class="btn btn-primary" type="submit">削除</button>
				</form>
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
@else
	<p>商品が登録されていません</a>
@endif		
@endsection
