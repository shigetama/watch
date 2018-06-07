<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Team;
use App\Gametypw;
use App\Gamecomment;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'zip', 'address1', 'address2', 'address3', 'address4',
        'email', 'favorite_game_type_id', 'favorite_team_id', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function gametype() {
      return Gametype::where('id', $this->favorite_game_type_id)->first();
    }
    public function team() {
      return Team::where('id', $this->favorite_team_id)->first();
    }
    public function comment() {
      return Gamecomment::where('user_id', $this->id)->get();
    }

}
