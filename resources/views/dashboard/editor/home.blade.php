@extends('dashboard.editor.header')
@section('head')
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
			margin: 0;
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
<<<<<<< HEAD
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
=======
			<h2>Click Me!</h2>
			<h3>transform scale press effect</h3>
		</button>

	</div>

	<section class="splide animate__animated animate__zoomIn" id="mydiv" aria-label="Splide Basic HTML Example" style="display:none" >
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
>>>>>>> e76971f602453ff7ba932c353989b78b792becde

	<main>


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
		function affiche(){
			x=document.getElementById("mydiv");
			if(x.style.display=="none")
			x.style.display="block";
			else
			x.style.display="none"
		}
	</script>
@endsection