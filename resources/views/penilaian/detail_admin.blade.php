@extends('layouts.admin-master')
@section('page-title', 'Penilaian')
@section('page-heading')
  <h1>Penilaian</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="{{route('penilaian.index')}}">Penilaian</a></div>
    <div class="breadcrumb-item"><a href="{{url()->previous()}}">{{$department->department_name}}</a></div>

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
               
            </tbody>
        </table>
        @if (isset($penilaian))
          <form action="{{route('penilaian.update', $penilaian->penilaian_id)}}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="indicator_id" value="{{$indicator->indicator_id}}">
            <input type="hidden" name="department_id" value="{{$department->department_id}}">
            <input type="hidden" name="tahun" value="{{$tahun}}">
            <input type="hidden" name="semester" value="{{$semester}}">
            <div class="form-group">
                <label>Penilaian</label>
                <div class="col-md-12">
                    <input type="radio" name="nilai" value="0" @checked($penilaian->nilai == 0) required>&nbsp{{$indicator->skala_0}} &nbsp
                </div>
                <div class="col-md-12">
                    <input type="radio" name="nilai" value="1" @checked($penilaian->nilai == 1) required>&nbsp{{$indicator->skala_1}} &nbsp
                </div>
                <div class="col-md-12">
                    <input type="radio" name="nilai" value="2" @checked($penilaian->nilai == 2) required>&nbsp{{$indicator->skala_2}} &nbsp
                </div>
                <div class="col-md-12">
                    <input type="radio" name="nilai" value="3" @checked($penilaian->nilai == 3) required>&nbsp{{$indicator->skala_3}} &nbsp
                </div>
                <div class="col-md-12">
                    <input type="radio" name="nilai" value="4" @checked($penilaian->nilai == 4) required>&nbsp{{$indicator->skala_4}} &nbsp
                </div>
                <div class="col-md-12">
                    <input type="radio" name="nilai" value="5" @checked($penilaian->nilai == 5) required>&nbsp{{$indicator->skala_5}} &nbsp
                </div>
            </div>
            <div class="form-group">
                <a href="{{route('penilaian.department', [$department->department_id, $tahun, $semester, ])}}" class="btn btn-icon btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </form>
        @else
          <form action="{{route('penilaian.store')}}" method="post">
            @csrf
            <input type="hidden" name="indicator_id" value="{{$indicator->indicator_id}}">
            <input type="hidden" name="department_id" value="{{$department->department_id}}">
            <input type="hidden" name="tahun" value="{{$tahun}}">
            <input type="hidden" name="semester" value="{{$semester}}">
            <div class="form-group">
                <label>Penilaian</label>
                <div class="col-md-12">
                    <input type="radio" name="nilai" value="0" required>&nbsp{{$indicator->skala_0}} &nbsp
                </div>
                <div class="col-md-12">
                    <input type="radio" name="nilai" value="1" required>&nbsp{{$indicator->skala_1}} &nbsp
                </div>
                <div class="col-md-12">
                    <input type="radio" name="nilai" value="2" required>&nbsp{{$indicator->skala_2}} &nbsp
                </div>
                <div class="col-md-12">
                    <input type="radio" name="nilai" value="3" required>&nbsp{{$indicator->skala_3}} &nbsp
                </div>
                <div class="col-md-12">
                    <input type="radio" name="nilai" value="4" required>&nbsp{{$indicator->skala_4}} &nbsp
                </div>
                <div class="col-md-12">
                    <input type="radio" name="nilai" value="5" required>&nbsp{{$indicator->skala_5}} &nbsp
                </div>
            </div>
            <div class="form-group">
                <a href="{{route('penilaian.department', [$department->department_id, $tahun, $semester, ])}}" class="btn btn-icon btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
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


