{{-- @extends('admin.layout') --}}
@section('layout')


                <!-- Begin Page Content -->
                <div class="container-fluid">

                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Admins</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                       
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Created at</th>
                                            <th>Updated at</th>
                                            <th>Edit</th>
                                        </tr>
                                       
                                    </thead>
                                    @foreach ($admins as $admin)
                                    <tfoot>
                                        <tr>
                                            <th>{{$admin->id}}</th>
                                            <th>{{$admin->name}}</th>
                                            <th>{{$admin->email}}</th>
                                            <th>{{$admin->created_at}}</th>
                                            <th>{{$admin->updated_at}}</th>
                                            <th><a href="{{ route('admins.edit', $admin->id) }}" class='btn btn-primary btn-sm'>Edit</a>  </th>
                                        </tr>
                                    </tfoot>
                                   
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           





@endsection