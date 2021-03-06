@if(Auth::id() != $user->id)
    @if(Auth::user()->is_approving($user->id))
    {{--対戦を申し込む--}}
    {!! Form::open(['route' => ['approves.unapprove', $user->id], 'method' => 'delete']) !!}
            {!! Form::submit('応募を承認しました', ['class' => "btn btn-danger btn-block"]) !!}
        {!! Form::close() !!}
    @else
    {{--対戦を申し込みました--}}
    {!! Form::open(['route' => ['approves.approve', $user->id]]) !!}
            {!! Form::submit('応募を承認する', ['class' => "btn btn-primary btn-block"]) !!}
        {!! Form::close() !!}
    @endif
@endif