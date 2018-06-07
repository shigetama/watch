@extends('layouts.default')

@section('title', 'calendar')
@section('header')

@endsection
@section('content')
  <div class="container">
    <div class="config_header">
      <h1 class="m-3 config_title"><i class="fas fa-cog"></i>Config</h1>
    </div>
    @if(count($errors) > 0)
      <div class="mb-4 error text-light text-center">
        <div class="alert alert-danger p-2">
          変更できませんでした<br>
          @foreach($errors->all() as $error)
          {{ $error }}
          @endforeach
        </div>
      </div>
    @endif
    <div class="config_main">
      <form class="" action="{{ action('ConfigController@update_user', $user) }}" method="post">
      {{ csrf_field() }}
      {{ method_field('patch') }}

      <table class="table table-bordered">
        <tbody>
          <tr>
            <th class="bg-primary text-light" scope="col-3">First Name</th>
            <td class="bg-light" scope="col-3"><input name="first_name" value="{{ old('first_name', $user->first_name) }}" type="text"></td>
            <th class="bg-primary text-light" scope="col-3">Last Name</th>
            <td class="bg-light" scope="col-3"><input name="last_name" value="{{ old('last_name', $user->last_name) }}" type="text"></td>
          </tr>
          <tr>
            <th class="bg-primary text-light" colspan="1">Zip</th>
            <td class="bg-light" colspan="1"><input name="zip" value="{{ old('zip', $user->zip) }}" type="text"></td>
            <th class="bg-primary text-light" colspan="1">Address</th>
            <div class="row">
            <td class="bg-light" colspan="1"><input name="address1" value="{{ old('address1', $user->address1) }}" class="col-12" type="text"><br>
                                              <input name="address2" value="{{ old('address1', $user->address2) }}" class="col-12" type="text"><br>
                                              <input name="address3" value="{{ old('address1', $user->address3) }}" class="col-12" class="col-12" type="text"><br>
                                              <input name="address4" value="{{ old('address1', $user->address4) }}" class="col-12" type="text"></td>
            </div>
          </tr>
          <tr>
            <div class="row">
              <th class="bg-primary text-light" colspan="1">e-mail</th>
                <td class="bg-light" colspan="3">
                  <input name="email" value="{{ old('email', $user->email) }}" class="col-10" type="text">
                </td>
              </div>
          </tr>
          <tr>
            <th class="bg-primary text-light">Game</th>
            <td class="bg-light">
              <select class="" name="" value="{{ $user->gametype()->name }}">
                @forelse($gametypes as $gametype)
                <option value="{{ $gametype->id }}">{{ $gametype->name }}</option>
                @empty
                @endforelse
              </select>
            </td>
            <th class="bg-primary text-light">Team</th>
            <td class="bg-light">
              <select class="" name="" value="{{ $user->team()->name }}">
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
          <tr>
            <div class="row">
              <th class="bg-primary text-light" colspan="1">New password <span class="bg-danger p-1 rounded">確認</span></th>
                <td class="bg-light" colspan="3">
                  <input name="password_confirmation" value="" class="col-5" type="password">
                </td>
            </div>
          </tr>

        </tbody>
      </table>
      <div class="config_btn text-center">
        <button class="btn btn-success" type="submit" name="button">変更</button>
      </form>
        <a href="/mypage" class="btn btn-danger">戻る</a>
      </div>
    </div>
  </div>
@endsection
@section('script')
<script>

</script>
@endsection
