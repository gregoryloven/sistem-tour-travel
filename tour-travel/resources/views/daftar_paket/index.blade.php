@extends('layouts.admin')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Daftar Paket Tour</h1>
        </div>

        <div class="section-body">
        
        <a href="{{ url('daftar-paket/create/') }}" class="btn btn-success btn-xs btn-flat"><i class="fa fa-plus-circle"></i> Buat Paket</a><br><br>
        
        <div class="row">
        @foreach($data as $d)
          <div class="col-12 col-md-6 col-lg-6">
          <div class="card">
            <div class="card-header">
              <h4>{{$d->nama}}</h4>
              <div class="card-header-action">
                <a href="#" class="btn btn-primary">View All</a>
              </div>
            </div>
            <div class="card-body">
              <div class="chocolat-parent">
                <a href="{{asset('gambar/'.$d->gambar)}}" class="chocolat-image" title="Just an example">
                  <div data-crop-image="285">
                    <img alt="image" src="{{asset('gambar/'.$d->gambar)}}" class="img-fluid" style="height: 300px">
                  </div>
                </a>
              </div>
            </div>
          </div>
          </div>
          @endforeach
        </div>
        </div>
    </section>
</div>
@endsection