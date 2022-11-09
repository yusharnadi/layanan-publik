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
                @if (isset($laporan) && $laporan->doc_2 != '')
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
                  <td>Keterangan</td>
                  <td>{!!$indicator->indicator_description !!}</td>
                </tr>
            </tbody>
        </table>
        @if (isset($evaluasi))
          <form action="{{route('evaluasi.update', $evaluasi->evaluasi_id)}}" method="post">
            @csrf
            @method('PUT')

            <input type="hidden" name="indicator_id" value="{{$indicator->indicator_id}}">
            <input type="hidden" name="department_id" value="{{$department->department_id}}">
            <input type="hidden" name="tahun" value="{{$tahun}}">
            <input type="hidden" name="semester" value="{{$semester}}">
            <div class="form-group">
                <label>Hasil Evaluasi</label>
                <textarea name="hasil_evaluasi" id="hasil_evaluasi" class="form-control" style="height: 100px" required>{{$evaluasi->hasil_evaluasi ?? ''}}</textarea>
            </div>
            <div class="form-group">
                <label>Rekomendasi</label>
                <textarea name="rekomendasi" id="rekomendasi" class="form-control" style="height: 100px" required>{{$evaluasi->rekomendasi ?? ''}}</textarea>
            </div>
            <div class="form-group">
                <a href="{{route('evaluasi.department', [$department->department_id, $tahun, $semester, ])}}" class="btn btn-icon btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        @else
          <form action="{{route('evaluasi.store')}}" method="post">
            @csrf
            <input type="hidden" name="indicator_id" value="{{$indicator->indicator_id}}">
            <input type="hidden" name="department_id" value="{{$department->department_id}}">
            <input type="hidden" name="tahun" value="{{$tahun}}">
            <input type="hidden" name="semester" value="{{$semester}}">
            <div class="form-group">
                <label>Hasil Evaluasi</label>
                <textarea name="hasil_evaluasi" id="hasil_evaluasi" class="form-control" style="height: 100px" required>{{$evaluasi->hasil_evaluasi ?? ''}}</textarea>
            </div>
            <div class="form-group">
                <label>Rekomendasi</label>
                <textarea name="rekomendasi" id="rekomendasi" class="form-control" style="height: 100px" required>{{$evaluasi->rekomendasi ?? ''}}</textarea>
            </div>
            <div class="form-group">
                <a href="{{route('evaluasi.department', [$department->department_id, $tahun, $semester, ])}}" class="btn btn-icon btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
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
      $('#hasil_evaluasi').summernote({
        placeholder: 'Hasil Evaluasi',
        tabsize: 2,
        height: 200,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link']],
          ['view', [, 'codeview']]
        ]
      });

      $('#rekomendasi').summernote({
        placeholder: 'Rekomendasi',
        tabsize: 2,
        height: 200,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link']],
          ['view', [, 'codeview']]
        ]
      });
    });
  </script>
@endpush


