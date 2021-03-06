@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-8">
            {{-- タブ --}}
            @include('myteams.navtabs')
            {{-- ユーザ一覧 --}}
            @include('users.users')
            @include('myteams.followers_users')
        </div>
</div>
@endsection