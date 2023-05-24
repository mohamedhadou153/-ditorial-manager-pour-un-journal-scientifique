@extends('dashboard.head')
@section('head')
 <link rel="stylesheet" href="/css/forget_password.css">
 <title>Glassmorphism login Form Tutorial in html css</title>
 
 <link rel="preconnect" href="https://fonts.gstatic.com">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
 <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
 <!--Stylesheet-->
 <style media="screen">
   *,
*:before,
*:after{
 padding: 0;
 margin: 0;
 box-sizing: border-box;
}
body{
    background-image: linear-gradient(to right top, #a0a9bb, #8e8298, #7e5c6c, #653c3a, #3f240a); 
}
.background{
 width: 430px;
 height: 520px;
 position: absolute;
 transform: translate(-50%,-50%);
 left: 50%;
 top: 50%;
}
.background .shape{
 height: 200px;
 width: 200px;
 position: absolute;
 border-radius: 50%;
}
.shape:first-child{
 background: linear-gradient(
     #1845ad,
     #23a2f6
 );
 left: -80px;
 top: -80px;
}
.shape:last-child{
 background: linear-gradient(
     to right,
     #ff512f,
     #f09819
 );
 right: -30px;
 bottom: -80px;
}
form{
 height: 520px;
 width: 400px;
 background-color: white;
 position: absolute;
 transform: translate(-50%,-50%);
 top: 50%;
 left: 50%;
 border-radius: 10px;
 backdrop-filter: blur(10px);
 border: 2px solid rgba(255,255,255,0.1);
 box-shadow: 0 0 40px rgba(8,7,16,0.6);
 padding: 50px 35px;
}
form *{
 font-family: 'Poppins',sans-serif;
 color: #ffffff;
 letter-spacing: 0.5px;
 outline: none;
 border: none;
}
form h3{
 font-size: 32px;
 font-weight: 500;
 line-height: 42px;
 text-align: center;
 
}

label{
 display: flex;
 justify-content: center;
 align-items: center;
 margin-top: 30px;
 font-size: 16px;
 font-weight: 500;
 color: #080710;
}
input{
 display: block;
 height: 50px;
 width: 100%;
 background-color: whitesmoke;
 color: #080710;
 border-radius: 3px;
 padding: 0 10px;
 margin-top: 8px;
 font-size: 14px;
 font-weight: 300;
}
::placeholder{
 color: black;
}
.button{
 margin-top: 50px;
 width: 100%;
 background-color:#23a2f6;
 color: white;
 padding: 15px 0;
 font-size: 18px;
 font-weight: 600;
 border-radius: 5px;
 cursor: pointer;
}
.social{
margin-top: 30px;
display: flex;
}
.social div{
background: red;
width: 150px;
border-radius: 3px;
padding: 5px 10px 10px 5px;
background-color: rgba(255,255,255,0.27);
color: #eaf0fb;
text-align: center;
}
.social div:hover{
background-color: rgba(255,255,255,0.47);
}
.social .fb{
margin-left: 25px;
}
.social i{
margin-right: 4px;
}

 </style>
 
  
@endsection
@section('content')





  <!-- Design by foolishdeveloper.com -->
   


    <form method="get" action="{{route('reviewer.submit_code')}}">
        <h3>vous oubliez votre mot de passe ?</h3>
        @if(Session::has('error'))
        <div class="alert alert-danger">Aucun résultat de recherche</br> Votre recherche ne donne aucun résultat. Veuillez réessayer avec d’autres informations.</div>
        @endif
        <label for="username">Veuillez entrer votre adresse e-mail pour rechercher votre compte.</label>
        <input type="text" placeholder="Email" name="email" id="username">
        

        <input type="submit" class="button"  value="Soumettre email" >
    </form>
@endsection














