@extends('dashboard.reviewer.home')
@section('review-commande')
<div>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Category</th>
      <th scope="col">Etat</th>
      <th scope="col">Author Email</th>
      <th scope="col">Editor Email</th>
      <th scope="col"> Fisrt Reviewer Email</th>
      <th scope="col"> Seconde Reviewer Email</th>
      <th scope="col"> Edit</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($articles as $article)
    <tr>
      <th scope="row">{{$article->title}}</th>
      <td>{{$article->category}}</td>
      <td>{{$article->etat}}</td>
      <td>{{$article->authorId}}</td>
      <td>{{$article->editorId}}</td>
      <td>{{$article->reviewer1Id}}</td>
      <td>{{$article->reviewer2Id}}</td>
      <td>
        <div>
        <!--<li><a href="{{route('editor.validation-article')}}" >edit</a></li>!-->

        <form action="{{route('reviewer.creation-review')}}"  method="get" >         
          @csrf         
          <input type="hidden" value="{{$article->id}}" name="id">
          <input type="hidden " value="{{auth::guard('reviewer')->user()->email}}" name="e">
          <button type="submit" name="submit">review</button>
        </form>
        </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection