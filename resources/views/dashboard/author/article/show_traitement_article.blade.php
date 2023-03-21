
@extends('dashboard.author.home')
@section('show_traitement_article')



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
      <th scope="col"> pic</th>
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
      <td><img src="{{asset('/storage/images/articles/'.$article->pic)}}" style="height: 100px; with: 100px;"  alt=""></td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>

@endsection