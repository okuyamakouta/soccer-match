@extends('layouts.app')

@section('content')
<div class="text-center">
    <h1>プロフィール</h1>
</div>

<table class="table table-striped table-bordered"　 class="mt-4">
<thead>
    <tr>
        <th>チーム名</th>
    </tr>
</thead>
<tbody>
    <tr>
        <td>{{$user->name}}</td>
    </tr>
</tbody>
<thead>
    <tr>
        <th>自己紹介文</th>
    </tr>
</thead>
<tbody>
    <tr>
        <td>{{$user->introduce}}</td>
    </tr>
</tbody>

<div class="col-sm-3">
@include('user_follow.follow_button')
</div>

@endsection