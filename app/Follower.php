<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;


class Follower extends Model
{
  public function own_follow() {
    return User::where('id', $this->follower_id)->first();
  }

  public function own_follower() {
    return User::where('id', $this->follow_id)->first();
  }

  public function follow_check() {
    $check =  Follower::where('follow_id', $this->follower_id)->where('follower_id', $this->follow_id)->first();
    return $check;
  }

}
