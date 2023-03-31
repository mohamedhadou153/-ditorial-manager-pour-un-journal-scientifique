@extends('dashboard.reviewer.header')
@section('content')
@foreach ($articles as $article)
<div>
<embed src="{{asset('/storage/pdf/articles/'.$article->obj_pdf)}}" aria-readonly="true" frameborder="0" width="50%" height="770px"/>
</div>
@endforeach
@endsection