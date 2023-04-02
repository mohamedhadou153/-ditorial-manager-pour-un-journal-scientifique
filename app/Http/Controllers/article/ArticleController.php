<?php

namespace App\Http\Controllers\article;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Author;
use App\Models\Editor;
use App\Models\Reviewer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class ArticleController extends Controller
//articles functions
{
    //author functions 
    public function index_create_article(){
        return view('dashboard.author.article.create_article'); 
    }
    
    public function Create(Request $request){
        //  $request->validate([
        //      'title'=>['required','string'],
        //      'category'=>['required','string'],
        //      'abstract'=>['required','string'],
        //      'obj_pdf'=>'mimes:pdf',
        //      'pic'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048',                        
        //  ]);

        //if ($request->hasFile('obj_pdf') && $request->hasFile('pic')) {

            $destination_pdf_path = 'public/pdf/articles';     
            $pdf_name = $request->title.'.'.'pdf';
            $path_pdf = $request->file('obj_pdf')->storeAs($destination_pdf_path,$pdf_name);

            $destination_pic_path = 'public/images/articles';     
            $image_name = $request->title.'.'.'jpg';
            $path_name = $request->file('pic')->storeAs($destination_pic_path,$image_name);


            //category select
            $category = 'Not Selected';
            if ($request->category == 1) {$category = 'Informatique';}
            if ($request->category == 2) {$category = 'Physique';}
            if ($request->category == 3) {$category = 'Biologie';}

            //type select
            $type = 'Not Selected';
            if ($request->type1 != 1 && $request->type2 == 4 && $request->type3 == 9) {
                if ($request->type1 == 2) {$type = 'Data sience';}
                if ($request->type1 == 3) {$type = 'Web devlopement';}
                if ($request->type1 == 4) {$type = 'Security System';}
            }
            if ($request->type2 != 5 && $request->type1 == 1 && $request->type3 == 9) {
                if ($request->type2 == 6) {$type = 'Mecanique classique';}
                if ($request->type2 == 7) {$type = 'Mecanique quantique';}
                if ($request->type2 == 8) {$type = 'Mecanique fleuide';}
            }
            if ($request->type3 != 9 && $request->type1 == 1 && $request->type2 == 5) {
                if ($request->type3 == 10) {$type = 'Humane mecanisme';}
                if ($request->type3 == 11) {$type = 'Humane mecanisme';}
                if ($request->type3 == 12) {$type = 'Humane mecanisme';}
            }


            $article = new article();
            $article->title = $request->title;
            $article->category = $category;
            $article->abstract = $request->abstract;
            $article->nbrfigure = $request->nbrfigure;
            $article->obj_pdf = $pdf_name;
            $article->pic = $image_name;
            $article->authorId = auth::user()->email;
            $article->etat  = 'libre';
            $article->type = $type;
            $data = $article->save();
       // } 
      return redirect('/author/home');
    }

    public function index_show_libre_article(){
        $authId = auth::user()->email;
        $articles = DB::table('articles')
        ->select('*')
        ->where('authorID','=',$authId)->where('etat','=','libre')
        ->where('editorId','=',null)
        ->get();
        return view('dashboard.author.article.show_traitement_article')->with('articles',$articles);
    }

    public function index_show_traitement_article(){
        $authId = auth::user()->email;
        $articles = DB::table('articles')
        ->select('*')
        ->where('authorID','=',$authId )
        ->where('etat','!=','accept')
        ->where('etat','!=','refuse')
        ->get();
        return view('dashboard.author.article.show_traitement_article')->with('articles',$articles);
    }

    public function index_show_refuse_article(){
        $authId = auth::user()->email;
        $articles = DB::table('articles')
        ->select('*')
        ->where('authorID','=',$authId)
        ->where('etat','=','refuse')
        ->get();
        return view('dashboard.author.article.show_refuse_article')->with('articles',$articles);
    }

    public function index_show_accept_article(){
        $authId = auth::user()->email;
        $articles = DB::table('articles')
        ->select('*')
        ->where('authorID','=',$authId)
        ->where('etat','=','accept')
        ->get();
        return view('dashboard.author.article.show_accept_article')->with('articles',$articles);
    }



    //editor functions
    public function show_libre_article(){
        $articles = DB::table('articles')
        ->select('id','title','category','etat','authorId','editorId','reviewer1Id','reviewer2Id','abstract','pic')
        ->where('etat','=','libre')
        ->where('editorId','=',null)
        ->get();
        return view('dashboard.editor.article.show_libre_article')->with('articles',$articles);
    }

    public function article_traitement(){
        $req = auth::guard('editor')->user()->email;
        $articles = DB::table('articles')
        ->select('*')
        ->where('etat','=','traitement')
        ->where('editorId','=',$req)
        ->get();
        
        return view('dashboard.editor.article.validation_article')->with('articles',$articles)->with('req',$req);
    }

    public function validation_article($id){
        $editorId = auth::guard('editor')->user()->email;
        $req = $id;     

        DB::table('articles')->where('id',$req)
        ->update(['etat'=> 'traitement','updated_at'=>date('d-m-y h:i:s')]);

        DB::table('articles')->where('id',$req)
        ->update(['editorId'=> $editorId]);

        $article = DB::table('articles')
        ->select('*')
        ->where('etat','=','traitement')
        ->where('editorId','=',$editorId)
        ->get();
        return view('dashboard.editor.home')->with('articles',$article);
    }

    public function send_to_reviewers(Request $request){
        $req1 = auth::guard('editor')->user()->email;
        $req = $request->id;

        DB::table('articles')->where('id',$req)
        ->update(['etat'=> 'traitement','updated_at'=>date('d-m-y h:i:s')]);

        DB::table('articles')->where('id',$req)
        ->update(['editorId'=> $req1]);

        $articles = DB::table('articles')
        ->select('*')
        ->where('id','=',$req)
        ->get();

        $reviewers = DB::table('reviewers')->select('*')->where('status','active')->get();

        return view('dashboard.editor.article.send_to_reviewers')->with('id',$req)->with('reviewers',$reviewers)->with('articles',$articles);
    }

    public function update_etat(Request $request){
        
        //$request->validate(['id'=>'required']);
        $editorId = auth::guard('editor')->user()->email;
        $id = $request->id;
        $etat = $request->etat;

        DB::table('articles')
        ->where('id',$id)
        ->update(['etat'=> $etat,'editorId'=>$editorId,'updated_at'=>date('d-m-y h:i:s')]);
        return view('dashboard.editor.home');
    }

    public function SendToReviewers(Request $request){
        $reveiwer1Id = $request->reveiwer1Id;
        $reveiwer2Id = $request->reveiwer2Id;
        $id = $request->id;
        if ($reveiwer1Id) {
            DB::table('articles')
            ->where('id',$id)
            ->update(['reviewer1Id'=> $reveiwer1Id,'updated_at'=>date('d-m-y h:i:s')]);
        }
        if ($reveiwer2Id) {
            DB::table('articles')
            ->where('id',$id)
            ->update(['reviewer2Id'=> $reveiwer2Id,'updated_at'=>date('d-m-y h:i:s')]); 
        }
       
        return view('dashboard.editor.home');
    }   
    
    public function Show_Review(){

        $articles = DB::table('articles')
        ->select('id','title','category','etat','authorId','editorId','reviewer1Id','reviewer2Id','review1','review2')
        ->where('etat','=','traitement')
        ->where('editorId','=',auth::guard('editor')->user()->email)
        ->where('review1','!=','')
        ->orWhere('review2','!=','') 
        ->get();
        return view ('dashboard.editor.article.show_review')->with('articles',$articles);
    }




    //reviewer functions
    public function review_commande(Request $request){
        $rev = auth::guard('reviewer')->user()->email;
        $reviewerId = $request->email;
        $articles = DB::table('articles')
        ->select('*')
        ->where('etat','traitement')
        ->where('reviewer1Id','=',$rev)->orwhere('reviewer2Id','=',$rev)
        ->get();
        return view('dashboard.reviewer.home')->with('articles',$articles);  
    }
    
    public function validation_review(Request $request){
        $rev = auth::guard('reviewer')->user()->email;
        $req = $request->id;
        $reviewer = DB::table('articles')->select('rev_active')->where('id',$req)->get();
        foreach($reviewer as $reviewer){
        DB::table('articles')
        ->where('id',$req)
        ->update(['rev_active'=>$reviewer->rev_active.$rev.'accept']);
        }
        $articles = DB::table('articles')
        ->select('*')
        ->where('id','=',$req)
        ->get();
        return view('dashboard.reviewer.home')->with('articles',$articles);  
    }
    public function validation_refuse_review(Request $request){
        $rev = auth::guard('reviewer')->user()->email;
        $req = $request->id;
        $reviewer = DB::table('articles')->select('rev_active')->where('id',$req)->get();
        foreach($reviewer as $reviewer){
        DB::table('articles')
        ->where('id',$req)
        ->update(['rev_active'=>$reviewer->rev_active.$rev.'refusedev']);
        }
        $articles = DB::table('articles')
        ->select('*')
        ->where('id','=',$req)
        ->get();
        return view('dashboard.reviewer.home')->with('articles',$articles);  
    }

    public function creation_review(Request $request){
        $req = $request->id;
        $articles = DB::table('articles')
        ->select('*')
        ->where('id','=',$req)
        ->get();
        return view('dashboard.reviewer.article.creation_review')->with('articles',$articles);
    }

    public function review_section(Request $request){
        $req = $request->id;
        $articles = DB::table('articles')
        ->select('*')
        ->where('id','=',$req)
        ->get();
        return view('dashboard.reviewer.article.review_section')->with('articles',$articles);
    }

    public function SendToEditor(Request $request){
        $req = $request->art_id;
        $reviewer = auth::guard('reviewer')->user()->email;

        $review = $request->review;

        $rev = DB::table('articles')->select('rev_active')->where('id',$req)->get();
        foreach($rev as $rev){
          DB::table('articles')
             ->where('id','=',$req)
             ->where('reviewer1Id', $reviewer)
             ->update(['review1'=> $review,'updated_at'=>date('d-m-y h:i:s'),'rev_active'=>$rev->rev_active.'dev1','rev_des1'=>$request->rev_des]);

          DB::table('articles')
             ->where('id','=',$req)
             ->where('reviewer2Id', $reviewer)
             ->update(['review2'=> $review,'updated_at'=>date('d-m-y h:i:s'),'rev_active'=>$rev->rev_active.'dev2','rev_des2'=>$request->rev_des]);
        }
        return view('dashboard.reviewer.home');

    }





    //home functions
    public function show_accept_article_home(){
       // DB::table('articles')->select('id','title','category','etat','authorId','abstract','editorId','reviewer1Id','reviewer2Id','review1')->where('etat','=','accept')->get();
       $articles =  DB::table('articles')
       ->join('authors','articles.authorId','=','authors.email')
       ->join('editors','articles.editorId','=','editors.email')
       ->join('reviewers','articles.reviewer1Id','=','reviewers.email')
      // ->join('reviewers as rev','articles.reviewer2Id','=','rev.email')
       ->select('articles.*',
                'authors.first_name as author_first_name',
                'authors.last_name as author_last_name',
                'editors.first_name as editor_first_name',
                'editors.last_name as editor_last_name',
                'reviewers.first_name as reviewer_first_name',
                'reviewers.last_name as reviewer_last_name')
       ->where('articles.etat','=','accept')
       ->get();
      // $var = var_dump($articles);
        return view ('welcome')->with('articles',$articles);//->with('var',$var);
    }

    public function shearch_article(Request $request){
        $output = "";
        $title = $request->title;
        $category = $request->category;

        if ($category != 'Category') {
                    $articles =  DB::table('articles')
        ->join('authors','articles.authorId','=','authors.email')
        ->join('editors','articles.editorId','=','editors.email')
        ->join('reviewers','articles.reviewer1Id','=','reviewers.email')
       // ->join('reviewers as rev','articles.reviewer2Id','=','rev.email')
        ->select('articles.*',
                 'authors.first_name as author_first_name',
                 'authors.last_name as author_last_name',
                 'editors.first_name as editor_first_name',
                 'editors.last_name as editor_last_name',
                 'reviewers.first_name as reviewer_first_name',
                 'reviewers.last_name as reviewer_last_name')
        ->where('articles.etat','=','accept')
        ->where('title','like','%'.$title.'%')
        ->where('category','=',$category)
        ->get();
        }else{
            $articles =  DB::table('articles')
            ->join('authors','articles.authorId','=','authors.email')
            ->join('editors','articles.editorId','=','editors.email')
            ->join('reviewers','articles.reviewer1Id','=','reviewers.email')
           // ->join('reviewers as rev','articles.reviewer2Id','=','rev.email')
            ->select('articles.*',
                     'authors.first_name as author_first_name',
                     'authors.last_name as author_last_name',
                     'editors.first_name as editor_first_name',
                     'editors.last_name as editor_last_name',
                     'reviewers.first_name as reviewer_first_name',
                     'reviewers.last_name as reviewer_last_name')
            ->where('articles.etat','=','accept')
            ->where('title','like','%'.$title.'%')
            ->get();
        }


        return view ('welcome')->with('articles',$articles);
    }
}
