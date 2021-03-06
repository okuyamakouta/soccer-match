<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Introduce;

class MyteamController extends Controller
{
    public function index() {
        $user= User::all();
        $data = [];
        if(\Auth::check()) {
            //認証済みユーザを取得
            $user = \Auth::user();
            $introduce = $user->introduces;

            // dd([
            //     '正しい' => $user->introduces,
            //     'get式' => $user->introduces()->get(),
            // ]);

            $data = [
                'user' => $user,
                'introduce' => $introduce,
            ];
        }
        return view('welcome', $data);
                                
    }
    public function edit($user_id) {
        //idの値でユーザを検索して取得
        $user = User::findOrFail($user_id);
        
        $introduce = $user->introduces;
        //
        if(!$introduce){
            $introduce = new Introduce;
        }
        
        return view('myteams.edit', ['introduce' => $introduce,'user' => $user]);
    }
   public function update(Request $request, $user_id){
       
       $user = User::findOrFail($user_id);
        $introduce = $user->introduces;
        
        if (!$introduce) {
            $introduce = new Introduce([
            'user_id' => $user->id
        ]);
    }
    
    $introduce->introduce = $request->get('introduce');
    
    $introduce->save();
    //トップページへリダイレクト
    return redirect('/');
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
       return view('myteams.followers', ['user' => $user, 'users' => $followers]);
   }
   public function approvings($user_id)
   {
       //ユーザを検索して取得
       $user = User::findOrFail($user_id);
       
       $user->loadRelationshipCounts();
       
       // ユーザのフォロー一覧を取得
        $approvings = $user->approvings()->paginate(10);
        //フォロー一覧ビューで表示
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
       return view('myteams.followers', ['user' => $user, 'users' => $approvers]);
   }
}
