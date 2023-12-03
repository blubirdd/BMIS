@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Dashboard') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$barangays}}</h3>

                            <p>Barangays</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-university"></i>
                        </div>
                        <a href="{{route('barangay.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-teal">
                        <div class="inner">
                            <h3>{{$countByCity}}</h3>

                            <p>Cities</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-building"></i>
                        </div>
                        <a href="{{route('barangay.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{$complaints}}</h3>

                            <p>Resident Complaints</p>
                        </div>
                        <div class="icon">
                            <i class="	fas fa-exclamation"></i>
                        </div>
                        <a href="{{route('barangay.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->

            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <div class="card card-secondary ml-2">
                    <div class="card-header bg-gradient-gray-dark">
                        <h3 class="card-title">Complaints per Barangay</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-md">
                            <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 500px; max-width: 100%;"></canvas>
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="card card-secondary ml-2">
                    <div class="card-header bg-gradient-gray">
                        <h3 class="card-title">Residents per Barangay</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-md">
                            <canvas id="barChart" style="min-height: 300px; height: 300px; max-height: 500px; width: 100%;"></canvas>
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.card -->


            <!-- /.card -->

        </div><!-- /.container-fluid -->

    </div>
    <!-- /.content -->

    @section('scripts')
{{--        <script src="{{ asset('plugins/chartjs/Chart.min.js') }}" defer></script>--}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <script>
        const ctx = document.getElementById('donutChart');
        const bar = document.getElementById('barChart');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: {!! json_encode($barangayArray) !!},
                datasets: [{
                    label: '# of complaints',
                    data: {!! json_encode($complaintsArray) !!},
                    borderWidth: 1,
                }]
            },
        });

        new Chart(bar, {
            type: 'bar',
            data: {
                labels: {!! json_encode($barangayResidentArray) !!},
                datasets: [{
                    label: 'Population per Barangay',
                    data: {!! json_encode($residentsArray) !!},
                    borderWidth: 1,
                    backgroundColor: [
                        'rgba(37, 41, 88, 0.7)',
                    ],
                }]
            },
        });


    </script>

    @endsection
@endsection
