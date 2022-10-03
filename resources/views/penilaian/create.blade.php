@extends('layouts.admin-master')
@section('page-heading', 'Upload Dokumen Laporan Penilaian')
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
        <form action="{{route('penilaian.store', $indicator->indicator_id)}}" class="form" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="indicator_id" value="{{$indicator->indicator_id}}">
          <div class="form-group row mb-2">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Indikator</label>
            <div class="col-sm-12 col-md-9">
              {{-- <input type="text" name="indicator_name" class="form-control" value="{{$indicator->indicator_name}}" readonly> --}}
             <textarea name="indicator_name" class="form-control" style="height: 60px" disabled>{{old("indicator_name") ?? $indicator->indicator_name}}</textarea>
            </div>
          </div>
          <div class="form-group row mb-2">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tahun</label>
            <div class="col-sm-12 col-md-2">
              <input type="text" name="tahun" class="form-control" value="{{date('Y')}}" disabled>
            </div>
          </div>
          <div class="form-group row mb-2">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Semester</label>
            <div class="col-sm-12 col-md-1">
              <input type="text" name="semester" class="form-control" value="{{getSemester()}}" readonly>
            </div>
          </div>
          <div class="form-group row mb-2">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Keterangan</label>
            <div class="col-sm-12 col-md-7">
                <div>
                    {!! $indicator->indicator_description !!}
                </div>
            </div>
          </div>
          <div class="form-group row mb-2">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Dokumen #1 : <strong>{{$indicator->doc_1}}</strong></label>
            <div class="col-sm-12 col-md-9">
              <input type="file" name="file_1" class="form-control" required>
            </div>
          </div>

          @if ($indicator->doc_2 != '')
          <div class="form-group row mb-2">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Dokumen #2 : <strong>{{$indicator->doc_2}}</strong></label>
            <div class="col-sm-12 col-md-9">
              <input type="file" name="file_2" class="form-control" required>
            </div>
          </div>
          @endif

          @if ($indicator->doc_3 != '')
          <div class="form-group row mb-2">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Dokumen #3 : <strong>{{$indicator->doc_3}}</strong></label>
            <div class="col-sm-12 col-md-9">
              <input type="file" name="file_3" class="form-control" required>
            </div>
          </div>
          @endif

          @if ($indicator->doc_4 != '')
          <div class="form-group row mb-2">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Dokumen #4 : <strong>{{$indicator->doc_4}}</strong></label>
            <div class="col-sm-12 col-md-9">
              <input type="file" name="file_4" class="form-control" required>
            </div>
          </div>
          @endif
          
          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
            <div class="col-sm-12 col-md-7">
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@push('css-datatables')
@endpush
@push('datatables-js')
@endpush


