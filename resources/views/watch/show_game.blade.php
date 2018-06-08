<!doctype html>
<html lang="ja">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <title>show_game</title>
  </head>
  <body style="background-color: #f7f7f7;">
    <div class="container">
      <h1 class="text-center">{{ $date->format('Y年m月d日') }}</h1>
      <table class="table table-info table-bordered table-hover">
        <thead class="bg-dark text-light">
          <th>タイトル</th>
          <th>タイプ</th>
          <th>チーム</th>
          <th>場所</th>
          <th></th>
        </thead>
      <tbody>

          @foreach($games as $game)
            <tr>
              <td>{{ $game->title }}</td>
              <td>{{ $game->gametype()->name }}</td>
              <td>{{ $game->home()->name}}<br>
                {{$game->visitor()->name }}</td>
              <td>{{ $game->place()->name }}</td>
              <td><button data-gameid="{{ $game->id }}" class="btn btn-sm btn-primary game_detail">詳細</butoon></td>
            </tr>
          @endforeach

        </tbody>
      </table>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script>
      $('.game_detail').click(function() {
        const gameid = $(this).attr('data-gameid');
        window.location.href = "/calender/game_detail?gameid="+gameid;
        window.resizeTo(600, 600);
      });
    </script>
  </body>
</html>
