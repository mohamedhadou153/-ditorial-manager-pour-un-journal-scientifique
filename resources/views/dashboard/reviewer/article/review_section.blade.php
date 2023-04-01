
@extends('dashboard.reviewer.header')
@section('style')
<style>
body{
    background-color: rgba(16, 46, 46, 0.973);

}

#post{
    margin: 10px;
    padding: 6px;
    padding-top: 2px;
    padding-bottom: 2px;
    text-align: center;
    background-color: #ecb21f;
    border-color: #a88734 #9c7e31 #846a29;
    color: black;
    border-width: 1px;
    border-style: solid;
    border-radius: 13px;
    
}
.container{
   width:100%;
height:100%;
}
h1,h4{
    color: white;
    font-weight: bold;
}
.form-group input,.form-group textarea{
    background-color: black;
    border: 1px solid rgba(16, 46, 46, 1);
    border-radius: 12px;
}
.text{
    color:white;
}
    
    form{
    border: 1px solid rgba(16, 46, 46, 1);
    background-color: rgba(16, 46, 46, 0.973);
    
 }

label {
  display: flex;
  justify-content: flex-start;
  align-items: center;
  flex-wrap: nowrap;
  margin: 12px 30;
  cursor: pointer;
  position: relative;
}


/* input */
input {
    
  opacity: 0;
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  z-index: -1;
}


/* .design */
.design {
  width: 16px;
  height: 16px;

  border: 1px solid var(--other);
  border-radius: 100%;
  margin-right: 16px;

  position: relative;
}

.design::before,
.design::after {
  content: "";
  display: block;

  width: inherit;
  height: inherit;

  border-radius: inherit;

  position: absolute;
  transform: scale(0);
  transform-origin: center center;
}

.design:before {
  background: var(--other);
  opacity: 0;
  transition: .3s;
}

.design::after {
  background: var(--primary);
  opacity: .4;
  transition: .6s;
}



/* checked state */
input:checked+.design::before {
  opacity: 1;
  transform: scale(.6);
}


/* other states */
input:hover+.design,
input:focus+.design {
  border: 1px solid var(--primary);
}

input:hover+.design:before,
input:focus+.design:before {
  background: var(--primary);
}

input:hover~.text {
  color: var(--primary);
}

input:focus+.design::after,
input:active+.design::after {
  opacity: .1;
  transform: scale(2.6);
}

</style>

@endsection
@section('content')
<?php use Illuminate\Support\Facades\Auth;  $reviewer = auth::guard('reviewer')->user()->email;?>
@foreach ($articles as $article)


<div class="row" style="width:100%;height:95.5%;border:5px solid black;margin:0">
    <div class="col-md-6" id="div1"style="width:70%;height:100%;padding:0">
<embed src="{{asset('/storage/pdf/articles/'.$article->obj_pdf)}}"  aria-readonly="true" frameborder="0" style="width:100%;height:100%;border-right:5px solid gray;"/>

    </div>
    <div class="col-md-6" id="div2"style="width:30%;padding:0">
    


    <div class="container" style="padding:0">
         
                <form method="" action="{{route('reviewer.SendToEditor')}}" id="algin-form"style="height:100%">
                    <div class="form-group">
                        <h4 style="font-size:20px">Donner ton point de vue</h4>
                        <h4 style="font-size:20zpx">Donner ton point de vue</h4>
                        <textarea name="review" id=""msg cols="30" rows="5" class="form-control" style="background-color: black;color:white"></textarea>
                    </div>
                   
                 
  <h1>ta decision final</h1>

<label>
  <input type="radio" name="rev_des" value="accept" checked>
  <span class="design"></span>
  <span class="text">accepter l'article</span>
</label>

<label>
  <input type="radio" name="rev_des" value="accept avec revision">
  <span class="design"></span>
  <span class="text">accepter l'article avec une révision</span>
</label>

<label>
  <input type="radio" name="rev_des" value="refuse">
  <span class="design"></span>
  <span class="text">refuser l'article</span>
</label>



                    
                    <div class="form-group">
                      <input type="hidden" name="art_id" value="{{$article->id}}">
                        <button type="submit" id="post" class="btn">envoyer votre point vue</button>
                    </div>
                </form>
           
       
    </div>

        
    </div>
</div>
@endforeach
@endsection
