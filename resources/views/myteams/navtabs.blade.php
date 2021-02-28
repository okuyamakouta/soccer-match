<ul class="nav nav-tabs nav-justified mb-3">
{{--プロフィールタブ--}}
<li class="nav-item">
    <a href="{{ route('myteams.index', ['user' => $user->id]) }}" class="nav-link {{ Request::routeIs('myteams.index') ? 'active' : '' }}">
        プロフィール
         <span class="badge badge-secondary">{{ $user->name }}</span>
         <span class="badge badge-secondary">{{ $user->introduce }}</span>
    </a>
</li>
{{-- 対戦応募した一覧タブ --}}
    <li class="nav-item">
        <a href="{{ route('myteams.followings', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('myteams.followings') ? 'active' : '' }}">
            対戦応募したチーム
            <span class="badge badge-secondary">{{ $user->followings_count }}</span>
        </a>
    </li>
    {{-- 対戦応募された一覧タブ --}}
    <li class="nav-item">
        <a href="{{ route('myteams.followers', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('myteams.followers') ? 'active' : '' }}">
            対戦応募されたチーム
            <span class="badge badge-secondary">{{ $user->followers_count }}</span>
        </a>
    </li>
</ul>
