@extends('dashboard.admin.header')
@section('style')
<style>
    body {
    background-color: #f9f9fa
}

.padding {
    padding: 3rem !important
}

.user-card-full {
    overflow: hidden;
}

.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 20px 0 rgba(69,90,100,0.08);
    box-shadow: 0 1px 20px 0 rgba(69,90,100,0.08);
    border: none;
    margin-bottom: 30px;
}

.m-r-0 {
    margin-right: 0px;
}

.m-l-0 {
    margin-left: 0px;
}

.user-card-full .user-profile {
    border-radius: 5px 0 0 5px;
}

.bg-c-lite-green {
        background: -webkit-gradient(linear, left top, right top, from(#f29263), to(#ee5a6f));
    background: linear-gradient(to right, #ee5a6f, #f29263);
}

.user-profile {
    padding: 20px 0;
}

.card-block {
    padding: 1.25rem;
}

.m-b-25 {
    margin-bottom: 25px;
}

.img-radius {
    border-radius: 5px;
}


 
h6 {
    font-size: 14px;
}

.card .card-block p {
    line-height: 25px;
}

@media only screen and (min-width: 1400px){
p {
    font-size: 14px;
}
}

.card-block {
    padding: 1.25rem;
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0;
}

.m-b-20 {
    margin-bottom: 20px;
}

.p-b-5 {
    padding-bottom: 5px !important;
}

.card .card-block p {
    line-height: 25px;
}

.m-b-10 {
    margin-bottom: 10px;
}

.text-muted {
    color: #919aa3 !important;
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0;
}

.f-w-600 {
    font-weight: 600;
}

.m-b-20 {
    margin-bottom: 20px;
}

.m-t-40 {
    margin-top: 20px;
}

.p-b-5 {
    padding-bottom: 5px !important;
}

.m-b-10 {
    margin-bottom: 10px;
}

.m-t-40 {
    margin-top: 20px;
}

.user-card-full .social-link li {
    display: inline-block;
}

.user-card-full .social-link li a {
    font-size: 20px;
    margin: 0 10px 0 0;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}



</style>
@endsection
@section('content')
<?php use Illuminate\Support\Facades\DB; use Illuminate\Support\Facades\Auth;  $contacts = DB::table('contacts')->select('*')->get();?>


<div style="display:flex; flex-wrap:wrap ;justify-content:space-between">
 @foreach($contacts as $contact)
<div class="col-xl-6 col-md-12">
                                                <div class="card user-card-full">
                                                    <div class="row m-l-0 m-r-0">
                                                        <div class="col-sm-4  user-profile" style="background-color:blueviolet;">
                                                            <div class="card-block text-center text-white">
                                                                <div class="m-b-25">
                                                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/93/Google_Contacts_icon.svg/100px-Google_Contacts_icon.svg.png" style="size: 50px;" class="img-radius" alt="User-Profile-Image">
                                                                </div>
                                                                <h4 class="f-w-600">Contact</h4>
                                                                <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="card-block">
                                                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                                                <div class="row" >
                                                                    <div class="col-sm-9" style="display:flex;justify-content:baseline">
                                                                        <p class="m-b-10 f-w-100" style="margin-right: 10px;">Nom:</p>
                                                                        <p class="text-muted "  style="margin-bottom: -150px;">{{$contact->name}}</p>
                                                                    </div>
                                                                    <div class="col-sm-9"  style="display:flex;justify-content:baseline">
                                                                        <p class="m-b-10 f-w-100" style="margin-right: 10px;">Email:</p>
                                                                        <p class="text-muted "  style="margin-bottom: -150px;">{{$contact->email}}</p>
                                                                    </div>
                                                                    <div class="col-sm-9"  style="display:flex;justify-content:baseline">
                                                                        <p class="m-b-10 f-w-100" style="margin-right: 10px;">Sujet:</p>
                                                                        <p class="text-muted " style="margin-bottom: -150px;">{{$contact->sujet}}</p>
                                                                    </div>
                                                                </div>
                                                                <p class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Message</p>
                                                                <div class="row">
                                                                    <div class="col-sm-13">
                                                                        <p class="m-b-10 f-w-600">{{$contact->message}}</p>
                                                                        <a href=""><a href="mailto:{{$contact->email}}" download="" style=" margin-right:50px"><i class="fa-regular fa-envelope fa-xl" style="color: #e21212;"></i></a>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
</div>
@endforeach 
</div>                                  
@endsection