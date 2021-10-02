@extends('admin.layout')
@section('layout')


                <!-- Begin Page Content -->
                <div class="container-fluid">

<div class="row justify-content-center">
    <div class="col-md-7 col-sm-10">
        <div class="contact-form">
            <form  action="{{route('roles.update',$roles->id)}}" method="POST" style="margin-bottom: 150px;">
                @csrf @method('PUT')
                <div class="form-group ">
                    <label for="inputName"> Role Name</label>
                    
                     <input id="name" type="text"  class="form-control @error('name') is-invalid @enderror" 
                     name="name" value="{{$roles->name}}" required autocomplete="name" autofocus>
                     @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="inputsdisplay">display name </label> 
                    <input id="display" type="text"  class="form-control @error('display')  is-invalid @enderror"
                     name="display" value="{{ $roles->display_name  }}"  autocomplete="display">

                    @error('display')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              

                <div class="form-group ">
                    <label for="inputdescription"> Description</label>
                    
                     <input id="description" type="text"  class="form-control @error('description') is-invalid @enderror" 
                     name="description" value="{{$roles->description}}" required autocomplete="description" autofocus>
                     @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="text-center p-2">
                  
                    <button type="submit" class="btn btn-primary" style="margin-bottom:20px">
                          Update
                    </button>
            </form>

                {{-- form for delete admin --}}
                <form action="{{route('roles.destroy',$roles->id)}}" method="POST">
                    @csrf @method('delete')
                  <button type="submit" class='btn btn-danger'>Delete</button>  
              </form>
            {{-- end form --}}
</div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           





@endsection