@if(count($users)>0)
<ul class="list-unstyled">
    @foreach($users as $user)
    <li class="media">
        <div class="media-body">
            <div>
                {{ $user->name }}
            </div>
            <div>
                {{--他チーム詳細ページへのリンク--}}
                <p>{!! link_to_route('users.show', '詳細を見る',['user' => $user->id]) !!}</p>

               
            </div>

        </div>
    </li>
    @endforeach
    
</ul>
 {{-- ページネーションのリンク --}}
    {{ $users->links() }}
@endif