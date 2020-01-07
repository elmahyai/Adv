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
                            <li class="breadcrumb-item active">Screens</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Data for Screen</h3> &nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="{{route('screen.create')}}" class="btn btn-primary">New Screen</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>user</th>
                                    <th>Default Video</th>
                                    <th>waiting Video</th>
                                    <th>Code</th>
                                    <th>Change status To</th>
                                    <th>Description</th>
                                    <th>Edit <i class="fa fa-edit"></i> </th>
                                    <th>Delete <i class="fa fa-trash"></i> </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if(count($screens) > 0)
                                        @foreach($screens as $screen)
                                            <tr>
                                                <td>{{$screen->id}}</td>
                                                <td>{{$screen->name}}</td>
                                                <td>{{$screen->user->name}}</td>
                                                <td>
                                                    <video src="{{$screen->default_url}}" width="170" height="85" controls>
                                                        <p>If you are reading this, it is because your browser does not support the HTML5 video element.</p>
                                                    </video>
                                                </td>
                                                <td>
                                                    <video src="{{$screen->waiting_url}}" width="170" height="85" controls>
                                                        <p>If you are reading this, it is because your browser does not support the HTML5 video element.</p>
                                                    </video>
                                                </td>
                                                <td>{{$screen->code}}</td>
                                                <td>
                                                    <form action="{{route('status_screen', $screen)}}" method="post" class="form-inline">
                                                        @csrf
                                                        @if($screen->status == 0)
                                                            <button type="submit"  class="btn btn-success" onclick="return confirm('Are you sure?')">Active</button>
                                                        @else
                                                            <button type="submit"  class="btn btn-danger" onclick="return confirm('Are you sure?')">Un active</button>
                                                        @endif
                                                    </form>
                                                </td>
                                                <td><p style="overflow: auto;width: 100%;height: 100%;">{{$screen->description}}</p></td>
                                                <td><a href="{{route('screen.edit', $screen)}}" >Edit <i class="fa fa-edit"></i></a> </td>
                                                <td>
                                                    <form action="{{route('screen.destroy', $screen)}}" method="post" class="form-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete <i class="fa fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="10" class="text-center"><h1>No Screen Found</h1></td>
                                        </tr>
                                    @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>user</th>
                                        <th>Default Video</th>
                                        <th>waiting Video</th>
                                        <th>Code</th>
                                        <th>status</th>
                                        <th>Description</th>
                                        <th>Edit <i class="fa fa-edit"></i> </th>
                                        <th>Delete <i class="fa fa-trash"></i> </th>
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
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
