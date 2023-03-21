@extends('dashboard.editor.home')
@section('validation_article')
@foreach($articles as $article)
<form action="{{route('editor.update-etat')}}" method="GET">
    <label for="">Set etat:</label>
    <input type="text" name="etat">
    <input type="hidden" name="id" value="{{$article->id}}">
    <button type="submit"> change</button>
</form>
<br>
<form action="{{route('editor.SendToReviewers')}}" method="GET">
    <label for="">send to reviewer 1</label> 
    <input type="text" name="reveiwer1Id">
    <br>
    <label for="">send to reviewer 2</label> 
    <input type="text" name="reveiwer2Id">

    <input type="hidden" name="id" value="{{$article->id}}">
    <button type="submit">send</button>
</form>
@endforeach
@endsection