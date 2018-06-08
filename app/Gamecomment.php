<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Photo;
use Illuminate\Support\Facades\Auth;
use App\Game;
use App\User;
use App\Like;

class Gamecomment extends Model
{
  use SoftDeletes;
  protected $dates = ['deleted_at'];

  public function photos() {
    $photo = Photo::where('id', $this->photo_id)->first();
    return $photo;
  }

  public function follow_check() {
    $now_user = Auth::user();
    $check = Follower::where('follow_id', $now_user->id)->where('follower_id', $this->user_id)->first();
    return $check;
  }

  public function games() {
    return Game::where('id', $this->game_id)->first();
  }

  public function users() {
    return User::where('id', $this->user_id)->first();
  }

  public function hasLike() {
    $like = Like::where('comment_id', $this->id)
                  ->where('user_id', Auth::user()->id)->first();
    return $like;
  }
  public function hasLikeCount() {

    return count(Like::where('comment_id', $this->id)->get());
  }
}
