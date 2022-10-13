@extends('layouts.admin-master')
@section('page-heading')
  <h1>Dashboard</h1>
  <div class="section-header-breadcrumb">
    {{-- <div class="breadcrumb-item"><a href="{{route('penilaian.index')}}">Dashboard</a></div> --}}
  </div>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="far fa-file"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Today</h4>
            </div>
            <div class="card-body">
                10CD
            </div>
          </div>
        </div>
      </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
          <i class="fas fa-book"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Month</h4>
          </div>
          <div class="card-body">
            10 CD
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-danger">
          <i class="far fa-newspaper"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Year</h4>
          </div>
          <div class="card-body">
           10 CD
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-info">
          <i class="fas fa-user"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Users </h4>
          </div>
          <div class="card-body">
            10 users
          </div>
        </div>
      </div>
    </div>                  
</div>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <canvas id="myChart" style="height: 350px;width:100%"></canvas>
      </div>
    </div>
  </div>
</div>
@endsection
@push('chart')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  var ctx = document.getElementById('myChart');
  var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: [] ],
          datasets: [{
              label: 'Total CD',
              data: [],
              backgroundColor: [
                  'rgba(153, 102, 255, 0.2)',
              ],
              borderColor: [
                  'rgba(153, 102, 255, 1)',
              ],
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
  });
</script>
@endpush
