
@extends('dashboard.reviewer.header')
@section('style')
<style>
/* section */
section {
  width: 50%;
  min-height: inherit;

  display: flex;
  justify-content: center;

  position: relative;
}

section::before,
section::after {
  display: block;

  border-radius: 100%;

  position: absolute;
}

section::before {
  width: 30px;
  height: 30px;

  background: var(--primary);
  clip-path: polygon(0 100%, 100% 0, 100% 100%);

  top: 18px;
  left: 18px;
}

section::after {
  width: 42px;
  height: 42px;

  border: 1px solid var(--primary);

  top: 11px;
  left: 11px;
}

.light {
  --primary: hsl(250, 100%, 44%);
  --other: hsl(0, 0%, 14%);

  background: hsl(0, 0%, 98%);
}

.dark {
  --primary: hsl(1, 100%, 68%);
  --other: hsl(0, 0%, 90%);

  background: hsl(0, 0%, 10%);
}


/* h1 */
h1 {
  color: var(--other);
  padding: 8px 4px;
  border-bottom: 2px solid var(--other);
}


/* label */
label {
  display: flex;
  justify-content: flex-start;
  align-items: center;
  flex-wrap: nowrap;

  margin: 12px 0;

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


/* .text */
.text {
  color: var(--other);
  font-weight: bold;
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

.abs-site-link {
  position: fixed;
  bottom: 20px;
  left: 20px;
  color: hsla(0, 0%, 0%, .6);
  background: hsla(0, 0%, 98%, .6);
  font-size: 16px;
}
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
                      <div style="display: flex;justify-content:center">
                        <h4 style="font-size:20px">Donner ton point de vue</h4>
                      </div>
 <div style="display: flex;justify-content:center">                    
 <h4 style="font-size:20zpx">cet article est-il valable scientifiquement?:</h4>
 </div>
 <div style="display: flex;justify-content:center">                    
<section class="light">
  <label style="margin-right:10px;">
    <input type="radio" name="light" checked>
    <span class="design"></span>
    <span class="text">Oui</span>
  </label>

  <label>
    <input type="radio" name="light">
    <span class="design"></span>
    <span class="text">Non</span>
  </label>
</section>
 </div>
 <div style="display: flex;justify-content:center">
<h4 style="font-size:20zpx">cet article respecte le nombre  des figures?:</h4>
 </div>
 <div style="display: flex;justify-content:center">
<section class="light">
  <label style="margin-right:10px;">
    <input type="radio" name="light1" checked>
    <span class="design"></span>
    <span class="text">Oui</span>
  </label>

  <label>
    <input type="radio" name="light1">
    <span class="design"></span>
    <span class="text">Non</span>
  </label>
</section>
 </div>
 <div style="display: flex;justify-content:center">
<h4 style="font-size:20zpx">le contenu de cet article a des erreurs de langage?:</h4>
 </div>
 <div style="display: flex;justify-content:center">
<section class="light">
  <label style="margin-right:10px;">
    <input type="radio" name="light2" checked>
    <span class="design"></span>
    <span class="text">Oui</span>
  </label>

  <label>
    <input type="radio" name="light2">
    <span class="design"></span>
    <span class="text">Non</span>
  </label>
</section>
 </div>
 <div style="display: flex;justify-content:center">
<h4 style="font-size:20zpx">cet article respecte le nombre des pages?:</h4>
 </div>
 <div style="display: flex;justify-content:center">
<section class="light">
  <label style="margin-right:10px;">
    <input type="radio" name="light3" checked>
    <span class="design"></span>
    <span class="text">Oui</span>
  </label>

  <label>
    <input type="radio" name="light3">
    <span class="design"></span>
    <span class="text">Non</span>
  </label>
</section>
 </div>
 

                        <h4 style="font-size:20zpx">tes remarques</h4>
                        <textarea name="review" id=""msg cols="30" rows="5" class="form-control" style="background-color: black;color:white"></textarea>
                    </div>
                   
               


<h3>ta decision final</h3>

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
