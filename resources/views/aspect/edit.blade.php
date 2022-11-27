@extends('layouts.admin-master')
@section('page-title', 'Edit Aspek')
@section('page-heading')
  <h1>Edit Aspek</h1>
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
        <form action="{{route('aspects.update', $aspect->aspect_id)}}" class="form" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group row mb-2">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Aspek</label>
            <div class="col-sm-12 col-md-4">
              <input type="text" name="aspect_name" class="form-control" value="{{old('aspect_name') ?? $aspect->aspect_name}}" required>
            </div>
          </div>
          <div class="form-group row mb-2">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bobot Aspek</label>
            <div class="col-sm-12 col-md-4">
              <input type="text" name="aspect_bobot" class="form-control" value="{{old('aspect_bobot') ?? $aspect->aspect_bobot}}" required>
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


