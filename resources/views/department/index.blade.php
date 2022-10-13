@extends('layouts.admin-master')
@section('page-title', 'Department')
@section('page-heading')
  <h1>Department</h1>
@endsection
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body table-responsive">
          <a href="{{route('department.create')}}" class="btn btn-info mb-2">Tambah Data</a>
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
                <th style="width: 40px;">action</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($departments as $department)  
                <tr>
                    <td>{{$department->department_id}}</td>
                    <td>{{$department->department_name}}</td>
                    <td>{{$department->department_fullname}}</td>
                    <td>
                        <a href="{{route('department.edit', $department->department_id)}}" class="btn btn-icon btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                        <a href="{{route('department.delete', $department->department_id)}}" class="btn btn-icon btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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
