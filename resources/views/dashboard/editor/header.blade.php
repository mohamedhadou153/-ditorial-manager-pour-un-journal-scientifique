<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap All in One Navbar</title>
    <link href="https://fonts.googleapis.com/css?family=Merienda+One" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@yield('head')
    
    <style>
        body {
            background: #eeeeee;
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
    <style>
        .main-body {
        padding: 15px;
        }
        .card {
            box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0,0,0,.125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }

        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-sm>.col, .gutters-sm>[class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }
        .mb-3, .my-3 {
            margin-bottom: 1rem!important;
        }

        .bg-gray-300 {
            background-color: #e2e8f0;
        }
        .h-100 {
            height: 100%!important;
        }
        .shadow-none {
            box-shadow: none!important;
        }
    </style>
    
    <link rel="stylesheet" href="/splide.min.css">

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />

	<link href="/profile.css" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">


</head> 
<body>
 <nav class="navbar navbar-default">
	<div class="navbar-header">
		<a class="navbar-brand" href="#"><i class="fa fa-cube"></i>Brand<b>Article</b></a>  		
		<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
			<span class="navbar-toggler-icon"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	</div>
	<!-- Collection of nav links, forms, and other content for toggling -->
	<div id="navbarCollapse" class="collapse navbar-collapse">
	
		<ul class="nav navbar-nav navbar-right">
			<li><a href="#" class="notifications"><i class="fa fa-bell-o"></i><span class="badge">1</span></a></li>
			<li><a href="#" class="messages"><i class="fa fa-envelope-o"></i><span class="badge">7</span></a></li>
			<li class="dropdown">
				<a href="#" data-toggle="dropdown" class="dropdown-toggle user-action"><img src="https://picsum.photos/200/300?grayscale" class="avatar" alt="Avatar"> welcom {{Auth::guard('editor')->user()->first_name}} <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="{{route('editor.profile')}}"><i class="fa fa-user-o"></i> Profile</a></li>
					<li class="divider"></li>
					<li><a href="href="{{route('editor.logout')}}" onclick="event.preventDefault();document.getElementById('logout.form').submit()"><i class="material-icons">&#xE8AC;</i> Logout</a></li>
					<form action="{{route('editor.logout')}}" id="logout.form" method="POST">
                        @csrf
                    </form>
				</ul>
			</li>
		</ul>
	</div>
    </nav>
    @yield('content')
    @yield('profile')
</body>