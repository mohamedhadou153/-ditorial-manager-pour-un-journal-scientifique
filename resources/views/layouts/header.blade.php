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
<style>
	img{
		width: 100%;
		display: block;
	}
	.container{
		max-width: 1320px;
		margin: 0 auto;
		padding: 0 1.2rem;
	}
	header{
		min-height: 100vh;
		background: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)), url('https://wallpaperaccess.com/full/19381.jpg') center/cover no-repeat fixed;
		display: flex;
		flex-direction: column;
		justify-content: stretch;
	}
	.banner{
		flex: 1;
		display: flex;
		align-items: center;
		justify-content: center;
		text-align: center;
		color: #fff;
	}
	.banner-title{
		font-size: 5rem;
		line-height: 1.2;
		font-family: 'Merienda One', sans-serif;
	}
	#a-buttom{
		text-decoration: none; color:#F6F9FE
	}
	.button-17 {
	align-items: center;
	appearance: none;
	background-color: transparent;
	border-radius: 24px;
	border-style: none;
	box-shadow: rgba(0, 0, 0, .2) 0 3px 5px -1px,rgba(0, 0, 0, .14) 0 6px 10px 0,rgba(0, 0, 0, .12) 0 1px 18px 0;
	box-sizing: border-box;
	color: #3c4043;
	cursor: pointer;
	display: inline-flex;
	fill: currentcolor;
	font-family: "Google Sans",Roboto,Arial,sans-serif;
	font-size: 14px;
	font-weight: 1000;
	height: 48px;
	justify-content: center;
	letter-spacing: .25px;
	line-height: normal;
	max-width: 100%;
	overflow: visible;
	padding: 2px 24px;
	position: relative;
	text-align: center;
	text-transform: none;
	transition: box-shadow 280ms cubic-bezier(.4, 0, .2, 1),opacity 15ms linear 30ms,transform 270ms cubic-bezier(0, 0, .2, 1) 0ms;
	user-select: none;
	-webkit-user-select: none;
	touch-action: manipulation;
	width: auto;
	will-change: transform,opacity;
	z-index: 0;
	}

	.button-17:hover {
	background: black;
	color: #174ea6;
	}

	.button-17:active {
	box-shadow: 0 4px 4px 0 rgb(60 64 67 / 30%), 0 8px 12px 6px rgb(60 64 67 / 15%);
	outline: none;
	}

	.button-17:focus {
	outline: none;
	border: 2px solid #4285f4;
	}
</style>

<header>
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
		<ul class="nav navbar-nav">
			<li class="active"><a href="/">Home</a></li>
			<li class="active"><a href="/">Aboute</a></li>
			<li class="dropdown">
				<a data-toggle="dropdown" class="dropdown-toggle" href="#">Users<b class="caret"></b></a>
				<ul class="dropdown-menu">					
					<li><a href="{{route('author.create-article')}}">All Authors</a></li>
					<li><a href="{{route('author.libre-article')}}">All Editors</a></li>
					<li><a href="{{route('author.traitement-article')}}">All Reviewers</a></li>
				</ul>
			</li>
			<li class="active"><a href="#article-section">Articles Section</a></li>

		</ul>


		<ul class="nav navbar-nav navbar-right">
		   	
			<li class="dropdown">
				<a data-toggle="dropdown" class="dropdown-toggle" href="#">Connexion<b class="caret"></b></a>
				<ul class="dropdown-menu">					
					<li><a href="author/login">Author</a></li>
					<li><a href="editor/login">Editor</a></li>
					<li><a href="reviewer/login">Reviewer</a></li>
				</ul>
			</li>
		</ul>
	</div>
</nav>
<div class="banner">
	<div class="container">
		<h1 class="banner-title">
		    <span><i class="fa fa-cube"></i>Brand<b>Article</b></span> 
			<p>All you need to know about science</p>
			<button class="button-17" role="button" ><a id="a-buttom" href="#article-section" >Discover More</a></button>
		</h1>
	</div>
</div>
</header>