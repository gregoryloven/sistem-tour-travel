@extends('layouts.admin')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Daftar Paket Tour</h1>
        </div>

        <div class="section-body">
        @foreach ($data as $d)
        <h4>{{ $d->nama }}</h4>
    @endforeach

    @foreach ($data as $item)
    <p>
        <strong>Destinasi:</strong>
        <br>{!! $item->nama_destinasi !!}
    </p>
    <hr>
@endforeach


        <ul>
    @foreach ($dataArray as $data)
        <li>{{ $data }}</li>
    @endforeach
</ul>
        </div>
    </section>
</div>
@endsection