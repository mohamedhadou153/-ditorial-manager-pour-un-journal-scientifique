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



            $article = new article();
            $article->title = $request->title;
            $article->category = $request->category;
            $article->abstract = $request->abstract;
            $article->obj_pdf = $pdf_name;
            $article->pic = $image_name;
            $article->authorId = auth::user()->email;
            $article->etat  = 'libre';
            $article->type = $request->type;
            $data = $article->save();
       // } 
      return redirect('/author/traitement-article');
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
        
        return view('dashboard.editor.article.traitement_article')->with('articles',$articles)->with('req',$req);
    }

    public function validation_article(Request $request){
        $editorId = auth::guard('editor')->user()->email;
        $req = $request->id;
        $req1 = $request->e;
        $article = DB::table('articles')
        ->select('*')
        ->where('id','=',$req)
        ->get();

        DB::table('articles')->where('id',$req)
        ->update(['etat'=> 'traitement']);

        DB::table('articles')->where('id',$req)
        ->update(['editorId'=> $editorId]);
        return view('dashboard.editor.article.validation_article')->with('articles',$article);
    }

    public function send_to_reviewers(Request $request){
        $req1 = auth::guard('editor')->user()->email;
        $req = $request->id;
        DB::table('articles')->where('id',$req)
        ->update(['etat'=> 'traitement']);
        DB::table('articles')->where('id',$req)
        ->update(['editorId'=> $req1]);
        $reviewers = DB::table('reviewers')->select('*')->where('status','active')->get();
        return view('dashboard.editor.article.send_to_reviewers')->with('id',$req)->with('reviewers',$reviewers);
    }

    public function update_etat(Request $request){
        
        //$request->validate(['id'=>'required']);
        $editorId = auth::guard('editor')->user()->email;
        $id = $request->id;
        $etat = $request->etat;

        DB::table('articles')
        ->where('id',$id)
        ->update(['etat'=> $etat,'editorId'=>$editorId]);
        return view('dashboard.editor.home');
    }

    public function SendToReviewers(Request $request){
        $reveiwer1Id = $request->reveiwer1Id;
        $reveiwer2Id = $request->reveiwer2Id;
        $id = $request->id;
        if ($reveiwer1Id) {
            DB::table('articles')
            ->where('id',$id)
            ->update(['reviewer1Id'=> $reveiwer1Id]);
        }
        if ($reveiwer2Id) {
            DB::table('articles')
            ->where('id',$id)
            ->update(['reviewer2Id'=> $reveiwer2Id]); 
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
        return view('dashboard.reviewer.article.review_commande')->with('articles',$articles);  
    }

    public function creation_review(Request $request){
        $req = $request->id;
        $articles = DB::table('articles')
        ->select('*')
        ->where('id','=',$req)
        ->get();
        return view('dashboard.reviewer.article.creation_review')->with('articles',$articles);
    }

    public function SendToEditor(Request $request){
        $reviewer = auth::guard('reviewer')->user()->email;
        $id_article = $request->id;
        $review = $request->review;
        
        DB::table('articles')
        ->where('id',$id_article)
            ->where('reviewer1Id', $reviewer)
       ->update(['review1'=> $review]);

       DB::table('articles')
       ->where('id',$id_article)
        ->where('reviewer2Id', $reviewer)
      ->update(['review2'=> $review]);

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
