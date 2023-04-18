
@extends('layouts.header')
@section('style')

<style>
	img{
		width: 100%;
		display: block;
	}
	.container{
		max-width: 1320px;
		margin: 0 auto;
		padding: 0 1.2rem;
	}
	header{
		min-height: 121vh;
		background: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)), url('https://wallpaperaccess.com/full/19381.jpg') center/cover no-repeat fixed;
		display: flex;
		flex-direction: column;
		justify-content: stretch;
	}
	.banner{
		flex: 1;
		display: flex;
		align-items: center;
		justify-content: center;
		text-align: center;
		color: #fff;
		margin-bottom: 150px;
	}
	.banner-title{
		font-size: 5rem;
		line-height: 1.2;
		font-family: 'Merienda One', sans-serif;
	}
	#a-buttom{
		text-decoration: none; color:#F6F9FE
	}
	.button-17 {
	align-items: center;
	appearance: none;
	background-color: transparent;
	border-radius: 24px;
	border-style: none;
	box-shadow: rgba(0, 0, 0, .2) 0 3px 5px -1px,rgba(0, 0, 0, .14) 0 6px 10px 0,rgba(0, 0, 0, .12) 0 1px 18px 0;
	box-sizing: border-box;
	color: #3c4043;
	cursor: pointer;
	display: inline-flex;
	fill: currentcolor;
	font-family: "Google Sans",Roboto,Arial,sans-serif;
	font-size: 14px;
	font-weight: 1000;
	height: 48px;
	justify-content: center;
	letter-spacing: .25px;
	line-height: normal;
	max-width: 100%;
	overflow: visible;
	padding: 2px 24px;
	position: relative;
	text-align: center;
	text-transform: none;
	transition: box-shadow 280ms cubic-bezier(.4, 0, .2, 1),opacity 15ms linear 30ms,transform 270ms cubic-bezier(0, 0, .2, 1) 0ms;
	user-select: none;
	-webkit-user-select: none;
	touch-action: manipulation;
	width: auto;
	will-change: transform,opacity;
	z-index: 0;
	}

	.button-17:hover {
	background: black;
	color: #174ea6;
	}

	.button-17:active {
	box-shadow: 0 4px 4px 0 rgb(60 64 67 / 30%), 0 8px 12px 6px rgb(60 64 67 / 15%);
	outline: none;
	}

	.button-17:focus {
	outline: none;
	border: 2px solid #4285f4;
	}
</style>
@endsection
@section('content')
<div class="banner">
	<div class="container">
		<h1 class="banner-title">
		    <span><i class="fa fa-cube"></i>Brand<b>Article</b></span> 
			<p>Tout ce que vous devez savoir sur la science</p>
			<!-- <button class="button-17" role="button" ><a id="a-buttom" href="#article-section" >Discover More</a></button> -->
		</h1>
	</div>
</div>
<div>
	@include('layouts.footer')
  </div>
   
@endsection

  