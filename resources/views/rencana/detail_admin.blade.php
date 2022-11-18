@extends('layouts.admin-master')
@section('page-title', 'Rencana Aksi')
@section('page-heading')
  <h1>Rencana Aksi</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="{{route('rencana.index')}}">Rencana Aksi</a></div>
    <div class="breadcrumb-item"><a href="{{url()->previous()}}">{{$rencana->department_name}}</a></div>
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
                <th>{{$rencana->indicator_name}}</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                  <td>Rencana Aksi</td>
                  <td>{!!$rencana->rencana !!}</td>
                </tr>
                <tr>
                    <td>Target</td>
                    <td>{!!$rencana->target !!}</td>
                </tr>
                <tr>
                    <td>Output</td>
                    <td>{!!$rencana->output !!}</td>
                </tr>
                <tr>
                    <td>Waktu Penyelesaian</td>
                    <td>{!!$rencana->waktu_penyelesaian !!}</td>
                </tr>
                <tr>
                    <td>Penanggung Jawab</td>
                    <td>{!!$rencana->penanggung_jawab !!}</td>
                </tr>
                <tr>
                    <td>Keterangan</td>
                    <td>{!!$rencana->keterangan !!}</td>
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


