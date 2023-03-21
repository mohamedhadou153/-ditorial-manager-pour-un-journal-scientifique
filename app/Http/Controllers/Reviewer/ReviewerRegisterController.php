<?php

namespace App\Http\Controllers\Reviewer;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Models\Reviewer;
use Illuminate\Session\Store;
//use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewerRegisterController extends Controller
{

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Reviewer
     */



   public function create(Request $request){
    $request->validate([
        'first_name' => ['required', 'string', 'max:255'],
        'last_name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);

    $author = new Reviewer();
    $author->first_name = $request->first_name;
    $author->last_name = $request->last_name;
    $author->email = $request->email;
    $author->password = Hash::make($request->password);
    $data = $author->save();
    return redirect()->intended('reviewer/login');


    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

    
        $credentials = $request->only('email', 'password');
        if (Auth::guard('reviewer')->attempt($credentials)) {
            return redirect()->intended('reviewer/home')
                        ->withSuccess('Signed in');
        }
   
        return redirect()->back()->with('error','invalid information'); 
    } 

    public function logout(){
        Auth::guard('reviewer')->logout();
        return redirect('/');
    }

    public function profile(){
        $email = Auth::guard('reviewer')->user()->email;
        $reviewer = DB::table('reviewers')
        ->select('email','first_name','last_name','age','n_tele','biographie','created_at','updated_at')
        ->where('email','=',$email)
        ->get();
        
     
        return view('dashboard.reviewer.profile')->with('reviewer',$reviewer);
    }

    public function ChangeProfile(Request $request){
        $mail1 = Auth::guard('reviewer')->user()->email;
        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $email = $request->email;
        $age = $request->age;
        $biographie = $request->biographie;
        $n_tele = $request->n_tele;

        DB::table('reviewers')
        ->where('email','=',$mail1)
        ->update(['first_name'=>$first_name,
                  'last_name'=>$last_name,
                  'email'=>$email,
                  'age'=>$age,
                  'biographie'=>$biographie,
                  'n_tele'=>$n_tele
        ]);
        $mail2 = Auth::guard('reviewer')->user()->email;  
        $reviewer = DB::table('reviewers')
        ->select('email','first_name','last_name','age','n_tele','biographie','created_at','updated_at')
        ->where('email','=',$mail2)
        ->get();
        return view('dashboard.reviewer.profile')->with('reviewer',$reviewer);
        

    }
}
