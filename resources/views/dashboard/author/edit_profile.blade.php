@extends('dashboard.author.home')
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
@section('profile')
@foreach($author as $auth)

<<<<<<< HEAD
<form action="{{route('author.change-profile')}}" method="POST" enctype="multipart/form-data" >
	@csrf
	<div class="container">
=======
<form action="{{route('author.change-profile')}}" method="get">
<div class="container rounded bg-white mt-5 mb-5" style="border: 1px solid;">
    <div class="row" >
        <div class="col-md-3 border-right" style="border-right: 1px solid gray;">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"style="margin-top:20px;margin-left:40px;"><img class="rounded-circle mt-5" width="150px" alt="Admin" src="https://picsum.photos/200/200?grayscale"></div>
			<h3><span class="font-weight-bold" style="margin-left:20px;">{{$auth->first_name}} {{$auth->last_name}}</span></h3>
        </div>
        <div class="col-md-5 border-right" style="border-right: 1px solid gray;">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">First Name:</label><input type="text" name="first_name" class="form-control" value="{{$auth->first_name}}" value=""></div>
                    <div class="col-md-6"><label class="labels">LAst Name:</label><input type="text" name="last_name" class="form-control"  value="{{$auth->last_name}}"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Email:</label><input type="text" name="email" class="form-control" value="{{$auth->email}}" value=""></div>
                    <div class="col-md-12"><label class="labels">Phone:</label><input type="text" name="n_tele" class="form-control" value="{{$auth->n_tele}}" value=""></div>
                    <div class="col-md-12"><label class="labels">Age:</label><input type="text" name="age" class="form-control" value="{{$auth->age}}" value=""></div>
                    <div class="col-md-12"><label class="labels">Biographie:</label><input type="textarea" name="biographie" class="form-control" value="{{$auth->biographie}}" value=""></div>
                </div>
                
                <div class="mt-5 text-center"><input type="submit" class="btn btn-primary profile-button" value="Save Changes" style="margin:10px"></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
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
        </div>
    </div>
</div>
</div>
</div>

</form>

@endforeach
@endsection
<!-- <div class="container">
>>>>>>> a8bf575e7f129d7cde66015bd5ddc4ca7f615cef
    <div class="main-body">
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://picsum.photos/200/200?grayscale"   alt="Admin" class="rounded" width="150">
                    <div class="mt-3">
                      <h4>{{$auth->first_name}} {{$auth->last_name}}</h4>
                      <p class="text-secondary mb-1">Author</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			
            <div class="col-lg-8">
					<div class="card">
						<div class="card-body">
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">First Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="{{$auth->first_name}}" name="first_name" >
								</div>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Last Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="{{$auth->last_name}}" name="last_name">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Email</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="{{$auth->email}}" name="email" readonly >
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Age</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="{{$auth->age}}" name="age">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Phone</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="{{$auth->n_tele}}" name="n_tele">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Biographie</h6>
								</div>
								<div class="col-sm-9 textarea-secondary">
								   <textarea class="form-control" id="textAreaExample1" rows="4" name="biographie">{{$auth->biographie}}</textarea>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Change image</h6>
								</div>
								<div class="col-sm-9 textarea-secondary">
									<input type="file" form="file"  name="picture">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<input type="submit" class="btn btn-primary px-4" value="Save Changes">
								</div>
							</div>
						</div>
					</div>



            </div>
			
          </div>

        </div>
    </div> -->