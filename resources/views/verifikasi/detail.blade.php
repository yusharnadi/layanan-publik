@extends('layouts.admin-master')
@section('page-title', 'Detail Verifikasi Penilaian')
@section('page-heading')
  <h1>Detail Verifikasi Penilaian</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="{{route('penilaian.index')}}">Detail Verifikasi Penilaian</a></div>
    <div class="breadcrumb-item">{{$penilaian->tahun}}</div>
    <div class="breadcrumb-item">Semester {{$penilaian->semester}}</div>
  </div>
@endsection
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <h4>Pelaporan</h4>
        </div>
        <div class="card-body table-responsive">
          @if (session('error'))
            <div class="alert alert-danger">{{session('error')}}</div> 
          @endif
          @if (session('message'))
            <div class="alert alert-primary">{{session('message')}}</div> 
          @endif

          <table class="table table-bordered">
            <tbody>
                <tr>
                    <td>Nama Indikator</td>
                    <td>{{$penilaian->indicator_code .' '. $penilaian->indicator_name}}</td>
                </tr>
                <tr>
                    <td>Deskripsi Indikator</td>
                    <td>{!!$penilaian->indicator_description!!}</td>
                </tr>
                @if ($penilaian->doc_1 != '')
                <tr>
                    <td>Dokumen #1</td>
                    <td>
                        Nama File : {{$penilaian->doc_1}}<br>
                        Link : @if (isset($laporan->file_1))
                            <a href="{{asset('uploads/'.$laporan->file_1)}}" target="_blank">{{$penilaian->doc_1}}</a>
                            
                        @else
                            -
                        @endif
                    </td>
                </tr>
                @endif

                @if ($penilaian->doc_2 != '')
                <tr>
                    <td>Dokumen #2</td>
                    <td>
                        Nama File : {{$penilaian->doc_2}}<br>
                        Link : @if (isset($laporan->file_2))
                            <a href="{{asset('uploads/'.$laporan->file_2)}}" target="_blank">{{$penilaian->doc_2}}</a>
                            
                        @else
                            -
                        @endif
                    </td>
                </tr>
                @endif

                @if ($penilaian->doc_3 != '')
                <tr>
                    <td>Dokumen #3</td>
                    <td>
                        Nama File : {{$penilaian->doc_3}}<br>
                        Link : @if (isset($laporan->file_3))
                            <a href="{{asset('uploads/'.$laporan->file_3)}}" target="_blank">{{$penilaian->doc_3}}</a>
                            
                        @else
                            -
                        @endif
                    </td>
                </tr>
                @endif

                @if ($penilaian->doc_4 != '')
                <tr>
                    <td>Dokumen #2</td>
                    <td>
                        Nama File : {{$penilaian->doc_4}}<br>
                        Link : @if (isset($laporan->file_4))
                            <a href="{{asset('uploads/'.$laporan->file_4)}}" target="_blank">{{$penilaian->doc_4}}</a>
                            
                        @else
                            -
                        @endif
                    </td>
                </tr>
                @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <h4>Monev</h4>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <tbody>
                <tr>
                    <td style="width: 150px">Hasil Evaluasi</td>
                    <td>{!!$evaluasi->hasil_evaluasi ?? '-'!!}</td>
                </tr>
                <tr>
                  <td style="width: 150px">Rekomendasi</td>
                  <td>{!!$evaluasi->rekomendasi ?? '-'!!}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <h4>Rencana Aksi</h4>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <tbody>
                <tr>
                    <td style="width: 150px">Rencana Aksi</td>
                    <td>{!!$rencana->rencana ?? '-'!!}</td>
                </tr>
                <tr>
                  <td style="width: 150px">Target</td>
                  <td>{!!$rencana->target  ?? '-'!!}</td>
                </tr>
                <tr>
                  <td style="width: 150px">Output</td>
                  <td>{!!$rencana->output  ?? '-'!!}</td>
                </tr>
                <tr>
                  <td style="width: 150px">Waktu Penyelesaian</td>
                  <td>{!!$rencana->waktu_penyelesaian  ?? '-'!!}</td>
                </tr>
                <tr>
                  <td style="width: 10px">Penanggung Jawab</td>
                  <td>{!!$rencana->penanggung_jawab  ?? '-'!!}</td>
                </tr>
                <tr>
                  <td style="width: 150px">Keterangan</td>
                  <td>{!!$rencana->keterangan  ?? '-'!!}</td>
                </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <h4>Tindak Lanjut</h4>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <tbody>
                <tr>
                    <td style="width: 150px">Status Tindak Lanjut</td>
                    <td>
                      @if ($tindak && $tindak->status_tindak == 1)
                        Belum Dilaksanakan
                      @elseif($tindak && $tindak->status_tindak == 2)
                        Sedang Proses
                      @elseif($tindak && $tindak->status_tindak == 3)
                        Sudah Dilaksanakan
                      @else
                        - 
                      @endif
                  </td>
                </tr>
                <tr>
                  <td style="width: 150px">Keterangan</td>
                  <td>{!!$tindak->keterangan  ?? '-'!!}</td>
                </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <h4>Penilaian</h4>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <tbody>
                <tr>
                    <td style="width: 150px">Status Tindak Lanjut</td>
                    <td>
                      <div class="form-group">
                        <label></label>
                        <div class="col-md-12">
                            <input type="radio" name="nilai" value="0" @checked($penilaian->nilai == 0) @disabled(true) >&nbsp{{$penilaian->skala_0}} &nbsp
                        </div>
                        <div class="col-md-12">
                            <input type="radio" name="nilai" value="1" @checked($penilaian->nilai == 1) @disabled(true)>&nbsp{{$penilaian->skala_1}} &nbsp
                        </div>
                        <div class="col-md-12">
                            <input type="radio" name="nilai" value="2" @checked($penilaian->nilai == 2) @disabled(true)>&nbsp{{$penilaian->skala_2}} &nbsp
                        </div>
                        <div class="col-md-12">
                            <input type="radio" name="nilai" value="3" @checked($penilaian->nilai == 3) @disabled(true)>&nbsp{{$penilaian->skala_3}} &nbsp
                        </div>
                        <div class="col-md-12">
                            <input type="radio" name="nilai" value="4" @checked($penilaian->nilai == 4) @disabled(true)>&nbsp{{$penilaian->skala_4}} &nbsp
                        </div>
                        <div class="col-md-12">
                            <input type="radio" name="nilai" value="5" @checked($penilaian->nilai == 5) @disabled(true)>&nbsp{{$penilaian->skala_5}} &nbsp
                        </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td style="width: 150px">Skor</td>
                  <td><strong>{{$penilaian->nilai    ?? '-'}}</strong></td>
                </tr>
            </tbody>
          </table>
          <form action="{{route('verifikasi.update', $penilaian->penilaian_id)}}" method="post">
            @csrf
            <input type="hidden" name="department_id" value="{{$penilaian->department_id}}">
            <input type="hidden" name="tahun" value="{{$penilaian->tahun}}">
            <input type="hidden" name="semester" value="{{$penilaian->semester}}">
            <div class="form-group">
              <label>Verifikasi Hasil Penilaian</label>
              <div class="col-md-12">
                  <input type="radio" name="status" value="4" @checked($penilaian->status == 4) required> Disetujui
              </div>
              <div class="col-md-12">
                  <input type="radio" name="status" value="2" @checked($penilaian->status == 2) required> Perlu Ditinjau Kembali
              </div>
            </div>
            <div class="form-group">
              <label>Keterangan</label>
              <textarea name="keterangan" id="keterangan" class="form-control" style="height: 100px" required>{{old('keterangan') ?? $penilaian->keterangan}}</textarea>
            </div>
            <div class="form-group">
              <a href="{{route('verifikasi.index', ['department_id' => $penilaian->department_id, 'tahun'=> $penilaian->tahun, 'semester'=> $penilaian->semester])}}" class=" btn btn-info btn-icon"><i class="fas fa-arrow-left"></i> Kembali</a>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('css-datatables')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

@endpush
@push('datatables-js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

<script>
  $(document).ready( function () {

      $('#keterangan').summernote({
        placeholder: 'Keterangan',
        tabsize: 2,
        height: 200,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['view', [, 'codeview']]
        ]
      });
    });
</script>
@endpush
