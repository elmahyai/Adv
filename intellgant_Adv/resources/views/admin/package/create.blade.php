@extends('admin.layout-admin')

@section('admin_content')
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
                            <li class="breadcrumb-item"><a href="{{route('package.index')}}">Home</a></li>
                            <li class="breadcrumb-item active">New Package</li>
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
                                <h3 class="card-title">Create Package</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" class="form" action="{{route('package.store')}}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name" class="col-form-label text-md-right">{{ __('Name') }}</label>
                                        <input id="name" placeholder="Enter Name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="allowed_ads" class="col-form-label text-md-right">{{ __('Allowed Ads') }}</label>
                                        <input id="allowed_ads" type="number" step="1" min="1" placeholder="Enter Allowed Ads" class="form-control @error('no_ads') is-invalid @enderror" name="allowed_ads" value="{{ old('allowed_ads') }}" required >
                                        @error('allowed_ads')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="price" class="col-form-label text-md-right">{{ __('Package price') }}</label>
                                        <input id="price" type="number" step="0.01" min="1" max="200" placeholder="Enter Package price" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required >
                                        @error('price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="duration" class="col-form-label text-md-right">{{ __('Duration Per days') }}</label>
                                        <input id="duration" type="number" step="1" min="1" placeholder="Enter Duration" class="form-control @error('duration') is-invalid @enderror" name="duration" value="{{ old('duration') }}" required >
                                        @error('duration')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="description" class="col-form-label text-md-right">{{ __('Description') }}</label>
                                        <textarea id="description" row="8" placeholder="Enter description" class="form-control @error('duration') is-invalid @enderror" name="description" required >{{ old('description') }}</textarea>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="allow_statistics" class="col-form-label text-md-right">{{ __('Allow Statistics') }}</label>
                                        <div class="form-check">
                                            <input class="form-check-input @error('allow_statistics') is-invalid @enderror" type="radio" value="1" name="allow_statistics" checked="{{ old('allow_statistics')==1 }}">
                                            <label class="form-check-label">Yes</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input @error('allow_statistics') is-invalid @enderror" type="radio" value="0" name="allow_statistics" checked="{{ old('allow_statistics')==0 }}">
                                            <label class="form-check-label">No</label>
                                        </div>
                                        @error('allow_statistics')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="package_id" class="col-form-label text-md-right">{{ __('Models') }}</label>
                                        @if(count($models) > 0)
                                                @foreach($models as $advModel)
                                                    <div class="form-check">
                                                        <input class="form-check-input @error('model[]') is-invalid @enderror" type="checkbox" value="{{$advModel->id}}" name="models[]">
                                                        <label class="form-check-label">{{$advModel->name}}</label>
                                                    </div>
                                                @endforeach
                                            @endif
                                        @error('models[]')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">{{ __('Create Package') }}</button>
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
