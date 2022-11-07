@extends('layouts.admin-master')
@section('page-heading', 'Laporan Penilaian')
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        @foreach ($aspects as $aspect)
        <div class="card-body table-responsive">
            <h6>{{$aspect['aspect_name']}}</h6>
            <table class="table table-sm table-hover">
              <thead>
                <tr>
                  <th style="width: 10px;">ID</th>
                  <th style="width: 80px;">Kode</th>
                  <th>Indikator</th>
                  <th style="width: 80px;">action</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($aspect['indicator'] as $indicator)  
                  <tr>
                      <td>{{$indicator->indicator_id}}</td>
                      <td>{{$indicator->indicator_code}}</td>
                      <td>{{$indicator->indicator_name}}</td>
                      {{-- <td>{!!$indicator->indicator_description !!}</td> --}}
                      {{-- <td>{!!$indicator->indicator_visibility == 1 ? '<span class="badge badge-warning">Private</span>':'<span class="badge badge-success">Publik</span>' !!}</td> --}}
                      <td>
                          <a href="{{route('indicator.edit', $indicator->indicator_id)}}" class="btn btn-icon btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                          <a href="{{route('indicator.delete', $indicator->indicator_id)}}" class="btn btn-icon btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                      </td>
                  </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        @endforeach 
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
