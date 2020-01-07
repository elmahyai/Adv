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
                                <h3 class="card-title">Update Advertisement</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" class="form" action="{{route('advertisement.update', $advertisement)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name" class="col-form-label text-md-right">{{ __('Name') }}</label>
                                        <input id="name" placeholder="Enter Name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $advertisement->name) }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="url" class="col-form-label text-md-right">{{ __('url') }}</label>
                                        <input id="url" type="file" placeholder="Enter url" class="form-control" name="url"  value="{{ old('url') }}" autocomplete="url">
                                        <br/>
                                        <video src="{{$advertisement->url}}" width="170" height="85" controls>
                                            <p>If you are reading this, it is because your browser does not support the HTML5 video element.</p>
                                        </video>
                                    </div>
                                    @foreach($models as $model)
                                        <div class="form-group">
                                            <label for="glasses" class="col-form-label text-md-right">{{$model->name .' Model'}}</label>
                                            @if(count($model->classes) > 0)
                                                @foreach($model->classes as $class)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="{{$class->id}}" name="classes[]">
                                                        <label class="form-check-label">{{$class->class_name}}</label>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    @endforeach
                                    <div class="form-group">
                                        <label for="screen" class="col-form-label text-md-right">{{ __('Screen will display') }}</label>
                                        @foreach($screens as $screen)
                                            <div class="form-check">
                                                <input class="form-check-input @error('screens') is-invalid @enderror" type="checkbox" value="{{$screen['id']}}" name="screens[]">
                                                <label class="form-check-label">{{$screen['name']}}</label>
                                            </div>
                                        @endforeach
                                        @error('screens')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">{{ __('Update Advertisement') }}</button>
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
