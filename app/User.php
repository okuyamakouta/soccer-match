<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
   public function introduces() {
       return $this->hasone(Introduce::class);
   }
   //このユーザがフォロー中のユーザ
   public function followings()
   {
       return $this->belongsToMany(User::class, 'user_follow', 'user_id', 'follow_id')->withTimestamps();
   }
   //このユーザをフォローしているユーザ
   public function followers()
   {
       return $this->belongsToMany(User::class, 'user_follow', 'follow_id', 'user_id')->withTimestamps();
   }
   public function follow($userId)
   {
       //すでにフォローしているかの確認
       $exist = $this->is_following($userId);
       //対象が自分自身かどうか
       $its_me = $this->id == $userId;
       if($exist || $its_me){
           //フォローしてたら何もしない
           return false;
       }else{
            // 未フォローであればフォローする
            $this->followings()->attach($userId);
            return true;
       }
   }
   public function unfollow($userId)
   {
       //すでにフォローしているかの確認
       $exist = $this->is_following($userId);
       //対象が自分自身かどうか
       $its_me = $this->id == $userId;
       if($exist && !$its_me){
       // すでにフォローしていればフォローを外す
            $this->followings()->detach($userId);
            return true;
        } else {
            // 未フォローであれば何もしない
            return false;
        }
   }
   public function is_following($userId)
    {
        // フォロー中ユーザの中に $userIdのものが存在するか
        return $this->followings()->where('follow_id', $userId)->exists();
    }
    //このユーザが承認しているユーザ
    public function approvings()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'user_id', 'follow_id')->withTimestamps();
    }
    //このユーザを承認しているユーザ
    public function approvers()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'follow_id', 'user_id')->withTimestamps();
    }
    //承認している
    public function approve($userId)
    {
        //すでに承認してるかの確認
        $exist = $this->is_approving($userId);
        //対象が自分自身かどうか
        $its_me = $this->id == $userId;
        
        if($exist && !$its_me){
            //すでに承認してたら何もしない
            return false;
        } else {
            //承認してないならする
            $this->approvings()->attach($userId);
            return true;
        }
    }
    //承認されていない
        public function unapprove($userId)
        {
             //すでに承認しているかの確認
       $exist = $this->is_approving($userId);
       //対象が自分自身かどうか
       $its_me = $this->id == $userId;
       if($exist && !$its_me){
       // すでに承認していればフォローを外す
            $this->approvings()->detach($userId);
            return true;
        } else {
            // 未フォローであれば何もしない
            return false;
        }
        }
    
    public function is_approving($userId)
    {
                //  承認中ユーザの中に $userIdのものが存在するか
        return $this->approvings()->where('follow_id', $userId)->exists();
    }
    public function loadRelationshipCounts()
    {
        $this->loadCount(['followings', 'followers']);
    }
}
