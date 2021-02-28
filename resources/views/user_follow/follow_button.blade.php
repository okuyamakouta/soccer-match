@if(Auth::id() != $user->id)
    @if(Auth::user()->is_following($user->id))
    {{--対戦を申し込む--}}
    {!! Form::open(['route' => ['user.unfollow', $user->id], 'method' => 'delete']) !!}
            {!! Form::submit('対戦を申し込みました', ['class' => "btn btn-danger btn-block"]) !!}
        {!! Form::close() !!}
    @else
    {{--対戦を申し込みました--}}
    {!! Form::open(['route' => ['user.follow', $user->id]]) !!}
            {!! Form::submit('対戦を申し込む', ['class' => "btn btn-primary btn-block"]) !!}
        {!! Form::close() !!}
    @endif
@endif