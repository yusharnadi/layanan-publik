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
                  <td>Rencana</td>
                  <td>{!!$rencana->rencana !!}</td>
                </tr>
            </tbody>
        </table>
        @if (isset($tindak))
          <form action="{{route('tindak.update', $tindak->tindak_id)}}" method="post">
            @csrf
            @method('put')

            <input type="hidden" name="indicator_id" value="{{$rencana->indicator_id}}">
            <input type="hidden" name="department_id" value="{{$rencana->department_id}}">
            <input type="hidden" name="tahun" value="{{$rencana->tahun}}">
            <input type="hidden" name="semester" value="{{$rencana->semester}}">
            <div class="form-group">
                <label>Status Tindak Lanjut</label>
                <select name="status_tindak" class="form-control col-lg-3" required>
                  <option value="">--</option>
                  <option value="1" @selected($tindak->status_tindak == 1)>Belum dilaksanakan</option>
                  <option value="2" @selected($tindak->status_tindak == 2)>Sedang Proses</option>
                  <option value="3" @selected($tindak->status_tindak == 3)>Sudah dilaksanakan</option>
                </select>
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <textarea name="keterangan" id="keterangan" class="form-control" style="height: 100px">{{$tindak->keterangan ?? old('keterangan')}}</textarea>
            </div>
            <div class="form-group">
              <a href="{{route('tindak.index')}}" class="btn btn-icon btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        @else
        <form action="{{route('tindak.store')}}" method="post">
          @csrf
          <input type="hidden" name="indicator_id" value="{{$rencana->indicator_id}}">
          <input type="hidden" name="department_id" value="{{$rencana->department_id}}">
          <input type="hidden" name="tahun" value="{{$rencana->tahun}}">
          <input type="hidden" name="semester" value="{{$rencana->semester}}">
          <div class="form-group">
              <label>Status Tindak Lanjut</label>
              <select name="status_tindak" class="form-control col-lg-3" required>
                <option value="">--</option>
                <option value="1">Belum dilaksanakan</option>
                <option value="2">Sedang Proses</option>
                <option value="">Sudah dilaksanakan</option>
              </select>
          </div>
          <div class="form-group">
              <label>Keterangan</label>
              <textarea name="keterangan" id="keterangan" class="form-control" style="height: 100px" required>{{old('keterangan')}}</textarea>
          </div>
          <div class="form-group">
              <a href="{{route('tindak.index')}}" class="btn btn-icon btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
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


