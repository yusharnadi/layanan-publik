@extends('layouts.admin-master')
@section('page-title', 'Hasil Penilaian ')
@section('page-heading')
  <h1>Hasil Penilaian</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="{{route('penilaian.index')}}">Hasil Penilaian</a></div>
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
          @if (session('error'))
            <div class="alert alert-danger">{{session('error')}}</div> 
          @endif
          @if (session('message'))
            <div class="alert alert-primary">{{session('message')}}</div> 
          @endif
          <a href="{{url()->previous()}}" class="btn btn-icon btn-primary mb-2"><i class="fas fa-arrow-left"></i> Kembali</a>
          <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th>Indikator</th>
                <th>Nilai</th>
                <th>Bobot</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($indicators as $indicator)  
                <tr>
                    <td>{{$indicator->indicator_code . ' '.$indicator->indicator_name}}</td>
                    <td>{{getNilaiIndicator($department->department_id, $tahun, $semester, $indicator->indicator_id)}}</td>
                    <td>{{$indicator->indicator_bobot}}</td>
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
