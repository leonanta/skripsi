@extends('mahasiswa.main')

@section('content')
    <div class="container-fluid mt-4">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard Mahasiswa</h1>

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
        <div class="row">
            <div class="col-md-12">
                <div class="mb-4">
                    <div class="card border-left-primary h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-secondary text-uppercase mb-2">
                                        NIM</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800 mb-5">{{ $user -> no_induk }}</div>
                                    <div class="text-xs font-weight-bold text-secondary text-uppercase mb-2">
                                        Nama</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $user -> name }}</div>
                                </div>
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-secondary text-uppercase mb-2">
                                        Email</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800 mb-5">{{ $mhs -> email  }}</div>
                                    <div class="text-xs font-weight-bold text-secondary text-uppercase mb-2">
                                        No. Hp/WA</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $mhs -> hp }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    

            </div>

        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="mb-4">
                    <div class="card border-left-success h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center justify-content-center">
                                <div class="col-auto">
                                    <i class="fas fa-user-circle fa-5x text-gray-300"></i>
                                </div>
                                <div class="col mr-2 ml-4">
                                    <div class="text-xs font-weight-bold text-secondary text-uppercase mb-2">
                                        Dosen Pembimbing 1</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $data -> dosbing1 }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    

            </div>

            <div class="col-md-6">
                <div class="mb-4">
                    <div class="card border-left-warning h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <i class="fas fa-user-circle fa-5x text-gray-300"></i>
                                </div>
                                <div class="col mr-2 ml-4">
                                    <div class="text-xs font-weight-bold text-secondary text-uppercase mb-2">
                                        Dosen Pembimbing 2</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $data -> dosbing2 }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    

            </div>

        </div>

    </div>
@endsection