@extends('dashboard.editor.home')
@section('profile')
@foreach($editor as $edit)

<form action="{{route('editor.change-profile')}}" method="get">
	
	<div class="container">
    <div class="main-body">
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://picsum.photos/200/200?grayscale"   alt="Admin" class="rounded" width="150">
                    <div class="mt-3">
                      <h4>{{$edit->first_name}} {{$edit->last_name}}</h4>
                      <p class="text-secondary mb-1">editor</p>
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
									<input type="text" class="form-control" value="{{$edit->first_name}}" name="first_name" >
								</div>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Last Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="{{$edit->last_name}}" name="last_name">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Email</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="{{$edit->email}}" name="email" readonly >
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Age</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="{{$edit->age}}" name="age">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Phone</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="{{$edit->n_tele}}" name="n_tele">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Biographie</h6>
								</div>
								<div class="col-sm-9 textarea-secondary">
								   <textarea class="form-control" id="textAreaExample1" rows="4" name="biographie">{{$edit->biographie}}</textarea>
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
    </div>
</form>

@endforeach
@endsection