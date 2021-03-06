@extends('mahasiswa.main')

@section('content')
    <div class="container-fluid mt-4">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pendaftaran Seminar</h1>
            <div class="pull-right">
                <a href="/mahasiswa/proposal/tambahsempro" class="btn btn-success btn-flat" <?=$dataprop === null ? 'style="pointer-events: none;cursor: default; opacity: 0.7;"' : '' ?>>
                    <i class="fa fa-plus"></i> Daftar
                </a>
            </div>
        </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $message }}</strong>
        </div>
        @endif

        @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $message }}</strong>
        </div>
        @endif

        <!-- Content Row -->
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" style="width:100%" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>No. HP/WA</th>
                                <th>Judul</th>
                                <th>Dosbing 1</th>
                                <th>Dosbing 2</th>
                                <th>Berkas</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1?>
                              @foreach($data as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item -> nim }}</td>
                                    <td>{{ $item -> nama }}</td>
                                    <td>{{ $item -> hp }}</td>
                                    <td>{{ $item -> judul }}</td>
                                    <td>{{ $item -> dosbing1 }}</td>
                                    <td>{{ $item -> dosbing2 }}</td>
                                    <td><a href="/download/berkassempro/{{$item->berkas_sempro}}">{{$item->berkas_sempro}}</a></td>
                                    <td>
                                        @if ($jadwal === null)
                                            {{ $item -> status }}
                                        @else
                                            <a href="{{ route('datajadwalsempro') }}" class="btn btn-sm btn-primary">Lihat Jadwal</a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
    
            </div>
        </div>

        
    </div>
@endsection