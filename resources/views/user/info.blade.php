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
                    <a class="nav-link" href="{{route('home')}}"> Home</a>
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

{{-- end nav --}}
<h3 class="text-center"> Edit Your profile  </h3>
<div class="row justify-content-center">
    <div class="col-md-7 col-sm-10">
        <div class="contact-form">
            <form  action="{{route('info.update',$user->id)}}" method="POST">
                @csrf @method('PUT')
                <div class="form-group ">
                    <label for="inputName">Name</label>
                    
                     <input id="name" type="text" placeholder=" Name here" class="form-control @error('name') is-invalid @enderror" 
                     name="name" value="{{$user->name}}" required autocomplete="name" autofocus>
                     @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputsemail">email</label>
                    <input id="email" type="email" placeholder="Write your email here" class="form-control @error('email')  is-invalid @enderror"
                     name="email" value="{{ $user->email  }}" disabled autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              

                <div class="form-group">
                    <label for="inputPassword">Enter Password </label>
                  
                    <input id="password" type="password" placeholder=" Write Your password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              
                <div class="form-group">
                    <label for="inputConfirmPassword">Confirm Password </label>
                    
                    <input id="password-confirm" type="password" placeholder="  Confirm Your password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                </div>
                

                <div class="text-center p-2">
                  
                    <button type="submit" class="btn btn-gradiant">
                          Update
                    </button>
                </div>

               
            </form>
        </div>
    </div>
</div>






@endsection