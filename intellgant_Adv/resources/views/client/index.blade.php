@extends('client.layout-client')

@section('client_content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{trans('client/index.Dashboard')}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right" style="float: right !important;">
                            <li class="breadcrumb-item"><a href="{{route('client.home')}}">{{trans('client/index.Home')}}</a></li>
                            <li class="breadcrumb-item active">{{trans('client/index.Dashboard')}}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="far fa-chart-bar"></i>
                                    {{trans('client/index.Home')}}
                                </h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 col-md-3 text-center">
                                        <input type="text" class="knob" value="{{$useage_pachage}}" data-width="90" data-height="100" data-fgColor="#3c8dbc"
                                               data-readonly="true">

                                        <div class="knob-label">{{trans('client/index.Package_Usage')}} {{$useage_pachage}}</div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-6 col-md-3 text-center">
                                        <input type="text" class="knob" value="{{$screens_count}}" data-width="90" data-height="100"
                                               data-fgColor="#f56954">

                                        <div class="knob-label">{{trans('client/index.Devices_Count')}} {{$screens_count}}</div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-6 col-md-3 text-center">
                                        <input type="text" class="knob" value="{{$advertisements_count}}" data-width="90" data-height="100"
                                               data-fgColor="#00a65a">

                                        <div class="knob-label">{{trans('client/index.Advertisements_Count')}} {{$advertisements_count}}</div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-6 col-md-3 text-center">
                                        <input type="text" class="knob" value="{{$allowed_ads}}" data-width="90" data-height="100" data-fgColor="#3c8dbc"
                                               data-readonly="true">

                                        <div class="knob-label">{{trans('client/index.allowed_ads')}} {{$allowed_ads}}</div>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-lg-3 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-info">
                                            <div class="inner">
                                                <h4>{{$package_time}} Days</h4>
                                                <p>{{trans('client/index.package_time')}} is {{$package_time}}</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-clock-o"></i>
                                            </div>
                                            <a href="#" class="small-box-footer">{{trans('admin/index.More_info')}} <i class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-lg-3 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-success">
                                            <div class="inner">
                                                <h4>{{$package_expire}}</h4>
                                                <p>{{trans('client/index.package_expire')}} at {{$package_expire}}</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fab fa-buromobelexperte"></i>
                                            </div>
                                            <a href="#" class="small-box-footer">{{trans('admin/index.More_info')}} <i class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="far fa-chart-bar"></i>
                                    {{trans('client/index.First_Video')}}
                                </h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <video src="{{$advertisement_video}}" width="1000" height="700" controls>
                                        <p>If you are reading this, it is because your browser does not support the HTML5 video element.</p>
                                    </video>
                                    <!-- ./col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
