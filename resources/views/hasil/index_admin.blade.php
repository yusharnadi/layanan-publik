@extends('layouts.admin-master')
@section('page-title', 'Hasil Penilaian')
@section('page-heading')
  <h1>Hasil Penilaian</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="{{route('penilaian.index')}}">Hasil Penilaian</a></div>
    <div class="breadcrumb-item">{{$tahun}}</div>
    <div class="breadcrumb-item">Semester {{$semester}}</div>
  </div>
@endsection
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body table-responsive">
          <form method="get" action="{{route('hasil.index')}}">
            <div class="row mt-4">
                <div class="form-group col-sm-4">
                    <label for="select-semester">Department</label>
                    <select name="department_id" id="select-department" class="form-control select2">
                        @foreach ($departments as $department)
                            <option value="{{$department->department_id}}" @selected($department_id == $department->department_id)>{{$department->department_fullname}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-2">
                    <label for="tahun">Tahun</label>
                    <input type="number" id="tahun" name="tahun" class="form-control" placeholder="2022" value="{{$tahun}}" min="2021" max="2100">
                </div>
                <div class="form-group col-sm-2">
                    <label for="select-semester">Semester</label>
                    <select name="semester" id="select-semester" class="form-control">
                        <option value="1" {{$semester == 1 ? 'selected':''}}>1</option>
                        <option value="2" {{$semester == 2 ? 'selected':''}}>2</option>
                    </select>
                </div>
              <div class="form-group col-sm-3">
                <label for="date-filter"><p></p></label>
                <div>
                <button class="btn btn-primary" id="btn-download"><span class="fas fa-search"></span> Filter</button>
                </div>
              </div>
            

            </div>
        </form>
          {{-- <a href="{{route('department.create')}}" class="btn btn-info mb-2">Tambah Data</a> --}}
          @if (session('error'))
            <div class="alert alert-danger">{{session('error')}}</div> 
          @endif
          @if (session('message'))
            <div class="alert alert-primary">{{session('message')}}</div> 
          @endif
          <table class="table table-hover">
            <thead>
              <tr>
                <th style="width: 10px;">ID</th>
                <th>Aspect</th>
                <th style="width: 160px;" >Hasil Penilaian</th>
                <th style="width: 20px;">#</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($aspects as $aspect)  
                <tr>
                    <td>{{$aspect->aspect_id}}</td>
                    <td>{{$aspect->aspect_name}}</td>
                    <td>{{getHasilPenilaian($department_id, $tahun, $semester, $aspect->aspect_id)}}</td>
                    <td>
                        <a href="{{route('hasil.aspect_detail', [$aspect->aspect_id, $department_id, $tahun, $semester])}}" class="btn btn-icon btn-sm btn-info"><i class="fas fa-arrow-right"></i></a>
                        {{-- <a href="{{route('department.delete', $department->department_id)}}" class="btn btn-icon btn-sm btn-danger"><i class="fas fa-trash"></i></a> --}}
                    </td>
                </tr>
            @endforeach
            <tr>
              <th colspan="2" class="text-right">Total</th>
              <th>{{getTotalPenilaian($department_id, $tahun, $semester)}}</th>
            </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('css-datatables')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@push('datatables-js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $(document).ready( function () {
      // Select2
      if(jQuery().select2) {
        $(".select2").select2();
      }
    });
</script>
@endpush
