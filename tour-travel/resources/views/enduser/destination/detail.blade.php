@extends('layouts2.enduser')

@section('content')
<style>
    .accordion {
    display: inline-block;
    width: 100%;
    margin-bottom: 10px;
    }
    .accordion .accordion-header, .accordion .accordion-body {
    padding: 10px 15px;
    }
    .accordion .accordion-header {
    background-color: #e5e5e5;
    border-radius: 3px;
    cursor: pointer;
    transition: all 0.5s;
    }
    .accordion .accordion-header h4 {
    line-height: 1;
    margin: 0;
    font-size: 18px;
    font-weight: 700;
    }
    .accordion .accordion-header:hover {
    background-color: #f2f2f2;
    }
    .accordion .accordion-header[aria-expanded=true] {
    box-shadow: 0 2px 6px #acb5f6;
    background-color: #F15D30;
    color: #fff;
    }
    .accordion .accordion-body {
    line-height: 24px;
    }

    p {
    color: #6C757D; /* Warna font hitam (black) */
    }

    li {
    color: #6C757D; /* Warna font hitam (black) */
    }

</style>

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
    <div class="row">

        <div class="col-12 col-md-12 col-lg-12"> 
            <div class="text p-4">
                <h4>{{$detail->nama}}</h4>
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
            </div>
            <div class="card-body">
                <div id="accordion">
                    <div class="accordion">
                        <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-1" aria-expanded="true">
                            <h4>Overview</h4>
                        </div>
                        <div class="accordion-body collapse show" id="panel-body-1" data-parent="#accordion">
                            <p>{{$detail->overview}}</p>
                        </div>
                    </div>
                    <div class="accordion">
                        <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-2">
                            <h4>Places to Visit</h4>
                        </div>
                        <div class="accordion-body collapse" id="panel-body-2" data-parent="#accordion">
                            <ul>
                                @foreach ($arrayhasil as $item)
                                <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="accordion">
                        <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-6">
                            <h4>Pax & Price</h4>
                        </div>
                        <div class="accordion-body collapse" id="panel-body-6" data-parent="#accordion">
                            <ul>
                                @foreach ($data2 as $dd)
                                    @if(isset($dd->min_pax)) <li>Min: {{ $dd->min_pax }} Pax &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; @currency($dd->harga)</li> @endif
                                    @if(isset($dd->pax_person)) <li>{{ $dd->pax_person }} Pax &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; @currency($dd->harga)</li> @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="accordion">
                        <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-3">
                            <h4>What's Bring</h4>
                        </div>
                        <div class="accordion-body collapse" id="panel-body-3" data-parent="#accordion">
                            <ul style="list-style: none; padding-left: 0;">
                                @foreach ($dataArray as $data)
                                    <li>
                                        <input type="checkbox" checked style="margin-left: 10px;" onclick="return false;"> {{ $data }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="accordion">
                        <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-4">
                            <h4>Included</h4>
                        </div>
                        <div class="accordion-body collapse" id="panel-body-4" data-parent="#accordion">
                            <ul style="list-style: none; padding-left: 0;">
                                @foreach ($dataArray2 as $data)
                                    <li>
                                        <input type="checkbox" checked style="margin-left: 10px;" onclick="return false;"> {{ $data }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="accordion">
                        <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-5">
                            <h4>General Term</h4>
                        </div>
                        <div class="accordion-body collapse" id="panel-body-5" data-parent="#accordion">
                            <ul style="list-style: none; padding-left: 0;">
                                @foreach ($dataArray3 as $data)
                                    <li>
                                        <input type="checkbox" checked style="margin-left: 10px;" onclick="return false;"> {{ $data }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        
    </div>
</section>

@endsection