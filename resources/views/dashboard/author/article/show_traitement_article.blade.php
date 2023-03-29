
@extends('dashboard.author.header')
@section('show_traitement_article')
<!--Container-->
<div class="container w-full md:w-4/5 xl:w-3/5  mx-auto px-2">

	

	<!--Card-->
	<div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">


		<table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
			<thead>
				<tr>
					<th data-priority="1">Title</th>
					<th data-priority="2">Category</th>
					<th data-priority="3">Type</th>
					<th data-priority="4">Etat</th>
					<th data-priority="5">Editor Email</th>
					<th data-priority="6">article image </th>
				</tr>
			</thead>
			
			
			<tbody>
			<?php use Illuminate\Support\Facades\DB; use Illuminate\Support\Facades\Auth;  $articles = DB::table('articles')->select('*')->where('authorId',Auth::guard('author')->user()->email)->where('etat','!=','accept')->where('etat','!=','refuse')->get();?>
			@foreach ($articles as $article)
				<tr>
					<td>{{$article->title}}</td>
					<td>{{$article->category}}</td>
					<td>{{$article->type}}</td>
					<td style="color:cornflowerblue;">Traitement</td>
					<td>{{$article->editorId}}</td>
					<td><img src="{{asset('/storage///images/articles/'.$article->pic)}}" style="height: 50px; with: 50px;"  alt=""></td>
				</tr>
			@endforeach	
			</tbody>
		</table>


	</div>
	<!--/Card-->


</div>
<!--/container-->





<!-- jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<!--Datatables -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script>
	$(document).ready(function() {

		var table = $('#example').DataTable({
				responsive: true
			})
			.columns.adjust()
			.responsive.recalc();
	});
</script>

<!-- 
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
      <td><img src="{{asset('/storage///images/articles/'.$article->pic)}}" style="height: 100px; with: 100px;"  alt=""></td>
    </tr>
    @endforeach
  </tbody>
</table>
</div> -->

@endsection