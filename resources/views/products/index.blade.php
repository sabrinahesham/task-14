@extends(layots.app)
 
@section ('title','all products')

@section('content')


<h1> all products</h1>
 @foreach($products as $key=>$value)
 {{loop->iteration}}.{{$value['title']}}
 <br>
 @endforeach
@stop