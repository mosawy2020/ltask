@extends('admin.layout')
@section('layout')


                <!-- Begin Page Content -->
                <div class="container-fluid">

                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <p>

                                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                     Add Role
                                    </button>
                                  </p>
                                  <div class="collapse" id="collapseExample">
                                    <div class="card card-body">
                                        <form  action="{{route('roles.store')}}" method="POST" >
                                            @csrf
                                            <div class="form-group ">
                                                <label for="inputName"> Role Name</label>
                                                
                                                 <input id="name" type="text"  class="form-control @error('name') is-invalid @enderror" 
                                                 name="name"  required autocomplete="name" placeholder="Write Name Role"  autofocus>
                                                 @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="inputsdisplay">display name </label> 
                                                <input id="display" type="text"  class="form-control @error('display')  is-invalid @enderror"
                                                 name="display"  autocomplete="display" placeholder="Write Display (This is the name that will show)">
                            
                                                @error('display')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                          
                            
                                            <div class="form-group ">
                                                <label for="inputdescription"> Description</label>
                                                
                                                 <input id="" type="text"  class="form-control @error('description') is-invalid @enderror" 
                                                 name="description"  required autocomplete="description" placeholder="Write Description (For more info about Role)" autofocus>
                                                 @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                            
                                            <div class="text-center p-2">
                                              
                                                <button type="submit" class="btn btn-primary" >
                                                      Add 
                                                </button>
                                        </form>
                                    </div>
                                  </div>

                                </div>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                       
                                        <tr>
                                            <th>ID</th>
                                            <th>Role Name</th>
                                            <th>Display name</th>
                                            <th>description</th>
                                            <th>Created at</th>
                                            <th>Updated at</th>
                                            <th>Edit</th>
                                        </tr>
                                       
                                    </thead>
                                    @foreach ($roles as $role)
                                    <tfoot>
                                        <tr>
                                            <th>{{$role->id}}</th>
                                            <th>{{$role->name}}</th>
                                            <th>{{$role->display_name}} </th>
                                            <th>{{$role->description}} </th>
                                            <th>{{$role->created_at}}</th>
                                            <th>{{$role->updated_at}}</th>
                                            <th><a href="{{ route('roles.edit', $role->id) }}" class='btn btn-primary btn-sm'>Edit</a>  </th>
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

           

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>




@endsection