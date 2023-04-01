@extends('dashboard.reviewer.header')
@section('style')
@vite('resources/css/app.css')
<link
	href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
	rel="stylesheet">
<style>
			body {
		background:#111824;
	}
	.table { 
		margin-top:50px;
		height:200px;
		width:1300px;
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
	tr td:nth-child(n+6),
	tr th:nth-child(n+6) {
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
<?php use Illuminate\Support\Facades\DB; use Illuminate\Support\Facades\Auth;  $rev = auth::guard('reviewer')->user()->email; $reviewer=auth::guard('reviewer')->user()->email;  $articles = DB::table('articles')->select('*')
		->where('rev_active','LIKE',"%{$rev}%")
		->where('rev_active','LIKE',"%dev%")
        ->where('reviewer1Id','=',$reviewer)
		->orwhere('reviewer2Id','=',$reviewer)
		->where('rev_active','LIKE',"%{$rev}%")
		->where('rev_active','LIKE',"%dev%")
        ->get();?>
<div class="med bg-gray-900">
<div class="flex  justify-center min-h-screen bg-gray-900">
	<div class="col-span-120">
		<div class="overflow-auto lg:overflow-visible ">
			<table class="table text-gray-400 border-separate space-y-6 text-sm">
				<thead class="bg-gray-800 text-gray-500">
					<tr class="bg-gray-900">
						<th colspan="6" style="border-radius: 0px;font-size: 50px;">décision final </th>
					</tr>
					<tr>
						<th class="p-3">Title</th>
						<th class="p-3 ">categorie</th>
						<th class="p-3 ">type</th>
						<th class="p-3 ">Abstract</th>
						<th class="p-3 ">Review</th>
						<th class="p-3 ">Action</th>
					</tr>
				</thead>
				<tbody>
				@foreach ($articles as $article)
                @if($reviewer == $article->reviewer1Id)
                @if($article->rev_des1 == 'accept')
					<tr class="bg-gray-800" >
						<td class="p-3">
							<div class="">
							<!-- <img class="  h20 w-20   object-cover" src="{{asset('/storage/images/articles/'.$article->pic)}}" alt="unsplash image"> -->
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
						<textarea id="autoShowHide" rows="1" cols="30" readonly  class=" p-2.5 w-full  ml-3  rounded-lg bg-gray-800  ">{{$article->abstract}}</textarea>
						</td>
						 <td class="p-3">
						 <textarea id="" rows="1" cols="30"    class="block p-2.5 w-full  ml-3  rounded-lg bg-gray-800  ">{{$article->review1}}</textarea>
						 </td>
                         <td class="ml-3 ">
						 <span class="bg-green-400 text-gray-50 rounded-md px-2">acceptée</span>
                @endif
				@endif
                @if($reviewer == $article->reviewer1Id)
                @if($article->rev_des1 == 'refuse')
					<tr class="bg-gray-800" >
						<td class="p-3">
							<div class="flex align-items-center">
							<!-- <img class="  h20 w-20   object-cover" src="{{asset('/storage/images/articles/'.$article->pic)}}" alt="unsplash image"> -->
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
						<textarea id="autoShowHide" rows="1" cols="30" readonly  class="block p-2.5 w-full  ml-3  rounded-lg bg-gray-800  ">{{$article->abstract}}</textarea>
						</td>
						 <td class="p-3">
						 <textarea id="" rows="1" cols="30"    class="block p-2.5 w-full  ml-3  rounded-lg bg-gray-800  ">{{$article->review1}}</textarea>
						 </td>
                         <td class="ml-3 ">
						 <span class="bg-red-400 text-gray-50 rounded-md px-2">refuse</span>
                @endif
				@endif
                @if($reviewer == $article->reviewer2Id)
                @if($article->rev_des2 == 'accept')
					<tr class="bg-gray-800" >
						<td class="p-3">
							<div class="flex align-items-center">
							<!-- <img class="  h20 w-20   object-cover" src="{{asset('/storage/images/articles/'.$article->pic)}}" alt="unsplash image"> -->
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
						<textarea id="autoShowHide" rows="1" cols="30" readonly  class="block p-2.5 w-full  ml-3  rounded-lg bg-gray-800  ">{{$article->abstract}}</textarea>
						</td>
						 <td class="p-3">
						 <textarea id="" rows="1" cols="30"    class="block p-2.5 w-full  ml-3  rounded-lg bg-gray-800  ">{{$article->review2}}</textarea>
						 </td>
                         <td class="ml-3 ">
						 <span class="bg-green-400 text-gray-50 rounded-md px-2">acceptée</span>
                @endif
				@endif
                @if($reviewer == $article->reviewer2Id)
                @if($article->rev_des2 == 'refuse')
					<tr class="bg-gray-800" >
						<td class="p-3">
							<div class="flex align-items-center">
							<!-- <img class="  h20 w-20   object-cover" src="{{asset('/storage/images/articles/'.$article->pic)}}" alt="unsplash image"> -->
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
						<textarea id="autoShowHide" rows="1" cols="30" readonly  class="block p-2.5 w-full  ml-3  rounded-lg bg-gray-800  ">{{$article->abstract}}</textarea>
						</td>
						 <td class="p-3">
						 <textarea id="" rows="1" cols="30"    class="block p-2.5 w-full  ml-3  rounded-lg bg-gray-800  ">{{$article->review1}}</textarea>
						 </td>
                         <td class="ml-3 ">
						 <span class="bg-red-400 text-gray-50 rounded-md px-2">refuse</span>
                @endif
				@endif
                @if($reviewer == $article->reviewer1Id)
                @if($article->rev_des1 == 'accept avec revision')
					<tr class="bg-gray-800" >
						<td class="p-3">
							<div class="flex align-items-center">
							<!-- <img class="  h20 w-20   object-cover" src="{{asset('/storage/images/articles/'.$article->pic)}}" alt="unsplash image"> -->
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
						<textarea id="autoShowHide" rows="1" cols="30" readonly  class="block p-2.5 w-full  ml-3  rounded-lg bg-gray-800  ">{{$article->abstract}}</textarea>
						</td>
						 <td class="p-3">
						 <textarea id="" rows="1" cols="30"    class="block p-2.5 w-full  ml-3  rounded-lg bg-gray-800  ">{{$article->review1}}</textarea>
						 </td>
                         <td class="ml-3 ">
						 <span style="background-color:orange" class=" text-gray-50 rounded-md px-2">revision</span>
                @endif
				@endif
                @if($reviewer == $article->reviewer2Id)
                @if($article->rev_des2 == 'accept avec revision')
					<tr class="bg-gray-800" >
						<td class="p-3">
							<div class="flex align-items-center">
							<!-- <img class="  h20 w-20   object-cover" src="{{asset('/storage/images/articles/'.$article->pic)}}" alt="unsplash image"> -->
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
						<textarea id="autoShowHide" rows="1" cols="30" readonly  class="block p-2.5 w-full  ml-3  rounded-lg bg-gray-800  ">{{$article->abstract}}</textarea>
						</td>
						 <td class="p-3">
						 <textarea id="" rows="1" cols="30"    class="block p-2.5 w-full  ml-3  rounded-lg bg-gray-800  ">{{$article->review2}}</textarea>
						 </td>
                         <td class="ml-3 ">
						 <span style="background-color:orange" class=" text-gray-50 rounded-md px-2">acceptée avec revision</span>
                @endif
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