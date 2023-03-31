@extends('dashboard.reviewer.header')
@section('style')
<link
	href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
	rel="stylesheet">
	<style>
		.med{
			margin-top:-20px
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
<?php use Illuminate\Support\Facades\DB; use Illuminate\Support\Facades\Auth;  $rev = auth::guard('reviewer')->user()->email;  $articles = DB::table('articles')->select('*')
        ->where('etat','traitement')
		->where('rev_active','NOT LIKE',"%{$rev}%")
        ->where('reviewer1Id','=',$rev)->orwhere('reviewer2Id','=',$rev)
        ->get();?>
<div class="med">
<div class="flex  justify-center min-h-screen bg-gray-900">
	<div class="col-span-120">
		<div class="overflow-auto lg:overflow-visible ">
			<table class="table text-gray-400 border-separate space-y-6 text-sm">
				<thead class="bg-gray-800 text-gray-500">
					<tr class="bg-gray-900">
						<th colspan="5" style="border-radius: 0px;font-size: 50px;">invitations </th>
					</tr>
					<tr>
						<th class="p-3">Title</th>
						<th class="p-3 text-left">Category</th>
						<th class="p-3 text-left">Type</th>
						<th class="p-3 text-left">Abstract</th>
						<th class="p-3 text-left">Action</th>
					</tr>
				</thead>
				<tbody>
				@foreach ($articles as $article)
					<tr class="bg-gray-800" >
						<td class="p-3">
							<div class="flex align-items-center">
							 <img class="  h20 w-20   object-cover" src="{{asset('/storage/images/articles/'.$article->pic)}}" alt="unsplash image">
								<div class="ml-3">
									<div class="">{{$article->title}}</div>
								</div>
							</div>
						</td>
						<td class="ml-3">
							{{$article->category}}
						</td>
						<td class="ml-3">
							{{$article->type}}
						</td>
						<td class="p-3">
						<textarea id="autoShowHide" rows="3" cols="30" readonly  class="block p-2.5 w-full  ml-3  rounded-lg bg-gray-800 border ">{{$article->abstract}}</textarea>
						</td>

						<td class="ml-3 ">
						<div style="display:flex; justify-content:center;">
						<form action="{{route('reviewer.validation-review')}}">
							<input type="hidden" name="id" value="{{$article->id}}">
							<input type="submit" value="Accept" style="text-decoration: none;margin-right:10px;" class="bg-green-400 text-gray-50 rounded-md px-2"></input>
						</form>
						<form action="">
							<input type="hidden" name="id" value="{{$article->id}}">
							<input type="submit" value="Refuse" style="text-decoration: none;" class="bg-red-400 text-gray-50 rounded-md px-2"></input>
						</form>
						</div>	
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

</div>

</div>


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




@endsection