@extends('layouts.app')
@section('content')



<nav class="navbar navbar-expand-lg navbar-light ">
    <div class="container">
        <a class="navbar-brand" href="index.html"><img src="images/logo-m.png" data-src="images/logo-m.png"
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
                    <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"> Movies Demos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"> Packages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact Us</a>
                </li>
                {{-- if user login not show login button --}}
                @guest
                <li class="nav-item">
                    <button class="btn btn-gradiant">
                        <a href="{{route('login')}}">login</a>
                    </button>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<section class="check_demo_movie">
    <div class="container">
        <h2 class=" wow fadeInDown">Check Our <span class="main-color"> Packages</span></h2>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
            industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
            and scrambled it to make a type specimen book.</p>
        <div class="row">
            <div class="col-md-4">
                <div class="card wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
                    <div class="card-header">
                        <img src="images/demo1.png" src="images/demo1.png" class="lazyload">
                    </div>
                    <div class="card-body">
                        <h4><a href="#"> Sciences</a></h4>
                        <div class="rating">
                            <ul class="d-flex justify-content-center rating_stars">
                                <li><i class="fas fa-star star_gold"></i></li>
                                <li><i class="fas fa-star star_gold"></i></li>
                                <li><i class="fas fa-star star_gold"></i></li>
                                <li><i class="fas fa-star star_gold"></i></li>
                                <li><i class="fas fa-star star_gold"></i></li>
                            </ul>
                        </div>
                        <p class="package-price">
                            <span>3393$ </span>
                            <span><del class="text-danger">4545$</del></span>
                        </p>
                        <span class="badge bg-primary">mahmoud</span>
                        <span class="badge bg-secondary text-light">2021-01-18 05:46:07</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.6s">
                    <div class="card-header">
                        <img src="images/demo2.png" src="images/demo2.png" class="lazyload">
                    </div>
                    <div class="card-body">
                        <h4><a href="#">Geographically</a> </h4>
                        <div class="rating">
                            <ul class="d-flex justify-content-center rating_stars">
                                <li><i class="fas fa-star star_gold"></i></li>
                                <li><i class="fas fa-star star_gold"></i></li>
                                <li><i class="fas fa-star star_gold"></i></li>
                                <li><i class="fas fa-star star_gold"></i></li>
                                <li><i class="fas fa-star star_gold"></i></li>
                            </ul>
                        </div>
                        <p class="package-price">
                            <span>3393$ </span>
                            <span><del class="text-danger">4545$</del></span>
                        </p>
                        <span class="badge bg-primary">Ahmed</span>
                        <span class="badge bg-secondary text-light">2021-01-18 05:46:07</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.7s">
                    <div class="card-header">
                        <img src="images/demo3.png" src="images/demo3.png" class="lazyload">
                    </div>
                    <div class="card-body">
                        <h4><a href="#"> Islamic History</a></h4>
                        <div class="rating">
                            <ul class="d-flex justify-content-center rating_stars">
                                <li><i class="fas fa-star star_gold"></i></li>
                                <li><i class="fas fa-star star_gold"></i></li>
                                <li><i class="fas fa-star star_gold"></i></li>
                                <li><i class="fas fa-star star_gold"></i></li>
                                <li><i class="fas fa-star star_gold"></i></li>
                            </ul>
                        </div>
                        <p class="package-price">
                            <span>3393$ </span>
                            <span><del class="text-danger">4545$</del></span>
                        </p>
                        <span class="badge bg-primary">Khaled</span>
                        <span class="badge bg-secondary text-light">2021-01-18 05:46:07</span>
                    </div>
                </div>
            </div>
            
                    @foreach ($albums_home as $albums)
                    <div class="col-md-4">
                        <div class="card wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
                            <div class="card-header">
                                <img src="{{asset('images/'.$albums->photo)}}" src="{{asset('images/'.$albums->photo)}}" class="lazyload">
                            </div>
                            <div class="card-body">
                                <h4> <a href="#">{{$albums->name}}</a></h4>
                                <div class="rating">
                                    <ul class="d-flex justify-content-center rating_stars">
                                        <li><i class="fas fa-star star_gold"></i></li>
                                        <li><i class="fas fa-star star_gold"></i></li>
                                        <li><i class="fas fa-star star_gold"></i></li>
                                        <li><i class="fas fa-star star_gold"></i></li>
                                        <li><i class="fas fa-star star_gold"></i></li>
                                    </ul>
                                </div>
                                <p class="package-price">
                                    <span>{{$albums->discount}}$</span>
                                    <span><del class="text-danger">{{$albums->old_salary}}$</del></span>
                                </p>
                                <span class="badge bg-primary">{{$albums->user->name}}</span>
                                <span class="badge bg-secondary text-light">{{$albums->created_at}}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
               
                </div>
            </div>
        </div>
    </div>
</section>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a class="navbar-brand" href="index.html"><img src="images/logo-m.png"
                        data-src="images/logo-m.png" class="lazyload"></a>
                <p> Interact With The Content In An Interesting Educational Experience, Using Studying Means
                    Anywhere & Anytime Directly From your Computer. </p>
            </div>
            <div class="col-md-4">
                <h5>Links</h5>
                <div class="links d-flex">
                    <ul>
                        <li> <a href="#"> > Create Account</a></li>
                        <li> <a href="#"> > movie</a></li>
                        <li> <a href="#"> > Team </a></li>
                        <li> <a href="#"> > Company </a></li>
                    </ul>
                    <ul>
                        <li> <a href="#"> > Questions</a></li>
                        <li> <a href="#"> > Blog</a></li>
                        <li> <a href="#"> > Terms of Privacy </a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <h5>Contact Us</h5>
                <div><a href="mailto:info@smartmovie.com"> <i class="fas fa-envelope"></i>
                        info@smartmovie.com</a></div>
                <form action="">
                    <div class="input-group mb-2">
                        <input type="email" class="form-control" id="inlineFormInputGroup"
                            placeholder=" Your Email ">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <button class="btn btn-gradiant m-0">
                                    <a href="#">Send</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

               
                
               
@endsection