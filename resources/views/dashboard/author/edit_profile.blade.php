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
				box-shadow: none
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


<div class="container rounded bg-white mt-5 mb-5" style="border: 1px solid;">
    <div class="row" >
        <div class="col-md-3 border-right" style="border-right: 1px solid gray;">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"style="margin-top:20px;margin-left:40px;"><img class="rounded-circle mt-5" width="150px" alt="Admin" src="https://picsum.photos/200/200?grayscale"></div>
			<h3><span class="font-weight-bold" style="margin-left:20px;">{{$auth->first_name}} {{$auth->last_name}}</span></h3>
        </div>
        <div class="col-md-5 border-right" style="border-right: 1px solid gray;">
		<div class="p-3 py-5 border-bottom" style="border-bottom: 1px solid gray;">
		 <form action="{{route('author.change_profile')}}" method="post" enctype="multipart/form-data" >
			@csrf
			<div class="col-sm-3">
									<h4 >Change_image</h4>
								</div>
								<svg class="text-indigo-500 w-24 mx-auto mb-4" style="height: 100px;width:100px;margin-top:40px" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" /></svg>
            <div class="input_field flex flex-col w-max mx-auto text-center">
                <label>
                    
					          <div>
								<input type="file" form="file"  name="picture">
								</div>
                </label> 
              </div>

							
                </div>
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">First Name:</label><input type="text" name="first_name" class="form-control" value="{{$auth->first_name}}"></div>
                    <div class="col-md-6"><label class="labels">LAst Name:</label><input type="text" name="last_name" class="form-control"  value="{{$auth->last_name}}"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Email:</label><input type="text" name="email" class="form-control" value="{{$auth->email}}"></div>
                    <div class="col-md-12"><label class="labels">Phone:</label><input type="text" name="n_tele" class="form-control" value="{{$auth->n_tele}}"></div>
                    <div class="col-md-12"><label class="labels">Age:</label><input type="text" name="age" class="form-control" value="{{$auth->age}}"></div>
                    <div class="col-md-12"><label class="labels">Biographie:</label><input type="textarea" name="biographie" class="form-control" value="{{$auth->biographie}}"></div>
                </div>
                
                <div class="mt-5 text-center"><input type="submit" class="btn btn-primary profile-button" value="Save Changes" style="margin:10px"></div>
            </div>
		</form>
        </div>
		
        <div class="col-md-4">
		<div class="p-3 py-5">
		   <form action="{{route('author.change-password')}}" method="post" enctype="multipart/form-data" >
			@csrf
			        <div >
						<h4 >change_password</h4>
					</div>
					<div class="row mt-3">
						<div class="col-md-12"><label class="labels">old pass:</label><input type="password" name="pass_old" class="form-control" placeholder="old pass"></div>
						<div class="col-md-12"><label class="labels">new pass:</label><input type="password" name="pass_new" class="form-control" placeholder="new pass"></div>
						<div class="col-md-12"><label class="labels">confirm:</label><input type="password" name="pass_conf" class="form-control" placeholder="confirm pass"></div>
					</div>
					<div class="mt-5 text-center"><input type="submit" class="btn btn-primary profile-button" value="Save Changes" style="margin:10px"></div>

					</form>				
                </div>
        </div>
    </div>
</div>
</div>
</div>



@endforeach
@endsection