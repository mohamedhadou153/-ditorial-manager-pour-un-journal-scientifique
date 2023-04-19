@extends('layouts.header')

@section('style')
       
 
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="/css/contact.css">
    <script src="/js/contact/jquery.min.js"></script>
    <script src="/js/contact/popper.js"></script>
    <script src="/js/contact/bootstrap.min.js"></script>
    <script src="/js/contact/jquery.validate.min.js"></script>
    <script src="/js/contact/main.js"></script>
    <style>
        .lkl{
            display:none;
        }
    </style>
@endsection

@section('content')
    <section class="ftco-section" style="background:#DCDCDC;margin-top:-20px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h1 class="heading-section">Contact</h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="wrapper">
                        <div class="row mb-5">
                            <div class="col-md-3">
                                <div class="dbox w-100 text-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="fa fa-map-marker"></span>
                            </div>
                            <div class="text">
                            <p><span>Address:</span> Faculté De Science Agadir <br>B.P 8106, Agadir 80000, Morocco
                                                 </p>
                            </div>
                        </div>
                            </div>
                            <div class="col-md-3">
                                <div class="dbox w-100 text-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="fa fa-phone"></span>
                            </div>
                            <div class="text">
                            <p><span>Téléphoner:</span> <a href="tel://+212626982869">+212687849685</a></p>
                            </div>
                        </div>
                            </div>
                            <div class="col-md-3">
                                <div class="dbox w-100 text-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="fa fa-paper-plane"></span>
                            </div>
                            <div class="text">
                            <p><span>Email:</span> <a href="mailto:oussama.lassiri@edu.uiz.ac.ma">mohamed.hadou@edu.uiz.ac.ma</a></p>
                            </div>
                        </div>
                            </div>
                            <div class="col-md-3">
                                <div class="dbox w-100 text-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="fa fa-globe"></span>
                            </div>
                            <div class="text">
                            <p><span>Website</span> <a href="/">BrandArticle</a></p>
                            </div>
                        </div>
                            </div>
                        </div>
                        <div class="row no-gutters">
                            <div class="col-md-7">
                                <div class="contact-wrap w-100 p-md-5 p-4">
                                    <h3 class="mb-4">Contactez-nous</h3>
                                    <div id="form-message-warning" class="mb-4"></div>
                            <div id="form-message-success" class="mb-4">
                                Votre message a été envoyé, merci !
                            </div>
                                    <form method="get" action="{{route('admin.set_contacts')}}">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="name">Nom</label>
                                                    <input type="text" class="form-control" name="name" id="name" placeholder="Nom">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="email">Email</label>
                                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label" for="subject">Sujet</label>
                                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Sujet">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label" for="#">Message</label>
                                                    <textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Message"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="submit" value="Envoyer le message" class="btn btn-primary">
                                                    <div class="submitting"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-5 d-flex align-items-stretch" style="margin-left:0px">
                            <div style="text-align:center;">
                            <a href="/">  
                                <p><i class="fa fa-cube"style="color:black;font-size:150px;margin-left:80px;margin-top:80px"></i></p>
                              
                                 <span style="color:black;font-size:50px ;margin-left:80px;font-family:Merienda One">Brand<b>Article</b></span> 
</p>
                
              </a>  
          </div>
                           
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

 

@endsection
