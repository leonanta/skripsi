@extends('admin.main')

@section('content')
    <div class="container-fluid mt-4">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Mahasiswa</h1>
            <div class="pull-right">
                <a href="/admin/mahasiswa/tambah" class="btn btn-success btn-flat">
                    <i class="fa fa-plus"></i> Tambah Mahasiswa
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
                                <th>Nama Mahasiswa</th>
                                <th>Email</th>
                                <th>No. Hp/WA</th>
                                <th>Edit</th>
                                <th>Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1?>
                              @foreach($data as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item -> nim }}</td>
                                    <td>{{ $item -> name }}</td>
                                    <td>{{ $item -> email }}</td>
                                    <td>{{ $item -> hp }}</td>
                                    <td>
                                        <a href="/admin/mahasiswa/edit/{{$item->nim}}" class="btn btn-primary btn-sm">Edit</a>
                                    </td>
                                    <td>
                                        <form action="/admin/mahasiswa/{{$item->nim}}" method="post">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button type="submit" value="delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                        </form>
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