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
                        <ol class="breadcrumb float-right" style="float: right !important;">
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
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <h3>
                            {{trans('admin/index.General')}}
                        </h3>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{$package_count}}</h3>
                                <p>{{trans('admin/index.Packages')}}</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-box"></i>
                            </div>
                            <a href="#" class="small-box-footer">{{trans('admin/index.More_info')}} <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{$models_count}}</h3>
                                <p>{{trans('admin/index.Models')}}</p>
                            </div>
                            <div class="icon">
                                <i class="fab fa-buromobelexperte"></i>
                            </div>
                            <a href="#" class="small-box-footer">{{trans('admin/index.More_info')}} <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{$clients_count}}</h3>
                                <p>{{trans('admin/index.Clients')}}</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <a href="#" class="small-box-footer">{{trans('admin/index.More_info')}} <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{$screen_count}}</h3>
                                <p>{{trans('admin/index.Smart_Screen')}}</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-desktop"></i>
                            </div>
                            <a href="#" class="small-box-footer">{{trans('admin/index.More_info')}} <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{$advertisement_count}}</h3>
                                <p>{{trans('admin/index.Advertisements')}}</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-ad"></i>
                            </div>
                            <a href="#" class="small-box-footer">{{trans('admin/index.More_info')}} <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <hr/>
                <div class="row">
                    <div class="col-12">
                        <h3>
                            {{trans('admin/index.Top_Content')}}
                        </h3>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-info"><i class="far fa-eye"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">{{trans('admin/index.Top_Content_for_Attention')}}</span>
                                <span class="info-box-number">{{"Advertisement name $top_Content_for_Attention"}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-2 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-success"><i class="far fa-heart"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">{{trans('admin/index.Top_Content_for_Happiness')}}</span>
                                <span class="info-box-number">{{"Advertisement name $top_Content_for_Happiness"}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
                <hr/>
    </div>
        </section>
    </div>
    <!-- /.content-wrapper -->
@endsection
