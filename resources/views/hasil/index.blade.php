@extends('layouts.admin-master')
@section('page-title', 'Hasil Penilaian')
@section('page-heading')
  <h1>Hasil Penilaian</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="{{route('penilaian.index')}}">Hasil Penilaian</a></div>
    <div class="breadcrumb-item">{{$tahun}}</div>
    <div class="breadcrumb-item">Semester {{$semester}}</div>
  </div>
@endsection
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body table-responsive">
          
          {{-- <a href="{{route('department.create')}}" class="btn btn-info mb-2">Tambah Data</a> --}}
          @if (session('error'))
            <div class="alert alert-danger">{{session('error')}}</div> 
          @endif
          @if (session('message'))
            <div class="alert alert-primary">{{session('message')}}</div> 
          @endif
          <table class="table table-hover">
            <thead>
              <tr>
                <th style="width: 10px;">ID</th>
                <th>Aspect</th>
                <th>Hasil Penilaian</th>
                <th style="width: 20px;">#</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($aspects as $aspect)  
                <tr>
                    <td>{{$aspect->aspect_id}}</td>
                    <td>{{$aspect->aspect_name}}</td>
                    <td>{{getHasilPenilaian($department_id, $tahun, $semester, $aspect->aspect_id)}}</td>
                    <td>
                        {{-- <a href="{{route('penilaian.department', [$department->department_id, $tahun, $semester])}}" class="btn btn-icon btn-sm btn-info"><i class="fas fa-arrow-right"></i></a> --}}
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
@endpush
@push('datatables-js')
@endpush
