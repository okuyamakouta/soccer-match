<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
    public function index() {
        //他チーム一覧をidの降順で取得
        $users = User::orderby('id', 'desc')->paginate(10);
        //他チーム一覧ビューで表示
        return view('users.index', ['users' => $users]);
    }
    public function show($id) {
        //idの値でチームを取得して表示
        $user = User::findOrFail($id);
        
        //他チーム詳細ビューで表示
        return view('users.show', ['user' => $user]);
    }
     public function followings($user_id)
   {
       //ユーザを検索して取得
       $user = User::findOrFail($user_id);
       
       $user->loadRelationshipCounts();
       
       // ユーザのフォロー一覧を取得
        $followings = $user->followings()->paginate(10);
        //フォロー一覧ビューで表示
        return view('myteams.followings', ['user' => $user, 'users' => $followings]);
   }
   public function followers($user_id)
   {
       //ユーザを検索して取得
       $user = User::findOrFail($user_id);
       
       $user->loadRelationshipCounts();
       
       //ユーザのフォロワー一覧を取得
       $followers = $user->followers()->paginate(10);
       //フォロワー一覧ビューで表示
       return view('myteams.followers_users', ['user' => $user, 'users' => $followers]);
   }
  public function approvings($user_id)
  {
      //ユーザを検索して取得
       $user = User::findOrFail($user_id);
       
       $user->loadRelationshipCounts();
       
       //ユーザのフォロワー一覧を取得
       $approvings = $user->approvings()->paginate(10);
       //フォロワー一覧ビューで表示
       return view('myteams.followings', ['user' => $user, 'users' => $approvings]);
  }
  public function approvers($user_id)
  {
      //ユーザを検索して取得
       $user = User::findOrFail($user_id);
       
       $user->loadRelationshipCounts();
       
       //ユーザのフォロワー一覧を取得
       $approvers = $user->approvers()->paginate(10);
       //フォロワー一覧ビューで表示
       return view('myteams.followers_users', ['user' => $user, 'users' => $approvers]);
  }
}
