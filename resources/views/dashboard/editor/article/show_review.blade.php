@extends('dashboard.editor.home')
@section('show_review')
<div>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Category</th>
      <th scope="col">Etat</th>
      <th scope="col">Author Email</th>
      <th scope="col"> Reviewer1 Email</th>
      <th scope="col"> Reviewer1 review</th>
      <th scope="col"> Reviewer2 Email</th>
      <th scope="col"> Reviewer2 review</th>
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
      <td>{{$article->reviewer1Id}}</td>
      <td>{{$article->review1}}</td>
      <td>{{$article->reviewer2Id}}</td>
      <td>{{$article->review2}}</td>
      <td>
        <div>
        <!--<li><a href="{{route('editor.validation-article')}}" >edit</a></li>!-->

        <form action="{{route('editor.validation-article')}}"  method="get" enctype="multipart/form-data" >         
          @csrf         
          <input type="hidden" value="{{$article->id}}" name="id">
          <input type="hidden" value="{{auth::guard('editor')->user()->email}}" name="e" id="e">
          <button type="submit" name="submit">edit</button>
        </form>
        </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection