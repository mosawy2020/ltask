@extends('admin.layout')
@section('layout')




<section class="contact-us bg-light">
    <div class="container">
        <h3 class="text-center">Edit : {{$album->name}} </h3>
     
        <div class="row justify-content-center">
            <div class="col-md-7 col-sm-10">
                <div class="contact-form">
                    <form method="POST" action="{{route('album-admin.update',$album->id)}}" enctype="multipart/form-data">
                        @csrf @method('PUT')
                        <div class="form-group ">
                            <label for="inputName">Album Name</label>
                            
                             <input id="name" type="text" placeholder="Album Name here" class="form-control @error('name') is-invalid @enderror" 
                             name="name" value="{{$album->name}}" required autocomplete="name" autofocus>
                             @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputsalary">salary</label>
                            <input id="salary" type="text" placeholder="Write your salary here" class="form-control @error('salary') is-invalid @enderror"
                             name="salary" value="{{ $album->old_salary  }}" required autocomplete="salary">

                            @error('salary')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputdiscount">Discount</label>
                            
                            <input id="discount" value="{{ $album->discount  }}" type="text" placeholder=" Write Discount (if you make it)" class="form-control @error('discount') is-invalid @enderror" name="discount" required autocomplete="new-discount">

                            @error('discount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputphoto">Choose Photo  Album</label>
                            
                            <input id="photo" type="file" value="{{$album->photo}}"  class="form-control @error('photo') is-invalid @enderror" name="photo"  autocomplete="new-photo">

                            @error('photo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      
                            <label >Roles</label>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="public"  {{ $album->public == null ? 'checked' : ''}}> public
                                </label>
                            </div>
                       
                        

                        <div class="text-center p-2">
                          
                            <button type="submit" class="btn btn-danger">
                                  Update
                            </button>
                        </div>
                    </form>
                        <form action="{{route('album-admin.destroy',$album->id)}}" method="post" >
                            @csrf @method('delete')
                            <button type="submit" class="btn btn-danger" style="margin-left:70%;">Delete Album</button>
                    </form>

                   
                </div>
            </div>
        </div>
    </div>
</section>





@endsection
