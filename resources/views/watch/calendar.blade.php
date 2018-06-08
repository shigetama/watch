@extends('layouts.default')

@section('title', 'calendar')
@section('header')

@endsection
@section('content')

          <div class="main_header ">
            <h1 class="text-center calendar_title">Calendar</h1>
          </div>
          <div class="search_games float-right">
            <btn id="game_modal_btn" data-toggle="modal" data-target="#game_modal" class="btn btn-danger">Game登録</btn>
          </div>
          <div class="game_btn">
            <a href="/mypage" class="btn btn-success">マイページ</a>
          </div>
          <div class="text-center calendar_date">
            {{ $now->year }}年{{ $month }}月<br>
            <a class="btn btn-default btn-sm" href="/"><i class="to_date fas fa-home"></i></a>
          </div>
            <div class="move_month">
              <form class="" action="{{ action('CalendarController@index') }}" method="get">
                <div class="float-left">
                  <input type="hidden" name="count" value="-1">
                  <input type="hidden" name="year" value="{{ $year }}">
                  <input type="hidden" name="month" value="{{ $month }}">
                  <button class="not_button" style="submit"><i class="fas fa-chevron-circle-left"></i></button>
                </div>
              </form>
              <form class="" action="{{ action('CalendarController@index') }}" method="get">
                <div class="float-right">
                  <input type="hidden" name="count" value="1">
                  <input type="hidden" name="year" value="{{ $year }}">
                  <input type="hidden" name="month" value="{{ $month }}">
                  <button class="not_button" style="submit"><i class="fas fa-chevron-circle-right"></i></button>
                </div>
              </form>
            </div>
          <div class="container calendar">

            <div class="week_head row">
              <div class="day col bg-danger text-light">Sun</div>
              <div class="day col bg-dark text-light">Mon</div>
              <div class="day col bg-dark text-light">Tue</div>
              <div class="day col bg-dark text-light">Wed</div>
              <div class="day col bg-dark text-light">Thu</div>
              <div class="day col bg-dark text-light">Fri</div>
              <div class="day col bg-primary text-light">Sat</div>
            </div>
            <div class="week row">
            <?php $cnt=0; ?>
            @foreach($calendars as $calendar)
              <div data-check="{{ $games->where('game_date', $year.'-'.sprintf('%02d', $month).'-'.sprintf('%02d', $calendar))->count() }}"
                  data-calendar="{{ $year.'-'.sprintf('%02d', $month).'-'.sprintf('%02d', $calendar) }}"
                  class="click day col">
                <div class="">
                  {{ $calendar }}
                  @if($year == $now->year && $month == $now->month && $calendar == $now->day)
                    <span class="rounded text-light m-1 bg-danger">Today</span>
                  @endif
                </div>
                @if($games->where('game_date', $year.'-'.sprintf('%02d', $month).'-'.sprintf('%02d', $calendar))->count())
                <div class="rounded bg-warning game_number">
                   {{ $games->where('game_date', $year.'-'.sprintf('%02d', $month).'-'.sprintf('%02d', $calendar))->count() }}games</div>
                @endif
              </div>
            <?php $cnt++ ?>
              @if($cnt % 7 == 0)
                </div>
                <div class="week row">
                <?php $cnt = 0; ?>
              @endif
            @endforeach

          </div>

          <div class="modal" id="game_modal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <!-- モーダルのコンテンツ -->
                  <div class="modal-content">
                      <!-- モーダルのヘッダ -->
                      <div class="modal-header">
                        <h4 class="modal-title" id="modal-label">Game登録</h4>
                        <button type="button" class="close" data-dismiss="modal">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                      <!-- モーダルのボディ -->
                    <div class="modal-body">
                        <div class="container">
                          <form id="games" method="post" action="{{ action('CalendarController@post_game') }}">
                            {{ csrf_field() }}
                              <div class="form-group">
                                  <label>GameTitle</label>
                                  <input type="text" name="gametitle" class="form-control">
                              </div>
                              @if ($errors->has('gametitle'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('gametitle') }}</strong>
                                  </span>
                              @endif
                              <div class="form-group">
                                  <label>Date</label>
                                  <input type="date" name="gamedate" class="form-control">
                              </div>
                              <div class="form-group">
                                <label for="number" class="control-label col-xs-2">Type</label>
                                    <div class="col-xs-3">
                                      <select for="games" class="select_gametype form-control" id="gametype" name="gametype">
                                        @forelse($gametypes as $gametype)
                                        <option value="{{ $gametype->id }}">{{ $gametype->name }}</option>
                                        @empty
                                        @endforelse

                                      </select>
                                    </div>
                              </div>
                              <div class="form-group form-row">

                                  <div class="col-xs-3 col-md-6">
                                    <label for="team1" class="control-label col-xs-2">Home Team</label>
                                    <select class="select_team form-control" id="team1" name="team1">
                                      @forelse($teams as $team)
                                      <option data-select="{{ $team->gametype_id }}" value="{{ $team->id }}">{{ $team->name }}</option>
                                      @empty
                                      @endforelse
                                    </select>
                                  </div>

                                    <div class="col-xs-3 col-md-6">
                                      <label for="team2" class="control-label col-xs-2">Visiter Team</label>
                                      <select class="select_team form-control" id="team2" name="team2">
                                        @forelse($teams as $team)
                                        <option data-select="{{ $team->gametype_id }}" value="{{ $team->id }}">{{ $team->name }}</option>
                                        @empty
                                        @endforelse
                                      </select>
                                    </div>
                              </div>
                              <div class="form-group">
                                <label for="number" class="control-label col-xs-2">Place</label>
                                    <div class="col-xs-3">
                                      <select class="form-control" id="number" name="place">
                                        @forelse($places as $place)
                                        <option value="{{ $place->id }}">{{ $place->name }}</option>
                                        @empty
                                        @endforelse
                                      </select>
                                    </div>
                              </div>
                              <div class="form-group">
                                <label for="exampleFormControlTextarea1">Game Derection</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="gamedirection" rows="3"></textarea>
                              </div>
                        </div>
                      </div>
                    <!-- モーダルのフッタ -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                      <button type="submit" class="btn btn-primary">保存</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

@endsection
@section('script')
<script>
$(function() {

// ゲーム詳細ウィンドウポップアップ
    $('.click').click(function(event) {
      const check = $(this).attr('data-check');
      if(check != 0) {
        const w = ( window.innerWidth-640 ) / 2;
        const h = ( window.innerHeight-480 ) / 2;
        const c = $(this).attr('data-calendar');
        window.open("/calendar/show_game?calendar_date="+c,"","width=780,height=300"+",left="+w+",top="+h);
      }
    })
    // チーム選択
  var $team = $('.select_team');
  var original = $team.html();
  $('.select_gametype').change(function() {
    var val1 = $(this).val();

    $team.html(original).find('option').each(function() {
      var val2 = $(this).data('select');
      if(val1 != val2) {
        $(this).remove();
      }
    });
  });
// エラー時モーダル表示
  $(window).on('load', () => {
    if({{ $errors->has('gametitle') }}){
      $('#game_modal_btn')[0].click();
    }
});


});



</script>
@endsection
