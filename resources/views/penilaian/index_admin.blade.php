@extends('layouts.admin-master')
@section('page-title', 'Penilaian')
@section('page-heading')
  <h1>Penilaian</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="{{route('penilaian.index')}}">Penilaian</a></div>
    <div class="breadcrumb-item">{{$tahun}}</div>
    <div class="breadcrumb-item">Semester {{$semester}}</div>
  </div>
@endsection
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body table-responsive">
          <form method="get" action="{{route('laporan.index')}}">
            <div class="row mt-4">
              <div class="form-group col-sm-2">
                <label for="tahun">Tahun</label>
                <input type="number" id="tahun" name="tahun" class="form-control" placeholder="2022" value="{{$tahun}}" min="2021" max="2100">
              </div>
              <div class="form-group col-sm-2">
                <label for="select-semester">Semester</label>
                <select name="semester" id="select-semester" class="form-control">
                    <option value="1" {{$semester == 1 ? 'selected':''}}>1</option>
                    <option value="2" {{$semester == 2 ? 'selected':''}}>2</option>
                </select>
              </div>
              
              <div class="form-group col-sm-3">
                <label for="date-filter"><p></p></label>
                <div>
                <button class="btn btn-primary" id="btn-download"><span class="fas fa-search"></span> Filter</button>
                </div>
              </div>
            

            </div>
        </form>
          {{-- <a href="{{route('department.create')}}" class="btn btn-info mb-2">Tambah Data</a> --}}
          @if (session('error'))
            <div class="alert alert-danger">{{session('error')}}</div> 
          @endif
          @if (session('message'))
            <div class="alert alert-primary">{{session('message')}}</div> 
          @endif
          <table class="table table-hover datatable">
            <thead>
              <tr>
                <th style="width: 10px;">ID</th>
                <th>Nama Department</th>
                <th>Nama Lengkap Department</th>
                <th>Persentase</th>
                <th style="width: 20px;">#</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($departments as $department)  
                <tr>
                    <td>{{$department->department_id}}</td>
                    <td>{{$department->department_name}}</td>
                    <td>{{$department->department_fullname}}</td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar {{getPercentage($department->department_id, $tahun, $semester) == 100 ? 'bg-success':''}}" role="progressbar" data-width="{{getPercentage($department->department_id, $tahun, $semester)}}%" aria-valuenow="{{getPercentage($department->department_id, $tahun, $semester)}}" aria-valuemin="0" aria-valuemax="100">{{getPercentage($department->department_id, $tahun, $semester)}}%</div>
                      </div>
                    </td>
                    <td>
                        <a href="{{route('penilaian.department', [$department->department_id, $tahun, $semester])}}" class="btn btn-icon btn-sm btn-info"><i class="fas fa-arrow-right"></i></a>
                        {{-- <a href="{{route('department.delete', $department->department_id)}}" class="btn btn-icon btn-sm btn-danger"><i class="fas fa-trash"></i></a> --}}
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
