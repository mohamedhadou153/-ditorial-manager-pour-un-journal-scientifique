<?php

namespace App\Http\Controllers\Editor;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';

use Illuminate\Support\Facades\Mail;
use App\Mail\TestEmail;

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

use function PHPUnit\Framework\equalTo;

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
     * @return \App\Models\editor
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
    $editor->etat = "attend";
    $data = $editor->save();
    $email =  $request->email;

    $code = rand(100000,999999);
    DB::table('editors')
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

    
        $etats = DB::table('editors')->select('etat')->where('email','=',$request->email)->get();
        foreach($etats as $etat){
            $etat = $etat;
        }       
        $credentials = $request->only('email', 'password');
        if (Auth::guard('editor')->attempt($credentials)) {


            if ($etat->etat == 'accept') {
              return redirect()->intended('editor/home');
            }else{return redirect()->intended('editor/cv');}      
        }
   
        return redirect()->back()->with('error','invalid information'); 
    } 

    public function CV(Request $request){
        $pdf = $request->pdf;
        $id = auth::guard('editor')->user()->email;
        $name = Auth::guard('editor')->user()->first_name;

        $destination_pic_path = 'public/pdf/cv/editors';     
        $pdf_name = $name.'.'.$pdf->extension();
        $path_name = $request->file('pdf')->storeAs($destination_pic_path,$pdf_name);

        DB::table('editors')
        ->where('email',$id)
        ->update([
            'pdf'=>$pdf_name,
            'etat'=>'traitement',
        ]);

        Auth::guard('reviewer')->logout();
        return view('dashboard.editor.login');

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

       if ($request->hasFile('picture')){
           $destination_pic_path = 'Editor';     
           $image_name = $request->picture.'.'.$request->picture->extension();
           $path_name = $request->file('picture')->storeAs($destination_pic_path,$image_name);
           DB::table('editors')
           ->where('email','=',$mail1)
           ->update(['pic'=>$image_name]);
       }

        DB::table('editors')
        ->where('email','=',$mail1)
        ->update(['first_name'=>$first_name,
                  'last_name'=>$last_name,
                  'email'=>$email,
                  'age'=>$age,
                  'biographie'=>$biographie,
                  'n_tele'=>$n_tele,
        ]);
        $mail2 = Auth::guard('editor')->user()->email;  
        $editor = DB::table('editors')
        ->select('*')
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

    public function password(){
        $email = Auth::guard('editor')->user()->email;
        $editor = DB::table('editors')
        ->select('email','first_name','password','last_name','age','n_tele','biographie','created_at','updated_at','pic')
        ->where('email','=',$email)
        ->get();
        return view('dashboard.editor.change_password')->with('editor',$editor);
    }

    


    public function submit_code( Request $req){
        $email = $req->email;
        $code = rand(100000,999999);
        $emails = DB::table('editors')->select('email')->get();
        $count = 0;
        foreach($emails as $m){
            if($m->email == $email){
                $count++;
            }
        }
        if($count == 1){
            DB::table('editors')
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
            return view('dashboard.editor.submit_code')->with('email',$email)->with('code',$code);
        }else{
            return redirect()->back()->with('error','invalid email');
        }    
    }

    public function changepassword(Request $req){
        $code = $req->code;
        $email = $req->email;
        $corr_code = DB::table('editors')->select('code')->where('email',$email)->get();
        foreach($corr_code as $c){
            if ($c->code == $code){
                return view('dashboard.editor.chang_pass')->with('email',$email);
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
            DB::table('editors')
            ->where('email','=',$email)
            ->update(['password'=>Hash::make($password)]);   
            return view('dashboard.editor.login')->with('email',$email);   
        }else{
            return redirect()->back()->with('error','Mot de passe incorrect');
        }
    }

    public function verifier_compte(Request $req){
        $email = $req->email;
        $code  = $req->code;
        $corr_code = DB::table('editors')->select('code')->where('email',$email)->get();
        foreach($corr_code as $c){
            if ($c->code == $code){
                return view('dashboard.author.login')->with('email',$email);
            }else{
                return redirect()->back()->with('error',' code invalide');
            }
        }

    }
}