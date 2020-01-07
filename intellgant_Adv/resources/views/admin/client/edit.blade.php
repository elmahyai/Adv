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
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Edit Client</li>
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
                                <h3 class="card-title">Update Client</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" class="form" action="{{route('client.update', $client)}}" method="post">
                                @csrf
                                @method('put')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name" class="col-form-label text-md-right">{{ __('Name') }}</label>
                                        <input id="name" placeholder="Enter Name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $client->name) }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                        <input id="email" type="email" placeholder="Enter Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $client->email) }}" autocomplete="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                                        <input id="password" type="password" placeholder="Enter Password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                        <input id="password-confirm" placeholder="Enter Confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                                    </div>
                                    <div class="form-group">
                                        <label for="status" class="col-form-label text-md-right">{{ __('status') }}</label>
                                        <div class="form-check">
                                            <input class="form-check-input @error('status') is-invalid @enderror" type="radio" value="1" name="status" @if(old('status', $client->status) === 1) checked @endif>
                                            <label class="form-check-label">Active</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input @error('status') is-invalid @enderror" type="radio" value="0" name="status" @if(old('status', $client->status) === 0) checked @endif }}>
                                            <label class="form-check-label">Un Active</label>
                                        </div>
                                        @error('status')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="package_id" class="col-form-label text-md-right">{{ __('Package Name') }}</label>

                                        <select class="form-control placeholderr= @error('package_id') is-invalid @enderror" name="package_id"  name="package_id" selected="{{ old($client->package->id, 'package_id') }}">
                                            @if(count($packages) > 0)
                                                @foreach($packages as $package)
                                                    <option value="{{$package->id}}">
                                                       {{$package->name}}
                                                        </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('package_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <input type="hidden" name="user_id" value="{{$client->id}}"/>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
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
