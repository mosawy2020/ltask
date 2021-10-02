@extends('admin.layout')
@section('layout')


                <!-- Begin Page Content -->
                <div class="container-fluid">

                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Users</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>User ID</th>
                                            <th>photo</th>
                                            <th>salary</th>
                                            <th>discount</th>
                                            <th>Created at</th>
                                            <th>Updated at</th>
                                            <th>Edit</th>                                        
                                       
                                    </thead>
                                    @foreach ($album as $albm)
                                    <tfoot>
                                        <tr>
                                            <th>{{$albm->id}}</th>
                                            <th>{{$albm->name}}</th>
                                            <th>{{$albm->user_id}}</th>
                                            <th> <img src="{{asset('images/'.$albm->photo)}}" style="width:60px;"> </img></th>
                                            <th>{{$albm->old_salary}}</th>
                                            <th>{{$albm->discount}}</th>
                                            <th>{{$albm->created_at}}</th>
                                            <th>{{$albm->updated_at}}</th>
                                            <th><a href="{{ route('album-admin.edit', $albm->id) }}" class='btn btn-primary btn-sm'>Edit</a>  </th>
                                         
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