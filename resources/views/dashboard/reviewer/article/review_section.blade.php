@extends('dashboard.reviewer.header')
@section('content')
@foreach ($articles as $article)
<form action="{{route('reviewer.SendToEditor')}}" method="GET">
    <div style="display: flex;justify-content:space-between;">
        <div style="width:100%; height:100%">
          <embed src="{{asset('/storage/pdf/articles/'.$article->obj_pdf.'#toolbar=0')}}" aria-readonly="true" frameborder="0" width="70%" height="770px"/>
        </div>
        <div style="width:30%; height:100%">
          <label for="">Set review:</label>
          <input type="hidden" value=16 name="article_id">
          <textarea name="review"  cols="30" rows="10"></textarea>
          <button type="submit"> send</button>
        </div>
    </div>
    
</form>


@endforeach
@endsection