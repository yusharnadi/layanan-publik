@extends('layouts.admin-master')
@section('page-title', 'Users Role')
@section('page-heading')
  <h1>Users Role</h1>
@endsection
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <a href="{{route('role.create')}}" class="btn btn-info mb-2">Tambah Data</a>
          @if (session('error'))
            <div class="alert alert-danger">{{session('error')}}</div> 
          @endif
          @if (session('message'))
            <div class="alert alert-primary">{{session('message')}}</div> 
          @endif
          <table class="table table-hover datatable">
            <thead>
              <tr>
                <th style="width: 40px;">#</th>
                <th>Roles Name</th>
                <th style="width: 40px;">action</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($roles as $role)  
                <tr>
                    <td>{{$role->id}}</td>
                    <td>{{$role->name}}</td>
                   <td>
                        <a href="{{route('role.edit', $role->id)}}" class="btn btn-icon btn-sm btn-warning"><i class="fas fa-edit"></i></a>
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
