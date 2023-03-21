@extends('dashboard.author.home')
@section('create_article_content')

<form method="POST" action="{{ route('author.uploade') }}"  enctype="multipart/form-data">
	@csrf
	<div style="display: flex; justify-content: center; align-items: center;">
	<div class="col-lg-7 " >
					<div class="card">
						<div class="card-body">
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">title</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" name="title" >
								</div>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">category</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<select name="category" id="">
										<option value="aad">kjnxojknoxn</option>
										<option value="aad">jo0ij0oij0</option>
										<option value="aad">ijonon</option>
										<option value="aad"></option>
									</select>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">pdf</h6>
								</div>
								<div class="col-sm-9 textarea-secondary">
								<input type="file" name="obj_pdf">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">pic</h6>
								</div>
								<div class="col-sm-9 textarea-secondary">
								   <input type="file" name="pic">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">abstract</h6>
								</div>
								<div class="col-sm-9 textarea-secondary">
								   <textarea class="form-control" id="textAreaExample1" rows="4" name="abstract"></textarea>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<input type="submit" class="btn btn-primary px-4" value="Create article">
								</div>
							</div>
						</div>
					</div>



            </div>
	</div>
	
	
</form>
@endsection
