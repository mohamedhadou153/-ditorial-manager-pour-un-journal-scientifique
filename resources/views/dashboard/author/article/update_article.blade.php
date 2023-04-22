

@extends('dashboard.author.header')
@section('style')
	<style>
				body {
					background-image: linear-gradient(to right top, #a7b0be, #8992a7, #6f758f, #575978, #423d60);		}

			.form-control:focus {
				box-shadow: none;
				border-color: black
			}

			.profile-button {
				background: rgb(99, 39, 120);
				box-shadow: none;
				border: none
			}

			.profile-button:hover {
				background: #682773
			}

			.profile-button:focus {
				background: #682773;
				box-shadow: none
			}

			.profile-button:active {
				background: #682773;
				box-shadow: none;
			}

			.back:hover {
				color: #682773;
				cursor: pointer
			}

			.labels {
				font-size: 11px
			}

			.add-experience:hover {
				background: #BA68C8;
				color: #fff;
				cursor: pointer;
				border: solid 1px #BA68C8
			}
			.col-md-12{
				margin-top:10px
			}
	</style>
@endsection
@section('content')
@foreach ($articles as $article)
<div class="container"style="width:800px">


<div class="container rounded bg-white mt-5 mb-5" style="border: 1px solid;">
    <div class="row">
        <div class="col-md-3 border-right" style="border-right: 1px solid gray;">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"style="margin-top:20px;margin-left:10px;"><img class="rounded-circle mt-5" style="height: 150px;width:150px" alt="Admin" src="{{asset('/storage/images/articles/'.$article->pic)}}"></div>
			<h3><span class="font-weight-bold" style="font-size:20px;">{{$article->title}}</span></h3>
        </div>
        <div class="col-md-9">
		<form action="{{route('author.do_update')}}" method="post" enctype="multipart/form-data" >
			@csrf

		 <div style="display: flex;justify-content:space-between">
			<div class="p-3 py-5 border-bottom" style="border-bottom: 1px solid gray;">
			<div class="col-sm-5">
									<h4><span class="font-weight-bold" style="font-size:20px;">Changer l'image</span></h4>
			</div>
			
								<svg class="text-indigo-500 w-24 mx-auto mb-4" style="height: 100px;width:100px;margin-top:40px" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" /></svg>
            <div class="input_field flex flex-col w-max mx-auto text-center">
                <label>
                    
					          <div>
								<input type="file"   name="pic">
								</div>
                </label> 
              </div>			  			
            </div>



			<div class="p-3 py-5 border-bottom" style="border-bottom: 1px solid gray;">
			<div class="col-sm-5">
									<h4><span class="font-weight-bold" style="font-size:20px;">Changer l'article</span></h4>
			</div>
			
								<svg class="text-indigo-500 w-24 mx-auto mb-4" style="height: 100px;width:100px;margin-top:40px" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" /></svg>
            <div class="input_field flex flex-col w-max mx-auto text-center">
                <label>
                    
					          <div>
								<input type="file"   name="obj_pdf">
								</div>
                </label> 
              </div>			  			
            </div>
		 </div>	
		
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Information d'article</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels"><h6>Titre :</h6></label><input type="text" name="title" class="form-control" value="{{$article->title}}"></div>
					<div class="col-md-6"><label class="labels"><h6>Nombre des figures :</h6></label><input type="text" name="nbrfigure" class="form-control"  value="{{$article->nbrfigure}}"></div>
                </div>
				<div class="row mt-2">
				    <div class="col-md-6"><label class="labels"><h6>Categorie :</h6></label><div class="form-row"> 
					<select id="select1" name="category" class="form-control" onchange="app_sel(this.value);" >
							<option value="1">Informatique</option>
							<option value="2">Physique</option>
							<option value="3">Biologie</option>
					</select>
				</div></div>
                    <div class="col-md-6"><label class="labels"><h6>Type :</h6></label> <div class="form-row">  
					<span id="select2" name="type">
					<select id="select21"class="form-control" name="type1" style="display:inline;">
					<option value="1"></option>
					<option value="2">Data sience</option>
					<option value="3">Web devlopement</option>
					<option value="4">Security System</option>
					</select>
					
					<select id="select22" class="form-control" name="type2" style="display:none;">
					<option value="5"></option>
					<option value="6">Mecanique classique</option>
					<option value="7">Mecanique quantique</option>
					<option value="8">Mecanique fleuide</option>
					</select>
					
					<select id="select23" class="form-control" name="type3" style="display:none;">
					<option value="9"></option>
					<option value="10">Humane mecanisme</option>
					<option value="11">j</option>
					<option value="12">j</option>
					</select>
					</span> 
				</div></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels"><h6>Abstract:</h6></label><textarea class="form-control" id="exampleFormControlTextarea4" rows="3">{{$article->abstract}}</textarea></div>
                </div>
				<div class="row mt-3">
                    <div class="col-md-12"><label class="labels"><h6>Remarques:</h6></label><textarea class="form-control" readonly id="exampleFormControlTextarea4" rows="3">{{$article->review3}}</textarea></div>
                </div>
                
                <div class="mt-5 text-center"><input type="submit" class="btn btn-primary profile-button" value="Sauvegarder les modifications" style="margin:10px"></div>
            </div>
			<input type="hidden" name="id" value="{{$article->id}}">
		</form>
        </div>
    </div>
</div>
</div>
</div>




@endforeach
@endsection
