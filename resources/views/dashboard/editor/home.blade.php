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
			margin: 20px ;
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

		.splide__list{
					height:450px;
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
	<style>
		body{
			background:#111824;
		}
		
		.butt {
			
			margin:10px;
		}
		.butt ul{
			margin:50px;
			margin-top:60px;
			list-style: none;
		}
		.butt ul li{
			margin:50px;
			
		}
		buttono {
			margin:10px;
					margin-left:50px;
		--c:  #229091; /* the color*/
		
		box-shadow: 0 0 0 .1em inset var(--c); 
		--_g: linear-gradient(var(--c) 0 0) no-repeat;
		background: 
			var(--_g) calc(var(--_p,0%) - 100%) 0%,
			var(--_g) calc(200% - var(--_p,0%)) 0%,
			var(--_g) calc(var(--_p,0%) - 100%) 100%,
			var(--_g) calc(200% - var(--_p,0%)) 100%;
		background-size: 50.5% calc(var(--_p,0%)/2 + .5%);
		outline-offset: .1em;
		transition: background-size .4s, background-position 0s .4s;
		}
		buttono:hover {
		--_p: 100%;
		transition: background-position .4s, background-size 0s;
		}
		buttono:active {
		box-shadow: 0 0 9e9q inset #0009; 
		background-color: var(--c);
		color: #fff;
		}

		buttono {
		font-family: system-ui, sans-serif;
		font-size: 3.5rem;
		cursor: pointer;
		padding: .1em .6em;
		font-weight: bold;  
		border: none;
		}
	</style>
@endsection
@section('content')
<?php use Illuminate\Support\Facades\DB; use Illuminate\Support\Facades\Auth;
$editor=auth::guard('editor')->user()->email; 
$articles = DB::table('articles')->select('*')->where('etat','libre')->get();

$l = DB::table('articles')->select(DB::raw('count(id) as count'))->where('etat','libre')->get();

$a = DB::table('articles')->select(DB::raw('count(id) as count'))->where('etat','=','traitement')->where('editorId','=',$editor)->where('reviewer1Id',null)->where('reviewer2Id',null)->get();

$b = DB::table('articles')->select(DB::raw('count(id) as count'))->where('etat','!=','accept')->where('etat','!=','refuse')->where('etat','!=','accept aavec revision')->where('editorId',auth::guard('editor')->user()->email)->where('editorId',auth::guard('editor')->user()->email)->where('reviewer1Id','!=', null)->where('reviewer2Id','!=', null)->where('rev_active1','LIKE',"%acceptdev1%")->where('rev_active2','LIKE',"%acceptdev2%")->get();

$c = DB::table('articles')->select(DB::raw('count(id) as count'))->where('etat','traitement')->where('editorId',auth::guard('editor')->user()->email)->where('reviewer1Id','!=', null)->where('rev_active1','NOT LIKE',"%dev%")->where('rev_active1','LIKE',"%.com%")->orwhere('reviewer2Id','=', null)->where('etat','traitement')->where('rev_active2',' NOT LIKE',"%dev%")->where('rev_active2','LIKE',"%.com%")->where('editorId',auth::guard('editor')->user()->email)->get();

$d = DB::table('articles')->select(DB::raw('count(id) as count'))->where('etat','traitement')->where('editorId',auth::guard('editor')->user()->email)->where('reviewer1Id','!=', null)->where('rev_active1','NOT LIKE',"%dev%")->where('rev_active1','LIKE',"%.com%")->orwhere('reviewer2Id','=', null)->where('rev_active2',' NOT LIKE',"%dev%")->where('rev_active2','LIKE',"%.com%")->where('editorId',auth::guard('editor')->user()->email)->get();

 //foreach($a as $a){foreach($b as $b){foreach($c as $c){foreach($d as $d){$a1 = (int)$a->count;$b1=(int)$b->count;$c1=(int)$c->count;$d1=(int)$d->count;$f1=$a1+$b1+$c1+$d1;}}}}
$f =  DB::table('articles')->select(DB::raw('count(id) as count'))->where('etat','=','traitement')->where('editorId','=',$editor)->where('reviewer1Id',null)->where('reviewer2Id',null)->orwhere('etat','traitement')->where('editorId',auth::guard('editor')->user()->email)->where('editorId',auth::guard('editor')->user()->email)->where('reviewer1Id','!=', null)->where('reviewer2Id','!=', null)->where('rev_active1','LIKE',"%acceptdev1%")->where('rev_active2','LIKE',"%acceptdev2%")->orwhere('etat','traitement')->where('editorId',auth::guard('editor')->user()->email)->where('reviewer1Id','!=', null)->where('rev_active1','NOT LIKE',"%dev%")->where('rev_active1','LIKE',"%.com%")->orwhere('reviewer2Id','=', null)->where('etat','traitement')->where('rev_active2',' NOT LIKE',"%dev%")->where('rev_active2','LIKE',"%.com%")->where('editorId',auth::guard('editor')->user()->email)->orwhere('etat','traitement')->where('editorId',auth::guard('editor')->user()->email)->where('reviewer1Id','!=', null)->where('rev_active1','NOT LIKE',"%dev%")->where('rev_active1','LIKE',"%.com%")->orwhere('reviewer2Id','=', null)->where('etat','traitement')->where('rev_active2',' NOT LIKE',"%dev%")->where('rev_active2','LIKE',"%.com%")->where('editorId',auth::guard('editor')->user()->email)->orwhere('etat','!=','traitement')->where('etat','!=','libre')->where('editorId',auth::guard('editor')->user()->email)->where('reviewer1Id','!=', null)->where('reviewer2Id','!=', null)->where('rev_des1','!=', null)->where('rev_des2','!=', null)->get();

$s = DB::table('articles')->select(DB::raw('count(id) as count'))->where('etat','!=','traitement')->where('etat','!=','reponse')->where('etat','!=','libre')->where('editorId',auth::guard('editor')->user()->email)->where('reviewer1Id','!=', null)->where('reviewer2Id','!=', null)->where('rev_des1','!=', null)->where('rev_des2','!=', null)->get();
$h = DB::table('articles')->select(DB::raw('count(id) as count'))->where('etat','=','accept avec revision')->where('editorId',auth::guard('editor')->user()->email)->where('reviewer1Id','!=', null)->where('reviewer2Id','!=', null)->where('rev_des1','!=', null)->where('rev_des2','!=', null)->get();

?>


	<div class="button-container">

	

		<button class="unique-button-class" onclick="affiche()">
			<div class="lazyload" style="background-image: url(https://static.vecteezy.com/ti/vecteur-libre/p1/15397574-vecteur-d-icone-de-loupe-trouver-loupe-chercher-lentille-loupe-verre-signe-de-symbole-de-zoom-gratuit-vectoriel.jpg);">
			<span></span>
			</div>
			<h2>Chercher!</h2>
			<h3>Ici tu trouvera des nouveaux articles libres (@foreach($l as $l){{$l->count}}@endforeach)</h3>
		</button>

	</div>
	<section class="splide animate__animated animate__zoomIn" id="mydiv" aria-label="Splide Basic HTML Example" style="display:none" >
	<div class="splide__track">
			<ul class="splide__list">
				@foreach($articles as $article)
				<li class="splide__slide">  


						<section class="articles">
							<article>
								<div class="article-wrapper">
								<figure>
								<img src="{{asset('/storage/images/articles/'.$article->pic)}}" alt="" />
								</figure>
								<div class="article-body">
									<h2>{{$article->title}}</h2>
									<p >
									{{$article->abstract}}
									</p>
									<form action="">
                                     <a href="{{route('editor.validation-article', ['id' => $article->id])}}" class="read-more">Choisie<span class="sr-only">about this is some title</span>
									 <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
										<path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
								     </svg>
									</a>
									</form>
									
									
								</div>
								</div>
							</article>
						</section >

				</li>
				@endforeach
				
			</ul>
	</div>
	</section>
	<div class="button-container">

	

		<button class="unique-button-class" onclick="affiche1()">
			<div class="lazyload" style="background-image: url(https://www.mundiapolis.ma/sites/default/files/2021-05/Gestion%20du%20temps_0.jpg);">
			<span></span>
			</div>
			<h2>Gérer!</h2>
			<h3>Articles sans décision final (@foreach($f as $f){{$f->count}}@endforeach)</h3>
		</button>

	</div>
	
	<div class="butt" id="butt" style="display:none">
	<ul>
		<li> <buttono><a href="{{route('editor.article-traitement')}}" style="text-decoration: none;">Nouvelles soumissions (@foreach($a as $a){{$a->count}}@endforeach)</a></buttono></li>
		<li> <buttono><a href="{{route('editor.revision-complete')}}" style="text-decoration: none;">soumissions avec révisions requis compléte (@foreach($b as $b){{$b->count}}@endforeach) </a></buttono></li>
		<li> <buttono><a href="{{route('editor.revision-incomplete')}}" style="text-decoration: none;">Soumissions avec révisions requis incompléte (@foreach($c as $c){{$c->count}}@endforeach) </a></buttono></li>
		<li> <buttono><a href="{{route('editor.aucune-réponse')}}" style="text-decoration: none;">Réviseur invité - "aucune réponse"(@foreach($d as $d){{$d->count}}@endforeach) </a></buttono></li>
		<li> <buttono><a href="{{route('editor.soumision_a_reviser')}}" style="text-decoration: none;">soumission besoin de modifier "réviser" (@foreach($h as $h){{$h->count}}@endforeach)</a></buttono></li>
	</ul>
	   
	</div>
	<div class="button-container">

	

		<button class="unique-button-class"  onclick="affiche2()"> <a href="{{route('editor.final_decision')}}" style="text-decoration: none;">
			<div class="lazyload" style="background-image: url(https://thumbs.dreamstime.com/b/r%C3%A9sultats-un-effort-de-preuve-de-r%C3%A9sultat-final-de-r%C3%A9ponse-de-r%C3%A9sultats-de-panneau-routier-de-mani%C3%A8re-42237815.jpg);">
			<span></span>
			</div>
			<h2>Résultats!</h2>
			<h3 >Articles avec décision final (@foreach($s as $s){{$s->count}}@endforeach) </h3>
			</a>
		</button>

	</div>
	


	<div>
	</div>
	<script src="/splide.min.js"></script>
		<script>
var splide = new Splide( '.splide', {
  perPage: 5,
  gap    : '2rem',
  breakpoints: {
    640: {
      perPage: 2,
      gap    : '.7rem',
      height : '6rem',
    },
    480: {
      perPage: 1,
      gap    : '.7rem',
      height : '6rem',
    },
  },
} );

splide.mount();;

splide.mount();;

splide.mount();

splide.mount();

		splide.mount();
		function affiche(){
			x=document.getElementById("mydiv");
			if(x.style.display=="none")
			x.style.display="block";
			else
			x.style.display="none";
			y=document.getElementById("butt");
			if(y.style.display=="block")
			y.style.display="none";
		}
		function affiche1(){
			x=document.getElementById("mydiv");
			if(x.style.display=="block")
			x.style.display="none";
			y=document.getElementById("butt");
			if(y.style.display=="none")
			y.style.display="block";
			else
			y.style.display="none";
		}
		function affiche2(){
			x=document.getElementById("mydiv");
			y=document.getElementById("butt");
			if(x.style.display=="block")
			x.style.display="none";
			if(y.style.display=="block")
			y.style.display="none";
		}
	</script>
@endsection