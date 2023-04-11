@extends('dashboard.head')
@section('head')
 
 
  <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
    
     .body{
        margin-top: -20px;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins" , sans-serif;
      }
      .body{
        background-image: linear-gradient(to right top, #a0a9bb, #8e8298, #7e5c6c, #653c3a, #3f240a);        min-height: 94.5vh;
        display: flex;
        align-items: center;
        justify-content: center;
       
      }
      .container{
        position: relative;
        max-width: 850px;
        width: 100%;
        height:550px ;
        background: #fff;
        padding: 40px 30px;
        box-shadow: 0 5px 10px rgba(0,0,0,0.2);
        perspective: 2700px;
      }
      .container .cover{
        position: absolute;
        top: 0;
        left: 50%;
        height: 100%;
        width: 50%;
        z-index: 98;
        transition: all 1s ease;
        transform-origin: left;
        transform-style: preserve-3d;
      }
      .container #flip:checked ~ .cover{
        transform: rotateY(-180deg);
      }
      .container .cover .front,
      .container .cover .back{
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
      }
      .cover .back{
        transform: rotateY(180deg);
        backface-visibility: hidden;
      }
      .container .cover::before,
      .container .cover::after{
        content: '';
        position: absolute;
        height: 100%;
        width: 100%;
        opacity: 0.5;
        z-index: 12;
      }
      .container .cover::after{
        opacity: 0.3;
        transform: rotateY(180deg);
        backface-visibility: hidden;
      }
      .container .cover img{
        position: absolute;
        height: 100%;
        width: 100%;
        object-fit: cover;
        z-index: 10;
      }
      .container .cover .text{
        position: absolute;
        z-index: 130;
        height: 100%;
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
      }
      .cover .text .text-1,
      .cover .text .text-2{
        font-size: 26px;
        font-weight: 600;
        color: #fff;
        text-align: center;
      }
      .cover .text .text-2{
        font-size: 15px;
        font-weight: 500;
      }
      .container .forms{
        height: 100%;
        width: 100%;
        background: #fff;
      }
      .container .form-content{
        display: flex;
        align-items: center;
        justify-content: space-between;
      }
      .form-content .login-form,
      .form-content .signup-form{
        width: calc(100% / 2 - 25px);
      }
      .forms .form-content .title{
        position: relative;
        font-size: 24px;
        font-weight: 500;
        color: #333;
      }
      .forms .form-content .title:before{
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        height: 3px;
        width: 25px;
        background: #504f52;
      }
      .forms .signup-form  .title:before{
        width: 20px;
      }
      .forms .form-content .input-boxes{
        margin-top: 30px;
      }
      .forms .form-content .input-box{
        display: flex;
        align-items: center;
        height: 50px;
        width: 100%;
        margin: 10px 0;
        position: relative;
      }
      .form-content .input-box input{
        height: 100%;
        width: 100%;
        outline: none;
        border: none;
        padding: 0 30px;
        font-size: 16px;
        font-weight: 500;
        border-bottom: 2px solid rgba(0,0,0,0.2);
        transition: all 0.3s ease;
      }
      .form-content .input-box input:focus,
      .form-content .input-box input:valid{
        border-color: #504f52;
      }
      .form-content .input-box i{
        position: absolute;
        color: #504f52;
        font-size: 17px;
      }
      .forms .form-content .text{
        font-size: 14px;
        font-weight: 500;
        color: #333;
      }
      .forms .form-content .text a{
        text-decoration: none;
      }
      .forms .form-content .text a:hover{
        text-decoration: underline;
      }
      .forms .form-content .button{
        color: #fff;
        margin-top: 40px;
      }
      .forms .form-content .button input{
        color: #fff;
        background: #504f52;
        border-radius: 6px;
        padding: 0;
        cursor: pointer;
        transition: all 0.4s ease;
      }
      .forms .form-content .button input:hover{
        background: #504f52;
      }
      .forms .form-content label{
        color: #504f52;
        cursor: pointer;
      }
      .forms .form-content label:hover{
        text-decoration: underline;
      }
      .forms .form-content .login-text,
      .forms .form-content .sign-up-text{
        text-align: center;
        margin-top: 25px;
      }
      .container #flip{
        display: none;
      }
      @media (max-width: 730px) {
        .container .cover{
          display: none;
        }
        .form-content .login-form,
        .form-content .signup-form{
          width: 100%;
        }
        .form-content .signup-form{
          display: none;
        }
        .container #flip:checked ~ .forms .signup-form{
          display: block;
        }
        .container #flip:checked ~ .forms .login-form{
          display: none;
        }
      }
  </style>
  <script src="https://kit.fontawesome.com/7f60b9a86b.js" crossorigin="anonymous"></script>
@endsection
@section('content')




 <div class="body">
    <div class="container">
      <input type="checkbox" id="flip">
      <div class="cover">
        <div class="front">
          <img src="\img\ab.jpg" alt="">
        </div>
        <div class="back">
          <img class="backImg" src="https://picsum.photos/200/300?grayscale" alt="">
          <div class="text">
          </div>
        </div>
      </div>
      <div class="forms">
          <div class="form-content">
            <div class="login-form">
            @if(Session::has('error'))
                <div class="alert alert-danger">{{Session::get('error')}}</div>
              @endif
              <div class="title">Login</div>
            <form method="POST" action="{{ route('author.customLogin') }}">
              @csrf
              <div class="input-boxes">
                <div class="input-box">
                  <i class="fas fa-envelope"></i>
                  <input type="text" id="email" placeholder="Enter a valid email address"  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                </div>
                <div class="input-box">
                  <i class="fas fa-lock"></i>
                  <input type="password"placeholder="Enter password" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" required>
                </div>
                <div class="text"><a href="#">Forgot password?</a></div>
                <div class="button input-box">
                  <input type="submit" value="Sumbit">
                </div>
                <div class="text sign-up-text">Don't have an account? <label for="flip">Sign up now</label></div>
              </div>
            </form>
        </div>




          <div class="signup-form">
            <div class="title">Sign up</div>
            <form method="POST" action="{{ route('author.create') }}" >
            @csrf
              <div class="input-boxes">
                <div class="input-box">
                  <i class="fas fa-user"></i>
                  <input type="text" id="first_name" class=" @error('first name') is-invalid @enderror" placeholder="Enter your first name" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" required>
                  @error('first name')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                  @enderror
                </div>
                <div class="input-box">
                  <i class="fas fa-user"></i>
                  <input type="text" placeholder="Enter your last name" class="@error('last name') is-invalid @enderror"  name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" required>
                  @error('last name')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                  @enderror
                </div>
                <div class="input-box">
                  <i class="fas fa-envelope"></i>
                  <input type="text" placeholder="Enter your email" class="@error('last name') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" required>
                  @error('last name')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                  @enderror
                </div>
                <div class="input-box">
                  <i class="fas fa-lock"></i>
                  <input type="password" placeholder="Enter your password" class="@error('email') is-invalid @enderror"  name="password" required autocomplete="new-password" required>
                  @error('email')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                  @enderror
                </div>
                <div class="input-box">
                  <i class="fas fa-lock"></i>
                  <input type="password" placeholder="Confirm your password" class="@error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password" required>
                  @error('password')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                  @enderror
                </div>
                <div class="button input-box">
                  <input type="submit" value="Sumbit">
                </div>
                <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
              </div>
            </form>
        </div>
      </div>
      </div>
    </div>
    </div>
@endsection














