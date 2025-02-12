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
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

    public function accept_editor($id){
        DB::table('editors')
        ->where('id',$id)
        ->update(['etat'=>'accept']);
        return view('dashboard.admin.new_editors');
    }

    public function refuse_editor($id){
        DB::table('editors')
        ->where('id',$id)
        ->update(['etat'=>'refuse']);
        return view('dashboard.admin.new_editors');
    }

    public function accept_reviewer($id){
        DB::table('reviewers')
        ->where('id',$id)
        ->update(['etat'=>'accept']);
        return view('dashboard.admin.new_reviewers');
    }

    public function refuse_reviewer($id){
        DB::table('reviewers')
        ->where('id',$id)
        ->update(['etat'=>'refuse']);
        return view('dashboard.admin.new_reviewers');
    }

    public function contacts(){

        return view('dashboard.admin.contact');
    }

    public function set_contacts(Request $request){
        $name = $request->name;
        $email = $request->email;
        $sujet = $request->sujet;
        $message = $request->message;
        DB::table('contacts')->insert(['name'=>$name,'email'=>$email,'sujet'=>$sujet,'message'=>$message]);
        return view('layouts.app');
    }
}