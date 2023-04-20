

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Brand Article</title>
<link href="https://fonts.googleapis.com/css?family=Merienda+One" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylsheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="shortcut icon" href="../favicon.ico"> 
<link rel="stylesheet" type="text/css" href="/css/default.css" />
<link rel="stylesheet" type="text/css" href="/css/component.css" />
<!-- <script src="/js/modernizr.custom.js"></script>	 -->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"  rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link href="/profile.css" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
@yield('style')

<!-- Navbar styles -->
<style>
	body {
		background:#111827;
	}
    .form-inline {
        display: inline-block;
    }
	.navbar {		
		background: #fff;
		padding-left: 16px;
		padding-right: 16px;
		
		border-bottom: 1px solid #d6d6d6;
		box-shadow: 0 0 4px rgba(0,0,0,.1);
	}
	.nav img {
		border-radius: 50%;
		width: 36px;
		height: 36px;
		margin: -8px 0;
		float: left;
		margin-right: 10px;
	}
	.navbar .navbar-brand {
		color: #555;
		padding-left: 0;
		padding-right: 50px;
		font-family: 'Merienda One', sans-serif;
	}
	.navbar .navbar-brand i {
		font-size: 20px;
		margin-right: 5px;
	}
	.search-box {
        position: relative;
    }	
    .search-box input {
		box-shadow: none;
        padding-right: 35px;
        border-radius: 3px !important;
    }
	.search-box .input-group-addon {
        min-width: 35px;
        border: none;
        background: transparent;
        position: absolute;
        right: 0;
        z-index: 9;
        padding: 7px;
		height: 100%;
    }
    .search-box i {
        color: #a0a5b1;
		font-size: 19px;
    }
	.navbar ul li i {
		font-size: 18px;
	}
	.navbar .dropdown-menu i {
		font-size: 16px;
		min-width: 22px;
	}
	.navbar .dropdown.open > a {
		background: none !important;
	}
	.navbar .dropdown-menu {
		border-radius: 1px;
		border-color: #e5e5e5;
		box-shadow: 0 2px 8px rgba(0,0,0,.05);
	}
	.navbar .dropdown-menu li a {
		color: #777;
		padding: 8px 20px;
		line-height: normal;
	}
	.navbar .dropdown-menu li a:hover, .navbar .dropdown-menu li a:active {
		color: #333;
	}	
	.navbar .dropdown-menu .material-icons {
		font-size: 21px;
		line-height: 16px;
		vertical-align: middle;
		margin-top: -2px;
	}
	.navbar .badge {
		background: #f44336;
		font-size: 11px;
		border-radius: 20px;
		position: absolute;
		min-width: 10px;
		padding: 4px 6px 0;
		min-height: 18px;
		top: 5px;
	}
	.navbar ul.nav li a.notifications, .navbar ul.nav li a.messages {
		position: relative;
		margin-right: 10px;
	}
	.navbar ul.nav li a.messages {
		margin-right: 20px;
	}
	.navbar a.notifications .badge {
		margin-left: -8px;
	}
	.navbar a.messages .badge {
		margin-left: -4px;
	}	
	.navbar .active a, .navbar .active a:hover, .navbar .active a:focus {
		background: transparent !important;
	}
	@media (min-width: 1200px){
		.form-inline .input-group {
			width: 300px;
			margin-left: 30px;
		}
	}
	@media (max-width: 1199px){
		.form-inline {
			display: block;
			margin-bottom: 10px;
		}
		.input-group {
			width: 100%;
		}
	}
</style>
</head> 
<?php use Illuminate\Support\Facades\Auth;
$name =  Auth::guard('author')->user()->first_name;
$pic =  Auth::guard('author')->user()->pic;
?>
<body style="padding: 0px;">

<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">



	<div class="navbar-header">
		<a class="navbar-brand" href="/"><i class="fa fa-cube"></i>Brand<b>Article</b></a>  		
		<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
			<span class="navbar-toggler-icon"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	</div>


	<!-- Collection of nav links, forms, and other content for toggling -->
	<div id="navbarCollapse" class="collapse navbar-collapse">
				<div class="nav navbar-nav">
				</li>
				<li class="dropdown">
							<a class="dropdown-toggle" href="/author/home">Home</a>
						</li>
					<li class="dropdown">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">Mes articles <b class="caret"></b></a>
							<ul class="dropdown-menu">					
								<li><a href="{{route('author.traitement-article')}}">Articles en Traitement</a></li>
								<li><a href="{{route('author.accept-article')}}">Articles Accepter</a></li>
								<li><a href="{{route('author.refuse-article')}}">Articles Refuser</a></li>
								<li><a href="{{route('author.update-article')}}">Articles besoins de modifier</a></li>
							</ul>
						
						
						
                </div>
		        <div class="p-2 annonce bd-highlight " style="text-align: center;"  href="#">  
                    <a href="#"  >
                    <a href="{{route('author.create-article')}}" class="btn btn-info  me-md-2 animate__animated animate__swing" style="margin-top:5px">+Soumettre Un Article</a></a>
					

					<div class="nav navbar-nav navbar-right">
					<li class="dropdown">
							<a href="#" data-toggle="dropdown" class="dropdown-toggle user-action"><img src="{{asset('/storage/images/authors/'.$pic)}}"class="avatar" alt="Avatar"> Bienvenue {{$name}} <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="{{route('author.profile')}}"><i class="fa fa-user-o"></i> Profil</a></li>
								<li class="divider"></li>
								<li><a href="href="{{route('author.logout')}}" onclick="event.preventDefault();document.getElementById('logout.form').submit()"><i class="material-icons">&#xE8AC;</i> Se déconnecter</a></li>
								<form action="{{route('author.logout')}}" id="logout.form" method="POST">
									@csrf
								</form>
							</ul>
			         </li>
                </div>
                </div>	
	</div>
</nav>
	@yield('content')

   
    <!-- <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

    <!-- Core plugin JavaScript-->
    <!-- <script src="/vendor/jquery-easing/jquery.easing.min.js"></script> -->

    <!-- Custom scripts for all pages-->
    <!-- <script src="/vendor/js/sb-admin-2.min.js"></script> -->

    <!-- Page level plugins -->
    <!-- <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="publiv/vendor/datatables/dataTables.bootstrap4.min.js"></script> -->

    <!-- Page level custom scripts -->
    <!-- <script src="/vendor/js/demo/datatables-demo.js"></script> -->

</body>

