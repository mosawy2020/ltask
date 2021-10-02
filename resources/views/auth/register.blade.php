@extends('layouts.app')




@section('content')



<div class="logo text-center">
    <a class="navbar-brand" href="index.html"><img src="images/logo-m.png" data-src="images/logo-m.png"
        class="lazyload"></a>
   </div>

{{-- START Register Form --}}
    <section class="contact-us bg-light">
        <div class="container">
            <h3 class="text-center">Sign Up To Join Us</h3>
         
            <div class="row justify-content-center">
                <div class="col-md-7 col-sm-10">
                    <div class="contact-form">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group ">
                                <label for="inputName">Write Your Name</label>
                                
                                 <input id="name" type="text" placeholder="Write Your Name" class="form-control @error('name') is-invalid @enderror" 
                                 name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                 @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">Your Email Addrss</label>
                                <input id="email" type="email" placeholder="Write Your Email" class="form-control @error('email') is-invalid @enderror"
                                 name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                      Sign Up
                                </button>
                            </div>

                            <div >
                               <b> <span>Have An Account ?</span> <a href="{{route('login')}}" class="main-color ">Login</a></b>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
{{-- END Register Form --}}
  

@endsection
