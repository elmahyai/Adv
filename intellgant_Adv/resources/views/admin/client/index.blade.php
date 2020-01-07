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
                            <li class="breadcrumb-item"><a href="{{route('client.index')}}">Home</a></li>
                            <li class="breadcrumb-item active">client</li>
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
                            <h3 class="card-title">All Data for Customers</h3> &nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="{{route('client.create')}}" class="btn btn-primary">New Customers</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>package Type</th>
                                    <th>Renew Subscription</th>
                                    <th>Edit <i class="fa fa-edit"></i> </th>
                                    <th>Change Status To <i class="fa fa-edit"></i> </th>
                                    <th>Delete / Restore <i class="fa fa-trash"></i> </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if(count($clients) > 0)
                                        @foreach($clients as $client)
                                            <tr>
                                                <td>{{$client->name}}</td>
                                                <td>{{$client->email}}</td>
                                                <td>{{$client->package->name ?? 'No'}}</td>
                                                <td>
                                                    <form action="{{route('renew_subscription', $client)}}" method="post" class="form-inline">
                                                        @csrf
                                                        <button type="submit"  class="btn btn-success" onclick="return confirm('Are you sure?')">Renew Subscription</button>
                                                    </form>
                                                </td>
                                                <td><a href="{{route('client.edit', $client)}}" >Edit <i class="fa fa-edit"></i></a> </td>
                                                <td>
                                                    <form action="{{route('status_change', $client)}}" method="post" class="form-inline">
                                                        @csrf
                                                        @if($client->deleted_at == null && $client->status == 0)
                                                            <button type="submit"  class="btn btn-success" onclick="return confirm('Are you sure?')">Active</button>
                                                        @elseif($client->deleted_at == null && $client->status == 1)
                                                            <button type="submit"  class="btn btn-danger" onclick="return confirm('Are you sure?')">Un active</button>
                                                        @else
                                                            <h3>@if($client->deleted_at != null)  {{"Un active"}} @endif</h3>
                                                        @endif
                                                    </form>
                                                </td>
                                                <td>
                                                    @if($client->deleted_at)
                                                        <form action="{{route('restore_customer', $client)}}" method="post" class="form-inline">
                                                            @csrf
                                                            <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure?')">restore <i class="fa fa-trash"></i></button>
                                                        </form>
                                                    @else
                                                        <form action="{{route('client.destroy', $client)}}" method="post" class="form-inline">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete <i class="fa fa-trash"></i></button>
                                                        </form>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7" class="text-center"><h1>No Customers Found</h1></td>
                                        </tr>
                                    @endif
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>package Type</th>
                                    <th>Renew Subscription</th>
                                    <th>Edit <i class="fa fa-edit"></i> </th>
                                    <th>Change Status To <i class="fa fa-edit"></i> </th>
                                    <th>Delete / Restore <i class="fa fa-trash"></i> </th>
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
