<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gametype;
use App\Place;
use App\Team;
use App\Game;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Commenttype;
use App\Gamecomment;
use App\Photo;
use Intervention\Image\Facades\Image;
use App\Http\Requests\PostGameRequest;

class CalendarController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index(Request $request) {
    $now_user = Auth::user();
    $gametypes = Gametype::get();
    $places = Place::get();
    $teams = Team::get();
    $now = new Carbon();
    $time = $now;
    if($request) {
      $time = new Carbon($request->year.'-'.sprintf('%02d', $request->month));
      $time = $time->addMonth($request->count);
    }
    $year = $time->year;
    $month = $time->month;
    $calendars = array();
    $j = 0;
    $last_day = $time->endOfMonth()->day;
    for($i=1; $i<$last_day+1; $i++) {
     $week = date('w', mktime(0, 0, 0, $month, $i, $year));
     if($i==1) {
       for($s=1; $s<=$week; $s++){
         $calendars[$j] = '';
         $j++;
       }
     }
     $calendars[$j] = $i;
     $j++;
     if($i==$last_day) {
       for($e=1; $e<=6 - $week; $e++) {
         $calendars[$j] = '';
         $j++;
       }
     }
    }
    $games = Game::where('game_date', 'LIKE', $year.'-'.sprintf('%02d', $month).'%')->get();
    return view('watch.calendar')->with(['games' => $games,
                                        'gametypes' => $gametypes,
                                        'places' => $places,
                                        'teams' => $teams,
                                        'now' => $time,
                                        'year' => $year,
                                        'month' => $month,
                                        'calendars' => $calendars,
                                        'now' => $now,
                                        ]);
  }

  public function move_month(Request $request) {
    return redirect('/');
  }


  public function post_game(PostGameRequest $request) {
    $game = new Game();
    $now_user_id = Auth::user()->id;
    $game->title = $request->gametitle;
    $game->game_date = $request->gamedate;
    $game->gametype_id = $request->gametype;
    $game->place_id = $request->place;
    $game->body = $request->gamedirection;
    $game->home_team_id = $request->team1;
    $game->visitor_team_id = $request->team2;
    $game->create_user_id = $now_user_id;
    $game->save();
    return redirect('/');
  }

  public function show_game(Request $request) {
    $games = Game::where('game_date', $request->calendar_date)->get();
    $date = new Carbon($request->calendar_date);
    return view('watch.show_game')->with(['date' => $date,
                                          'games' => $games]);
  }

  public function game_detail(Request $request) {
    $game = Game::where('id', $request->gameid)->first();
    $types = Commenttype::get();
    $gamecomments = Gamecomment::where('game_id', $request->gameid)->orderBy('created_at', 'desc')->get();
    $now_user = Auth::user();
    return view('watch.game_detail')->with(['game' => $game,
                                            'types' => $types,
                                            'gamecomments' => $gamecomments,
                                            'now_user' => $now_user]);
  }

  public function post_comment(Request $request) {
    $validatedData = $request->validate([
      'comment' => 'required|max:255',
    ]);
    $input = $request->all();
    $fileName = $input['image']->getClientOriginalName();
    $image = Image::make($input['image']->getRealPath());
    $newName = Carbon::now()->timestamp;
    $image->save(public_path().'/image/'.$newName);

    $now_user_id = Auth::user()->id;
    $photo = new Photo();
    $photo->user_id = $now_user_id;
    $photo->path = $newName;
    $photo->save();

    $comment = new Gamecomment();
    $comment->game_id = $request->game_id;
    $comment->body = $request->comment;
    $comment->user_id = $now_user_id;
    $comment->photo_id = $photo->id;
    $comment->save();

    return redirect()->back();
  }
}
