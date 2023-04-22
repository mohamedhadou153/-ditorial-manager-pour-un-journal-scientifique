@extends('dashboard.editor.header')
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
<?php use Illuminate\Support\Facades\DB; use Illuminate\Support\Facades\Auth; $reviewers= DB::table('reviewers')->select('*')->get();  
function like_match($pattern, $subject)
{
    $pattern = str_replace('%', '.*', preg_quote($pattern, '/'));
    return (bool) preg_match("/^{$pattern}$/i", $subject);
}

$articles = DB::table('articles')->select('*',DB::raw('DATEDIFF(CURDATE(),updated_at )as date' ))
		->whereRaw('DATEDIFF(CURDATE(),updated_at) > 5')
        ->where('etat','traitement')
        ->where('editorId',auth::guard('editor')->user()->email)
        ->where('reviewer1Id','!=', null)
        ->where('rev_active1','NOT LIKE',"%.com%")
        ->orwhere('reviewer2Id','!=', null)
        ->whereRaw('DATEDIFF(CURDATE(),updated_at) > 5')
        ->where('etat','traitement')
        ->where('rev_active2','NOT LIKE',"%.com%")
        ->where('editorId',auth::guard('editor')->user()->email)
        ->get();
		$a = 0;
		?>
<div class="med bg-gray-900">
<div class="flex  justify-center  bg-gray-900">
	<div class="col-span-120">
		<div class="overflow-auto lg:overflow-visible ">
			<table class="table text-gray-400 border-separate space-y-6 text-sm">
				<thead class="bg-gray-800 text-gray-500">
					<tr class="bg-gray-900">
						<th colspan="5" style="border-radius: 0px;font-size: 50px;">Réviseurs n'ont pas répondu à l'invitation</th>
					</tr>
					<tr>
					<th class="p-3 "style="width:300px">reviseur email</th>
						<th class="p-3" style="width:200px">Titre d'article</th>
						<th class="p-3 "style="width:300px">invitation envoyer le</th>
						<th class="p-3 "style="width:200px">temps d'attente</th>
						<th class="p-3 "style="width:200px">Action</th>
					</tr>
				</thead>
				<tbody>
				@foreach ($articles as $article)
				<?php
				$date = date("Y");
				?>
				@if(! like_match('%.com%',$article->rev_active1))
					<tr class="bg-gray-800" >
						<td class="p-3">
							<div class="">
								<div class="ml-3">
									<div class="">{{$article->reviewer1Id}}</div>
								</div>
							</div>
						</td>
						<td class="p-3">
							<div class="">
								<div class="ml-3">
									<div class="">{{$article->title}}</div>
								</div>
							</div>
						</td>
						<td class="p-3">
							<div class="">
								<div class="ml-3">
									<div class="">{{$article->updated_at}}</div>
								</div>
							</div>
						</td>
						<td class="p-3">
							<div class="">
								<div class="ml-3">
									<div class="">{{$article->date}}</div>
								</div>
							</div>
						</td>
						<td class="ml-3 ">
							<button  onclick="invv(a{{$article->id}}1)" style="text-decoration: none;margin-right:10px;color:maroon"  class="bg-green-400 text-gray-50 rounded-md px-2">Remplacer réviseur</button>
						</td>
					</tr>
						<form action="{{route('editor.SendToReviewer')}}" >
						<tr class="bg-gray-800" style="display:none;" id="a{{$article->id}}1" >
								<td class="p-3"colspan="2">
									<div class="">
										<div class="ml-3">
											<div class="">1er réviseur</div>
										</div>
									</div>
								</td>
								<td class="p-3"colspan="2">
									<div class="">
										<div class="ml-3">
										<div class=""><select id="select1" name="reviewer1" class="form-control" onchange="app_sel(this.value);" >
										                            @foreach($reviewers as $reviewer)
																    	<option value="{{$reviewer->email}}">{{$reviewer->email}}</option>
																	@endforeach
															</select></div>
										</div>
									</div>
								</td>
								<td class="ml-3 ">
							<button   style="text-decoration: none;margin-right:10px;color:maroon"  class="bg-green-400 text-gray-50 rounded-md px-2"><input type="submit" value="Inviter réviseur"/></button>
						</td>
							</tr>
							<input type="hidden" value="{{$article->id}}" name="id">
					</form>
					@endif
					@if(! like_match('%.com%',$article->rev_active2))
					<tr class="bg-gray-800" >
						<td class="p-3">
							<div class="">
								<div class="ml-3">
									<div class="}}</div>
								</div>
							</div>
						</td>
						<td class="p-3">
							<div class="">
								<div class="ml-3">
									<div class="">{{$article->reviewer1Id}}</div>
								</div>
							</div>
						</td>
						<td class="p-3">
							<div class="">
								<div class="ml-3">
									<div class="">{{$article->title}}</div>
								</div>
							</div>
						</td>
						<td class="p-3">
							<div class="">
								<div class="ml-3">
									<div class="">{{$article->updated_at}}</div>
								</div>
							</div>
						</td>
						<td class="p-3">
							<div class="">
								<div class="ml-3">
									<div class="">{{$article->date}} jours</div>
								</div>
							</div>
						</td>
						<td class="ml-3 ">
							<button  onclick="invv(a{{$article->id}}2)" style="text-decoration: none;margin-right:10px;color:maroon"  class="bg-green-400 text-gray-50 rounded-md px-2">Remplacer réviseur</button>
						</td>
					</tr>
					<form action="{{route('editor.SendToReviewer')}}" >
						<tr class="bg-gray-800" style="display:none;" id="a{{$article->id}}2" >
								<td class="p-3" colspan="2">
									<div class="">
										<div class="ml-3">
											<div class="">2éme réviseur</div>
										</div>
									</div>
								</td>
								<td class="p-3" colspan="2">
									<div class="">
										<div class="ml-3">
										<div class=""><select id="select1" name="reviewer1" class="form-control" onchange="app_sel(this.value);" >
										                            @foreach($reviewers as $reviewer)
																    	<option value="{{$reviewer->email}}">{{$reviewer->email}}</option>
																	@endforeach
															</select></div>
										</div>
									</div>
								</td>
								<td class="ml-3 ">
							<button   style="text-decoration: none;margin-right:10px;color:maroon"  class="bg-green-400 text-gray-50 rounded-md px-2"><input type="submit" value="Inviter réviseur"/></button>
						</td>
							</tr>
							<input type="hidden" value="{{$article->title}}" name="id">
					</form>
					
					@endif
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

</div>

</div>


<script>
	function invv(y){
		if(y.style.display=="none")
		y.style.display="table-row";
			else
			y.style.display="none";
		}
		
</script>


@endsection