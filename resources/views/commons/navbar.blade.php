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
                @if(Auth::check())
                {{--他チーム一覧ページへのリンク--}}
                <li class="nav-item"><a href="#" class="nav-link">他チーム一覧</a></li>
                {{--プロフィール編集ページへのリンク--}}
                <li class="dropdown-item"><a href="#">プロフィール編集</a></li>
                {{--ログアウトへのリンク--}}
                <li class="dropdown-item">{!! link_to_route('logout.get', 'ログアウト') !!}</li>
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