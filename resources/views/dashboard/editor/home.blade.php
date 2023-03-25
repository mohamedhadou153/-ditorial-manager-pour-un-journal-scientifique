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
<style>
	article {
	--img-scale: 1.001;
	--title-color: black;
	--link-icon-translate: -20px;
	--link-icon-opacity: 0;
	position: relative;
	border-radius: 16px;
	box-shadow: none;
	background: #fff;
	transform-origin: center;
	transition: all 0.4s ease-in-out;
	overflow: hidden;
	}

	article a::after {
	position: absolute;
	inset-block: 0;
	inset-inline: 0;
	cursor: pointer;
	content: "";
	}

	/* basic article elements styling */
	article h2 {
	margin: 0 0 18px 0;
	font-family: "Bebas Neue", cursive;
	font-size: 1.9rem;
	letter-spacing: 0.06em;
	color: var(--title-color);
	transition: color 0.3s ease-out;
	}

	figure {
	margin: 0;
	padding: 0;
	aspect-ratio: 16 / 9;
	overflow: hidden;
	}

	article img {
	max-width: 100%;
	transform-origin: center;
	transform: scale(var(--img-scale));
	transition: transform 0.4s ease-in-out;
	}

	.article-body {
	padding: 24px;
	}

	article a {
	display: inline-flex;
	align-items: center;
	text-decoration: none;
	color: #28666e;
	}

	article a:focus {
	outline: 1px dotted #28666e;
	}

	article a .icon {
	min-width: 24px;
	width: 24px;
	height: 24px;
	margin-left: 5px;
	transform: translateX(var(--link-icon-translate));
	opacity: var(--link-icon-opacity);
	transition: all 0.3s;
	}

	/* using the has() relational pseudo selector to update our custom properties */
	article:has(:hover, :focus) {
	--img-scale: 1.1;
	--title-color: #28666e;
	--link-icon-translate: 0;
	--link-icon-opacity: 1;
	box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
	}


	/************************ 
	Generic layout (demo looks)
	**************************/

	*,
	*::before,
	*::after {
	box-sizing: border-box;
	}

	body {
	margin: 0;
	font-family: "Figtree", sans-serif;
	font-size: 1.2rem;
	line-height: 1.6rem;
	background-image: linear-gradient(45deg, #7c9885, #b5b682);
	min-height: 100vh;
	}

	.articles {
	display: grid;
	max-width: 1200px;
	margin-inline: auto;
	padding-inline: 24px;
	grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
	gap: 24px;
	}

	@media screen and (max-width: 960px) {
	article {
		container: card/inline-size;
	}
	.article-body p {
		display: none;
	}
	}

	@container card (min-width: 380px) {
	.article-wrapper {
		display: grid;
		grid-template-columns: 100px 1fr;
		gap: 16px;
	}
	.article-body {
		padding-left: 0;
	}
	figure {
		width: 100%;
		height: 100%;
		overflow: hidden;
	}
	figure img {
		height: 100%;
		aspect-ratio: 1;
		object-fit: cover;
	}
	}

	.sr-only:not(:focus):not(:active) {
	clip: rect(0 0 0 0); 
	clip-path: inset(50%);
	height: 1px;
	overflow: hidden;
	position: absolute;
	white-space: nowrap; 
	width: 1px;
	}
</style>
<link rel="stylesheet" href="/splide.min.css">
<head>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
</head>
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
		<ul class="nav navbar-nav">
			<li class="active"><a href="/">Home</a></li>
			<li class="dropdown">
				<a data-toggle="dropdown" class="dropdown-toggle" href="#">Services <b class="caret"></b></a>
				<ul class="dropdown-menu">					
					<li><a href="{{route('editor.libre-article')}}">Libre Article</a></li>
					<li><a href="{{route('editor.article-traitement')}}">Article in traitement</a></li>
					<li><a href="{{route('editor.show-review')}}">Review</a></li>
				</ul>
			</li>
		</ul>
		<form class="navbar-form form-inline">
			<div class="input-group search-box">								
				<input type="text" id="search" class="form-control" placeholder="Search by Name">
				<span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
			</div>
		</form>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="#" class="notifications"><i class="fa fa-bell-o"></i><span class="badge">1</span></a></li>
			<li><a href="#" class="messages"><i class="fa fa-envelope-o"></i><span class="badge">7</span></a></li>
			<li class="dropdown">
				<a href="#" data-toggle="dropdown" class="dropdown-toggle user-action"><img src="https://picsum.photos/200/300?grayscale" class="avatar" alt="Avatar"> welcom {{Auth::guard('editor')->user()->first_name}} <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="{{route('editor.profile')}}"><i class="fa fa-user-o"></i> Profile</a></li>
					<li class="divider"></li>
					<li><a href="href="{{route('editor.logout')}}" onclick="event.preventDefault();document.getElementById('logout.form').submit()"><i class="material-icons">&#xE8AC;</i> Logout</a></li>

				</ul>
			</li>
		</ul>
	</div>
</nav>
<section class="splide animate__animated animate__zoomIn" aria-label="Splide Basic HTML Example">
  <h2 id="carousel-heading">Basic Structure Example</h2>
  
  <div class="splide__track">
		<ul class="splide__list">
			<li class="splide__slide">  
				<article>
					<div class="article-wrapper">
					<figure>
						<img src="https://picsum.photos/id/1011/800/450" alt="" />
					</figure>
					<div class="article-body">
						<h2>This is some title</h2>
						<p>
						Curabitur convallis ac quam vitae laoreet. Nulla mauris ante, euismod sed lacus sit amet, congue bibendum eros. Etiam mattis lobortis porta. Vestibulum ultrices iaculis enim imperdiet egestas.
						</p>
						<a href="#" class="read-more">
						Read more <span class="sr-only">about this is some title</span>
						<svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
							<path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
						</svg>
						</a>
					</div>
					</div>
				</article>
			</li>
			
		</ul>
  </div>

</section>

<main>
<!-- <section class="articles">
	<div style="display: flex;align-items: center;justify-content: center;flex-direction: column;">
		<h3>available</h3>
	</div>
  <article>
    <div class="article-wrapper">
      <figure>
        <img src="https://picsum.photos/id/1011/800/450" alt="" />
      </figure>
      <div class="article-body">
        <h2>This is some title</h2>
        <p>
          Curabitur convallis ac quam vitae laoreet. Nulla mauris ante, euismod sed lacus sit amet, congue bibendum eros. Etiam mattis lobortis porta. Vestibulum ultrices iaculis enim imperdiet egestas.
        </p>
        <a href="#" class="read-more">
          Read more <span class="sr-only">about this is some title</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
        </a>
      </div>
    </div>
  </article>
</section> -->
    @yield('libre_article')
	@yield('validation_article')
	@yield('show_review')
	@yield('article_traitement')
	@yield('sed_to_reviewer')
	@yield('profile') 
</main>
<div>
</div>
<script src="/splide.min.js"></script>
<script>
	var splide = new Splide( '.splide', {
  type    : 'loop',
  perPage : 5,
  autoplay: true,
} );

splide.mount();
</script>
</body>