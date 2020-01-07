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
                            <li class="breadcrumb-item"><a href="{{route('screen.index')}}">Screen</a></li>
                            <li class="breadcrumb-item active">Update Screen</li>
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
                            <form role="form" class="form" action="{{route('screen.update', $screen)}}" method="post">
                                @csrf
                                @method('put')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name" class="col-form-label text-md-right">{{ __('Name') }}</label>
                                        <input id="name" placeholder="Enter Name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $screen->name) }}" required autocomplete="name" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="user_id" class="col-form-label text-md-right">{{ __('User Name') }}</label>
                                        <select class="form-control placeholderr= @error('user_id') is-invalid @enderror" name="user_id"  name="user_id" selected="{{ old('user_id', $screen->user_id) }}">
                                            @if(count($users) > 0)
                                                @foreach($users as $user)
                                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('user_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="code" class="col-form-label text-md-right">{{ __('Code') }}</label>
                                        <input id="code" placeholder="Enter Code" type="number" min="1" step="1" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code', $screen->code) }}" required>
                                        @error('code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="description" class="col-form-label text-md-right">{{ __('Description') }}</label>
                                        <textarea id="description" row="8" placeholder="Enter description" class="form-control @error('description') is-invalid @enderror" name="description" required >{{ old('description', $screen->description) }}</textarea>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="status" class="col-form-label text-md-right">{{ __('status') }}</label>
                                        <div class="form-check">
                                            <input class="form-check-input @error('status') is-invalid @enderror" type="radio" value="1" name="status" @if(old('status', $screen->status) === 1) checked @endif>
                                            <label class="form-check-label">Active</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input @error('status') is-invalid @enderror" type="radio" value="0" name="status" @if(old('status', $screen->status) === 0) checked @endif>
                                            <label class="form-check-label">Un Active</label>
                                        </div>
                                        @error('status')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
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
