@extends('dashboard.editor.header')
@section('style')
@vite('resources/css/app.css')
<?php use Illuminate\Support\Facades\DB; use Illuminate\Support\Facades\Auth;   $articles = DB::table('articles')->select('*')
        ->where('etat','!=','traitement')
        ->where('editorId',auth::guard('editor')->user()->email)
        ->where('reviewer1Id','!=', null)
        ->where('reviewer2Id','!=', null)
        ->get();?>
<h2>bonjour</h2>

@endsection