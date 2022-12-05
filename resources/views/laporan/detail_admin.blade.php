@extends('layouts.admin-master')
@section('page-title', 'Detail Laporan Penilaian ')
@section('page-heading')
  <h1>Detail Laporan Penilaian</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="{{route('laporan.index')}}">Laporan Penilaian</a></div>
    <div class="breadcrumb-item"><a href="{{url()->previous()}}">{{$laporan->department_name}}</a></div>
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
        <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th>Indikator</th>
                <th>{{$laporan->indicator_name}}</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                    <td>ULP</td>
                    <td><strong>{{$laporan->department_fullname}}</strong></td>
                </tr>
                <tr>
                    <td>PIC</td>
                    <td>{{$laporan->nip . ' - ' . $laporan->name}}</td>
                </tr>
                <tr>
                    <td>Tahun</td>
                    <td>{{$th = explode('-',$laporan->created_at)[0]}}</td>
                </tr>
                <tr>
                    <td>Semester</td>
                    <td>{{$laporan->semester}}</td>
                </tr>
                @if ($laporan->doc_1 != '')
                <tr>
                    <td>Dokumen #1</td>
                    <td>
                        <a href="{{asset('uploads/'.$laporan->file_1)}}" target="_blank">{{$laporan->doc_1}}</a>
                    </td>
                </tr>
                @endif
                @if ($laporan->doc_2 != '')
                <tr>
                    <td>Dokumen #2</td>
                    <td>
                      @if ($laporan->file_2)
                        <a href="{{asset('uploads/'.$laporan->file_2)}}" target="_blank">{{$laporan->doc_2}}</a>   
                      @else
                         -  
                      @endif
                    </td>
                </tr>
                @endif
                @if ($laporan->doc_3 != '')
                <tr>
                    <td>Dokumen #3</td>
                    <td>
                      @if ($laporan->file_3)
                        <a href="{{asset('uploads/'.$laporan->file_3)}}" target="_blank">{{$laporan->doc_3}}</a>
                      @else
                        -    
                      @endif
                    </td>
                </tr>
                @endif
                @if ($laporan->doc_4 != '')
                <tr>
                    <td>Dokumen #4</td>
                    <td>
                      @if ($laporan->file_4)
                        <a href="{{asset('uploads/'.$laporan->file_4)}}" target="_blank">{{$laporan->doc_4}}</a>   
                      @else
                          - 
                      @endif
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
        <a href="{{url()->previous()}}" class="btn btn-primary btn-icon"><i class="fas fa-arrow-left"></i> Kembali</a>
      </div>
    </div>
  </div>
</div>
@endsection
@push('css-datatables')
@endpush
@push('datatables-js')
@endpush


