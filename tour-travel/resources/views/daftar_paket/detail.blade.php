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
                <h4>{{ $d->nama }} - {{$d->lama_hari}}, {{ $d->destinasi->nama }}</h4>
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
            <strong>Objek Wisata yang akan dikunjungi:</strong>
            <ul>
                @foreach ($arrayhasil as $item)
                <li>{{ $item }}</li>
                @endforeach
            </ul>
            <strong>Pax & Harga:</strong>
            <ul>
                @foreach ($data2 as $d)
                    @if(isset($d->min_pax)) <li>Min: {{ $d->min_pax }} Pax &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; @currency($d->harga)</li> @endif
                    @if(isset($d->pax_person)) <li>{{ $d->pax_person }} Pax &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; @currency($d->harga)</li> @endif
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
                    @if($data)
                    <li>{{ $data }}</li>
                    @else
                    <p>-</p>
                    @endif
                @endforeach
            </ul> 
        </div> 
        </div>
    </section>
</div>

<!-- <div class="table-responsive">
            <table class="table table-bordered" id="myTable">
                <thead>
                    <tr style="text-align: center;">
                        <th width="5%">No</th>
                        <th>KBG</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        
                    </tr>
                </tbody>
            </table>
        </div> -->
@endsection