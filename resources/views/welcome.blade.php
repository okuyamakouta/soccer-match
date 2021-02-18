@extends('layouts.app')

@section('content')
 <div class="center jumbotron">
     
        <div class="text-center">
        <h1>Soccer-Match</h1>
        <h2><font size="5">このサイトはサッカーの試合をしたいチーム同士が対戦を申し込んでマッチングするためのものです。</font></h2>
        {{--新規登録ページへのリンク--}}
        {!! link_to_route('signup.get', '新規登録', [], ['class' => 'btn btn-lg btn-primary']) !!}
        </div>
        
        
        
 </div>
 @endsection