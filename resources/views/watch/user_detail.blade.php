@extends('layouts.default')

@section('title', 'calendar')
@section('header')

@endsection
@section('content')
<div class="container">
  <div class="user_header text-center">
    <h3 class="config_title m-3">{{ $user->first_name }} {{ $user->last_name }}</h3>
    <img class="m-3" src="/image/{{ $gamecomments->random()->photos()->path }}" alt="..." class="img-thumbnail">
    <p>
      @if($user->id !== $now_user->id )
        @if($user->has_follow())
          <button data-user_id="{{ $user->id }}" class="user-{{$user->id}} follow_btn btn btn-primary" type="button" name="button">フォローする</button>
        @else
          <button data-user_id="{{ $user->id }}" class="user-{{$user->id}} follow_btn btn btn-danger" type="button" name="button">フォロー中</button>
        @endif
      @endif
    </p>
    <div class="container">
      <table class="m-3 table table-light table-bordered">
        <tbody>
          <tr>
            <th>Game</th>
            <td>{{ $user->gametype()->name }}</td>
          </tr>
          <tr>
            <th>Team</th>
            <td>{{ $user->team()->name }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="text-center">
  <p>
    <a class="btn btn-success" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
      Show Photo
    </a>
  </p>
  <div class="row m-3 collapse" id="collapseExample">
    @forelse($gamecomments as $gamecomment)
    <div class="mb-2 col-sm-6 col-sm-4 col-lg-3">
      <img src="/image/{{ $gamecomment->photos()->path }}" alt="..." class="img-thumbnail">
    </div>
    @empty
    @endforelse
  </div>
</div>

</div>
@endsection
@section('script')
<script>
$('.follow_btn').click(function() {
  const user_id = $(this).attr('data-user_id');
  $.ajax({
    url: '{{ action('MypageController@follow') }}',
    type: 'get',
    data: { 'user_id': user_id }
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


</script>
@endsection
