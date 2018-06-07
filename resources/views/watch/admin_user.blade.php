@extends('layouts.default')

@section('title', 'calendar')
@section('header')

@endsection
@section('content')
<div class="text-center">
  <h2 class="config_title m-3">Userマスタ管理</h2>
</div>
<div class="m-3">
  <p>
    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
      ＋
    </button>
  </p>
  <div class="m-3 collapse" id="collapseExample">
    <div class="card card-body">

      <form class="" action="{{ action('AdminController@create_user') }}" method="post">
      {{ csrf_field() }}
      <table class="table table-bordered">
        <tbody>
          <tr>
            <th class="bg-primary text-light" scope="col-3">First Name</th>
            <td class="bg-light" scope="col-3"><input name="first_name" value="" type="text"></td>
            <th class="bg-primary text-light" scope="col-3">Last Name</th>
            <td class="bg-light" scope="col-3"><input name="last_name" value="" type="text"></td>
          </tr>
          <tr>
            <th class="bg-primary text-light" colspan="1">Zip</th>
            <td class="bg-light" colspan="1"><input name="zip" value="" type="text"></td>
            <th class="bg-primary text-light" colspan="1">Address</th>
            <div class="row">
            <td class="bg-light" colspan="1"><input name="address1" value="" class="col-12" type="text"><br>
                                              <input name="address2" value="" class="col-12" type="text"><br>
                                              <input name="address3" value="" class="col-12" class="col-12" type="text"><br>
                                              <input name="address4" value="" class="col-12" type="text"></td>
            </div>
          </tr>
          <tr>
            <div class="row">
              <th class="bg-primary text-light" colspan="1">e-mail</th>
                <td class="bg-light" colspan="3">
                  <input name="email" value="" class="col-10" type="text">
                </td>
              </div>
          </tr>
          <tr>
            <th class="bg-primary text-light">Game</th>
            <td class="bg-light">
              <select class="" name="game" value="">
                @forelse($gametypes as $gametype)
                <option value="{{ $gametype->id }}">{{ $gametype->name }}</option>
                @empty
                @endforelse
              </select>
            </td>
            <th class="bg-primary text-light">Team</th>
            <td class="bg-light">
              <select class="" name="team" value="">
                @forelse($teams as $team)
                <option value="{{ $team->id }}">{{ $team->name }}</option>
                @empty
                @endforelse
              </select>
            </td>
          </tr>
          <tr>
            <div class="row">
              <th class="bg-primary text-light" colspan="1">New password</th>
                <td class="bg-light" colspan="3">
                  <input name="password" value="" class="col-5" type="password">
                </td>
            </div>
          </tr>

        </tbody>
      </table>
      <div class="config_btn text-center">
        <button class="btn btn-success" type="submit" name="button">作成</button>
      </form>

    </div>
  </div>
</div>
<div class="bg-light container p-3">
  <table class="master_table table table-bordered">
    <thead>
      <tr>
        <th>id</th>
        <th>firstname</th>
        <th>lastname</th>
        <th>編集</th>
        <th>削除</th>
      </tr>
    </thead>
    <tbody>
      @forelse($users as $user)
      <tr>
          <td>{{ $user->id }}</td>
          <td>{{ $user->first_name }}</td>
          <td>{{ $user->last_name }}</td>
          <form class="" action="{{ action('ConfigController@index', $user) }}" method="get">
            <td><button type="submit" class="btn btn-sm btn-success" name="button">編集</button></td>
          </form>
          <form class="" action="{{ action('AdminController@update_user', $user) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('delete') }}
            <td><button class="btn btn-sm btn-danger">削除</button></td>
          </form>

      </tr>
      @empty
      @endforelse
    </tbody>
  </table>
</div>
@endsection
@section('script')
<script>

</script>
@endsection
