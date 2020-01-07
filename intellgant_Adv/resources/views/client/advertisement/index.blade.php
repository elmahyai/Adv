@extends('client.layout-client')

@section('client_content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Customers</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('client.home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Advertisements</li>
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
                            <h3 class="card-title">All Data for Advertisements</h3> &nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="{{route('advertisement.create')}}" class="btn btn-primary">New Advertisement</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <h3 class="text-center">All Default and Waiting Videos for all screens</h3>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Screen Name</th>
                                        <th>Video Default</th>
                                        <th>Video Waiting</th>
                                        <th>User</th>
                                        <th>Edit <i class="fa fa-edit"></i> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($screens) > 0)
                                        @foreach($screens as $screen)
                                            <tr>
                                                <td>{{$screen->name}}</td>
                                                <td><video src="{{$screen->default_url}}" width="170" height="85" controls>
                                                        <p>If you are reading this, it is because your browser does not support the HTML5 video element.</p>
                                                    </video>
                                                </td>
                                                <td><video src="{{$screen->waiting_url}}" width="170" height="85" controls>
                                                        <p>If you are reading this, it is because your browser does not support the HTML5 video element.</p>
                                                    </video>
                                                </td>
                                                <td>{{auth()->user()->name}}</td>
                                                <td><a href="{{route('change_default_waiting', $screen)}}" >Edit <i class="fa fa-edit"></i></a> </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4" class="text-center">No Screen Found To show Advertisements</td>
                                        </tr>
                                    @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Screen Name</th>
                                        <th>Video Default</th>
                                        <th>Video Waiting</th>
                                        <th>User</th>
                                        <th>Edit <i class="fa fa-edit"></i> </th>
                                    </tr>
                                </tfoot>
                            </table>
                            <hr/>
                            <h3 class="text-center">All Advertisement for all screens</h3>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Video</th>
                                    <th>User</th>
                                    <th>Classes</th>
                                    <th>Edit <i class="fa fa-edit"></i> </th>
                                    <th>Delete <i class="fa fa-trash"></i> </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($screens as $screen)
                                    @if(count($screen->advertisements) > 0)
                                        @foreach($screen->advertisements as $advertisement)
                                            <tr>
                                                <td><video src="{{$advertisement->url}}" width="170" height="85" controls>
                                                        <p>If you are reading this, it is because your browser does not support the HTML5 video element.</p>
                                                    </video>
                                                </td>
                                                <td>{{auth()->user()->name}}</td>
                                                <td>
                                                    <ul>
                                                        @foreach($advertisement->modelClasses as $class)
                                                            <li>{{$class->class_name}}</li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                <td><a href="{{route('advertisement.edit', $advertisement)}}" >Edit <i class="fa fa-edit"></i></a> </td>
                                                <td>
                                                    <form action="{{route('advertisement.destroy', $advertisement)}}" method="post" class="form-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete <i class="fa fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4" class="text-center">No Screen Found To show Advertisements</td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Video</th>
                                    <th>User</th>
                                    <th>Classes</th>
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
