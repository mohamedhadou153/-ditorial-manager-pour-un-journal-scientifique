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
        return view('dashboard.admin.users');
    }

    public function get_editors(){
        return view('dashboard.admin.users');
    }

    public function get_reviewers(){
        return view('dashboard.admin.users');
    }

    public function get_new_editors(){
        return view('dashboard.admin.users');
    }

    public function get_new_reviewers(){
        return view('dashboard.admin.users');
    }

    public function articles(){
        return view('dashboard.admin.articles');
    }
}