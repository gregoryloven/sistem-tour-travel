@extends('layouts.admin')

<style>
    .indented-paragraph {
        text-indent: 40px;
    }
</style>

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
            <strong>Overview:</strong>
                <p class="indented-paragraph">{{ $d->overview }}</p>
                
            <strong>Objek Wisata yang akan dikunjungi:</strong>
            <ul>
                @foreach ($arrayhasil as $item)
                <li>{{ $item }}</li>
                @endforeach
            </ul>
            <strong>Pax & Harga:</strong>
            <ul>
                @foreach ($data2 as $dd)
                    @if(isset($dd->min_pax)) <li>Min: {{ $dd->min_pax }} Pax &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; @currency($dd->harga)</li> @endif
                    @if(isset($dd->pax_person)) <li>{{ $dd->pax_person }} Pax &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; @currency($dd->harga)</li> @endif
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
            <strong>General Term:</strong>
            <ul>
                @foreach ($dataArray3 as $data)
                    @if($data)
                    <li>{{ $data }}</li>
                    @else
                    <p>-</p>
                    @endif
                @endforeach
            </ul>
            <div class="col-12 col-md-12 col-lg-12">
				<div class="d-flex justify-content-end">
                    <form id="delete-form-{{ $d->id }}" action="{{ route('daftar-paket.destroy', $d->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ url('daftar-paket/edit/'.$d->id) }}" class="btn btn-icon btn-warning"><i class="far fa-edit"></i></a>

                        <input type="hidden" class="form-control" id='id' name='id' placeholder="Type your name" value="{{$d->id}}">
                        <button type="button" class="btn btn-icon btn-danger" data-id="{{ $d->id }}"><i class="fa fa-trash"></i></button>                                   
                    </form>
                </div>
            </div>
                @endforeach
        </div> 
        </div>
    </section>
</div>

@endsection

@section('javascript')
<script>

$(document).on('click', '.btn-danger', function(e) {
    e.preventDefault();
    
    var id = $(this).data('id');
    
    Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Data akan dihapus!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        confirmButtonText: 'Hapus!'
    }).then((result) => {
        if (result.isConfirmed) {
            $('#delete-form-' + id).submit();
        }
    });
});


</script>
@endsection