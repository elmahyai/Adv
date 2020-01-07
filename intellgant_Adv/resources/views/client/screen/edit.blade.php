@extends('client.layout-client')

@section('client_content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('client.home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Edit Advertisement</li>
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
                    <!-- left column -->
                    <div class="col-sm-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Update Screen</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" class="form" action="{{route('change_default_waiting_url', $screen)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="default_url" class="col-form-label text-md-right">{{ __('Default Url') }}</label>
                                        <input id="default_url" type="file" placeholder="Enter Default Video" class="form-control" name="default_url"  value="{{ old('default_url') }}" autocomplete="url">
                                        <br/>
                                        <video src="{{$screen->default_url}}" width="170" height="85" controls>
                                            <p>If you are reading this, it is because your browser does not support the HTML5 video element.</p>
                                        </video>
                                    </div>
                                    <div class="form-group">
                                        <label for="waiting_url" class="col-form-label text-md-right">{{ __('waiting_url') }}</label>
                                        <input id="waiting_url" type="file" placeholder="Enter Waiting video" class="form-control" name="waiting_url"  value="{{ old('waiting_url') }}" autocomplete="url">
                                        <br/>
                                        <video src="{{$screen->waiting_url}}" width="170" height="85" controls>
                                            <p>If you are reading this, it is because your browser does not support the HTML5 video element.</p>
                                        </video>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">{{ __('Update Screen') }}</button>
                                    <a class="btn btn-warning" href="{{route('advertisement.index')}}">{{ __('Back') }}</a>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
