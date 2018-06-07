@extends('layouts.default')

@section('title', 'admin')
@section('header')

@endsection
@section('content')
<div class="text-center">
  <h2 class="config_title m-3">WATCH管理</h2>
</div>
  <div class="container">
  <nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">マスタ</a>
      <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">投稿数</a>
    </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">

      <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <div class="container">

        </div>
      </div>

      <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        <div class="container bg-light p-3">
          <ul>
            <li><a href="/admin/master/place">Placeマスタ</a></li>
            <li><a href="/admin/master/team">Teamマスタ</a></li>
            <li><a href="/admin/master/gametype">Gametypeマスタ</a></li>
            <li><a href="/admin/master/commenttype">コメントタイプマスタ</a></li>
            <li><a href="/admin/master/user">ユーザーマスタ</a></li>
          </ul>
        </div>
      </div>

      <div class="bg-light tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
        <div class="container">
          <div class="p-5 text-center bg-light">
            <canvas id="myChart" style="position: relative; height:40vh; width:80vw"></canvas>
          </div>
        </div>
      </div>

    </div>
  </div>


@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
<script>
// チャート

var count = {{ json_encode($count) }};
var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      // labels: count,
        labels: ["今日", "１日前", "２日前", "３日前", "４日前", "５日前", "６日前"],
        datasets: [{
            label: 'Comment数',
            data: count,
            backgroundColor:'rgba(255, 99, 132, 1.0)',
            borderColor: 'rgba(255,99,132,1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>
@endsection
