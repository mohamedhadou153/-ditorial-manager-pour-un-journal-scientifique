@extends('dashboard.editor.header')
@section('style')
@vite('resources/css/app.css')
<link
	href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
	rel="stylesheet">
<style>
		body {
		background:#111827;
	}
	.table { 
		margin-top:50px;
		height:200px;
		width:1200px;
		border-spacing: 0 15px;
	}

	i {
		font-size: 10rem ;
	}

	.table tr {
		border-radius: 20px;
		font-size: 20px;
		
	}
	.table tr td{
		
		text-align: center;
	}

	tr td:nth-child(n+5),
	tr th:nth-child(n+5) {
		border-radius: 0 .625rem .625rem 0;
	}

	tr td:nth-child(1),
	tr th:nth-child(1) {
		border-radius: .625rem 0 0 .625rem;
	}
	h1{
		color:white;
	}
</style>	

<style>

	#autoShowHide {
	text-align: center;
	width: 400px; 
	overflow: hidden;
	text-overflow: ellipsis;
	}

	#autoShowHide:focus { white-space: normal;  overflow: visible; width: 100%; }
</style>
 
@endsection
@section('content')
<?php use Illuminate\Support\Facades\DB; use Illuminate\Support\Facades\Auth;   $articles = DB::table('articles')->select('*')
        ->where('etat','traitement')
        ->where('editorId',auth::guard('editor')->user()->email)
        ->where('reviewer1Id','!=', null)
        ->where('rev_active1','NOT LIKE',"%dev%")
        ->where('rev_active1','LIKE',"%.com%")
        ->orwhere('etat','traitement')
        ->where('reviewer2Id','!=', null)
		->where('editorId',auth::guard('editor')->user()->email)
		->where('rev_active2','NOT LIKE',"%dev%")
		->where('rev_active2','LIKE',"%.com%")
        ->get();?>
<div class="med bg-gray-900">
<div class="flex  justify-center  bg-gray-900">
	<div class="col-span-120">
		<div class="overflow-auto lg:overflow-visible ">
			<table class="table text-gray-400 border-separate space-y-6 text-sm">
				<thead class="bg-gray-800 text-gray-500">
					<tr class="bg-gray-900">
						<th colspan="5" style="border-radius: 0px;font-size: 50px;">Soumissions Avec Révisions Requis Incomplétes </th>
					</tr>
					<tr>
						<th class="p-3">Titre</th>
						<th class="p-3 ">Categorie</th>
						<th class="p-3 ">Type</th>
						<th class="p-3 ">reviseur 1</th>
						<th class="p-3 ">reviseur 2</th>
					</tr>
				</thead>
				<tbody>
				@foreach ($articles as $article)
					<tr class="bg-gray-800" >
						<td class="p-3">
							<div class="">
							<!-- <img class="  h20 w-20   object-cover" src="{{asset('/storage/images/articles/'.$article->pic)}}" alt="unsplash image"> -->
								<div class="ml-3">
									<div class="">{{$article->title}}</div>
								</div>
							</div>
						</td>
						<td class="p-3">
							<div class="">
								<div class="ml-3">
									<div class="">{{$article->category}}</div>
								</div>
							</div>
						</td>
						<td class="p-3">
							<div class="">
								<div class="ml-3">
									<div class="">{{$article->type}}</div>
								</div>
							</div>
						</td>
						</td>
						 @if($article->rev_des1 == null)
						<td class="p-3">
							<div class="">
								<div class="ml-3">
									<div class="">non configuré</div>
								</div>
							</div>
						</td>
						@endif
						@if($article->rev_des1 != null)
						<td class="p-3">
							<div class="">
								<div class="ml-3">
									<div class="">configuré</div>
								</div>
							</div>
						</td>
						@endif
						@if($article->rev_des2 == null)
						<td class="p-3">
							<div class="">
								<div class="ml-3">
									<div class="">non configuré</div>
								</div>
							</div>
						</td>
						@endif
						@if($article->rev_des2 != null)
						<td class="p-3">
							<div class="">
								<div class="ml-3">
									<div class="">configuré</div>
								</div>
							</div>
						</td>
						@endif
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

</div>

</div>


<!-- jQuery -->
<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->

<!--Datatables -->
<!-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script>
	$(document).ready(function() {

		var table = $('#example').DataTable({
				responsive: true
			})
			.columns.adjust()
			.responsive.recalc();
	});
</script> -->

@foreach($articles as $article)

<!-- <form action="{{route('editor.update-etat')}}" method="GET">
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
</form> -->
@endforeach
@endsection