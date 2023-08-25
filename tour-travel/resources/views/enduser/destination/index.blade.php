@extends('layouts2.enduser')

@section('content')

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('enduser/images/bg_1.jpg');">
    <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="fa fa-chevron-right"></i></a></span> <span>Destination <i class="fa fa-chevron-right"></i></span></p>
                <h1 class="mb-4 bread">All Destination</h1>
            </div>
        </div>
    </div>
</section>
<br>

<section class="ftco-section ftco-no-pb ftco-no-pt">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="ftco-search justify-content-center">
					<div class="row">
						<div class="col-md-12 nav-link-wrap">
							<div class="nav nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
								<a class="nav-link active mr-md-1" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Search Tour</a>
							</div>
						</div>
						<div class="col-md-12 tab-wrap">
							<div class="tab-content" id="v-pills-tabContent">
								<div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
                                    <form action="{{ url('selectTour') }}" class="search-property-1" target="_blank">
                                        <div class="row no-gutters">
                                            <div class="col-md-10 d-flex">
                                                <div class="form-group p-4 border-0">
                                                    <label for="#">Destination</label>
                                                    <div class="form-field">
                                                        <select class="form-control select2" id="destination" name="destination" data-dropdownParent=".form-field">
                                                            @foreach($data as $d)
                                                                <option value="{{ $d->id }}">{{ $d->nama }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 d-flex">
                                                <div class="form-group d-flex w-100 border-0">
                                                    <div class="form-field w-100 align-items-center d-flex">
                                                        <input type="submit" value="Search" id="search" class="align-self-stretch form-control btn btn-primary">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> 
	</div>
</section>


<section class="ftco-section">
    <div class="container">
        <div class="row">

        @foreach($data as $d)
        <div class="col-md-4 ftco-animate">
        <a href="{{ route('destination.tour', ['destinasi_id' => $d->id]) }}">
            <div class="project-wrap">
                <img class="img" style="background-image" src="{{asset('gambar/'.$d->gambar)}}">
            <div class="text p-4">
                @foreach($countData as $count)
                    @if($count->destinasi_id == $d->id)
                        <span class="days">{{$count->destinasi_count}} Tours</span>
                        @else 
                        <span class="days">0 Tours</span>
                    @endif
                @endforeach
                <h3>{{$d->nama}}</h3>
            </div>
            </div>
        </a>
        </div>
        @endforeach
        
        </div>
    </div>
</section>

@endsection

@section('javascript')
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script>
// $(document).ready(function() {
//      $('#search').click(function(event)
//      {
//         event.preventDefault();
//         var idTour = $('#destination').val();
//         var url = "{{ route ('destination.tour', ':destinasi_id') }}";
//         url = url.replace(':destinasi_id', idTour)

//         location.href = url;
//      }); 
// });


// $(document).ready(function() {
//     $('.select2').select2({
//         dropdownParent: $('.form-field'), // Atur elemen kontainer
//         maximumSelectionSize: 5, // Batasi jumlah item yang ditampilkan
//         // Opsi lain yang Anda mungkin perlukan
//     });
// });
</script>

@endsection