@extends('admin.layout-admin')

@section('admin_content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{trans('admin/index.Dashboard')}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right" style="float: right !important;">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{trans('admin/index.Home')}}</a></li>
                            <li class="breadcrumb-item active">{{trans('admin/index.Dashboard')}}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <a href="{{route('admin.statistics')}}" class="btn btn-danger">Back</a>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Statistics Filter</h3> &nbsp;&nbsp;&nbsp;&nbsp;
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Advertisement Name</th>
                                        <th>Attention</th>
                                        <th>Smiling</th>
                                        <th>No of Watching</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($advertisements) > 0)
                                            @foreach($advertisements as $advertisement)
                                                <tr>
                                                    <td>{{$advertisement->name}}</td>
                                                    <td>{{$advertisement->viewers()->sum('time_in_front_of_camera')}}</td>
                                                    <td>{{$advertisement->viewers()->sum('smiling_percentage')}}</td>
                                                    <td>{{$advertisement->viewers()->sum('number_of_people')}}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="4" class="text-center"><h1>No Advertisements Found</h1></td>
                                            </tr>
                                        @endif
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Advertisement Name</th>
                                            <th>Attention</th>
                                            <th>Smiling</th>
                                            <th>No of Watching</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <hr/>
                <div class="row">
                    <div class="col-12">
                        <!-- PIE CHART -->
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Advertisements Chart</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="pie-chart" width="800" height="450"></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-6">
                        <!-- PIE CHART -->
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Male & Female Chart</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="bar-chart" width="800" height="450"></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-6">
                        <!-- PIE CHART -->
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Watchers & OST Chart</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="bar-chart2" width="800" height="450"></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>
    <!-- /.content-wrapper -->
@endsection
@push('admin_charts')
    <script>
        new Chart(document.getElementById("pie-chart"), {
            type: 'pie',
            data: {
                labels: ["Attention", "Smiling", "No of Watching"],
                datasets: [{
                    label: "statistic for Attention & Smiling & No of Watching",
                    backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f"],
                    data: [{{\DB::table('viewers')->whereIn('advertisement_id', $advertisements->pluck('id'))->sum('time_in_front_of_camera')}},
                        {{\DB::table('viewers')->whereIn('advertisement_id', $advertisements->pluck('id'))->sum('smiling_percentage')}},
                        {{\DB::table('viewers')->whereIn('advertisement_id', $advertisements->pluck('id'))->sum('number_of_people')}}]
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'statistic for Attention & Smiling & No of Watching'
                }
            }
        });


        // Bar chart male female
        new Chart(document.getElementById("bar-chart"), {
            type: 'bar',
            data: {
                labels: ["Male", "Female"],
                datasets: [
                    {
                        label: "Male & Female",
                        backgroundColor: ["#3e95cd","#3cba9f"],
                        data: [{{$male}}, {{$female}}]
                    }
                ]
            },
            options: {
                legend: { display: false },
                title: {
                    display: true,
                    text: 'Male & Female'
                }
            }
        });

        // Bar chart
        new Chart(document.getElementById("bar-chart2"), {
            type: 'bar',
            data: {
                labels: ["Watchers", "OST"],
                datasets: [
                    {
                        label: "Watchers & OST",
                        backgroundColor: ["#e8c3b9","#c45850"],
                        data: [{{\DB::table('viewers')->where('watcher', 1)->whereIn('advertisement_id', $advertisements->pluck('id'))->count('*')}},{{\DB::table('viewers')->where('watcher', 0)->count()}}]
                    }
                ]
            },
            options: {
                legend: { display: false },
                title: {
                    display: true,
                    text: 'Watchers & OST'
                }
            }
        });

    </script>
@endpush
