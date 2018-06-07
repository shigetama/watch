<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Gametype;
use App\Team;
use App\User;
use Illuminate\Support\Facades\Hash;

class ConfigController extends Controller
{
    public function index(User $user) {
      $user = Auth::user();
      $gametypes = Gametype::get();
      $teams = Team::get();
      return view('watch.config')->with(['user' => $user,
                                        'gametypes' => $gametypes,
                                        'teams' => $teams]);
    }

    public function update_user(Request $request, User $user) {
      $this->validate($request, [
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'zip' => 'required|digits:7',
        'address1' => 'required|string|max:255',
        'address2' => 'string|max:255',
        'address3' => 'string|max:255',
        'address4' => 'string|max:255',
      ]);
        if($request->email != $user->email){
          $this->validate($request,[
          'email' => 'required|string|email|max:255|unique:users',
        ]);
          $user->email = $request->email;
      }
        if($request->password){
          $this->validate($request,[
        'password' => 'required|string|min:6|confirmed',
        ]);
        $user->password = Hash::make($request->password);
      }
      $user->first_name = $request->first_name;
      $user->last_name = $request->last_name;
      $user->zip = $request->zip;
      $user->address1 = $request->address1;
      $user->address2 = $request->address2;
      $user->address3 = $request->address3;
      $user->address4 = $request->address4;
      $user->save();

      return redirect('/mypage');
    }
}
