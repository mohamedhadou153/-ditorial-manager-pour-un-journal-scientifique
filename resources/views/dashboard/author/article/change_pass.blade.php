@extends('dashboard.head')
@section('head')
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
@foreach($author as $auth)
	<div class="container">


<div class="container rounded bg-white mt-5 mb-5" style="border: 1px solid;width:500px">

		   <form action="{{route('author.change-password')}}" method="post" enctype="multipart/form-data" >
			@csrf
			        <div >
						<h4 >changer le mot de passe</h4>
					</div>
					<div class="row mt-3">
						<div class="col-md-12"><label class="labels"><h6>Ancien mot de passe:</h6></label><input type="password" name="pass_old" class="form-control" placeholder="Ancien mot de passe"></div>
						<div class="col-md-12"><label class="labels"><h6>Nouveau mot de passe:</h6></label><input type="password" name="pass_new" class="form-control" placeholder="Nouveau mot de passe:"></div>
						<div class="col-md-12"><label class="labels"><h6>Confirmer:</h6></label><input type="password" name="pass_conf" class="form-control" placeholder="Confirmer"></div>
					</div>
					<div class="mt-5 text-center"><input type="submit" class="btn btn-primary profile-button" value="Sauvegarder les modifications" style="margin:10px"></div>

					</form>				
                </div>
        </div>
    </div>




@endforeach
@endsection