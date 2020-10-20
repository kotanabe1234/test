@extends('layouts.app')

@section('content')
<h1>商品一覧</h1>
@if ($items->isNotEmpty()) 
	<table class="table">  
		<thead>
			<tr>
				<th scope="col">商品名</th>
				<th scope="col">値段</th>
				<th scope="col">在庫の有無</th>
			</tr>
		</thead>
		<tbody>
		@foreach ($items as $item)
			<tr>
				<td><a href="{{ route('item.detail', ['id' => $item->id]) }}">{{ $item->name }}</a></td>
				<td>￥{{ number_format($item->price) }}</td>
				@if ($item->stock > 0)
					<td>在庫あり</td>
				@else
					<td>在庫なし</td>
				@endif
		</tr>
		@endforeach
		</tbody>
	</table>
	<div align="center">{{ $items->links() }}</div>
@else
	<p>商品が登録されていません</a>
@endif		
@endsection
