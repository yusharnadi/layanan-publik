@extends('layouts.admin-master')
@section('page-heading', 'Dokumen Laporan Penilaian')
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
        <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th>Indikator</th>
                <th>{{$penilaian->indicator_name}}</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                    <td>ULP</td>
                    <td><strong>{{$penilaian->department_fullname}}</strong></td>
                </tr>
                <tr>
                    <td>PIC</td>
                    <td>{{$penilaian->nip . ' - ' . $penilaian->name}}</td>
                </tr>
                <tr>
                    <td>Tahun</td>
                    <td>{{date('Y')}}</td>
                </tr>
                <tr>
                    <td>Semester</td>
                    <td>{{getSemester()}}</td>
                </tr>
                @if ($penilaian->doc_1 != '')
                <tr>
                    <td>Dokumen #1</td>
                    <td>
                        <a href="{{asset('uploads/'.$penilaian->file_1)}}" target="_blank">{{$penilaian->doc_1}}</a>
                    </td>
                </tr>
                @endif
                @if ($penilaian->doc_2 != '')
                <tr>
                    <td>Dokumen #2</td>
                    <td>
                        <a href="{{asset('uploads/'.$penilaian->file_2)}}" target="_blank">{{$penilaian->doc_2}}</a>
                    </td>
                </tr>
                @endif
                @if ($penilaian->doc_3 != '')
                <tr>
                    <td>Dokumen #3</td>
                    <td>
                        <a href="{{asset('uploads/'.$penilaian->file_3)}}" target="_blank">{{$penilaian->doc_3}}</a>
                    </td>
                </tr>
                @endif
                @if ($penilaian->doc_4 != '')
                <tr>
                    <td>Dokumen #4</td>
                    <td>
                        <a href="{{asset('uploads/'.$penilaian->file_4)}}" target="_blank">{{$penilaian->doc_4}}</a>
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
@push('css-datatables')
@endpush
@push('datatables-js')
@endpush


