@extends('dashboard.admin.header')
@section('content')
<?php use Illuminate\Support\Facades\DB;
$total_authors = DB::table('authors')->select(DB::raw('count(id) as count'))->get();
$total_editors = DB::table('editors')->select(DB::raw('count(id) as count'))->get();
$total_reviewers = DB::table('reviewers')->select(DB::raw('count(id) as count'))->get();
$total_articles = DB::table('articles')->count();
$total_articles_accept = (int)(DB::table('articles')->where('etat','accept')->count()  / $total_articles *  100);
$total_articles_refuse = (int)(DB::table('articles')->where('etat','refuse')->count()  / $total_articles *  100);
$total_articles_traitement = (int)(DB::table('articles')->where('etat','traitement')->count()  / $total_articles *  100);



$total_articles_revision = (int)(DB::table('articles')->where('etat','accept avec revision')->count()  / $total_articles *  100);
$total_articles_libre = (int)(DB::table('articles')->where('etat','libre')->count()  / $total_articles *  100);

// $total_articles_accept_p = $total_articles_accept_int / $total_articles_int * 100;
?>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tableau de bord</h1>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Totals (Autheurs)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">@foreach($total_authors as $l){{$l->count}}@endforeach</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-user-pen fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Totals (éditeurs)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">@foreach($total_editors as $l){{$l->count}}@endforeach</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-sharp fa-solid fa-user-tie fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Totals (réviseurs)
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">@foreach($total_reviewers as $l){{$l->count}}@endforeach</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-sharp fa-solid fa-user-tie fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Total(Articles)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$total_articles}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-newspaper fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->
<div class="row" style="display: flex; justify-content:center">

    <!-- Content Column -->
    <div class="col-lg-6 mb-4">

        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Analyse</h6>
            </div>
            <div class="card-body">
                <h4 class="small font-weight-bold">Articles refuser <span
                        class="float-right">{{$total_articles_refuse}}%</span>
                </h4>
                @if($total_articles_refuse == 0)
                <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 0%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_refuse > 0 && $total_articles_refuse <= 10)
                <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 10%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_refuse > 10 && $total_articles_refuse <= 20)
                <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 20%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_refuse > 20 && $total_articles_refuse <= 30)
                <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 30%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_refuse > 30 && $total_articles_refuse <= 40)
                <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 40%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_refuse > 40 && $total_articles_refuse <= 50)
                <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 50%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_refuse > 50 && $total_articles_refuse <= 60)
                <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 60%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_refuse > 60 && $total_articles_refuse <= 70)
                <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 70%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_refuse > 70 && $total_articles_refuse <= 80)
                <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 80%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_refuse > 80 && $total_articles_refuse <= 90)
                <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 90%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_refuse > 90 && $total_articles_refuse <= 99)
                <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 90%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_refuse == 100)
                <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 100%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                











                <h4 class="small font-weight-bold">Articles en etat révision <span
                        class="float-right">{{$total_articles_revision}}%</span>
                </h4>
                @if($total_articles_revision == 0)
                <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 0%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_revision > 0 && $total_articles_revision <= 10)
                <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 10%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_revision > 10 && $total_articles_revision <= 20)
                <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 20%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_revision > 20 && $total_articles_revision <= 30)
                <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 30%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_revision > 30 && $total_articles_revision <= 40)
                <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 40%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_revision > 40 && $total_articles_revision <= 50)
                <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 50%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_revision > 50 && $total_articles_revision <= 60)
                <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 60%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_revision > 60 && $total_articles_revision <= 70)
                <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 70%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_revision > 70 && $total_articles_revision <= 80)
                <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 80%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_revision > 80 && $total_articles_revision <= 90)
                <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 90%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_revision > 90 && $total_articles_revision <= 99)
                <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 90%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_revision == 100)
                <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 100%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif

















                <h4 class="small font-weight-bold">Articles encour de traitement <span
                        class="float-right">{{$total_articles_traitement}}%</span>
                </h4>
                @if($total_articles_traitement == 0)
                <div class="progress mb-4">
                    <div class="progress-bar " role="progressbar" style="width: 0%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_traitement > 0 && $total_articles_traitement <= 10)
                <div class="progress mb-4">
                    <div class="progress-bar " role="progressbar" style="width: 10%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_traitement > 10 && $total_articles_traitement <= 20)
                <div class="progress mb-4">
                    <div class="progress-bar " role="progressbar" style="width: 20%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_traitement > 20 && $total_articles_traitement <= 30)
                <div class="progress mb-4">
                    <div class="progress-bar " role="progressbar" style="width: 30%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_traitement > 30 && $total_articles_traitement <= 40)
                <div class="progress mb-4">
                    <div class="progress-bar " role="progressbar" style="width: 40%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_traitement > 40 && $total_articles_traitement <= 50)
                <div class="progress mb-4">
                    <div class="progress-bar " role="progressbar" style="width: 50%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_traitement > 50 && $total_articles_traitement <= 60)
                <div class="progress mb-4">
                    <div class="progress-bar " role="progressbar" style="width: 60%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_traitement > 60 && $total_articles_traitement <= 70)
                <div class="progress mb-4">
                    <div class="progress-bar " role="progressbar" style="width: 70%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_traitement > 70 && $total_articles_traitement <= 80)
                <div class="progress mb-4">
                    <div class="progress-bar " role="progressbar" style="width: 80%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_traitement > 80 && $total_articles_traitement <= 90)
                <div class="progress mb-4">
                    <div class="progress-bar " role="progressbar" style="width: 90%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_traitement > 90 && $total_articles_traitement <= 99)
                <div class="progress mb-4">
                    <div class="progress-bar " role="progressbar" style="width: 90%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_traitement == 100)
                <div class="progress mb-4">
                    <div class="progress-bar " role="progressbar" style="width: 100%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif

















                <h4 class="small font-weight-bold">Articles accepter <span
                        class="float-right">{{$total_articles_accept}}%</span>
                </h4>
                @if($total_articles_accept == 0)
                <div class="progress mb-4">
                    <div class="progress-bar bg-success " role="progressbar" style="width: 0%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_accept > 0 && $total_articles_accept <= 10)
                <div class="progress mb-4">
                    <div class="progress-bar bg-success " role="progressbar" style="width: 10%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_accept > 10 && $total_articles_accept <= 20)
                <div class="progress mb-4">
                    <div class="progress-bar bg-success " role="progressbar" style="width: 20%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_accept > 20 && $total_articles_accept <= 30)
                <div class="progress mb-4">
                    <div class="progress-bar bg-success " role="progressbar" style="width: 30%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_accept > 30 && $total_articles_accept <= 40)
                <div class="progress mb-4">
                    <div class="progress-bar bg-success " role="progressbar" style="width: 40%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_accept > 40 && $total_articles_accept <= 50)
                <div class="progress mb-4">
                    <div class="progress-bar bg-success " role="progressbar" style="width: 50%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_accept > 50 && $total_articles_accept <= 60)
                <div class="progress mb-4">
                    <div class="progress-bar bg-success " role="progressbar" style="width: 60%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_accept > 60 && $total_articles_accept <= 70)
                <div class="progress mb-4">
                    <div class="progress-bar bg-success " role="progressbar" style="width: 70%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_accept > 70 && $total_articles_accept <= 80)
                <div class="progress mb-4">
                    <div class="progress-bar bg-success " role="progressbar" style="width: 80%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_accept > 80 && $total_articles_accept <= 90)
                <div class="progress mb-4">
                    <div class="progress-bar bg-success " role="progressbar" style="width: 90%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_accept > 90 && $total_articles_accept <= 99)
                <div class="progress mb-4">
                    <div class="progress-bar bg-success " role="progressbar" style="width: 90%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_accept == 100)
                <div class="progress mb-4">
                    <div class="progress-bar bg-success " role="progressbar" style="width: 100%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif




                 <h4 class="small font-weight-bold">Articles libre <span
                        class="float-right">{{$total_articles_libre}}%</span>
                </h4>
                @if($total_articles_libre == 0)
                <div class="progress mb-4">
                    <div class="progress-bar bg-Black " role="progressbar" style="width: 0%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_libre > 0 && $total_articles_libre <= 10)
                <div class="progress mb-4">
                    <div class="progress-bar bg-Black " role="progressbar" style="width: 10%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_libre > 10 && $total_articles_libre <= 20)
                <div class="progress mb-4">
                    <div class="progress-bar bg-Black " role="progressbar" style="width: 20%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_libre > 20 && $total_articles_libre <= 30)
                <div class="progress mb-4">
                    <div class="progress-bar bg-Black " role="progressbar" style="width: 30%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_libre > 30 && $total_articles_libre <= 40)
                <div class="progress mb-4">
                    <div class="progress-bar bg-Black " role="progressbar" style="width: 40%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_libre > 40 && $total_articles_libre <= 50)
                <div class="progress mb-4">
                    <div class="progress-bar bg-Black " role="progressbar" style="width: 50%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_libre > 50 && $total_articles_libre <= 60)
                <div class="progress mb-4">
                    <div class="progress-bar bg-Black " role="progressbar" style="width: 60%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_libre > 60 && $total_articles_libre <= 70)
                <div class="progress mb-4">
                    <div class="progress-bar bg-Black " role="progressbar" style="width: 70%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_libre > 70 && $total_articles_libre <= 80)
                <div class="progress mb-4">
                    <div class="progress-bar bg-Black " role="progressbar" style="width: 80%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_libre > 80 && $total_articles_libre <= 90)
                <div class="progress mb-4">
                    <div class="progress-bar bg-Black " role="progressbar" style="width: 90%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_libre > 90 && $total_articles_libre <= 99)
                <div class="progress mb-4">
                    <div class="progress-bar bg-Black " role="progressbar" style="width: 90%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
                @if($total_articles_libre == 100)
                <div class="progress mb-4">
                    <div class="progress-bar bg-Black " role="progressbar" style="width: 100%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endif
            </div>
        </div>

        <!-- Color System -->
       
        </div>

    </div>

        <!-- Illustrations -->
        <!-- <div class="card shadow mb-4">
            
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card bg-primary text-white shadow">
                    <div class="card-body">
                        Primary
                        <div class="text-white-50 small">#4e73df</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-success text-white shadow">
                    <div class="card-body">
                        Success
                        <div class="text-white-50 small">#1cc88a</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-info text-white shadow">
                    <div class="card-body">
                        Info
                        <div class="text-white-50 small">#36b9cc</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-warning text-white shadow">
                    <div class="card-body">
                        Warning
                        <div class="text-white-50 small">#f6c23e</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-danger text-white shadow">
                    <div class="card-body">
                        Danger
                        <div class="text-white-50 small">#e74a3b</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-secondary text-white shadow">
                    <div class="card-body">
                        Secondary
                        <div class="text-white-50 small">#858796</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-light text-black shadow">
                    <div class="card-body">
                        Light
                        <div class="text-black-50 small">#f8f9fc</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-dark text-white shadow">
                    <div class="card-body">
                        Dark
                        <div class="text-white-50 small">#5a5c69</div>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- Approach -->
        <!-- <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
            </div>
            <div class="card-body">
                <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                    CSS bloat and poor page performance. Custom CSS classes are used to create
                    custom components and custom utility classes.</p>
                <p class="mb-0">Before working with this theme, you should become familiar with the
                    Bootstrap framework, especially the utility classes.</p>
            </div>
        </div> -->

</div>

</div>
<!-- /.container-fluid -->

</div>
@endsection