@extends('layouts.admin-master')
@section('page-title', 'Rencana Aksi')
@section('page-heading')
  <h1>Rencana Aksi</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="{{route('rencana.index')}}">Rencana Aksi</a></div>
    <div class="breadcrumb-item"><a href="{{url()->previous()}}">{{$evaluasi->department_name}}</a></div>
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
                <th>{{$evaluasi->indicator_name}}</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                  <td>Rekomendasi</td>
                  <td>{!!$evaluasi->rekomendasi !!}</td>
                </tr>
            </tbody>
        </table>
        @if (isset($rencana))
          <form action="{{route('rencana.update', $rencana->rencana_id)}}" method="post">
            @csrf
            @method('put')

            <input type="hidden" name="indicator_id" value="{{$evaluasi->indicator_id}}">
            <input type="hidden" name="department_id" value="{{$evaluasi->department_id}}">
            <input type="hidden" name="tahun" value="{{$evaluasi->tahun}}">
            <input type="hidden" name="semester" value="{{$evaluasi->semester}}">
            <div class="form-group">
                <label>Rencana Aksi</label>
                <textarea name="rencana" id="rencana" class="form-control" style="height: 100px" required>{{$rencana->rencana ?? old('rencana')}}</textarea>
            </div>
            <div class="form-group">
                <label>Target</label>
                <textarea name="target" id="target" class="form-control" style="height: 100px" required>{{$rencana->target ?? old('target')}}</textarea>
            </div>
            <div class="form-group">
                <label>Output</label>
                <textarea name="output" id="output" class="form-control" style="height: 100px" required>{{$rencana->output ?? old('output')}}</textarea>
            </div>
            <div class="form-group">
                <label>Waktu Penyelesaian</label>
                <input type="text" name="waktu_penyelesaian" class="form-control col-lg-2" value="{{$rencana->waktu_penyelesaian ?? old('waktu_penyelesaian')}}" required>
            </div>
            <div class="form-group">
                <label>Penanggung Jawab</label>
                <input type="text" name="penanggung_jawab" class="form-control col-lg-3" value="{{$rencana->penanggung_jawab ?? old('penanggung_jawab')}}" required>
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <textarea name="keterangan" id="keterangan" class="form-control" style="height: 100px">{{$rencana->keterangan ?? old('keterangan')}}</textarea>
            </div>
            <div class="form-group">
              <a href="{{route('rencana.index')}}" class="btn btn-icon btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        @else
        <form action="{{route('rencana.store')}}" method="post">
          @csrf
          <input type="hidden" name="indicator_id" value="{{$evaluasi->indicator_id}}">
          <input type="hidden" name="department_id" value="{{$evaluasi->department_id}}">
          <input type="hidden" name="tahun" value="{{$evaluasi->tahun}}">
          <input type="hidden" name="semester" value="{{$evaluasi->semester}}">
          <div class="form-group">
              <label>Rencana Aksi</label>
              <textarea name="rencana" id="rencana" class="form-control" style="height: 100px" required>{{old('rencana')}}</textarea>
          </div>
          <div class="form-group">
              <label>Target</label>
              <textarea name="target" id="target" class="form-control" style="height: 100px" required>{{old('target')}}</textarea>
          </div>
          <div class="form-group">
              <label>Output</label>
              <textarea name="output" class="form-control" style="height: 100px" required>{{old('output')}}</textarea>
          </div>
          <div class="form-group">
              <label>Waktu Penyelesaian</label>
              <input type="text" name="waktu_penyelesaian" class="form-control col-lg-2" value="{{old('waktu_penyelesaian')}}" required>
          </div>
          <div class="form-group">
              <label>Penanggung Jawab</label>
              <input type="text" name="penanggung_jawab" class="form-control col-lg-3" value="{{old('penanggung_jawab')}}" required>
          </div>
          <div class="form-group">
              <label>Keterangan</label>
              <textarea name="keterangan" id="keterangan" class="form-control" style="height: 100px" required>{{old('keterangan')}}</textarea>
          </div>
          <div class="form-group">
              <a href="{{route('rencana.index')}}" class="btn btn-icon btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
              <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
        @endif
       
      </div>
    </div>
  </div>
</div>
@endsection
@push('css-datatables')
@push('css-datatables')
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endpush
@push('datatables-js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
  <script>
    $(document).ready( function () {
      $('#target').summernote({
        placeholder: 'Target',
        tabsize: 2,
        height: 200,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['view', [, 'codeview']]
        ]
      });

      $('#rencana').summernote({
        placeholder: 'Rencana Aksi',
        tabsize: 2,
        height: 200,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['view', [, 'codeview']]
        ]
      });

      $('#output').summernote({
        placeholder: 'Output',
        tabsize: 2,
        height: 200,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['view', [, 'codeview']]
        ]
      });

      $('#keterangan').summernote({
        placeholder: 'Keterangan',
        tabsize: 2,
        height: 200,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['view', [, 'codeview']]
        ]
      });
    });
  </script>
@endpush


