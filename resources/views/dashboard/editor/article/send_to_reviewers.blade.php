@extends('dashboard.editor.home')
@section('sed_to_reviewer')
<form action="{{route('editor.SendToReviewers')}}" method="GET">
    <label for="">send to reviewer 1</label> 
    <input type="text" name="reveiwer1Id">
    <br>
    <label for="">send to reviewer 2</label> 
    <input type="text" name="reveiwer2Id">

    <input type="hidden" name="id" value="{{$id}}">
    <button type="submit">send</button>
</form>

@endsection