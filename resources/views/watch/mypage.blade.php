@extends('layouts.default')

@section('title', 'calendar')
@section('header')

@endsection
@section('content')
  <div class="container">
    <ul class="nav nav-tabs pt-3" id="myTab" role="tablist">
      <li class="tab_bg nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><span class="tab_font">HOME</span></a>
      </li>
      <li class="tab_bg nav-item">
        <a class="nav-link" id="follow-tab" data-toggle="tab" href="#follow" role="tab" aria-controls="follow" aria-selected="false"><span class="tab_font">Follow</span></a>
      </li>
    </ul>
    <div class="tab_bg_color tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="container">
          <div class="pt-3 mypage_header">
            <h2>{{ $now_user->first_name }}{{ $now_user->last_name }} <a href="{{ action('ConfigController@index', $now_user) }}" class="mr-3 btn btn-sm btn-danger float-right">Config</a></h2>

            <hr>
          </div>
          <h3>My Photo</h3>
          <div class="mypage_thumbnail">
            <div class="row text-center">
              @forelse($my_comments as $my_comment)
                <div class="mb-3 col-xs-12 col-sm-12 col-md-6 col-lg-4">

                  <div class="card" style="width: 18rem;">
                    <img src="/image/{{ $my_comment->photos()->path }}" alt="..." class="card-img">
                    <div class="card-body">
                      <p class="card-text">
                        {{ $my_comment->games()->title }}<i data-gameid="{{ $my_comment->games()->id }}" class="game_detail_btn ml-3 fas fa-info-circle"></i>
                        <br>{{ date('Y.m.d', strtotime($my_comment->created_at)) }}
                      </p>
                    </div>
                  </div>

                </div>
              @empty
              @endforelse

            </div>
          </div>
        </div>
      </div>
      <!-- Follow -->
      <div class="tab-pane fade" id="follow" role="tabpanel" aria-labelledby="follow-tab">
        <div class="container">
          <ul class="pt-3 nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="pills-follow-tab" data-toggle="pill" href="#pills-follow" role="tab" aria-controls="pills-follow" aria-selected="true">
              Follow
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-follower-tab" data-toggle="pill" href="#pills-follower" role="tab" aria-controls="pills-follower" aria-selected="false">
              Follower
            </a>
          </li>
        </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="p-3 tab-pane fade show active" id="pills-follow" role="tabpanel" aria-labelledby="pills-follow-tab">

              @forelse($follow_tables as $follow_table)
              <div class="user_box">
                <div class="delete_follow mb-3 card">
                  <div class="card-header">
                    {{$follow_table->own_follow()->first_name}}
                    {{$follow_table->own_follow()->last_name}}
                    <button class="follow_remove ml-2 btn float-right btn-danger btn-sm" type="button" data-comment="{{ $follow_table->own_follow()->id }}" name="button">フォロー解除</button>
                    <button class="btn float-right btn-success btn-sm" type="button" name="button">メッセージ</button>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                      <div class="row">
                        <span class="col-3">Game : {{$follow_table->own_follow()->gametype()->name}}</span>
                        <span class="col-3">Team : {{$follow_table->own_follow()->team()->name}}</span>
                        <span class="col-3">コメント数 : {{count($follow_table->own_follow()->comment())}}</span>
                        <span class="col-3">参加予定 Game : <span class="text-danger">調整中</span></span>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              @empty
              フォローがありません
              @endforelse


            </div>
            <div class="p-3 tab-pane fade" id="pills-follower" role="tabpanel" aria-labelledby="pills-follower-tab">

              @forelse($follower_tables as $follower_table)
              <div class="user_box">
                <div class="delete_follow mb-3 card">
                  <div class="card-header">
                    {{$follower_table->own_follower()->first_name}}
                    {{$follower_table->own_follower()->last_name}}
                    @if($follower_table->follow_check())
                      <button class="user-{{ $follower_table->follow_id }} follow_remove_add ml-2 btn float-right btn-danger btn-sm" type="button" data-comment="{{ $follower_table->own_follower()->id }}" name="button">フォロー解除</button>
                    @else
                      <button class="user-{{ $follower_table->follow_id }} follow_remove_add ml-2 btn float-right btn-primary btn-sm" type="button" data-comment="{{ $follower_table->own_follower()->id }}" name="button">フォローする</button>
                    @endif
                    <button class="btn float-right btn-success btn-sm" type="button" name="button">メッセージ</button>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                      <div class="row">
                        <span class="col-3">Game : {{$follower_table->own_follower()->gametype()->name}}</span>
                        <span class="col-3">Team : {{$follower_table->own_follower()->team()->name}}</span>
                        <span class="col-3">コメント数 : {{count($follower_table->own_follower()->comment())}}</span>
                        <span class="col-3">参加予定 Game : <span class="text-danger">調整中</span></span>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              @empty
              フォロワーがいません
              @endforelse

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('script')
<script>
// フォロワー一覧　フォロー解除
  $('.follow_remove').click(function() {
    const user_id = $(this).attr('data-comment');
    $.ajax({
      url: '{{ action('MypageController@follow') }}',
      type: 'get',
      data: { 'user_id': user_id }
    })
    .done( (data) => {
      if(data["check"] == 1){
      }else{
        $(this).parents('.delete_follow').replaceWith('<div class="mb-3 card"><div class="card-header text-center">フォローを解除しました</div></div>');

      }
    })
    .fail( (data) => {
      alert('ng');
    });
  });
// フォロー
  $('.follow_remove_add').click(function() {
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
// ゲーム詳細ポップアップ
  $('.game_detail_btn').click(function() {
    const game_id = $(this).attr('data-gameid');
    const w = ( window.innerWidth-640 ) / 2;
    const h = ( window.innerHeight-480 ) / 2;
    window.open("/calendar/game_detail?gameid="+game_id,"","width=600,height=800"+",left="+w+",top="+h);
  });
</script>
@endsection
