@extends('layouts2.enduser')

@section('content')

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('/enduser/images/bg_2.jpg');">
    <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="fa fa-chevron-right"></i></a></span> <span><a href="/destination">Destination <i class="fa fa-chevron-right"></i></a></span></p>
                @foreach($tour as $t)<h1 class="mb-0 bread">{{$t->destinasi->nama}}</h1>@endforeach
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row">

        @foreach($tour as $t)
        <div class="col-md-4 ftco-animate">
        <a href="{{ route('destination.detail', ['id' => $t->id]) }}">
            <div class="project-wrap">
                <img class="img" style="background-image" src="{{asset('gambar/'.$t->gambar)}}">
            <div class="text p-4">
                <span class="days">{{$t->lama_hari}}</span>
                <h3><a href="#">{{$t->nama}}</a></h3>
            </div>
            </div>
        </a>
        </div>
        @endforeach
        
        </div>
    </div>
</section>

@endsection