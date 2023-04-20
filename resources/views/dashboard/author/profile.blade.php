@extends('dashboard.author.header')
@section('content')
@foreach($author as $auth)
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">


    <div class="main-content">
      <!-- Header -->
      <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 400px;margin-top:-20px ;background-image: url(https://raw.githubusercontent.com/creativetimofficiahttps://images.unsplash.com/photo-1529665253569-6d01c0eaf7b6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8cHJvZmlsZXxlbnwwfHwwfHw%3D&w=1000&q=80l/argon-dashboard/gh-pages/assets-old/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
          <div class="row">
            <div class=" col-md-10">
              <h1 class="display-2 text-white">Bienvenue {{$auth->first_name}}</h1>
              <h4 class="text-white mt-0 mb-5 ">Ceci est votre page de profil. Vous pouvez gérer vos informations </h4>
              
            </div>
          </div>
        </div>
      </div>
      <!-- Page content -->
      <div class="container-fluid mt--7">
        <div class="row">
          <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
            <div class="card card-profile shadow">
              <div class="row justify-content-center">
                <div class="col-lg-3 order-lg-2">
                  <div class="card-profile-image">
                    <a href="#">
                      <img src="{{asset('/storage/images/authors/'.$auth->pic)}}" style="height: 150px;width:150px" class="rounded-circle">
                    </a>
                  </div>
                </div>
              </div>
              <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                <div class="d-flex justify-content-between">
                </div>
              </div>
              <div class="card-body pt-0 pt-md-4">
                <div class="row">
                  <div class="col">
                    <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    </div>
                  </div>
                </div>
                <div class="text-center" style="padding: 20px;">
                  <h3>
                    {{$auth->first_name}} {{$auth->last_name}}
                  </h3>
                  <h3 style="margin-top :-10px">{{$auth->age}} ans</h3>
                  <div class="h5 mt-4">
                    <i class="ni business_briefcase-24 mr-2"></i>Author
                  </div>
                  <hr class="my-4">
                  <a href="{{route('author.edit-profile')}}" class="btn btn-info">modifier le profil</a>
                  <a href="{{route('author.edit-profile')}}" class="btn btn-info" style="margin-top:5px">changer le mot de passe</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-8 order-xl-1">
            <div class="card bg-secondary shadow">
              <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                  <div class="col-8">
                    <h3 class="mb-0">Mon compte</h3>
                  </div>
                  <div class="col-4 text-right">
                    <a href="#!" class="btn btn-sm btn-primary">Activer</a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <form>
                  <h6 class="heading-small text-muted mb-4">Informations de l'utilisateur</h6>
                  <div class="pl-lg-4">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-email">Adresse e-mail</label>
                          <input type="email" id="input-email" class="form-control form-control-alternative" placeholder="" value="{{$auth->email}}" name="email">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group focused">
                          <label class="form-control-label" for="input-first-name">Prénom</label>
                          <input type="text" id="input-first-name" class="form-control form-control-alternative" value="{{$auth->first_name}}" name="first_name">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group focused">
                          <label class="form-control-label" for="input-last-name">Nom de famille</label>
                          <input type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Last name" value="{{$auth->last_name}}" name="last_name">
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr class="my-4">
                  <!-- Description -->
                  <h6 class="heading-small text-muted mb-4">Sur moi</h6>
                  <div class="pl-lg-4">
                    <div class="form-group focused">
                      <label>Sur moi</label>
                      <textarea rows="4" class="form-control form-control-alternative" placeholder="Quelques mots sur vous..." name="biographie">{{$auth->biographie}}</textarea>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endforeach
@endsection
