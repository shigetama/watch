<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Follower;
use App\Gamecomment;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Like;


class TimelineController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request) {
      $now = new Carbon();
      $now_user = Auth::user();

      $follow_users = Follower::where('follow_id', $now_user->id)->get();
      $q = [$now_user->id];
      foreach($follow_users as $follow_user) {
        array_push($q, $follow_user->follower_id);
      }
      $show_comments = Gamecomment::whereIn('user_id', $q)->orderBy('created_at', 'desc');
      if($request->gamedate_str != null){
        $show_comments = $show_comments->where('created_at', '>=', $request->gamedate_str.' 00:00:00');
      }
      if($request->gamedate_end != null){
        $show_comments = $show_comments->where('created_at', '<=', $request->gamedate_end.' 23:59:59');
      }
      if($request->word != null) {
        $show_comments = $show_comments->where('body', 'LIKE', "%$request->word%");
      }
      $show_comments = $show_comments->get();
      return view('watch.timeline')->with(['show_comments' => $show_comments,
                                          'now' => $now,
                                          'key_word' => $request->word]);
    }

    public function add_remove_like(Request $request) {
      $user = Auth::user();
      $comment = Like::where('user_id', $user->id)->where('comment_id', $request->comment)->first();

      if($comment){
        $comment->delete();
        return '0';
      }else{
        $new_comment = new Like();
        $new_comment->user_id = $user->id;
        $new_comment->comment_id = $request->comment;
        $new_comment->save();
        return '1';
      }

    }
}
