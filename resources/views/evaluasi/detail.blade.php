@extends('layouts.admin-master')
@section('page-title', 'Monev Laporan')
@section('page-heading')
  <h1>Monev Laporan</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="{{route('laporan.index')}}">Monev</a></div>
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
                <th>{{$laporan->indicator_name}}</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                    <td>ULP</td>
                    <td><strong>{{$laporan->department_fullname}}</strong></td>
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
                        <a href="{{asset('uploads/'.$laporan->file_2)}}" target="_blank">{{$laporan->doc_2}}</a>
                    </td>
                </tr>
                @endif
                @if ($laporan->doc_3 != '')
                <tr>
                    <td>Dokumen #3</td>
                    <td>
                        <a href="{{asset('uploads/'.$laporan->file_3)}}" target="_blank">{{$laporan->doc_3}}</a>
                    </td>
                </tr>
                @endif
                @if ($laporan->doc_4 != '')
                <tr>
                    <td>Dokumen #4</td>
                    <td>
                        <a href="{{asset('uploads/'.$laporan->file_4)}}" target="_blank">{{$laporan->doc_4}}</a>
                    </td>
                </tr>
                @endif
                <tr>
                    <th>Hasil Evaluasi</th>
                    <th>{{$laporan->hasil_evaluasi}}</th>
                </tr>
                <tr>
                    <th>Rekomendasi</th>
                    <th>{{$laporan->rekomendasi}}</th>
                </tr>
            </tbody>

        </table>
        <a href="{{url()->previous()}}" class="btn btn-icon btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a>

        {{-- <form action="{{route('evaluasi.store', $laporan->laporan_id)}}" method="post">
            @csrf
            <div class="form-group">
                <label>Hasil Evaluasi</label>
                <textarea name="hasil_evaluasi" class="form-control" style="height: 100px" required>{{$laporan->hasil_evaluasi}}</textarea>
            </div>
            <div class="form-group">
                <label>Rekomendasi</label>
                <textarea name="rekomendasi" class="form-control" style="height: 100px" required>{{$laporan->rekomendasi}}</textarea>
            </div>
            <div class="form-group">
                <a href="{{route('evaluasi.department', [$laporan->department_id, explode('-',$laporan->created_at)[0], $laporan->semester, ])}}" class="btn btn-icon btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form> --}}
      </div>
    </div>
  </div>
</div>
@endsection
@push('css-datatables')
@endpush
@push('datatables-js')
@endpush


