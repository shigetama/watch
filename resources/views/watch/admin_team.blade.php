@extends('layouts.default')

@section('title', 'calendar')
@section('header')

@endsection
@section('content')
<div class="text-center">
  <h2 class="config_title m-3">Teamマスタ管理</h2>
</div>
<div class="m-3">
  <p>
    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseTarget" aria-expanded="false" aria-controls="collapseTarget">
      ＋
    </button>
  </p>
  <div class="collapse" id="collapseTarget">
    <div class="card card-body">
      <form class="" action="{{ action('AdminController@create_team') }}" method="post">
        {{ csrf_field() }}
        <table class="master_table table table-bordered">
          <thead>
            <tr>
              <th>name</th>
              <th>gametype</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <td><input name="name" class="name_col" type="text" value=""></td>
            <td>
              <select class="" name="gametype">
                @forelse($gametypes as $gametype)
                <option value="{{ $gametype->id }}">{{ $gametype->name }}</option>
                @empty
                @endforelse
              </select>
            </td>
            <td><button type="submit" class="btn btn-sm btn-success" name="button">作成</button></td>
          </tbody>
        </table>
      </form>
    </div>
  </div>
</div>
<div class="bg-light container p-3">
  <table class="master_table table table-bordered">
    <thead>
      <tr>
        <th>id</th>
        <th>name</th>
        <th>gametype</th>
        <th>送信</th>
        <th>削除</th>
      </tr>
    </thead>
    <tbody>
      @forelse($teams as $team)
      <tr>
        <form action="{{ action('AdminController@update_team', $team->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('patch') }}
          <td>{{ $team->id }}</td>
          <td><input name="name" class="name_col" type="text" value="{{ $team->name }}"></td>
          <td>
            <select class="" name="gametype">
              @forelse($gametypes as $gametype)
              <option value="{{ $gametype->id }}">{{ $gametype->name }}</option>
              @empty
              @endforelse
            </select>
          </td>
          <td><button type="submit" class="btn btn-sm btn-success" name="button">更新</button></td>
        </form>
        <form class="" action="{{ action('AdminController@delete_team', $team) }}" method="post">
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
