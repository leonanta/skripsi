@extends('admin.main')

@section('content')
    <div class="container-fluid mt-4">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard Admin</h1>

        </div>

        <!-- Content Row -->
        {{-- <div class="row">

            <div class="col-md-4">

                <!-- Earnings (Monthly) Card Example -->
                <div class="mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total Client</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">12</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user-circle fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
                <!-- Pie Chart -->
                <div>
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div
                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Bandwidth Categories</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-pie pt-4 pb-2">
                                <canvas id="myPieChart"></canvas>
                            </div>
                            <div class="mt-4 text-center small">
                                <span class="mr-2">
                                    <i class="fas fa-circle text-primary"></i> Direct
                                </span>
                                <span class="mr-2">
                                    <i class="fas fa-circle text-success"></i> Social
                                </span>
                                <span class="mr-2">
                                    <i class="fas fa-circle text-info"></i> Referral
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            
            <div class="col-md-8">

                <!-- Table -->
                <div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Latest Client</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Bandwidth</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>Edinburgh</td>
                                            <td>2 Mbps</td>
                                            <td><button class="btn btn-sm btn-primary">Details</button>
                                        </tr>
                                        <tr>
                                            <td>Garrett Winters</td>
                                            <td>Tokyo</td>
                                            <td>2 Mbps</td>
                                            <td><button class="btn btn-sm btn-primary">Details</button>
                                        </tr>
                                        <tr>
                                            <td>Ashton Cox</td>
                                        
                                            <td>San Francisco</td>
                                            <td>2 Mbps</td>
                                            <td><button class="btn btn-sm btn-primary">Details</button>
                                        </tr>
                                        <tr>
                                            <td>Cedric Kelly</td>
                                            <td>Edinburgh</td>
                                            <td>2 Mbps</td>
                                            <td><button class="btn btn-sm btn-primary">Details</button>
                                        </tr>
                                        <tr>
                                            <td>Airi Satou</td>
                                            <td>Tokyo</td>
                                            <td>2 Mbps</td>
                                            <td><button class="btn btn-sm btn-primary">Details</button>
                                        </tr>
                                        <tr>
                                            <td>Ashton Cox</td>
                                        
                                            <td>San Francisco</td>
                                            <td>2 Mbps</td>
                                            <td><button class="btn btn-sm btn-primary">Details</button>
                                        </tr>
                                        <tr>
                                            <td>Cedric Kelly</td>
                                            <td>Edinburgh</td>
                                            <td>2 Mbps</td>
                                            <td><button class="btn btn-sm btn-primary">Details</button>
                                        </tr>
                                        <tr>
                                            <td>Airi Satou</td>
                                            <td>Tokyo</td>
                                            <td>2 Mbps</td>
                                            <td><button class="btn btn-sm btn-primary">Details</button>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div> --}}

    </div>
@endsection