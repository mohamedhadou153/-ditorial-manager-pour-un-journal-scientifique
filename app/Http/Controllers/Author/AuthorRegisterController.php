<?php

namespace App\Http\Controllers\Author;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Models\Author;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\Guard;
use Illuminate\Support\Facades\DB;

class AuthorRegisterController extends Controller
{
   public function create(Request $request){
    $request->validate([
        'first_name' => ['required', 'string', 'max:255'],
        'last_name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);

    $author = new author();
    $author->first_name = $request->first_name;
    $author->last_name = $request->last_name;
    $author->email = $request->email;
    $author->password = Hash::make($request->password);
    $data = $author->save();
    return redirect()->intended('author/login');
    }
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

    
        $credentials = $request->only('email', 'password');
        if (Auth::guard('author')->attempt($credentials)) {
            return redirect()->intended('author/home')
                        ->withSuccess('Signed in');
        }
        if (Auth::guard('editor')->attempt($credentials)) {
            return redirect()->intended('editor/home')->withSuccess('Signed in');
           //return redirect()->back()->with('error','invalid information'); 
        }
        if (Auth::guard('reviewer')->attempt($credentials)) {
            return redirect()->intended('reviewer/home')
                        ->withSuccess('Signed in');
        }
   
        return redirect()->back()->with('error','invalid information'); 
    } 

    public function logout(){
        Auth::guard('author')->logout();
        return redirect('/');
    }

    public function profile(){
        $email = Auth::guard('author')->user()->email;
        $author = DB::table('authors')
        ->select('email','first_name','last_name','age','n_tele','biographie','created_at','updated_at','pic')
        ->where('email','=',$email)
        ->get();
        
     
        return view('dashboard.author.profile')->with('author',$author);
    }

    public function edit_profile(){
        $email = Auth::guard('author')->user()->email;
        $author = DB::table('authors')
        ->select('email','first_name','last_name','age','n_tele','biographie','created_at','updated_at','pic')
        ->where('email','=',$email)
        ->get();
        return view('dashboard.author.edit_profile')->with('author',$author);
    }

    public function ChangeProfile(Request $request){

        $mail1 = Auth::guard('author')->user()->email;
        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $email = $request->email;
        $age = $request->age;
        $biographie = $request->biographie;
        $n_tele = $request->n_tele;
        $img = $request->picture;

        if ($request->hasFile('picture')){
           $destination_pic_path = 'public/images/authors';     
           $image_name = $request->first_name.'.'.$request->picture->extension();
           $path_name = $request->file('picture')->storeAs($destination_pic_path,$image_name);
        }


        DB::table('authors')
        ->where('email','=',$mail1)
        ->update(['first_name'=>$first_name,
                  'last_name'=>$last_name,
                  'email'=>$email,
                  'age'=>$age,
                  'biographie'=>$biographie,
                  'n_tele'=>$n_tele,
                  'pic'=>'ee'
        ]);
        $mail2 = Auth::guard('author')->user()->email;  
        $author = DB::table('authors')
        ->select('email','first_name','last_name','age','n_tele','biographie','created_at','updated_at','pic')
        ->where('email','=',$mail2)
        ->get();
        return view('dashboard.author.profile')->with('author',$author);
        

    }
}
