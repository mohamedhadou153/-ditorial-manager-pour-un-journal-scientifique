<<<<<<< HEAD
@extends('dashboard.author.header')
@section('style')
=======


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
<script src="/js/modernizr.custom.js"></script>	
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"  rel="stylesheet">
<link href="/profile.css" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

>>>>>>> 145ff826628dad82495d810017dfc84f84a27473
<style>
		
	
        @import url("https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;0,600;1,400&display=swap");




        :root {
        /*  BUTTON PARENT CONTAINER --> For demo. */
        --button-container-max-width: 600px;

        /*  BUTTON MAX WIDTH - % of parent container width or fixed pixels 
            Adjust other variable - i.e. width/height/font-size - so other shit fits. lol */
        --button-max-width: 100%;

        /*  BUTTON DEFAULT MIN-HEIGHT i.e."Mobile First" */
        --button-min-height: 65px;
        /*  BUTTON LARGE SCREEN MIN-HEIGHT Add additional breakpoints as needed. */
        --button-large-screen-min-height: 100px;
        /*  LEFT BUTTON PANEL DEFAULT WIDTH - i.e."Mobile First" */
        --button-div-width: 90px;
        /*  LEFT BUTTON PANEL LARGE SCREEN WIDTH */
        --button-div-large-screen-width: 163px;


        --button-text-font: Montserrat;
        --button-text-color: rgba(255, 255, 255, 1);
        /*  BUTTON BRIGHTNESS - Easier on the eyes */
        --button-brightness: 0.95;
        --button-border-color: rgba(255, 255, 255, 0.45);
        --button-border-width: 1px;
        --button-background-color: rgba(60, 59, 110, 1);
        --button-background-hover-color: rgba(178, 34, 52, 1);
        --button-background-active-color: rgba(137, 11, 25, 1);

        /*  LEFT BUTTON PANEL STYLES 
            The DIV in BUTTON HTML mark-up is the left button panel.
            The SPAN element is the overlay for the left panel. */

        --button-div-background-color: rgba(178, 34, 52, 1);
        --button-div-background-hover-color: rgba(60, 59, 110, 1);
        --button-div-border-color: rgba(255, 255, 255, 1);
        /*  RIGHT BORDER WIDTH OF DIV  
            Set to 0px for demo.  */
        --button-div-right-border-width: 0px;

            /*  LEFT BUTTON PANEL -- SPAN OVERLAY 
                SPAN background color set to transparent when animated */
        --button-span-background-color: rgba(0, 0, 0, 0.25);
        }

        /* BUTTON PARENT CONTAINER 
        Mark-Up for demo. */

        .button-container {
        width: 100%;
        max-width: var(--button-container-max-width);
        margin: 0 ;
        }

        /* BUTTON MARK-UP 
        Replace "unique-button-class" to whatever.  
        HINT: Search and replace. 
        Don't forget! - If you change the button class name in the CSS, 
        change the button class name in the HTML too.
        lol */

        .unique-button-class {
        position: relative;
        width: 100%;
        max-width: var(--button-max-width);
        min-height: var(--button-min-height);
        margin: 5;
        border: 0;
        padding: 0;
        padding:10px;
        border: var(--button-border-width) solid var(--button-border-color);
        padding-left: calc(var(--button-div-width) + 25px);
        background-color: var(--button-background-color);
        color: var(--button-font-color);
        filter: brightness(var(--button-brightness));
        text-align: left;
        overflow: hidden;
        cursor: pointer;
        transition: background-color 300ms ease;
        }

        .unique-button-class:hover {
        background-color: var(--button-background-hover-color);
        }

        /* BUTTON FOCUS AND ACTIVE STATES
        Disabled pointer events and brought down opacity
        on active button. */

        .unique-button-class:focus,
        .unique-button-class.active {
        background-color: var(--button-background-active-color);
        opacity: 0.9;
        
        }

        /* BUTTON MEDIA QUERY FOR LARGE SCREENS -->  AS NEEDED  */

        @media only screen and (min-width: 980px) {
        .unique-button-class {
        min-height: var(--button-large-screen-min-height);
        padding-left: calc(var(--button-div-large-screen-width) + 25px);
        }
        }



    .unique-button-class div {
    width: var(--button-div-width);
    position: absolute;
    display: grid;
    justify-content: center;
    align-content: center;
    text-align: center;
    top: 0;
    left: 0;
    bottom: 0;
    height: 100%;
    background-color: var(--button-div-background-color);
    border-right: var(--button-div-right-border-width) solid
    var(--button-div-border-color);
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    }
    /* SPAN IN HTML IS AN OVERLAY FOR BACKGROUND IMAGE  */
    .unique-button-class span {
    background: var(--button-span-background-color) ;
    width: 100%;
    height: 100%;
    position: absolute;
    display: grid;
    justify-content: center;
    align-content: center;
    text-align: center;
    }

    @media only screen and (min-width: 980px) {
    .unique-button-class div {
    width: var(--button-div-large-screen-width);
    }
    .unique-button-class span {
    font-size: 2vw;
    }
    }

    /* BUTTON DIV HOVER EFFECT
    This is the left panel  */

    .unique-button-class:hover div,
    .unique-button-class:focus div,
    .unique-button-class.active div {
    background-color: var(--button-div-background-hover-color);
    transition: background-color 300ms ease;
    }
    /* BUTTON SPAN ANIMATED SPIN HOVER EFFECT
    This is the left panel with class "spin"  */

    .unique-button-class.spin:hover div span,
    .unique-button-class.spin:focus div span,
    .unique-button-class.spin.active div span {
    animation: spin 3s infinite;
    background:transparent;
    }

    /* SPIN ANIMATION */
    @keyframes spin {
    0% {
    transform: rotate3d(0, 0, 0, 0deg);
    }
    50% {
    transform: rotate3d(0, 1, 0, 360deg);
    }
    100% {
    transform: rotate3d(0, 0, 0, 0deg);
    }
    }

    /* BUTTON PRESS EFFECT
    Transform scale to create 
    a button press effect when clicked. */

    .unique-button-class:active {
    transform: scale(0.98);
    }

    /* BUTTON TYPOGRAPHY  */
    .unique-button-class div {
    font-size: 30px;
    letter-spacing: 2px;
    }

    .unique-button-class h2,
    .unique-button-class h3 {
    line-height: 1;
    margin: 0;
    font-family: var(--button-text-font);
    color: var(--button-text-color);
    }
    .unique-button-class h2 {
    font-size: 16px;
    font-weight: 600;
    text-transform: uppercase;
    padding-bottom: 3px;
    }
    .unique-button-class h3 {
    font-size: 15px;
    font-weight: 400;
    }

    /* BUTTON TYPOGRAPHY MEDIA QUERY */

    @media only screen and (min-width: 980px) {
    .unique-button-class h2 {
    font-size: calc(100% + 3 * (100vw - 1000px) / 1000);
    letter-spacing: 3px;
    }
    .unique-button-class h3 {
    font-size: calc(90% + 2 * (100vw - 1000px) / 1000);
    letter-spacing: 1px;
    }
    }



</style>
@endsection
@section('content')

<div class="button-container">

	

<button class="unique-button-class" onclick="affiche()">
    <div class="lazyload" style="background-image: url(https://img-19.commentcamarche.net/cI8qqj-finfDcmx6jMK6Vr-krEw=/1500x/smart/b829396acc244fd484c5ddcdcb2b08f3/ccmcms-commentcamarche/20494859.jpg);">
    <span></span>
    </div>
    <h2>Click Me!</h2>
    <h3>transform scale press effect</h3>
</button>

</div>
<div class="button-container">

	

<button class="unique-button-class" onclick="affiche()">
    <div class="lazyload" style="background-image: url(https://img-19.commentcamarche.net/cI8qqj-finfDcmx6jMK6Vr-krEw=/1500x/smart/b829396acc244fd484c5ddcdcb2b08f3/ccmcms-commentcamarche/20494859.jpg);">
    <span></span>
    </div>
    <h2>Click Me!</h2>
    <h3>transform scale press effect</h3>
</button>

</div>
<div class="button-container">

	

<button class="unique-button-class" onclick="affiche()">
    <div class="lazyload" style="background-image: url(https://img-19.commentcamarche.net/cI8qqj-finfDcmx6jMK6Vr-krEw=/1500x/smart/b829396acc244fd484c5ddcdcb2b08f3/ccmcms-commentcamarche/20494859.jpg);">
    <span></span>
    </div>
    <h2>Click Me!</h2>
    <h3>transform scale press effect</h3>
</button>

<<<<<<< HEAD
</div>
@endsection
=======

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
				<div class="nav navbar-nav">
						<li class="active"><a href="/">Home</a></li>
						<li class="dropdown">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">Services <b class="caret"></b></a>
							<ul class="dropdown-menu">					
								<li><a href="{{route('author.create-article')}}">Create Article</a></li>
								<li><a href="{{route('author.traitement-article')}}">Traitement article</a></li>
								<li><a href="{{route('author.accept-article')}}">Accept Article</a></li>
								<li><a href="{{route('author.refuse-article')}}">Refuse Article</a></li>
							</ul>
						</li>
                </div>
		        <div class="p-2 annonce bd-highlight " style="text-align: center;"  href="#">  
                    <a href="#"  >
                    <a href="{{route('author.create-article')}}" class="btn btn-info  me-md-2 animate__animated animate__swing" style="margin-top:5px">cree article</a></a>
					

					<div class="nav navbar-nav navbar-right">
					<li class="dropdown">
							<a href="#" data-toggle="dropdown" class="dropdown-toggle user-action"><img src="https://picsum.photos/200/200?grayscale" class="avatar" alt="Avatar"> welcom {{Auth::user()->first_name}} <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="{{route('author.profile')}}"><i class="fa fa-user-o"></i> Profile</a></li>
								<li class="divider"></li>
								<li><a href="href="{{route('author.logout')}}" onclick="event.preventDefault();document.getElementById('logout.form').submit()"><i class="material-icons">&#xE8AC;</i> Logout</a></li>
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
	@yield('show_traitement_article')

    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/vendor/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="publiv/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/vendor/js/demo/datatables-demo.js"></script>

</body>

>>>>>>> 145ff826628dad82495d810017dfc84f84a27473
