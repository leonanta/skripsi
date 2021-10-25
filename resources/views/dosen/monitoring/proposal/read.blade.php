@extends('dosen.main')

@section('content')
    <div class="container-fluid mt-4">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Monitoring Proposal Mahasiswa</h1>
            <div class="pull-right">
                <select class="custom-select" id="filterdosen">
                    <option value="3" id="3">All</option>
                    <option value="4" id="4">Menunggu ACC</option>
                    <option value="1" id="1">Dosen 1</option>
                    <option value="2" id="2">Dosen 2</option>
                </select>
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
                                <th>Semester</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Judul</th>
                                <th>Proposal</th>
                                <th>Keterangan Mhs</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody id="datatabel">
                            <?php $no=1?>
                              @foreach($dosbing as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item -> semester}} {{ $item -> tahun}}</td>
                                    <td>{{ $item -> nim }}</td>
                                    <td>{{ $item -> nama }}</td>
                                    <td>{{ $item -> judul }}</td>
                                    <td><a href="/download/{{$item->proposal}}">{{$item->proposal}}</a></td>
                                    <td>
                                        {{-- @if ($item -> dosbing1 == $user -> name)
                                            {{ $item -> komentar1 }}
                                        @else
                                            {{ $item -> komentar2 }}
                                        @endif --}}
                                        {{ $item -> komentar }}
                                    </td>
                                    <td>
                                        @if ($item -> dosbing1 == $user -> name)
                                            {{ $item -> ket1 }}
                                        @else
                                            {{ $item -> ket2 }}
                                        @endif
                                    </td>
                                    <td>
                                        <form action="/dosen/monitoring/proposal/acc/{{$item->id}}" method="post">
                                            {{csrf_field()}}
                                            {{method_field('PUT')}}
                                            <button type="submit" value="acc" class="btn btn-success btn-sm mb-1" <?=($item->dosbing1 == $user->name && $item->ket1 == 'Menunggu ACC' ? '' : 'disabled') ? ($item->dosbing2 == $user->name && $item->ket2 == 'Menunggu ACC' ? '' :'disabled') : ''?>>ACC</button>
                                        </form>
                                        <form action="/dosen/monitoring/proposal/tolak/{{$item->id}}" method="post">
                                            {{csrf_field()}}
                                            {{method_field('PUT')}}
                                            <button type="submit" value="tolak" class="btn btn-danger btn-sm mb-1" <?=($item->dosbing1 == $user->name && $item->ket1 == 'Menunggu ACC' ? '' : 'disabled') ? ($item->dosbing2 == $user->name && $item->ket2 == 'Menunggu ACC' ? '' :'disabled') : ''?>>Tolak</button>
                                        </form>
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal{{$item->id}}" <?=($item->dosbing1 == $user->name && $item->ket1 == 'Menunggu ACC' ? '' : 'disabled') ? ($item->dosbing2 == $user->name && $item->ket2 == 'Menunggu ACC' ? '' :'disabled') : ''?>>
                                            Revisi
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="modal{{$item->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Komentar Revisi</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <form action="/dosen/monitoring/proposal/revisi/{{$item->id}}" method="post">
                                                    {{csrf_field()}}
                                                    {{method_field('PUT')}}
                                                    <div class="modal-body">
                                                        <textarea class="form-control" name="komentar" placeholder="Masukkan Komentar"></textarea>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" name="submit" class="btn btn-primary">Kirim</button>
                                                    </div>
                                                </form>
                                            </div>
                                            </div>
                                        </div>
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