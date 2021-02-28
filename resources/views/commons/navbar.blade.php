<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        {{--トップページへのリンク--}}
        <a class="navbar-brand" href="/">Soccer-Match</a>
        
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                {{--他チーム一覧ページへのリン--}}
                @if(Auth::check())
                <li class="nav-item">{!! link_to_route('users.index', '他チーム一覧', [], ['class' => 'nav-link']) !!}</li>
                {{--プロフィール編集ページへのリンク--}}
                <li class="nav-item">{!! link_to_route('myteams.edit', 'プロフィール編集', ['myteam' => Auth::id()], ['class' => 'nav-link']) !!}</li>
                {{--ログアウトへのリンク--}}
                <li class="nav-item">{!! link_to_route('logout.get', 'ログアウト') !!}</li>
                @else
            {{--新規登録ページへのリンク--}}
                <li class="nav-item">{!! link_to_route('signup.get', '新規登録', [], ['class' => 'nav-link']) !!}</li>
                {{-- ログインページへのリンク --}}
                <li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
                @endif
            </ul>
        </div>
    </nav>
</header>