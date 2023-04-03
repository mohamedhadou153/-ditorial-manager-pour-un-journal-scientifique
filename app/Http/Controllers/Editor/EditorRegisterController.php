<?php

namespace App\Http\Controllers\Editor;

use App\Editors\Editor as EditorsEditor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Models\Editor;
use Illuminate\Session\Store;
//use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EditorRegisterController extends Controller
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
     * @return \App\Models\Author
     */



   public function create(Request $request){
    $request->validate([
        'first_name' => ['required', 'string', 'max:255'],
        'last_name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);

    $editor = new Editor();
    $editor->first_name = $request->first_name;
    $editor->last_name = $request->last_name;
    $editor->email = $request->email;
    $editor->password = Hash::make($request->password);
    $data = $editor->save();
    return redirect()->intended('editor/login');


    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

    
        $credentials = $request->only('email', 'password');
        if (Auth::guard('editor')->attempt($credentials)) {
            return redirect()->intended('editor/home')->withSuccess('Signed in');
           //return redirect()->back()->with('error','invalid information'); 
        }
   
        return redirect()->back()->with('error','invalid information'); 
    } 

    public function logout(){
        Auth::guard('editor')->logout();
        return redirect('/');
    }

    public function profile(){
        $email = Auth::guard('editor')->user()->email;
        $editor = DB::table('editors')
        ->select('*')
        ->where('email','=',$email)
        ->get();
        
     
        return view('dashboard.editor.profile')->with('editor',$editor);
    }

    public function edit_profile(){
        $email = Auth::guard('editor')->user()->email;
        $editor = DB::table('editors')
        ->select('email','first_name','password','last_name','age','n_tele','biographie','created_at','updated_at','pic')
        ->where('email','=',$email)
        ->get();
        return view('dashboard.editor.edit_profile')->with('editor',$editor);
    }

    public function ChangeProfile(Request $request){
        $mail1 = Auth::guard('editor')->user()->email;
        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $email = $request->email;
        $age = $request->age;
        $biographie = $request->biographie;
        $n_tele = $request->n_tele;

        $img = $request->picture;

       // if ($request->hasFile('picture')){
           $destination_pic_path = 'public/images/editors';     
           $image_name = $request->picture.'.'.$request->picture->extension();
           $path_name = $request->file('picture')->storeAs($destination_pic_path,$image_name);
       // }

        DB::table('editors')
        ->where('email','=',$mail1)
        ->update(['first_name'=>$first_name,
                  'last_name'=>$last_name,
                  'email'=>$email,
                  'age'=>$age,
                  'biographie'=>$biographie,
                  'n_tele'=>$n_tele,
                  'pic'=>$image_name
        ]);
        $mail2 = Auth::guard('editor')->user()->email;  
        $editor = DB::table('editors')
        ->select('email','first_name','last_name','age','n_tele','biographie','created_at','updated_at')
        ->where('email','=',$mail2)
        ->get();
        return view('dashboard.editor.profile')->with('editor',$editor);
        

    }
    public function change_profile(Request $request){
        $mail1 = Auth::guard('editor')->user()->email;
        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $email = $request->email;
        $age = $request->age;
        $biographie = $request->biographie;
        $n_tele = $request->n_tele;

        $img = $request->picture;

       // if ($request->hasFile('picture')){
           $destination_pic_path = 'public/images/editor';     
           $image_name = $request->picture.'.'.$request->picture->extension();
           $path_name = $request->file('picture')->storeAs($destination_pic_path,$image_name);
       // }

        DB::table('editors')
        ->where('email','=',$mail1)
        ->update(['first_name'=>$first_name,
                  'last_name'=>$last_name,
                  'email'=>$email,
                  'age'=>$age,
                  'biographie'=>$biographie,
                  'n_tele'=>$n_tele,
                  'pic'=>$image_name
        ]);
        $mail2 = Auth::guard('editor')->user()->email;  
        $editor = DB::table('editors')
        ->select('email','first_name','last_name','age','n_tele','biographie','created_at','updated_at')
        ->where('email','=',$mail2)
        ->get();
        return view('dashboard.editor.profile')->with('editor',$editor);
        
    }

    public function change_password(Request $request){
        if (Hash::check($request->pass_old , Auth::guard('editor')->user()->password)) {
            DB::table('editors')
            ->where('email','=',Auth::guard('editor')->user()->email)
            ->update(['password'=>hash::make($request->pass_new)]);
        }

        if(!(Hash::check($request->pass_old , Auth::guard('editor')->user()->password))){
            return redirect()->back()->with('error','invalid information');
        }

        $editor = DB::table('editors')
        ->select('email','first_name','last_name','age','n_tele','biographie','created_at','updated_at','pic')
        ->where('email','=',Auth::guard('editor')->user()->email)
        ->get();
        return view('dashboard.editor.profile')->with('editor',$editor);

    }
}