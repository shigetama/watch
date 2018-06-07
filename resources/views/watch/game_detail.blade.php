<!doctype html>
<html lang="ja">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <title>game_detail</title>
  </head>
  <body style="background-color: #f7f7f7;">
    <div class="container">
      <div class="text-center">
        <h3 class="text-light bg-warning m-2 rounded">{{ $game->title }}</h3>
          <table class="table table-light table-bordered text-center">
            <tr>
              <td>開催日</td>
              <td>{{ $game->game_date }}</td>
            </tr>
            <tr>
              <td>スポーツ</td>
              <td>{{ $game->gametype()->name }}</td>
            </tr>
            <tr>
              <td>開催地</td>
              <td>{{$game->place()->name}}</td>
            </tr>
            <tr>
              <td>備考</td>
              <td>{{$game->body}}</td>
            </tr>
          </table>
          <div class="text-right">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">コメントする</button>
            <button class="btn btn-primary return_btn" type="button" name="button" data-return="{{ $game->game_date }}">戻る</button>
            <button class="btn btn-danger close_btn" type="button" name="button" data-return="{{ $game->game_date }}">×</button>
          </div>
      </div>

      <div class="mt-3 row">
          @forelse($gamecomments as $gamecomment)
            <div class="shadow mb-2 col-sm-6 col-sm-4 col-lg-3">
                <img class="card-img-top" src="/image/{{ $gamecomment->photos()->path }}" alt="image">
                <div class="p-1 bg-light" style="word-break: break-word">
                  <p>{{ $gamecomment->body }}</p>
                    @if($now_user->id == $gamecomment->user_id)
                      <p class="text-center rounded btn-info">own post</p>
                    @else
                      @if($gamecomment->follow_check())
                        <p class="btn-sm follow_btn btn-danger text-center user-{{$gamecomment->user_id}}"data-comment="{{ $gamecomment->user_id }}" data-user_id="{{ $gamecomment->user_id }}">
                          フォロー中</p>
                          <div class="">
                            posted by {{ $gamecomment->user_id }}
                          </div>
                      @else
                        <p class="btn-sm follow_btn btn-primary text-center user-{{$gamecomment->user_id}}" data-comment="{{ $gamecomment->user_id }}" data-user_id="{{ $gamecomment->user_id }}">
                          フォローする</p>
                           <div class="">
                             posted by {{ $gamecomment->user_id }}
                           </div>
                      @endif
                    @endif
                </div>
            </div>
          @empty
          @endforelse
        </div>

    </div>
<!-- モーダル -->
    <div class="modal fade" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Comment</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>

          <div class="modal-body">
              <div class="container">
                <form id="post_comment" method="post" action="{{ action('CalendarController@post_comment') }}" enctype="multipart/form-data">
                  {{ csrf_field() }}

                  <div class="form-group">
                    <label for="number" class="control-label col-xs-2">Type</label>
                        <div class="col-xs-3">
                          <select class="form-control" id="type" name="type">
                            @forelse($types as $type)
                            <option value="{{ $type->id }}">{{ $type->comment_status }}</option>
                            @empty
                            @endforelse
                          </select>
                        </div>
                  </div>

                  <div class="form-group">
                    <label for="image" class="control-label col-xs-2">Photo</label>
                        <div class="col-xs-3">
                          <input class="btn btn-primary" type="file" id="image" name="image" value="">
                        </div>
                  </div>

                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Comment</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" name="comment" rows="3"></textarea>
                    </div>
              </div>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="game_id" value="{{ $game->id }}">
            <button type="submit" class="btn btn-primary">保存</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">閉じる</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>
      $('.return_btn').click(function() {
        const c = $(this).attr('data-return');
        window.location.href = "/calendar/show_game?calendar_date="+c;
        window.resizeTo(780, 300);
      });

      $('.follow_btn').click(function() {
        const comment = $(this).attr('data-comment');
        $.ajax({
          url: '{{ action('MypageController@follow') }}',
          type: 'get',
            data: { 'user_id': comment }
        })
        .done( (data) => {
          if(data["check"] == 1){
            $('.user-'+data["user"]).removeClass('btn-primary').addClass('btn-danger').text('フォロー中');
          }else{
            $('.user-'+data["user"]).removeClass('btn-danger').addClass('btn-primary').text('フォローする');
          }
        })
        .fail( (data) => {
          alert('ng');
        });

      });

      $('.close_btn').click(function() {
        window.close();
      });
    </script>
  </body>
</html>
