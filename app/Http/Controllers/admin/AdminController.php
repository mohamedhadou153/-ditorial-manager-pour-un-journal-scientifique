<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\Guard;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function get_authors(){
        return view('dashboard.admin.authors');
    }

    public function get_editors(){
        return view('dashboard.admin.editors');
    }

    public function get_reviewers(){
        return view('dashboard.admin.reviewers');
    }

    public function get_new_editors(){
        return view('dashboard.admin.new_editors');
    }

    public function get_new_reviewers(){
        return view('dashboard.admin.new_reviewers');
    }

    public function articles_traitement(){
        return view('dashboard.admin.articles_traitement');
    }

    public function articles_libre(){
        return view('dashboard.admin.articles_libre');
    }

    public function articles_revise(){
        return view('dashboard.admin.articles_revision');
    }

    public function articles_refuse(){
        return view('dashboard.admin.articles_refuse');
    }

    
    public function articles_accept(){
        return view('dashboard.admin.articles_accept');
    }

}