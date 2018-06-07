<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Follower;
use Illuminate\Support\Facades\Auth;
use App\Gamecomment;
use App\User;

class MypageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
      $now_user = Auth::user();
      $follow_tables = Follower::where('follow_id', $now_user->id)->get();
      $follower_tables = Follower::where('follower_id', $now_user->id)->get();
      $my_comments = Gamecomment::where('user_id', $now_user->id)->orderBy('created_at', 'desc')->get();
      return view('watch.mypage')->with(['now_user' => $now_user,
                                        'follow_tables' => $follow_tables,
                                        'follower_tables' => $follower_tables,
                                        'my_comments' => $my_comments]);
    }

    public function follow(Request $request) {
      $now_user = Auth::user();
      $follower = Follower::where('follow_id', $now_user->id)->where('follower_id', $request->user_id)->first();
      if($follower){
        $follower->delete();
        return ['user' => $request->user_id,'check' => 0];
      }else{
        $new_follow = new Follower();
        $new_follow->follow_id = $now_user->id;
        $new_follow->follower_id = $request->user_id;
        $new_follow->save();
        return ['user' => $request->user_id,'check' => 1];
      }
    }

    // ユーザー詳細
    public function user_detail(User $user) {
      $now_user = Auth::user();
      $gamecomments = Gamecomment::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
      return view('watch.user_detail')->with(['user' => $user,
                                              'now_user' => $now_user,
                                              'gamecomments' => $gamecomments]);
    }


  }
