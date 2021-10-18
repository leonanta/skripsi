@extends('mahasiswa.main')

@section('content')
    <div class="container-fluid mt-4">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-2 text-gray-800">Jadwal Seminar</h1>
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
                    </tbody>
                  </table>
                <div class="ml-2 mt-4">
                    <a href="{{ route('datadaftarsempro')}}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
            <div class="col-md-6">
                <table class="table table-borderless">
                    <tbody>
                      <tr>
                        <td>Hari/Tanggal</td>
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
                            echo tgl_indo($item->tanggal, true);
                          ?>
                        </th>
                      </tr>
                      <tr>
                        <td>Jam</td>
                        <td>:</td>
                        <th>{{ $item->jam }} WIB</th>
                      </tr>
                      <tr>
                        <td>Tempat</td>
                        <td>:</td>
                        <th>{{ $item->tempat }}</th>
                      </tr>
                      <tr>
                        <td>Keterangan</td>
                        <td>:</td>
                        <th>{{ $item->ket }}</th>
                      </tr>
                    </tbody>
                  </table>
            </div>
            @endforeach
        </div>

    </div>
@endsection