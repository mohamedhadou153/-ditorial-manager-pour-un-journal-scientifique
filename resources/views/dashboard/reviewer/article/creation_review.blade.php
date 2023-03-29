@extends('dashboard.reviewer.home')
@section('content')
@foreach($articles as $article)
<form action="{{route('reviewer.SendToEditor')}}" method="GET">
    <label for="">Set review:</label>
    <input type="hidden" value="{{$article->id}}" name="id">
    <textarea name="review"  cols="30" rows="10"></textarea>
    <button type="submit"> send</button>
</form>
@endforeach
@endsection