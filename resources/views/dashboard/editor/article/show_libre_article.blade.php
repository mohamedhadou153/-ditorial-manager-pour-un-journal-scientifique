@extends('dashboard.editor.home')
@section('libre_article')
  <section class="splide animate__animated animate__zoomIn" aria-label="Splide Basic HTML Example">
  <h2 id="carousel-heading">Basic Structure Example</h2>
  <div class="splide__track">

		<ul class="splide__list">
    @foreach ($articles as $article)
			<li class="splide__slide"> 
         
				<article>
					<div class="article-wrapper">
					<figure>
						<img src="{{asset('/storage/images/articles/'.$article->pic)}}" alt="" />
					</figure>
					<div class="article-body">
						<h2>{{$article->title}}</h2>
						<p>
              {{$article->abstract}}
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
      @endforeach

		</ul>
 
  </div>
</section
@endsection