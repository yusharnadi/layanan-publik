@extends('layouts.admin-master')
@section('page-heading')
  <h1>Dashboard</h1>
  <div class="section-header-breadcrumb">
    {{-- <div class="breadcrumb-item"><a href="{{route('penilaian.index')}}">Dashboard</a></div> --}}
  </div>
@endsection
@section('content')
<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="card">
      <div class="card-wrap">
        <div class="card-body">
          <div class="row">
            <div class="form-group col-sm-6">
              <label for="tahun">Department</label>
              <select name="department_id" id="select-department" class="form-control select2">
                @foreach ($departments as $department)
                    <option value="{{$department->department_id}}" @selected($department_id == $department->department_id)>{{$department->department_fullname}}</option>
                @endforeach
              </select> 
            </div>
            <div class="form-group col-sm-6">
              <label for="select-semester">Indikator</label>
              <select name="indicator_id" id="select-indicator" class="form-control select2">
                @foreach ($indicators as $indicator)
                    <option value="{{$indicator->indicator_id}}" @selected($indicator_id == $indicator->indicator_id)>{{$indicator->indicator_name}}</option>
                @endforeach
              </select> 
            </div>
          </div>
          <div class="row">
            <div class="form-group col-sm-4">
              <label for="tahun">Tahun</label>
              <input type="number" id="tahun" name="tahun" class="form-control" placeholder="2022" value="{{$tahun}}" min="2021" max="2100">
            </div>
            <div class="form-group col-sm-4">
              <label for="select-semester">Semester</label>
              <select name="semester" id="select-semester" class="form-control">
                  <option value="1" {{$semester == 1 ? 'selected':''}}>1</option>
                  <option value="2" {{$semester == 2 ? 'selected':''}}>2</option>
              </select>
            </div>
            <div class="form-group col-sm-4">
              <label for="select-semester">&nbsp;</label>
              <button class="btn btn-primary form-control">Filter</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> 
  <div class="col-lg-6 col-md-6 col-sm-6 col-12">
    {{-- <div class="card card-statistic-1">
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
    </div> --}}
    <div class="card">
      <div class="card-header">
        <h4>Informasi</h4>
      </div>
      <div class="card-body">
        {{-- <div class="alert alert-warning alert-has-icon">
          <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
          <div class="alert-body">
            <div class="alert-title">Pengumuman !</div>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Commodi nam pariatur in praesentium optio sint ab suscipit exercitationem eos dolorum facilis qui ipsa molestiae aliquam enim voluptatem architecto, at error quo veritatis? Est facere ducimus, odio laboriosam cum libero vel praesentium reprehenderit illo doloribus sit
            </div>
        </div> --}}
        <ul>
          <li>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</li>
          <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
          <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt.</li>
          <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt.</li>
        </ul>
      </div>
    </div>
  </div>                 
</div>
<div class="row">
  <div class="col-6">
    <div class="card">
      <div class="card-header">
        <h4>Pelaporan</h4>
      </div>
      <div class="card-body">
        <canvas id="laporanChart" style="height: 150px;width:100%"></canvas>
      </div>
    </div>
  </div>
  <div class="col-6">
    <div class="card">
      <div class="card-header">
        <h4>Monev</h4>
      </div>
      <div class="card-body">
        <canvas id="monevChart" style="height: 150px;width:100%"></canvas>
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
          labels: ['aspek 1', 'aspek 2', 'aspek 3', 'aspek 4', 'aspek 5', 'aspek 6', 'aspek 7'],
          datasets: [{
              label: 'Status Laporan berdasarkan aspek',
              data: [10, 20,30,40, 50,60,70],
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

  var ctxLaporan = document.getElementById('laporanChart');
  var laporanChart = new Chart(ctxLaporan, {
    type: 'doughnut',
    data: {
        labels: ['Sudah Lapor', 'Belum Lapor'],
        datasets: [
          {
            label: 'Dataset 1',
            data: [20,10],
            backgroundColor: ['rgba(153, 102, 255, 1)','rgb(255,99,132)' ],
          }
        ]
      },
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'top',
        },
        title: {
          display: true,
          // text: 'Chart.js Doughnut Chart'
        }
      }
    },
  });

  var ctxMonev = document.getElementById('monevChart');
  var monevChart = new Chart(ctxMonev, {
    type: 'doughnut',
    data: {
        labels: ['Sudah dimonev', 'Belum dimonev'],
        datasets: [
          {
            label: 'Dataset 1',
            data: [20,10],
            backgroundColor: ['rgba(153, 102, 255, 1)','rgb(255,99,132)' ]
          }
        ]
      },
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'top',
        },
        title: {
          display: true,
          // text: 'Chart.js Doughnut Chart'
        },
        weight: 2
      }
    },
  });
</script>
@endpush
@push('css-datatables')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@push('datatables-js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $(document).ready( function () {
      // Select2
      if(jQuery().select2) {
        $(".select2").select2();
      }
    });
</script>
@endpush
