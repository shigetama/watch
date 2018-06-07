<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Team;

class Game extends Model
{
  use SoftDeletes;
  protected $dates = ['deleted_at'];

  public function gametype() {
    return Gametype::where('id', $this->gametype_id)->first();
  }

  public function place() {
    return Place::where('id', $this->place_id)->first();
  }

  public function home() {
    return Team::where('id', $this->home_team_id)->first();
  }
  public function visitor() {
    return Team::where('id', $this->visitor_team_id)->first();
  }


}
