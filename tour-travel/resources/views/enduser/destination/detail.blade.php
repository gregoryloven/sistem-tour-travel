@extends('layouts2.enduser')

@section('content')

<!-- <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('/enduser/images/bg_2.jpg');">
    <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>Tour List <i class="fa fa-chevron-right"></i></span></p>
                <h1 class="mb-0 bread">Tours List</h1>
            </div>
        </div>
    </div>
</section> -->

<div id="carouselExampleIndicators3" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators3" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators3" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators3" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="hero-wrap hero-wrap-2 js-fullheight" src="{{asset('gambar/'.$detail->gambar)}}">
        </div>
        <div class="carousel-item">
            <img class="hero-wrap hero-wrap-2 js-fullheight" src="{{asset('gambar/'.$detail->gambar2)}}">
        </div>
        <div class="carousel-item">
            <img class="hero-wrap hero-wrap-2 js-fullheight" src="{{asset('gambar/'.$detail->gambar3)}}">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators3" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators3" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


<section class="ftco-section">
    <div class="container">
        <div class="row">

   
        <div class="col-md-4 ftco-animate">
            <div class="project-wrap">
                <img class="img" style="background-image" src="{{asset('gambar/'.$detail->gambar)}}">
            <div class="text p-4">
                <span class="days">{{$detail->lama_hari}}</span>
                <h3><a href="#">{{$detail->nama}}</a></h3>
                <span class="days">{{$detail->included}}</span>
            </div>
            </div>
        </div>

        
        </div>
    </div>
</section>

@endsection