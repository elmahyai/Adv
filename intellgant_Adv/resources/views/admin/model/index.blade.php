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
                            <li class="breadcrumb-item active">Models</li>
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
                            <h3 class="card-title">All Data for Model</h3> &nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="{{route('advModel.create')}}" class="btn btn-primary">New Model</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Edit <i class="fa fa-edit"></i> </th>
                                    <th>Delete <i class="fa fa-trash"></i> </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if(count($models) > 0)
                                        @foreach($models as $advModel)
                                            <tr>
                                                <td>{{$advModel->id}}</td>
                                                <td>{{$advModel->name}}</td>
                                                <td><p style="overflow: auto;width: 100%;height: 100%;">{{$advModel->description}}</p></td>
                                                <td><a href="{{route('advModel.edit', $advModel)}}" >Edit <i class="fa fa-edit"></i></a> </td>
                                                <td>
                                                    <form action="{{route('advModel.destroy', $advModel)}}" method="post" class="form-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete <i class="fa fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5" class="text-center"><h1>No Model Found</h1></td>
                                        </tr>
                                    @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
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
