@extends('layouts.app')
@section('show_accept_article_home')
<style>
  .home-image{
    background:url('https://images.unsplash.com/photo-1597839219216-a773cb2473e4?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1740&q=80') no-repeat center center /cover;
    background-attachment: fixed;
    height: 600px;
    text-align: center;
  }
  #articles{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    width: 100%;
    padding: 40px;
    border-bottom: 1px solid rgba(0, 0, 0,0.05);
  }
  .articles-type{
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
  }
  .articles-type span{
    color: #f33c3c ;
  }
  .articles-type h3{
    font-size: 2.4rem;
    color: #2b2b2b;
    font-weight: 600;
  }
  .container-articles{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction:row;
    margin: 20px 0px;
    flex-wrap: wrap;
  }
  .article-box{
    background-color: white;
    border: 1px solid #ececec;
    margin: 20px;
  }
  .img-article{
    width: 100%;
    height: auto;
  }
  .img-article img{
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
  }
  .article-title{
    padding: 30px;
    display: flex;
    flex-direction: column;
  }
  .form__field {
  font-family: inherit;
  width: 100%;
  border: 0;
  border-bottom: 2px solid black;
  outline: 0;
  font-size: 1.3rem;
  color: black;
  padding: 7px 0;
  background: transparent;
  transition: border-color 0.2s;
}
</style>
<script src="https://kit.fontawesome.com/7f60b9a86b.js" crossorigin="anonymous"></script>

<table id="article-section" class="table table-striped">
  <form action="{{route('search_article')}}" method="get">
    <thead>
    <tr>
      <th scope="col">
       <div class="form__group field">
         <input type="input" class="form__field" placeholder="Title Or Author Name..." name="title" />
       </div>
      </th>
      <th scope="col">
				  <select   class="form__field" name="category">
            <option value="Category">Category</option>			
             <option value="Computer-Sience">Computer Sience</option>
             <option value="informatique">informatique</option>
             <option value="Physics">Physics</option>
             <option value="Chimics">Chimics</option>
             <option value="Biologie">Biologie</option>
             <option value="Giologie">Giologie</option>
         </select>
      </th>
      <th scope="col">
       <div class="form__group field" style="display: flex;align-items: center;justify-content: center;flex-direction: row;">
         <input type="submit" class="form__field"   required />
         <i class="fa-solid fa-magnifying-glass"></i>
       </div>
      </th>
    </tr>
  </thead>
  </form>
  
</table>
<div id="articles">
  <div class="articles-type">
    <h3>Articles</h3>
  </div>

 <div class="container-articles">
  @foreach($articles as $article)
    <div class="article-box">
      <div class="img-article"><img src="{{asset('/storage/images/articles/'.$article->pic)}}" style="height: 300px; with: 200px;" alt=""></div>
      <div class="article-text">
        <a href="" class="article-title">{{$article->title}}</a>
        <p>by {{$article->author_first_name}} {{$article->author_last_name}}</p>
        <a href="">Read More</a>
      </div>
    </div>
    @endforeach
 </div>  
@endsection