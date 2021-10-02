@extends('layouts.app')

@section('content')

<nav class="navbar navbar-expand-lg navbar-light ">
    <div class="container">
        <a class="navbar-brand" href="{{route('home')}}"><img src="{{asset('images/logo-m.png')}}" data-src="{{asset('images/logo-m.png')}}"
                class="lazyload"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <ul class="menu-bars">
                    <li><span></span></li>
                    <li><span></span></li>
                    <li><span></span></li>
                </ul>
            </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('album.index')}}">My Album<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('albums')}}">create Album</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"> Packages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact Us</a>
                </li>
            </ul>
        </div>
    </div>
</nav>



<section class="contact-us bg-light">
    <div class="container">
        <h3 class="text-center">Create Albums</h3>
     
        <div class="row justify-content-center">
            <div class="col-md-7 col-sm-10">
                <div class="contact-form">
                    <form method="POST" action="{{route('album.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group ">
                            <label for="inputName">Album Name</label>
                            
                             <input id="name" type="text" placeholder="Album Name here" class="form-control @error('name') is-invalid @enderror" 
                             name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                             @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputsalary">salary</label>
                            <input id="salary" type="text" placeholder="Write your salary here" class="form-control @error('salary') is-invalid @enderror"
                             name="salary" value="{{ old('salary') }}" required autocomplete="salary">

                            @error('salary')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputdiscount">Discount</label>
                            
                            <input id="discount" type="text" placeholder=" Write Discount (if you make it)" class="form-control @error('discount') is-invalid @enderror" name="discount"  autocomplete="new-discount">

                            @error('discount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputphoto">Choose Photo  Album</label>
                            
                            <input id="photo" type="file"  class="form-control @error('photo') is-invalid @enderror" name="photo" required autocomplete="new-photo">

                            @error('photo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      
                            <label >Roles</label>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="public" value='1' checked > public
                                </label>
                            </div>
                       
                        

                        <div class="text-center p-2">
                          
                            <button type="submit" class="btn btn-gradiant">
                                  post
                            </button>
                        </div>

                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
