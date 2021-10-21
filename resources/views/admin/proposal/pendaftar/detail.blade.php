@extends('admin.main')

@section('content')
    <div class="container-fluid mt-4">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-2 text-gray-800">Detail Pendaftar</h1>
        </div>

        {{-- Form --}}
        <div class="row mt-5">
          @foreach($data as $item)
          <div class="col-md-6">
            <table class="table table-borderless">
                    <tbody>
                      <tr>
                        <td>NIM</td>
                        <td>:</td>
                        <th>{{ $item->nim }}</th>
                      </tr>
                      <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <th>{{ $item->nama }}</th>
                      </tr>
                      <tr>
                        <td>Judul</td>
                        <td>:</td>
                        <th>{{ $item->judul }}</th>
                      </tr>
                      <tr>
                        <td>Dosen 1</td>
                        <td>:</td>
                        <th>{{ $item->dosbing1 }}</th>
                      </tr>
                      <tr>
                        <td>Dosen 2</td>
                        <td>:</td>
                        <th>{{ $item->dosbing2 }}</th>
                      </tr>
                      <tr>
                        <td>Berkas Seminar</td>
                        <td>:</td>
                        <th><a href="/download/berkassempro/{{$item->berkas_sempro}}">{{ $item->berkas_sempro }}</th>
                      </tr>
                      <tr>
                        <td>Tanggal Pendaftaran</td>
                        <td>:</td>
                        <th>
                          <?php
                            function tgl_indo($tanggal, $cetak_hari = false){
                              $hari = array ( 1 =>    'Senin',
                                    'Selasa',
                                    'Rabu',
                                    'Kamis',
                                    'Jumat',
                                    'Sabtu',
                                    'Minggu'
                                  );
                                  
                              $bulan = array (1 =>   'Januari',
                                    'Februari',
                                    'Maret',
                                    'April',
                                    'Mei',
                                    'Juni',
                                    'Juli',
                                    'Agustus',
                                    'September',
                                    'Oktober',
                                    'November',
                                    'Desember'
                                  );
                              $split 	  = explode('-', $tanggal);
                              $tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
                              
                              if ($cetak_hari) {
                                $num = date('N', strtotime($tanggal));
                                return $hari[$num] . ', ' . $tgl_indo;
                              }
                              return $tgl_indo;
                            }
                            $tgl = substr($item->tgl_daftar, 0, 10);
                            echo tgl_indo($tgl, true);
                          ?>
                        </th>
                      </tr>
                    </tbody>
                  </table>
                <div class="ml-2 mt-4 mb-4">
                  <form class="user" action="/admin/proposal/insertjadwalsempro" method="POST">
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-primary mr-2">Jadwalkan</button>
                    <a href="{{ route('datadaftarsempro')}}" class="btn btn-secondary">Batal</a>
                </div>
            </div>
            <div class="col-md-5 ml-4">
                <table class="table table-borderless">
                    <tbody>
                      <div class="form-group">
                        <label for="" class="small">Tanggal Seminar*</label>
                        <input type="text" class="form-control" id="datepicker" name="tanggal" placeholder="Masukkan Tanggal" required>
                      </div>
                      <div class="form-group">
                        <label for="" class="small">Jam Seminar*</label>
                        <input type="text" class="form-control" id="timepicker" name="jam" placeholder="Masukkan Jam (Jam:Menit:Detik)" required>
                      </div>
                      <div class="form-group">
                        <label for="" class="small">Tempat Seminar*</label>
                        <input type="text" class="form-control" name="tempat" placeholder="Masukkan Tempat" required>
                      </div>
                      <div class="form-group">
                        <label for="" class="small">Keterangan*</label>
                        <textarea class="form-control form-control-user" name="ket" placeholder="Masukkan Keterangan"></textarea>
                        <input type="hidden" name="nim" value="{{ $item->nim }}">
                        <input type="hidden" name="id_berkas_sempro" value="{{ $item->id }}">
                      </div>
                    </tbody>
                  </table>
            </div>
        </div>
        @endforeach
    </div>
@endsection