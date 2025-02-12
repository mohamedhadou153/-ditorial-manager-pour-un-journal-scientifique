<?php

namespace App\Http\Controllers\Author;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';


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

    public function Login(){
        return redirect('author/login');
    }


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
    $email =  $request->email;

    $code = rand(100000,999999);
    DB::table('authors')
    ->where('email','=',$email)
    ->update(['code'=>$code]);
    $subject = $code."est votre code de Verification de compte BrandArticle";
    $object = '<h1>Bonjour</h1> <br> <h3>Nous avons reçu une demande de verification de votre compte BrandArticle.<br>
    Entrez le code de verification suivant :</h3><br><h1 >'.$code.'</h1>';
    //--------------------------

        $mail = new PHPMailer();
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'hadoumohamed153@gmail.com';                     //SMTP username
        $mail->Password   = 'rbpiplorfernllwc';                               //SMTP password
        $mail->SMTPSecure = "ssl";            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('BrandArticle@gmail.com', 'BrandArticle');
        $mail->addAddress($email);     //Add a recipient

        
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->CharSet="UTF-8";
        $mail->Subject = $subject;
        $mail->Body    = $object;
        $mail->send();
    return redirect()->intended('author/verifier_compte')->with('email',$email);
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

    
        $credentials = $request->only('email', 'password');
        if (Auth::guard('author')->attempt($credentials)) {
            $articles = DB::table('articles')->select('*')->where('authorId',Auth::guard('author')->user()->email)->get();
            // return view('dashboard.author.home',compact('articles'));
            return view('dashboard.author.home')->with('articles',$articles);
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
        ->select('email','first_name','password','last_name','age','n_tele','biographie','created_at','updated_at','pic')
        ->where('email','=',$email)
        ->get();
        return view('dashboard.author.edit_profile')->with('author',$author);
    }

    public function password(){
        $email = Auth::guard('author')->user()->email;
        $author = DB::table('authors')
        ->select('email','first_name','password','last_name','age','n_tele','biographie','created_at','updated_at','pic')
        ->where('email','=',$email)
        ->get();
        return view('dashboard.author.change_pass')->with('author',$author)->with('email',$email);
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
           DB::table('authors')
           ->where('email','=',$mail1)
           ->update(['pic'=>$image_name ]);
        }


        DB::table('authors')
        ->where('email','=',$mail1)
        ->update(['first_name'=>$first_name,
                  'last_name'=>$last_name,
                  'email'=>$email,
                  'age'=>$age,
                  'biographie'=>$biographie,
                  'n_tele'=>$n_tele,        
        ]);
        $mail2 = Auth::guard('author')->user()->email;  
        $author = DB::table('authors')
        ->select('email','first_name','last_name','age','n_tele','biographie','created_at','updated_at','pic')
        ->where('email','=',$mail2)
        ->get();
        return view('dashboard.author.profile')->with('author',$author);
    }
    public function change_password(Request $request){
        if (Hash::check($request->pass_old , Auth::guard('author')->user()->password)) {
            DB::table('authors')
            ->where('email','=',Auth::guard('author')->user()->email)
            ->update(['password'=>hash::make($request->pass_new)]);
        }

        if(!(Hash::check($request->pass_old , Auth::guard('author')->user()->password))){
            return redirect()->back()->with('error','invalid information');
        }

        $author = DB::table('authors')
        ->select('email','first_name','last_name','age','n_tele','biographie','created_at','updated_at','pic')
        ->where('email','=',Auth::guard('author')->user()->email)
        ->get();
        return view('dashboard.author.profile')->with('author',$author);

    }
    
    public function submit_code( Request $req){
       
        $email = $req->email;
        $emails = DB::table('authors')->select('email')->get();
        $count = 0;
        foreach($emails as $m){
            if($m->email == $email){
                $count++;
            }
        }
        if($count == 1){
            $code = rand(100000,999999);
            DB::table('authors')
            ->where('email','=',$email)
            ->update(['code'=>$code]);
            $subject = $code."est votre code de récupération de compte BrandArticle";
            $object = '<h1>Bonjour</h1> <br> <h3>Nous avons reçu une demande de réinitialisation de votre mot de passe BrandArticle Espace Auteur.<br>
            Entrez le code de réinitialisation du mot de passe suivant :</h3><br><h1 >'.$code.'</h1>';
            //--------------------------

                $mail = new PHPMailer();
                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'hadoumohamed153@gmail.com';                     //SMTP username
                $mail->Password   = 'rbpiplorfernllwc';                               //SMTP password
                $mail->SMTPSecure = "ssl";            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('BrandArticle@gmail.com', 'BrandArticle');
                $mail->addAddress($email);     //Add a recipient

                
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->CharSet="UTF-8";
                $mail->Subject = $subject;
                $mail->Body    = $object;
                $mail->send();
           
            return view('dashboard.author.submit_code')->with('email',$email)->with('code',$code);
        }else{
            return redirect()->back()->with('error','invalid email');
        }    
    }

    public function changepassword(Request $req){
        $code = $req->code;
        $email = $req->email;
        $corr_code = DB::table('authors')->select('code')->where('email',$email)->get();
        foreach($corr_code as $c){
            if ($c->code == $code){
                return view('dashboard.author.change_password')->with('email',$email);
            }else{
                return redirect()->back()->with('error','code invalide');
            }
        }
    }

    public function dochangepassword(Request $req){
        $email = $req->email;
        $password = $req->password;
        $conf_password = $req->conf_password;

        if($conf_password == $password){
            DB::table('authors')
            ->where('email','=',$email)
            ->update(['password'=>Hash::make($password)]);   
            return view('dashboard.author.login')->with('email',$email);   
        }else{
            return redirect()->back()->with('error','invalid password');
        }
    }


    public function verifier_compte(Request $req){
        $email = $req->email;
        $code  = $req->code;
        $corr_code = DB::table('authors')->select('code')->where('email',$email)->get();
        foreach($corr_code as $c){
            if ($c->code == $code){
                return view('dashboard.author.login')->with('email',$email);
            }else{
                return redirect()->back()->with('error',' code invalide');
            }
        }

    }
}
