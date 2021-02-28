<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserFollowController extends Controller
{
    //ユーザをフォローするアクション
    public function store($id)
    {
        //認証済みユーザがidのユーザをフォローする
        \Auth::user()->follow($id);
        
        return back();
    }
    //ユーザをアンフォローするアクション
    public function destroy($id)
    {
        \Auth::user()->unfollow($id);
        
        return back();
    }
}
