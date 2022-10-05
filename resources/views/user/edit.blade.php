@extends('layouts.admin-master')
@section('page-heading', 'Edit User Admin')
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
        <form action="{{route('users.update', $user->id)}}" class="form" method="POST">
          @method('PUT')
          @csrf
          <div class="form-group row mb-2">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
            <div class="col-sm-12 col-md-4">
              <input type="text" name="name" class="form-control" value="{{$user->name}}" required>
            </div>
          </div>
          <div class="form-group row mb-2">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NIP</label>
            <div class="col-sm-12 col-md-3">
              <input type="text" name="nip" class="form-control" value="{{$user->nip}}" required>
            </div>
          </div>
          <div class="form-group row mb-2">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
            <div class="col-sm-12 col-md-4">
                <input type="email" name="email" class="form-control" value="{{$user->email}}" required>
            </div>
          </div>
          <div class="form-group row mb-2">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
            <div class="col-sm-12 col-md-4">
                <input type="password" name="password" class="form-control" >
            </div>
          </div>
          <div class="form-group row mb-2">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password Confirmation</label>
            <div class="col-sm-12 col-md-4">
                <input type="password" name="password_confirmation" class="form-control" >
            </div>
          </div>
          <div class="form-group row mb-2">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Department</label>
            <div class="col-sm-12 col-md-6">
                <select name="department_id" class="form-control" required>
                    <option value="">--- Pilih Department ---</option>
                    @foreach ($departments as $department)
                    <option value="{{$department->department_id}}" {{$user->department_id == $department->department_id ? 'selected':''}}>{{$department->department_fullname}}</option>
                    @endforeach
                </select>
            </div>
          </div>
          <div class="form-group row mb-2">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Role</label>
            <div class="col-sm-12 col-md-2">
                <select name="role" class="form-control" required>
                    <option value="">--- Pilih Role ---</option>
                    @foreach ($roles as $item)
                    <option value="{{$item}}" {{$role[0] == $item ? 'selected':''}}> 
                        {{$item}}</option>
                    @endforeach
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


