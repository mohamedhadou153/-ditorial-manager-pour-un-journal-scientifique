<?php

namespace App\Http\Controllers\Reviewer;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';

use Illuminate\Support\Facades\Mail;
use App\Mail\TestEmail;


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

        $etats = DB::table('reviewers')->select('etat')->where('email','=',$request->email)->get();
        foreach($etats as $etat){
            $etat = $etat;
        }       
    
        $credentials = $request->only('email', 'password');
        if (Auth::guard('reviewer')->attempt($credentials)){

            if ($etat->etat == 'accept') {
                return redirect()->intended('reviewer/home');
            }else{return redirect()->intended('reviewer/cv');}         
        }
   
        return redirect()->back()->with('error','invalid information'); 
    } 

    public function CV(Request $request){
        $pdf = $request->pdf;
        $id = auth::guard('reviewer')->user()->email;
        $name = Auth::guard('reviewer')->user()->first_name;

        $destination_pic_path = 'public/pdf/cv/reviewers';     
        $pdf_name = $name.'.'.$pdf->extension();
        $path_name = $request->file('pdf')->storeAs($destination_pic_path,$pdf_name);

        DB::table('reviewers')
        ->where('email',$id)
        ->update([
            'pdf'=>$pdf_name,
            'etat'=>'traitement',
        ]);

        Auth::guard('reviewer')->logout();
        return view('dashboard.reviewer.login');

    }

    public function logout(){
        Auth::guard('reviewer')->logout();
        return redirect('/');
    }

    public function profile(){
        $email = Auth::guard('reviewer')->user()->email;
        $reviewer = DB::table('reviewers')
        ->select('*')
        ->where('email','=',$email)
        ->get();
        
     
        return view('dashboard.reviewer.profile')->with('reviewer',$reviewer);
    }

    public function edit_profile(){
        $email = Auth::guard('reviewer')->user()->email;
        $reviewer = DB::table('reviewers')
        ->select('*')
        ->where('email','=',$email)
        ->get();
        return view('dashboard.reviewer.edit_profile')->with('reviewer',$reviewer);
    }


    public function ChangeProfile(Request $request){
        $mail1 = Auth::guard('reviewer')->user()->email;
        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $email = $request->email;
        $age = $request->age;
        $biographie = $request->biographie;
        $n_tele = $request->n_tele;
        $img = $request->picture;


        if ($request->hasFile('picture')){
        $destination_pic_path = 'public/images/reviewers';     
        $image_name = $request->first_name.'.'.$request->picture->extension();
        $path_name = $request->file('picture')->storeAs($destination_pic_path,$image_name);
        DB::table('reviewers')
        ->where('email','=',$mail1)
        ->update(['pic'=>$image_name ]);
     }

        DB::table('reviewers')
        ->where('email','=',$mail1)
        ->update(['first_name'=>$first_name,
                  'last_name'=>$last_name,
                  'email'=>$email,
                  'age'=>$age,
                  'biographie'=>$biographie,
                  'n_tele'=>$n_tele,
        ]);
        $mail2 = Auth::guard('reviewer')->user()->email;  
        $reviewer = DB::table('reviewers')
        ->select('*')
        ->where('email','=',$mail2)
        ->get();
        return view('dashboard.reviewer.profile')->with('reviewer',$reviewer);
        

    }

    public function change_password(Request $request){
        if (Hash::check($request->pass_old , Auth::guard('reviewer')->user()->password)) {
            DB::table('reviewers')
            ->where('email','=',Auth::guard('reviewer')->user()->email)
            ->update(['password'=>hash::make($request->pass_new)]);
        }

        if(!(Hash::check($request->pass_old , Auth::guard('reviewer')->user()->password))){
            return redirect()->back()->with('error','invalid information');
        }

        $reviewer = DB::table('reviewers')
        ->select('email','first_name','last_name','age','n_tele','biographie','created_at','updated_at','pic')
        ->where('email','=',Auth::guard('reviewer')->user()->email)
        ->get();
        return view('dashboard.reviewer.profile')->with('reviewer',$reviewer);

    }

    public function password(){
        $email = Auth::guard('reviewer')->user()->email;
        $reviewer = DB::table('reviewers')
        ->select('email','first_name','password','last_name','age','n_tele','biographie','created_at','updated_at','pic')
        ->where('email','=',$email)
        ->get();
        return view('dashboard.reviewer.change_password')->with('reviewer',$reviewer);
    }



    public function submit_code( Request $req){
        $email = $req->email;
        $code = rand(100000,999999);
        $emails = DB::table('reviewers')->select('email')->get();
        $count = 0;
        foreach($emails as $m){
            if($m->email == $email){
                $count++;
            }
        }
        if($count == 1){
            DB::table('reviewers')
            ->where('email','=',$email)
            ->update(['code'=>$code]);
            $subject = $code."est votre code de récupération de compte BrandArticle";
            $object = '<h1>Bonjour</h1> <br> <h3>Nous avons reçu une demande de réinitialisation de votre mot de passe Facebook.<br>
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
            //----------------------------
            // $data = [
            //     'subject'=>$subject,
            //     'body'=>$object,
            // ];
            // try {
            //    Mail::to($email)->send(new TestEmail($data));
            // } catch (\Throwable $th) {
            //     //throw $th;
            // }
            //--------------------------
           // mail($email,$subject,$object,'From:hadoumohamed153@gmail.com');
            return view('dashboard.reviewer.submit_code')->with('email',$email)->with('code',$code);
        }else{
            return redirect()->back()->with('error','invalid email');
        }    
    }

    public function changepassword(Request $req){
        $code = $req->code;
        $email = $req->email;
        $corr_code = DB::table('reviewers')->select('code')->where('email',$email)->get();
        foreach($corr_code as $c){
            if ($c->code == $code){
                return view('dashboard.reviewer.chang_pass')->with('email',$email);
            }else{
                return redirect()->back()->with('error','Code invalide, nous avons renvoyé un autre code à votre boite email');
            }
        }
    }

    public function dochangepassword(Request $req){
        $email = $req->email;
        $password = $req->password;
        $conf_password = $req->conf_password;

        if($conf_password == $password){
            DB::table('reviewers')
            ->where('email','=',$email)
            ->update(['password'=>Hash::make($password)]);   
            return view('dashboard.reviewer.login')->with('email',$email);   
        }else{
            return redirect()->back()->with('error','Mot de passe incorrect');
        }
    }
}
