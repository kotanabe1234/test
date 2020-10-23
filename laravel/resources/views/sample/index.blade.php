
@component('components.footer') //場所指定
	//変数に値を渡す
  @slot('footer_title')  
   玉手箱 
  @endslot

  @slot('footer_content')
    <li>kotaro</li>
    <li>watanabe</li>
  @endslot
@endcomponent


@include('components.footer', [   //@slotは使えない
	'footer_title' => 'taro',
	'footer_content' => 'コロナ'
])

