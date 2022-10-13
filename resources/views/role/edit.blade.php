@extends('layouts.admin-master')
@section('page-title', 'Edit Users Role')
@section('page-heading')
  <h1>Edit Users Role</h1>
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
        <form action="{{route('role.update', $role->id)}}" class="form" method="POST">
          @method('PUT')
          @csrf
          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">ROLE</label>
            <div class="col-sm-12 col-md-7">
              <input type="text" name="name" class="form-control" value="{{$role->name}}" readonly>
            </div>
          </div>
          <div class="form-group row mb-2">
            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">HAK AKSES</label>
            <div class="col-sm-12 col-md-10 row">
                @foreach ($permissions as $item)
                    <div class="col-md-3">
                        <input type="checkbox" name="permission[]" value="{{$item}}"
                            @foreach ($userPermission as $items)
                                {{ $items == $item ? 'checked':''}}

                            @endforeach
                        >&nbsp{{$item}} &nbsp
                    </div>
                @endforeach
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
