@extends(layots.app)
 
@section ('title','show product')

@section('content')

@if(product['is-new'])
<p>this poroduct is new</p>
@else
<p>this product is old</p>
@endif

@isset(product["has_reviews"])
<h2>this product has reviews</h2>
@endisset

<h1> {{ $product['title']}}</h1>

<p> {{ $product['descrption']}}     </p>
@stop