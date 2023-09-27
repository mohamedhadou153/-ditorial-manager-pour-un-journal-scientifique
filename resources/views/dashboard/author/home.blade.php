@extends('dashboard.author.header')
@section('style')
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel=" stylesheet">
	<!--Replace with your tailwind.css once created-->


	<!--Regular Datatables CSS-->
	<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
	<!--Responsive Extension Datatables CSS-->
	<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

	<link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel=" stylesheet">
	<!--Replace with your tailwind.css once created-->


	

	

	<style>
		/*Overrides for Tailwind CSS */

		/*Form fields*/
		.dataTables_wrapper select,
		.dataTables_wrapper .dataTables_filter input {
			color: #4a5568;
			/*text-gray-700*/
			padding-left: 1rem;
			/*pl-4*/
			padding-right: 1rem;
			/*pl-4*/
			padding-top: .5rem;
			/*pl-2*/
			padding-bottom: .5rem;
			/*pl-2*/
			line-height: 1.25;
			/*leading-tight*/
			border-width: 2px;
			/*border-2*/
			border-radius: .25rem;
			border-color: #edf2f7;
			/*border-gray-200*/
			background-color: #edf2f7;
			/*bg-gray-200*/
		}

		/*Row Hover*/
		table.dataTable.hover tbody tr:hover,
		table.dataTable.display tbody tr:hover {
			background-color: #ebf4ff;
			/*bg-indigo-100*/
		}

		/*Pagination Buttons*/
		.dataTables_wrapper .dataTables_paginate .paginate_button {
			font-weight: 700;
			/*font-bold*/
			border-radius: .25rem;
			/*rounded*/
			border: 1px solid transparent;
			/*border border-transparent*/
		}

		/*Pagination Buttons - Current selected */
		.dataTables_wrapper .dataTables_paginate .paginate_button.current {
			color: #fff !important;
			/*text-white*/
			box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
			/*shadow*/
			font-weight: 700;
			/*font-bold*/
			border-radius: .25rem;
			/*rounded*/
			background: #667eea !important;
			/*bg-indigo-500*/
			border: 1px solid transparent;
			/*border border-transparent*/
		}

		/*Pagination Buttons - Hover */
		.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
			color: #fff !important;
			/*text-white*/
			box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
			/*shadow*/
			font-weight: 700;
			/*font-bold*/
			border-radius: .25rem;
			/*rounded*/
			background: #667eea !important;
			/*bg-indigo-500*/
			border: 1px solid transparent;
			/*border border-transparent*/
		}

		/*Add padding to bottom border */
		table.dataTable.no-footer {
			border-bottom: 1px solid #e2e8f0;
			/*border-b-1 border-gray-300*/
			margin-top: 0.75em;
			margin-bottom: 0.75em;
		}

		/*Change colour of responsive icon*/
		table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
		table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
			background-color: #667eea !important;
			/*bg-indigo-500*/
		}
	</style>
@endsection
@section('content')


	
	
	

<!--Container-->
<div class="container w-full md:w-4/5 xl:w-3/5  mx-auto px-2">

	

	<!--Card-->
	<div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white" >


		<table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em; ">
			<thead>
				<tr>
					<th data-priority="1">Titre</th>
					<th data-priority="2">Catégorie</th>
					<th data-priority="3">Type</th>
					<th data-priority="4">État</th>
					<th data-priority="5">date de soumission</th>
					<th data-priority="6">dernière modification </th>
				</tr>
			</thead>
			
			
			<tbody>
			<?php use Illuminate\Support\Facades\DB; use Illuminate\Support\Facades\Auth;  $articles = DB::table('articles')->select('*')->where('authorId',Auth::guard('author')->user()->email)->get();?>
			@foreach ($articles as $article)
				<tr>
					<td>{{$article->title}}</td>
					<td>{{$article->category}}</td>
					<td>{{$article->type}}</td>
					@if($article->etat =='traitement' || $article->etat =='libre')
					
						<td style="color:cornflowerblue;">En Traitement</td>
					@elseif($article->etat =='accept')
					
						<td style="color:green;">Accepter</td>
					@elseif($article->etat =='refuse')
					
						<td style="color: red;">Refuser</td>
					
					@else
					   <td style="color:gray;">Besion Revision</td>	
					@endif
					<td>{{$article->created_at}}</td>
					<td>{{$article->updated_at}}</td>
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
<script  src="/js/hometable.js"></script>
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