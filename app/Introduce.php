<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Introduce extends Model
{
    protected $fillable = ['introduce', 'user_id'];
    public function user() {
        return $this->belongsTo(User::class);
    }
}
