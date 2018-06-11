@extends('layouts.default')

@section('title', 'place')
@section('header')

@endsection
@section('content')
          <div class="main_header ">
            <h1 class="m-4 text-center calendar_title">{{ $place->name }}</h1>
          </div>

          <div class="m-5 text-center">
            <div class="card">
              <div class="card-img-top" id="map"></div>
              <div class="card-body">
                <p class="card-text">
                  {{ $place->address1 }}{{ $place->address2 }}
                  {{ $place->address3 }}{{ $place->address4 }}
                </p>
                <p>
                  自宅からの距離 約 <span class="h5">
                    @if($dist > 10000)
                    {{ round($dist, -3)/1000 }}</span> km
                    @else
                    {{ $dist }}</span> m
                    @endif

                </p>
              </div>
            </div>
          </div>


@endsection
@section('script')
<script>
// 地図表示
var map;
$(document).ready(function(){
    map = new GMaps({
        div: '#map',
        zoom:16
    });

    GMaps.geocode({
      address:  '{{$address}}',
      callback: function(results, status) {
        if (status == 'OK') {
          var latlng = results[0].geometry.location;
          map.setCenter(latlng.lat(), latlng.lng());
          map.addMarker({
            lat: latlng.lat(),
            lng: latlng.lng()
          });
        }
      }
    });

});


</script>
@endsection
