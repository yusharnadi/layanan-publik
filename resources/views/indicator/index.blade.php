@extends('layouts.admin-master')
@section('page-heading', 'Indikator')
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body table-responsive">
          <a href="{{route('indicator.create')}}" class="btn btn-info mb-2">Tambah Data</a>
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
                <th>Aspect</th>
                <th>Kode Indikator</th>
                <th>Indikator</th>
                {{-- <th>Deskripsi</th> --}}
                <th>Visibilitas</th>
                <th style="width: 40px;">action</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($indicators as $indicator)  
                <tr>
                    <td>{{$indicator->indicator_id}}</td>
                    <td>{{$indicator->aspect_name}}</td>
                    <td>{{$indicator->indicator_code}}</td>
                    <td>{{$indicator->indicator_name}}</td>
                    {{-- <td>{!!$indicator->indicator_description !!}</td> --}}
                    <td>{!!$indicator->indicator_visibility == 1 ? '<span class="badge badge-warning">Private</span>':'<span class="badge badge-success">Publik</span>' !!}</td>
                    <td>
                        <a href="{{route('indicator.edit', $indicator->indicator_id)}}" class="btn btn-icon btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                        <a href="{{route('indicator.delete', $indicator->indicator_id)}}" class="btn btn-icon btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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
