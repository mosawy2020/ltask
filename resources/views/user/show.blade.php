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
{{-- end nav  --}}

{{-- start show code --}}
<div class="container">
    
<h3>show : {{$album->name}} 
    <div>
    <a href="{{route('album.edit',$album->id)}}"  class="btn bg-warning text-dark" style="margin-left:70%;">Edit Album</a>
  
    {{-- form for delete album --}}
    <form action="{{route('album.destroy',$album->id)}}" method="post" >
            @csrf @method('delete')
            <button type="submit" class="btn btn-danger" style="margin-left:70%;">Delete Album</button>
    </form>
    {{-- end form --}}
    </div>
</h3>
    
<hr />



<div class="row" style="margin-bottom:150px">

       <div class="col-md-4">
           <div class="card wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
               <div class="card-header">
                   <img src="{{asset('images/'.$album->photo)}}" src="{{asset('images/'.$album->photo)}}" class="lazyload">
               </div>
               <div class="card-body">
                   <h4> <a href="{{route('album.show',$album->id)}}">{{$album->name}}</a></h4>
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
                   @if ($album->public == '1')
                   <span class="badge bg-primary">Public</span>
                   @else
                   <span class="badge bg-danger">private</span>
                   @endif

               </div>
           </div>
       </div>



   </div>

</div>
@endsection
