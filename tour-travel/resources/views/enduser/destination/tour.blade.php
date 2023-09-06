@extends('layouts2.enduser')

@section('content')

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('/enduser/images/bg_2.jpg');">
    <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="fa fa-chevron-right"></i></a></span> <span><a href="/destination">Destination <i class="fa fa-chevron-right"></i></a></span></p>
                <h1 class="mb-0 bread">{{$judulTour->destinasi->nama}}</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row">

        @foreach($tour as $t)
        <div class="col-md-6 ftco-animate">
        <a href="{{ route('destination.detail', ['id' => $t->id]) }}">
            <div class="project-wrap">
                <img class="img" style="background-image" src="{{asset('gambar/'.$t->gambar)}}">
            <div class="text p-4">
            @foreach($lamahari as $l)
                
                @if($l->day === 0)
                    Half Day
                @elseif($l->day === 1)
                    Full Day
                @else
                    <span class="days">{{$l->day}}</span> Day 
                    @if($l->night !== null)
                    <span class="days">{{$l->night}}</span> Night
                    @endif
                @endif
            
            @endforeach
                <h3>{{$t->nama}}</h3>
        </a>
                <p>
                    @if(strlen($t->overview) > 200)
                        {{ substr($t->overview, 0, 200) }}...
                        <a href="{{ route('destination.detail', ['id' => $t->id]) }}">Read More</a>
                    @else
                        {{ $t->overview }}
                    @endif
                </p>
            </div>
            
            </div>
        
        </div>
        @endforeach
        
        </div>
    </div>
</section>

@endsection

