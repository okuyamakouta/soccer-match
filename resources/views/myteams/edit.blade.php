@extends('layouts.app')

@section('content')
<div class="text-center">
    <h1>プロフィール編集</h1>
</div>
<div class="row">
    <div class="col-sm-6 offset-sm-3">
        {!! Form::open(['route' => ['myteams.update', $user->id], 'method' => 'put']) !!}
        
        <div class="form-group">
            {!! Form::label('name' , 'チーム名') !!}
            {!! Form::text('name', $user->name,['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('introduce', 'チーム紹介文') !!}
            {!! Form::text('introduce', $introduce->introduce,['class' => 'form-control' ]) !!}
        </div>
        
        {!! Form::submit('編集', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>

@endsection