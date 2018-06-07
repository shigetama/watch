<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gamecomment;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Team;
use App\Place;
use App\Gametype;
use App\User;
use App\Http\Requests\PostRequest;
use App\Commenttype;

class AdminController extends Controller
{
    public function admin_index() {
      $count = [];
      $date = [];
      for($i = 0; $i < 7; $i++){
        array_push($date, Carbon::now()->subDay($i)->format('m-d'));
        array_push($count, Gamecomment::where('created_at', '>', Carbon::now()->subDay($i)->format('Y-m-d').' 00:00:00')
                                      ->where('created_at', '<', Carbon::now()->subDay($i)->format('Y-m-d').' 23:59:59')
                                        ->count());
      }
      return view('watch.admin_index')->with(['count' => $count, 'date' => $date, 'now' => Carbon::now()]);
    }
    // Placeマスタ
    public function place() {
      return view('watch.admin_place')->with(['places' => Place::get()]);
    }
    public function create_place(Request $request) {
      $place = new Place();
      $place->name = $request->name;
      $place->zip = $request->zip;
      $place->address1 = $request->address1;
      $place->address2 = $request->address2;
      $place->address3 = $request->address3;
      $place->address4 = $request->address4;
      $place->save();
      return redirect()->back();
    }
    public function update_place(Request $request, Place $place) {

      $place->name = $request->name;
      $place->zip = $request->zip;
      $place->address1 = $request->address1;
      $place->address2 = $request->address2;
      $place->address3 = $request->address3;
      $place->address4 = $request->address4;
      $place->save();
      return redirect()->back();
    }
    public function delete_place(Place $place) {
      $place->delete();
      return redirect()->back();
    }
    // Teamマスタ
    public function team() {
      return view('watch.admin_team')->with(['teams' => Team::get(),
                                              'gametypes' => Gametype::get()]);
    }
    public function create_team(Request $request,Team $team) {
      $team->name = $request->name;
      $team->gametype_id = $request->gametype;
      $team->save();
      return redirect()->back();
    }
    public function update_team(Request $request, Team $team) {
      $team->name = $request->name;
      $team->gametype_id = $request->gametype;
      $team->save();
      return redirect()->back();
    }
    public function delete_team(Team $team) {
      $team->delete();
      return redirect()->back();
    }
    // Gametypeマスタ
    public function gametype() {
      return view('watch.admin_gametype')->with(['gametypes' => Gametype::get()]);
    }
    public function create_gametype(Request $request) {
      $gametype = new Gametype();
      $gametype->name = $request->name;
      $gametype->save();
      return redirect()->back();
    }
    public function update_gametype(Request $request, Gametype $gametype) {
      $gametype->name = $request->name;
      $gametype->save();
      return redirect()->back();
    }
    public function delete_gametype(Gametype $gametype) {
      $gametype->delete();
      return redirect()->back();
    }

    // Commenttypeマスタ
    public function commenttype() {
      return view('watch.admin_commenttype')->with(['commenttypes' => Commenttype::get()]);
    }
    public function create_commenttype(Request $request) {
      $commenttype = new Commenttype();
      $commenttype->comment_status = $request->comment_status;
      $commenttype->save();
      return redirect()->back();
    }
    public function update_commenttype(Request $request, Commenttype $commenttype) {
      $commenttype->comment_status = $request->comment_status;
      $commenttype->save();
      return redirect()->back();
    }
    public function delete_commenttype(Commenttype $commenttype) {
      $commenttype->delete();
      return redirect()->back();
    }

    // Userマスタ
    public function user() {
      return view('watch.admin_user')->with(['users' => User::get(),
                                              'gametypes' => Gametype::get(),
                                              'teams' => Team::get()]);
    }
    public function create_user(Request $request) {
        $user = new User();
        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->email = $request['email'];
        $user->zip = $request['zip'];
        $user->address1 = $request['address1'];
        $user->address2 = $request['address2'];
        $user->address3 = $request['address3'];
        $user->address4 = $request['address4'];
        $user->favorite_game_type_id = $request['game'];
        $user->favorite_team_id = $request['team'];
        $user->password = bcrypt($request['password']);
        $user->save();

      return redirect()->back();
    }
    public function update_user() {

    }
    public function delete_user(User $user) {
      $user->delete();
      return redirect()->back();
    }


}
