@extends('layouts.admin-master')
@section('page-title', 'Tindak Lanjut')
@section('page-heading')
  <h1>Tindak Lanjut</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="{{route('tindak.index')}}">Tindak Lanjut</a></div>
    <div class="breadcrumb-item"><a href="{{url()->previous()}}">{{$tindak->department_name}}</a></div>
    {{-- <div class="breadcrumb-item">{{$tahun}}</div> --}}
    {{-- <div class="breadcrumb-item">Semester {{$semester}}</div> --}}
  </div>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
          @if ($errors->any())
            @foreach ($errors->all() as $err)
              <div class="alert alert-danger">
                  {{$err}}
              </div>
            @endforeach    
          @endif
          @if (session('error'))
            <div class="alert alert-danger">{{session('error')}}</div> 
          @endif
          @if (session('message'))
            <div class="alert alert-primary">{{session('message')}}</div> 
          @endif
        <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th>Indikator</th>
                <th>{{$tindak->indicator_name}}</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                  <td>Status Tindak Lanjut</td>
                  <td>
                    @if ($tindak->status_tindak == 1)
                        Belum Dilaksanakan
                    @elseif ($tindak->status_tindak == 2)
                        Sedang Proses
                    @else
                        Sudah Dilaksanakan
                    @endif
                  </td>
                </tr>
                <tr>
                    <td>Keterangan</td>
                    <td>{!!$tindak->keterangan !!}</td>
                </tr>
                <tr>
                    <td><a href="{{url()->previous()}}" class="btn btn-primary btn-icon"><i class="fas fa-arrow-left"></i> Kembali</a></td>
                </tr>
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


