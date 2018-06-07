@extends('layouts.default')

@section('title', 'calendar')
@section('header')

@endsection
@section('content')
<div class="text-center">
  <h2 class="config_title m-3">Gametypeマスタ管理</h2>
</div>
<div class="m-3">
  <p>
    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
      ＋
    </button>
  </p>
  <div class="collapse" id="collapseExample">
    <div class="card card-body">
      <form class="" action="{{ action('AdminController@create_gametype') }}" method="post">
        {{ csrf_field() }}
        <table class="master_table table table-bordered">
          <thead>
            <tr>
              <th>name</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <td><input name="name" class="name_col" type="text" value=""></td>
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
        <th>送信</th>
        <th>削除</th>
      </tr>
    </thead>
    <tbody>
      @forelse($gametypes as $gametype)
      <tr>
        <form action="{{ action('AdminController@update_gametype', $gametype->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('patch') }}
          <td>{{ $gametype->id }}</td>
          <td><input name="name" class="name_col" type="text" value="{{ $gametype->name }}"></td>
          <td><button type="submit" class="btn btn-sm btn-success" name="button">更新</button></td>
        </form>
        <form class="" action="{{ action('AdminController@delete_gametype', $gametype) }}" method="post">
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
