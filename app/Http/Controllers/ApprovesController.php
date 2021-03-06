<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApprovesController extends Controller
{
    //応募を承認するアクション
    public function store($id)
    {
        //認証済みユーザが投稿をお気に入り登録する
        \Auth::user()->approve($id);
        //前のURLへリダイレクト
        return back();
    }
    public function destroy($id){
        \Auth::user()->unapprove($id);
        //前のURLへリダイレクトさせる
        return back();
    }
}
