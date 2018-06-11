@extends('layouts.default')

@section('title', 'calendar')
@section('header')
@endsection
@section('content')

  <div class="main_header ">
    <h1 class="text-center calendar_title">TimeLine</h1>
  </div>
  <div class="pb-3 serarch_box">
    <p class="text-center">
      <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
      <i class="fas fa-search"></i>
      </button>
    </p>
    <div class="collapse" id="collapseExample">
      <div class="card card-body">
        <form id="" method="get" action="{{ action('TimelineController@index') }}">
          <label>Date</label>
          <div class="row form-group">
            <i class="date-icon far fa-calendar-alt"></i>
              <input type="date" name="gamedate_str" class="col-4 form-control">
              <i class="to_date far fa-arrow-alt-circle-right"></i>
              <input type="date" name="gamedate_end" class="col-4 form-control">
          </div>
          <label>Word</label>
          <div class="row form-group">
            <i class="date-icon fas fa-pencil-alt"></i>
              <input type="text" name="word" class="col-8 form-control">
          </div>

          <div class="text-right search_box_footer">
            <button type="submit" class="btn btn-primary">検索</button>
          </div>

        </form>
      </div>
    </div>
  </div>
  <div class="main_body">
    <div class="row">

      @forelse($show_comments as $show_comment)
        <div class="mb-4 col-sm-6 col-sm-4 col-lg-3">
          <div class="shadow card" style="">
            <img class="card-img-top" src="/image/{{ $show_comment->photos()->path }}" alt="Card image cap">
            <div class="card-body">
              <h6 class="card-title">{{ $show_comment->games()->title }}</h6>
              <hr>
              <p class="card-text comment_body">{{ $show_comment->body }}</p>
              <hr>
              <!-- <a href="#" class="btn btn-sm btn-primary">save</a> -->
              <button class="btn btn-primary btn-sm" type="button" name="button">
                @if($show_comment->hasLike())
                <i data-comment="{{ $show_comment->id }}" class="like_btn add_like fas fa-star"></i>
                @else
                <i data-comment="{{ $show_comment->id }}" class="like_btn not_like fas fa-star"></i>
                @endif
                <span class="like_count">{{ $show_comment->hasLikeCount() }}</span>
              </button>
                @if($now->diffInHours($show_comment->created_at) >= 24)
                  <span class="float-right"> {{ $show_comment->created_at->format('m/d') }} </span>
                @else
                <span class="float-right">  {{ $now->diffInHours($show_comment->created_at) }}時間前  </span>
                @endif
              <h6 class="m-2 text-center">posted by <br>
                <a href="{{ action('MypageController@user_detail', $show_comment->users()) }}" class="">
                    {{ $show_comment->users()->first_name }}
                </a>
              </h6>
            </div>
          </div>
      	</div>
      @empty
        <div class="container text-center">
          <h5>該当するコメントがありません</h5>
        </div>
      @endforelse
    </div>
  </div>

@endsection
@section('script')
<script>
(function() {
  // 検索キーワード　
  window.onload = function(){
    let w = {!! json_encode($key_word) !!};
      $('.comment_body').each(function(){
        const txt = $(this).html();
          if(w !== null){
            $(this).html(
                txt.replace(new RegExp(w,"g"),'<span class="marker">'+w+'</span>')
            );
          }
      });
  }

  // いいね
  $('.like_btn').click(function() {
    let comment = $(this).attr('data-comment');
    let likes_count = $(this).next('span').text();

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url: '{{ action('TimelineController@add_remove_like') }}',
      type: 'post',
      dataType: 'json',
      data: {
          'comment': comment
       }
    })
    .done( (data) => {
      if(data == 1){
        $(this).removeClass('not_like').addClass('add_like');
        $(this).next().text(Number(likes_count) + 1);
      }else{
        $(this).removeClass('add_like').addClass('not_like');
        $(this).next().text(Number(likes_count) - 1);
      }
    })
    .fail( (data) => {
      alert('ng');
    });
  })
})();

</script>
@endsection
