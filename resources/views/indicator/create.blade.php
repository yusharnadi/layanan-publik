@extends('layouts.admin-master')
@section('page-heading', 'Tambah Indikator')
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
        <form action="{{route('indicator.store')}}" class="form" method="POST">
          @csrf
          <div class="form-group row mb-2">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode Indikator</label>
            <div class="col-sm-6 col-md-3">
              <input type="text" name="indicator_code" class="form-control" value="{{old("indicator_code")}}" required>
            </div>
          </div>
          <div class="form-group row mb-2">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Indikator</label>
            <div class="col-sm-12 col-md-7">
              <input type="text" name="indicator_name" class="form-control" value="{{old("indicator_name")}}" required>
            </div>
          </div>
          <div class="form-group row mb-2">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi Indikator</label>
            <div class="col-sm-12 col-md-7">
             <textarea name="indicator_description" class="form-control" style="height: 100px">{{old("indicator_description")}}</textarea>
            </div>
          </div>
          <div class="form-group row mb-2">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Aspect</label>
            <div class="col-sm-5 col-md-3">
                <select name="aspect_id" class="form-control" required>
                    <option value="">--- Pilih Aspect ---</option>
                    @foreach ($aspects as $aspect)
                    <option value="{{$aspect->aspect_id}}">{{$aspect->aspect_name}}</option>
                    @endforeach
                </select>
            </div>
          </div>
          <div class="form-group row mb-2">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Visibilitas</label>
            <div class="col-sm-5 col-md-3">
                <select name="indicator_visibility" class="form-control" required>
                    <option value="">--- Pilih Visibilitas ---</option>
                    <option value="0">Publik</option>
                    <option value="1">Private</option>
                </select>
            </div>
          </div>
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


