@extends('layouts.admin-master')
@section('page-title', 'Monev')
@section('page-heading')
  <h1>Monev</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="{{route('laporan.index')}}">Monev</a></div>
    <div class="breadcrumb-item">{{$department->department_name}}</div>
    <div class="breadcrumb-item">{{$tahun}}</div>
    <div class="breadcrumb-item">Semester {{$semester}}</div>
  </div>
@endsection

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body table-responsive">
          <a href="{{route('indicator.create')}}" class="btn btn-info mb-2">Export</a>
          @if (session('error'))
            <div class="alert alert-danger">{{session('error')}}</div> 
          @endif
          @if (session('message'))
            <div class="alert alert-primary">{{session('message')}}</div> 
          @endif
          <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th style="width: 10px;">#</th>
                <th style="width: 300px;">Aspek</th>
                <th>Indikator</th>
                <th>Status</th>
                <th style="width: 60px;">#</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($indicators as $indicator)  
                <tr>
                    <td>{{$indicator->indicator_id}}</td>
                    <td>{{$indicator->aspect_name}}</td>
                    <td>{{$indicator->indicator_code . ' '.$indicator->indicator_name}}</td>
                    <td>{!! isEvaluated($indicator->indicator_id, $department->department_id, $tahun, $semester) ? '<span class="badge badge-success">Sudah dievaluasi</span>' : '<span class="badge badge-secondary">Belum dievaluasi</span>'!!}</td>
                    <td>
                        <a href="{{route('evaluasi.detail', [$department->department_id, $indicator->indicator_id, $tahun, $semester])}}" class="btn btn-icon btn-sm btn-primary"><i class="fas fa-arrow-right"></i></a>    
                    </td>
                </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('css-datatables')
  <link rel="stylesheet" href="{{asset('assets/modules/DataTables/dt/css/dataTables.bootstrap4.min.css')}}">
@endpush
@push('datatables-js')
  <script src="{{asset('assets/modules/DataTables/dt/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('assets/modules/DataTables/dt/js/dataTables.bootstrap4.min.js')}}"></script>
  <script>
    $(document).ready( function () {
      $('.datatable').DataTable();
    });
  </script>
@endpush
