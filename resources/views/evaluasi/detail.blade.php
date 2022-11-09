@extends('layouts.admin-master')
@section('page-title', 'Monev Laporan')
@section('page-heading')
  <h1>Monev Laporan</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="{{route('evaluasi.index')}}">Monev</a></div>
    <div class="breadcrumb-item"><a href="{{url()->previous()}}">{{$department->department_name}}</a></div>
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
                <th>{{$indicator->indicator_name}}</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                    <td>ULP</td>
                    <td><strong>{{$department->department_fullname}}</strong></td>
                </tr>
                <tr>
                    <td>Tahun</td>
                    <td>{{$tahun}}</td>
                </tr>
                <tr>
                    <td>Semester</td>
                    <td>{{$semester}}</td>
                </tr>
                @if (isset($laporan) && $laporan->doc_1 != '')
                <tr>
                    <td>Dokumen #1</td>
                    <td>
                        <a href="{{asset('uploads/'.$laporan->file_1)}}" target="_blank">{{$laporan->doc_1}}</a>
                    </td>
                </tr>
                @endif

                @if (isset($laporan) &&$laporan->doc_2 != '')
                <tr>
                    <td>Dokumen #2</td>
                    <td>
                        <a href="{{asset('uploads/'.$laporan->file_2)}}" target="_blank">{{$laporan->doc_2}}</a>
                    </td>
                </tr>
                @endif
                @if (isset($laporan) && $laporan->doc_3 != '')
                <tr>
                    <td>Dokumen #3</td>
                    <td>
                        <a href="{{asset('uploads/'.$laporan->file_3)}}" target="_blank">{{$laporan->doc_3}}</a>
                    </td>
                </tr>
                @endif
                @if (isset($laporan) && $laporan->doc_4 != '')
                <tr>
                    <td>Dokumen #4</td>
                    <td>
                        <a href="{{asset('uploads/'.$laporan->file_4)}}" target="_blank">{{$laporan->doc_4}}</a>
                    </td>
                </tr>
                @endif
                <tr>
                    <th>Hasil Evaluasi</th>
                    <td>{!!$evaluasi->hasil_evaluasi ?? "" !!}</td>
                </tr>
                <tr>
                    <th>Rekomendasi</th>
                    <td>{!! $evaluasi->rekomendasi ?? "" !!}</td>
                </tr>
            </tbody>

        </table>
        <a href="{{url()->previous()}}" class="btn btn-icon btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
      </div>
    </div>
  </div>
</div>
@endsection
@push('css-datatables')
@endpush
@push('datatables-js')
@endpush


