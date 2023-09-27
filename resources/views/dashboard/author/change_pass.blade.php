@extends('dashboard.author.header')
@section('style')
	<style>
				body {
					background:#111824;		}

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
@foreach($author as $edit)
	<div class="container">


<div class="container rounded bg-white mt-5 mb-5" style="border: 1px solid;width:500px">
    <div class="row" style="width:1500px">
   
        <div class="col-md-4">
		<div class="p-3 py-5">
		   <form action="{{route('author.change-password')}}" method="post" enctype="multipart/form-data" >
			@csrf
			        <div >
						<h4 >changer le mot de passe</h4>
					</div>
					<div class="row mt-3">
						<div class="col-md-12"><label class="labels"><h6>ancien mot de passe:</h6></label><input type="password" name="pass_old" class="form-control" placeholder="old pass"></div>
						<div class="col-md-12"><label class="labels"><h6>nouveau mot de passe:</h6></label><input type="password" name="pass_new" class="form-control" placeholder="new pass"></div>
						<div class="col-md-12"><label class="labels"><h6>confirmer:</h6></label><input type="password" name="pass_conf" class="form-control" placeholder="confirm pass"></div>
					</div>
					<div class="mt-5 text-center"><input type="submit" class="btn btn-primary profile-button" value="Sauvegarder les modifications" style="margin:10px"></div>

					</form>				
                </div>
        </div>
    </div>
</div>
</div>
</div>



@endforeach
@endsection