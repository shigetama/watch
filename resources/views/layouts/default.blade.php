<!doctype html>
<html lang="ja">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/css/styles.css" type="text/css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <title>@yield('title')</title>
    @yield('header')
  </head>
  <body>
    <div class="container-fluid">
      <div class="row menu">

          <div class="col-lg-2 col-md-3 col-sm-3 hidden-sm d-none d-sm-block border-right side_menu">

              <div class="mt-4 text-center side_menu_item">
                <i class="fas fa-calculator"></i>
                <h1 class="mb-5">Watch</h1>
                  <p>
                    <a href="/" class="h6">
                      <i class="fas fa-calendar-alt"></i>Calendar
                    </a>
                  </p>
                  <p>
                    <a href="/timeline" class="h6">
                      <i class="far fa-clock"></i>TimeLine
                    </a>
                  </p>
                  <p>
                  </p>
                  <p>
                    <a href="/place" class="h6">
                      <i class="fas fa-globe"></i>Place
                    </a>
                  </p>
                  <p>
                    <a href="/mypage" class="h6">
                      <i class="fas fa-home"></i>My Page
                    </a>
                  </p>
                  <p>
                    <a href="{{ URL::route('account-sign-out') }}" class="h6">
                      <i class="fas fa-sign-out-alt"></i>Logout
                    </a>
                  </p>

                  <div class="mt-5 mb-5 login_user">
                  ログインユーザー<br>
                  {{ Auth::user()->first_name }}
                  </div>
                  @if(Auth::user()->admin_auth == 1)
                    <div class="">
                      <a href="{{ action('AdminController@admin_index') }}"><i class="fas fa-lock">管理画面</i></a>
                    </div>
                  @endif
                  <div class="pt-5 menu_footer">
                    © 2018 masaya shigeta. <br>
                    All Rights.
                  </div>
              </div>

          </div>

        <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 border-left main">
          @yield('content')
        </div>

      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- googlemap -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGgz0bLt6WIr7nr9gp-52kdLWTzoaozms"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.25/gmaps.min.js"></script>
    <script>

    </script>
    @yield('script')
  </body>
</html>
