@extends('dashboard.reviewer.header')
@section('content')
@foreach ($articles as $article)
<form action="{{route('reviewer.SendToEditor')}}" method="GET">
    <embed src="{{asset('/storage/pdf/articles/'.$article->obj_pdf)}}" aria-readonly="true" frameborder="0" width="60%" height="770px"/>
    <label for="">Set review:</label>
    <input type="text"  name="art_id">
    <textarea name="review"  cols="30" rows="10"></textarea>
    <button type="submit"> send</button>
</form>


@endforeach
@endsection