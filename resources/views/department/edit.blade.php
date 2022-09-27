@extends('layouts.admin-master')
@section('page-heading', 'Edit Department')
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
        <form action="{{route('department.update', $department->department_id)}}" class="form" method="POST">
          @csrf
          @method("PUT")
          <div class="form-group row mb-2">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Department</label>
            <div class="col-sm-6 col-md-6">
              <input type="text" name="department_name" class="form-control" value="{{old("department_name") ?? $department->department_name}}" required>
            </div>
          </div>
          <div class="form-group row mb-2">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Lengkap Department</label>
            <div class="col-sm-12 col-md-9">
              <input type="text" name="department_fullname" class="form-control" value="{{old("department_fullname") ?? $department->department_fullname}}" required>
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
@push('css-datatables')
@endpush
@push('datatables-js')
@endpush


