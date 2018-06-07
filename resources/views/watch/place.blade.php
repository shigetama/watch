@extends('layouts.default')

@section('title', 'place')
@section('header')

@endsection
@section('content')
          <div class="main_header ">
            <h1 class="text-center calendar_title">Place</h1>
          </div>

          <table class="table table-bordered">
            <thead>
              <tr>
                <th>名前</th>
                <th>住所</th>
                <th>詳細</th>
              </tr>
            </thead>
            <tbody>
              @forelse($places as $place)
                <form class="" action="{{ action('PlaceController@place_detail' ,$place) }}" method="get">
                  {{ csrf_field() }}
                  <tr>
                    <th>{{ $place->name }}</th>
                    <th>{{ $place->address1.$place->address2.$place->address3.$place->address4 }}</th>
                    <th><button type="submit" class="btn btn-sm btn-primary">地図</button></th>
                  </tr>
                </form>
              @empty
              @endforelse
            </tbody>
          </table>

@endsection
@section('script')
<script>
  

</script>
@endsection
