<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Author\AuthorRegisterController;
use App\Http\Controllers\Editor\EditorRegisterController;
use App\Http\Controllers\Reviewer\ReviewerRegisterController;
use App\Http\Controllers\article\ArticleController;
use App\Http\Controllers\admin\AdminController;
use App\Models\Article;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::get('/',[ArticleController::class,'show_accept_article_home'])->name('libre-article');
Route::get('/search_article',[ArticleController::class,'shearch_article'])->name('search_article');
Route::get('contact', function () {
    return view('dashboard.contact.index');
})->name('contact');
//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('author')->name('author.')->group(function(){
    Route::middleware(['guest:author'])->group(function(){
        Route::view('/login','dashboard.author.login')->name('login');
        Route::view('/register','dashboard.author.register')->name('register');
        Route::view('/forget_password','dashboard.author.forget_password')->name('forget_password');
        Route::get('/submit_code',[AuthorRegisterController::class,'submit_code'])->name('submit_code');
        Route::get('/change_password',[AuthorRegisterController::class,'changepassword'])->name('change_password');
        Route::get('/do_change_password',[AuthorRegistercontroller::class,'dochangepassword'])->name('do_change_password');
        Route::get('/Login',[AuthorRegisterController::class,'Login'])->name('Login');
        Route::post('/Register',[AuthorRegisterController::class,'Register'])->name('Register');
        Route::post('/create',[AuthorRegisterController::class,'create'])->name('create');
        Route::post('/customLogin',[AuthorRegisterController::class,'customLogin'])->name('customLogin');
        Route::view('/verifier_compte','dashboard.author.verifier_compte')->name('verifier_compte');
        Route::get('/do_verifier_compte',[AuthorRegisterController::class,'verifier_compte'])->name('do_verifier_compte');

    });
    Route::middleware(['auth:author'])->group(function(){
        Route::view('/home','dashboard.author.home')->name('home');
        
        Route::post('/logout',[AuthorRegisterController::class,'logout'])->name('logout');
        Route::get('/profile',[AuthorRegisterController::class,'profile'])->name('profile');
        Route::get('/edit-profile',[AuthorRegisterController::class,'edit_profile'])->name('edit-profile');
        Route::get('/update-article',[ArticleController::class,'show_update'])->name('update-article');
        Route::get('/update/{id}',[ArticleController::class,'update'])->name('update');
        Route::post('/do_update',[ArticleController::class,'do_update'])->name('do_update');
        Route::post('/change-profile',[AuthorRegisterController::class,'ChangeProfile'])->name('change_profile');
        Route::post('/change-password',[AuthorRegisterController::class,'change_password'])->name('change-password');
        Route::get('/password',[AuthorRegisterController::class,'password'])->name('password');
        Route::post('/uploade',[ArticleController::class,'Create'])->name('uploade');
        Route::get('/create-article',[ArticleController::class,'index_create_article'])->name('create-article');
        Route::get('/traitement-article',[ArticleController::class,'index_show_traitement_article'])->name('traitement-article');
        Route::get('/accept-article',[ArticleController::class,'index_show_accept_article'])->name('accept-article');
        Route::get('/refuse-article',[ArticleController::class,'index_show_refuse_article'])->name('refuse-article');
        Route::get('/libre-article',[ArticleController::class,'index_show_libre_article'])->name('libre-article');
      

    });
});

Route::prefix('editor')->name('editor.')->group(function(){
    Route::middleware(['guest:editor'])->group(function(){
        Route::view('/login','dashboard.editor.login')->name('login');
        Route::view('/register','dashboard.editor.register')->name('register');
        Route::view('/cv','dashboard.editor.cv')->name('cv');
        Route::post('/create',[EditorRegisterController::class,'create'])->name('create');
        Route::post('/customLogin',[EditorRegisterController::class,'customLogin'])->name('customLogin');
        Route::view('/forget_password','dashboard.editor.forget_password')->name('forget_password');
        Route::get('/submit_code',[EditorRegisterController::class,'submit_code'])->name('submit_code');
        Route::get('/change_pass',[EditorRegisterController::class,'changepassword'])->name('change_pass');
        Route::get('/do_change_password',[EditorRegisterController::class,'dochangepassword'])->name('do_change_password');
        Route::view('/verifier_compte','dashboard.editor.verifier_compte')->name('verifier_compte');
        Route::get('/do_verifier_compte',[EditorRegisterController::class,'verifier_compte'])->name('do_verifier_compte');
    });
    Route::middleware(['auth:editor'])->group(function(){
        Route::view('/home','dashboard.editor.home')->name('home');
        Route::view('/revision-complete','dashboard.editor.article.revesion_complete')->name('revision-complete');
        Route::view('/soumision-a-reviser','dashboard.editor.article.soumision_a_reviser')->name('soumision_a_reviser');
        Route::view('/revision-incomplete','dashboard.editor.article.revesion-incomplete')->name('revision-incomplete');
        Route::view('/aucune-réponse','dashboard.editor.article.aucune_réponse')->name('aucune-réponse');
        Route::view('/invitation-refuse','dashboard.editor.article.invitation_refuse')->name('invitation-refuse');
        Route::post('/pdf-cv',[EditorRegisterController::class,'CV'])->name('pdf-cv');
        Route::post('/logout',[EditorRegisterController::class,'logout'])->name('logout');
        Route::get('/libre-article',[ArticleController::class,'show_libre_article'])->name('libre-article');
        Route::get('/validation-article/{id}',[ArticleController::class,'validation_article'])->name('validation-article');
        Route::get('/update-etat',[ArticleController::class,'update_etat'])->name('update-etat');
        Route::get('/SendToReviewers',[ArticleController::class,'SendToReviewers'])->name('SendToReviewers');
        Route::get('/Redécider',[ArticleController::class,'redecider'])->name('redecider');
        Route::get('/SendToReviewer',[ArticleController::class,'SendToReviewer'])->name('SendToReviewer');
        Route::get('/show-review',[ArticleController::class,'Show_Review'])->name('show-review');
        Route::get('/article-traitement',[ArticleController::class,'article_traitement'])->name('article-traitement');
        Route::get('/final-decision',[ArticleController::class,'final_decision'])->name('final_decision');
        Route::get('/send-to-reviewers',[ArticleController::class,'send_to_reviewers'])->name('send-to-reviewers');
        Route::get('/profile',[EditorRegisterController::class,'profile'])->name('profile');
        Route::get('/edit-profile',[EditorRegisterController::class,'edit_profile'])->name('edit-profile');
        Route::post('/change-profile',[EditorRegisterController::class,'ChangeProfile'])->name('change_profile');
        Route::post('/change-password',[EditorRegisterController::class,'change_password'])->name('change-password');
        Route::get('/password',[EditorRegisterController::class,'password'])->name('password');



    });
});

Route::prefix('reviewer')->name('reviewer.')->group(function(){
    Route::middleware(['guest:reviewer'])->group(function(){
        Route::view('/login','dashboard.reviewer.login')->name('login');
        Route::view('/register','dashboard.reviewer.register')->name('register');
        Route::view('/cv','dashboard.reviewer.cv')->name('cv');
        Route::post('/create',[ReviewerRegisterController::class,'create'])->name('create');
        Route::post('/dologin',[ReviewerRegisterController::class,'dologin'])->name('dologin');
        Route::post('/customLogin',[ReviewerRegisterController::class,'customLogin'])->name('customLogin');
        Route::view('/forget_password','dashboard.reviewer.forget_password')->name('forget_password');
        Route::get('/submit_code',[ReviewerRegisterController::class,'submit_code'])->name('submit_code');
        Route::get('/change_pass',[ReviewerRegisterController::class,'changepassword'])->name('change_pass');
        Route::get('/do_change_password',[ReviewerRegisterController::class,'dochangepassword'])->name('do_change_password');
        Route::view('/verifier_compte','dashboard.reviewer.verifier_compte')->name('verifier_compte');
        Route::get('/do_verifier_compte',[ReviewerRegisterController::class,'verifier_compte'])->name('do_verifier_compte');
        
    });
    Route::middleware(['auth:reviewer'])->group(function(){
        Route::view('/home','dashboard.Reviewer.home')->name('home');
        Route::view('/validation-section','dashboard.reviewer.article.validate_review')->name('validation-section');
        Route::view('/invitation-confirmer','dashboard.reviewer.article.review_confirme')->name('review-confirme');
        Route::post('/logout',[ReviewerRegisterController::class,'logout'])->name('logout');
        Route::get('/review-commande',[ArticleController::class,'review_commande'])->name('review-commande');
        Route::post('/pdf-cv',[ReviewerRegisterController::class,'CV'])->name('pdf-cv');
        Route::get('/creation-review',[ArticleController::class,'creation_review'])->name('creation-review');
        Route::get('/validation-review',[ArticleController::class,'validation_review'])->name('validation-review');
        Route::get('/validation-refuse-review',[ArticleController::class,'validation_refuse_review'])->name('validation-refuse-review');
        Route::get('/review-section',[ArticleController::class,'review_section'])->name('review-section');
        Route::get('/SendToEditor',[ArticleController::class,'SendToEditor'])->name('SendToEditor');
        Route::get('/profile',[ReviewerRegisterController::class,'profile'])->name('profile');
        Route::get('/edit-profile',[ReviewerRegisterController::class,'edit_profile'])->name('edit-profile');
        Route::post('/change-profile',[ReviewerRegisterController::class,'ChangeProfile'])->name('change-profile');
        Route::post('/change-password',[ReviewerRegisterController::class,'change_password'])->name('change-password');
        Route::get('/password',[ReviewerRegisterController::class,'password'])->name('password');
    
    });
});


Route::prefix('admin')->name('admin.')->group(function(){
    Route::view('/home','dashboard.admin.home')->name('home');
    Route::get('/authors',[AdminController::class,'get_authors'])->name('authors');
    Route::get('/editors',[AdminController::class,'get_editors'])->name('editors');
    Route::get('/reviewers',[AdminController::class,'get_reviewers'])->name('reviewers');
    Route::get('/new_editors',[AdminController::class,'get_new_editors'])->name('new_editors');
    Route::get('/new_reviewers',[AdminController::class,'get_new_reviewers'])->name('new_reviewers');
    Route::get('/articles_accept',[AdminController::class,'articles_accept'])->name('articles_accept');
    Route::get('/articles_refuse',[AdminController::class,'articles_refuse'])->name('articles_refuse');
    Route::get('/articles_revise',[AdminController::class,'articles_revise'])->name('articles_revise');
    Route::get('/articles_libre',[AdminController::class,'articles_libre'])->name('articles_libre');
    Route::get('/articles_traitement',[AdminController::class,'articles_traitement'])->name('articles_traitement');
    Route::get('/accept-editor/{id}',[AdminController::class,'accept_editor'])->name('accept-editor');
    Route::get('/refuse-editor/{id}',[AdminController::class,'refuse_editor'])->name('refuse-editor');
    Route::get('/accept-reviewer/{id}',[AdminController::class,'accept_reviewer'])->name('accept-reviewer');
    Route::get('/refuse-reviewer/{id}',[AdminController::class,'refuse_reviewer'])->name('refuse-reviewer');
    Route::get('/contacts',[AdminController::class,'contacts'])->name('contacts');
    Route::get('/set_contacts',[AdminController::class,'set_contacts'])->name('set_contacts');


    



});

/*Route::prefix('article')->name('article.')->group(function(){
    Route::get('/uploade',[ArticleController::class,'uploade'])->name('uploade');
});*/