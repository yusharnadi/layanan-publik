@extends('layouts.admin-master')
@section('page-heading', 'Users')
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <a href="{{route('users.create')}}" class="btn btn-info mb-2">Tambah Data</a>
          @if (session('error'))
            <div class="alert alert-danger">{{session('error')}}</div> 
          @endif
          @if (session('message'))
            <div class="alert alert-primary">{{session('message')}}</div> 
          @endif
          <table class="table table-hover datatable">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>action</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)  
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role}}</td>
                    <td>{!!$user->status == 1 ? '<span class="badge badge-primary">Aktif</span>':'<span class="badge badge-light">Tdk Aktif</span>' !!}</td>
                    <td>
                        <a href="{{route('users.edit', $user->id)}}" class="btn btn-icon btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                        <a href="{{route('users.delete', $user->id)}}" class="btn btn-icon btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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
