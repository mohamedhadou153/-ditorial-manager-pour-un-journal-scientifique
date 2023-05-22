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
		margin-top:30px;
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
	.table tr {
		
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

<style>
	
		.alert {
		border-radius: 0;
		-webkit-border-radius: 0;
		box-shadow: 0 1px 2px rgba(0,0,0,0.11);
		display: table;
		width: 100%;
		}

		.alert-white {
		background-image: linear-gradient(to bottom, #fff, #f9f9f9);
		border-top-color: #d8d8d8;
		border-bottom-color: #bdbdbd;
		border-left-color: #cacaca;
		border-right-color: #cacaca;
		color: #404040;
		padding-left: 61px;
		position: relative;
		}

		.alert-white.rounded {
		border-radius: 3px;
		-webkit-border-radius: 3px;
		}

		.alert-white.rounded .icon {
		border-radius: 3px 0 0 3px;
		-webkit-border-radius: 3px 0 0 3px;
		}

		.alert-white .icon {
		text-align: center;
		width: 45px;
		height: 100%;
		position: absolute;
		top: 0;
		left: 0;
		border: 1px solid #bdbdbd;
		padding-top: 15px;
		}


		.alert-white .icon:after {
		-webkit-transform: rotate(45deg);
		-moz-transform: rotate(45deg);
		-ms-transform: rotate(45deg);
		-o-transform: rotate(45deg);
		transform: rotate(45deg);
		display: block;
		content: '';
		width: 10px;
		height: 10px;
		border: 1px solid #bdbdbd;
		position: absolute;
		border-left: 0;
		border-bottom: 0;
		top: 50%;
		right: -6px;
		margin-top: -3px;
		background: #fff;
		}

		.alert-white .icon i {
		font-size: 20px;
		color: #fff;
		left: 12px;
		margin-top: -10px;
		position: absolute;
		top: 50%;
		}
		/*============ colors ========*/
		.alert-success {
		color: #3c763d;
		background-color: #dff0d8;
		border-color: #d6e9c6;
		}

		.alert-white.alert-success .icon, 
		.alert-white.alert-success .icon:after {
		border-color: #54a754;
		background: #60c060;
		}

		.alert-info {
		background-color: #d9edf7;
		border-color: #98cce6;
		color: #3a87ad;
		}

		.alert-white.alert-info .icon, 
		.alert-white.alert-info .icon:after {
		border-color: #3a8ace;
		background: #4d90fd;
		}


		.alert-white.alert-warning .icon, 
		.alert-white.alert-warning .icon:after {
		border-color: #d68000;
		background: #fc9700;
		}

		.alert-warning {
		background-color: #fcf8e3;
		border-color: #f1daab;
		color: #c09853;
		}

		.alert-danger {
		background-color: #f2dede;
		border-color: #e0b1b8;
		color: #b94a48;
		}

		.alert-white.alert-danger .icon, 
		.alert-white.alert-danger .icon:after {
		border-color: #ca452e;
		background: #da4932;
		}
</style>

<style>
		button {
	--b: 3px;   /* border thickness */
	--s: .15em; /* size of the corner */
	--c: #6B7280;
	
	padding: calc(.05em + var(--s)) calc(.3em + var(--s));
	color: var(--c);
	--_p: var(--s);
	background:
		conic-gradient(from 90deg at var(--b) var(--b),#0000 90deg,var(--c) 0)
		var(--_p) var(--_p)/calc(100% - var(--b) - 2*var(--_p)) calc(100% - var(--b) - 2*var(--_p));
	transition: .3s linear, color 0s, background-color 0s;
	outline: var(--b) solid #0000;
	outline-offset: .2em;
	}
	button:hover,
	button:focus-visible{
	--_p: 0px;
	outline-color: var(--c);
	outline-offset: .05em;
	}
	:active {
	background: var(--c);
	color: #6B7280;
	}
	.had {
		
		margin-top : 30px;
		
		grid-template-columns: auto auto;
		gap: 20px;
		place-content: center;
		}

	button {
	font-family: system-ui, sans-serif;
	font-weight: bold;
	font-size: 20px;
	cursor: pointer;
	border: none;
	margin: 10px;
	}
</style>

 
@endsection
@section('content')
<?php use Illuminate\Support\Facades\DB; use Illuminate\Support\Facades\Auth;  $rev1 = auth::guard('reviewer')->user()->email.'accept';$rev2 = auth::guard('reviewer')->user()->email.'refuse'; $reviewer=auth::guard('reviewer')->user()->email;  $articles = DB::table('articles')->select('*')
        ->where('etat','traitement')
		->where('rev_active1','NOT LIKE',"%{$rev1}%")
		->where('rev_active1','NOT LIKE',"%{$rev2}%")
        ->where('reviewer1Id','=',$reviewer)
		->orwhere('reviewer2Id','=',$reviewer)
		->where('etat','traitement')
		->where('rev_active2','NOT LIKE',"%{$rev1}%")
		->where('rev_active2','NOT LIKE',"%{$rev2}%")
        ->get();?>
<div class="med bg-gray-900 justify-center">
	<div class="had flex bg-gray-900 justify-center "style="height:110px">
			<button style="font-size: 30px;--_p: 0px;outline-color: var(--c);outline-offset: .05em;}" >Nouvelles Invitations</button>
			<a href="{{route('reviewer.validation-section')}}" style="height:50px"><button style="font-size: 30px;height:90px;--c: #6B7280;--b: 5px;--s:12px" >Invitations Acceptées</button></a>
			<a href="{{route('reviewer.review-confirme')}}"><button style="font-size: 30px;height:90px;--c: #6B7280;--b: 5px;--s:12px">Invitations Traitées</button></a>
	</div>

<div class="flex  justify-center  bg-gray-900">

	<div class="col-span-120">
		<div class="overflow-auto lg:overflow-visible ">
			<table class="table text-gray-400 border-separate space-y-6 text-sm">
				<thead class="bg-gray-800 text-gray-500">
					<tr class="bg-gray-900">
						<th colspan="5" style="border-radius: 0px;font-size: 50px;">Nouvelles Invitations </th>
					</tr>
					<tr>
						<th class="p-3">Titre</th>
						<th class="p-3">Categorie</th>
						<th class="p-3">Type</th>
						<th class="p-3">Abstract</th>
						<th class="p-3">Action</th>
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
						<td class="ml-3">
							{{$article->category}}
						</td>
						<td class="ml-3">
							{{$article->type}}
						</td>
						<td class="p-3">
						<textarea id="autoShowHide" rows="1" cols="30" readonly  class=" p-2.5 w-full  ml-3  rounded-lg bg-gray-800  ">{{$article->abstract}}</textarea>
						</td>

						<td class="ml-3 ">
						<div style="display:flex; justify-content:center;">
						<form action="{{route('reviewer.validation-review')}}">
							<input type="hidden" name="id" value="{{$article->id}}">
							<input type="submit" value="Accepter" style="text-decoration: none;margin-right:10px;" class="bg-green-400 text-gray-50 rounded-md px-2"></input>
						</form>
						<form action="{{route('reviewer.validation-refuse-review')}}">
							<input type="hidden" name="id" value="{{$article->id}}">
							<input type="submit" value="Refuser" style="text-decoration: none;" class="bg-red-400 text-gray-50 rounded-md px-2"></input>
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