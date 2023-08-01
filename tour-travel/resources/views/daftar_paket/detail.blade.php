@extends('layouts.admin')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Daftar Paket Tour</h1>
        </div>

        <div class="section-body">

        <div class="card">
            <div class="card-header">
                @foreach ($data as $d)
                <h4>{{ $d->nama }} - {{$d->lama_hari}}</h4>
            </div>
            <div class="card-body">
            <div id="carouselExampleIndicators3" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators3" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators3" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators3" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{asset('gambar/'.$d->gambar)}}" style="height: 450px">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{asset('gambar/'.$d->gambar2)}}" style="height: 450px">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{asset('gambar/'.$d->gambar3)}}" style="height: 450px">
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
            <br>
                @endforeach
            <strong>Destinasi yang akan dikunjungi:</strong>
            <ul>
                @foreach ($arrayhasil as $item)
                <li>{{ $item }}</li>
                @endforeach
            </ul>
            <strong>Harga:</strong>
            <ul>
                @foreach ($data as $d)
                <li>{{ $d->pax }} Pax &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; IDR {{ $d->harga }}.000 / pax</li>
                @endforeach
            </ul>
            <strong>Keperluan yang perlu dibawa (what's bring):</strong>
            <ul>
                @foreach ($dataArray as $data)
                    <li>{{ $data }}</li>
                @endforeach
            </ul>
            <strong>Harga sudah termasuk (included):</strong>
            <ul>
                @foreach ($dataArray2 as $data)
                    <li>{{ $data }}</li>
                @endforeach
            </ul> 
        </div> 
        </div>
    </section>
</div>
@endsection