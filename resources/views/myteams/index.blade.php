@extends('layouts.app')

@section('content')
<div class="col-sm-8">
    {{--タブ--}}
    @include('myteams.navtabs')
<table class="table table-striped table-bordered"　 class="mt-4">
<thead>
    <tr>
        <th>チーム名</th>
    </tr>
</thead>
<tbody>
    <tr>
        <td>{{optional($user)->name}}</td>
    </tr>
</tbody>
<thead>
    <tr>
        <th>自己紹介文</th>
    </tr>
</thead>
<tbody>
    <tr>
        <td>{{optional($introduce)->introduce}}</td>
    </tr>
</tbody>
</div>
@endsection