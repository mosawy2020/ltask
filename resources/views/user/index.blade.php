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


<section class="check_demo_movie">
    <div class="container">
        @if($albums->count() != null)
        @auth
         <h3> Hello <span class="text-danger"> {{Auth::user()->name}} </span>, This is your Albums you created  </h3>
         <h5>Click Album to edit</h5>
        @endauth
       
        <div class="row">
         @foreach ($albums as $album)
            <div class="col-md-4">
                <a href="{{route('album.show',$album->id)}}">
                <div class="card wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
                    <div class="card-header">
                        <img src="{{asset('images/'.$album->photo)}}" src="{{asset('images/'.$album->photo)}}" class="lazyload">
                    </div>
                    <div class="card-body">
                        <h4> <a href="#">{{$album->name}}</a></h4>
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
                            <span>{{$album->discount}}$</span>
                            <span><del class="text-danger">{{$album->old_salary}}$</del></span>
                        </p>
                        
                        
                        <span class="badge bg-primary text-light">{{$album->user->name}}</span>
                        <span class="badge bg-secondary text-light">{{$album->created_at}}</span>
                    </div>
                </div>
            </a>
            </div>
        @endforeach
        </div>
        @else
            <h3> <span class="text-danger"> {{Auth::user()->name}} </span> You Dont have albums, create one </h3>
            <button type="button" href="{{route('createalbum')}}">creat albums </button>

        @endif
    </div>
</section>

@endsection
