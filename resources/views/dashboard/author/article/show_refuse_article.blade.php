@extends('dashboard.author.header')
@section('show_refuse_article')




<header class="clearfix" style="text-align: center;">
				<h1>Refuse Articles</h1>	
			</header>
			<div class="main" style="width: 100%;">
				<ul id="og-grid" class="og-grid">
				   @foreach ($articles as $article)
					<li>
						<a href="" data-largesrc="{{asset('/storage///images/articles/'.$article->pic)}}" data-title="{{$article->title}}" data-description="{{$article->abstract}}">
							<img src="{{asset('/storage///images/articles/'.$article->pic)}}" style="height: 350px;width: 250px;;" alt="img01"/>
						</a>
					</li>
					@endforeach
				</ul>
			</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="/js/grid.js"></script>
		<script>
			$(function() {
				Grid.init();
				// adding more items
				$('#og-additems').on( 'click', function() {
					var $items = $('<li><a href="#" data-largesrc="/images/1.jpg" data-title="Azuki bean" data-description="Swiss chard pumpkin bunya nuts maize plantain aubergine napa cabbage soko coriander sweet pepper water spinach winter purslane shallot tigernut lentil beetroot."><img src="/images/thumbs/1.jpg" alt="img01"/></a></li>').appendTo( $( '#og-grid' ) );
					
					Grid.addItems( $items );
					return false;
				} );
			});
		</script>



<!-- <div>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Category</th>
      <th scope="col">Etat</th>
      <th scope="col">Author Email</th>
      <th scope="col">Editor Email</th>
      <th scope="col"> Fisrt Reviewer Email</th>
      <th scope="col"> Seconde Reviewer Email</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($articles as $article)
    <tr>
      <th scope="row">{{$article->title}}</th>
      <td>{{$article->category}}</td>
      <td>{{$article->etat}}</td>
      <td>{{$article->authorId}}</td>
      <td>{{$article->editorId}}</td>
      <td>{{$article->reviewer1Id}}</td>
      <td>{{$article->reviewer2Id}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div> -->
@endsection