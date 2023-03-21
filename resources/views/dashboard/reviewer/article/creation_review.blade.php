@extends('dashboard.reviewer.home')
@section('creation-review')
@foreach($articles as $article)
<form action="{{route('reviewer.SendToEditor')}}" method="GET">
    <label for="">Set review:</label>
    <textarea name="review"  cols="30" rows="10"></textarea>
    <button type="submit"> send</button>
</form>
@endforeach
@endsection