@extends('layouts.admin')

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Daftar Paket Tour</h1>
        </div>

        <div class="section-body">

        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                <h4>Form Buat Paket Tour</h4>
                </div>
                <div class="card-body">
                <form>
                <div class="form-group">
                    <label>Destinasi</label>
                      <select class="form-control select2" id="multiple-select-field" multiple="">
                        @foreach($data as $d)
                        <option value="{{ $d->id }}">{{ $d->nama }}</option>
                        @endforeach
                      </select>
                </div>
                <div class="form-group">
                    <label>Nama Paket</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Paket" required>
                </div>
                <div class="form-group">
                    <label>Lama Hari</label>
                    <select class="form-control" id='lama_hari' name='lama_hari'>
                    <option>Half Day</option>
                    <option>One Day</option>
                    <option>2D 1N</option>
                    <option>3D 2N</option>
                    <option>4D 3N</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Pax</label>
                    <input type="number" class="form-control" id="pax"  name="pax" placeholder="0" min="1" required>
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <input type="number" class="form-control" id="harga"  name="harga" placeholder="0" min="1" required>
                </div>
                <div class="form-group">
                    <label class="d-block">Included</label>
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Kendaraan
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="defaultCheck3">
                    <label class="form-check-label" for="defaultCheck3">
                        Makan
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Fotografer
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="defaultCheck3">
                    <label class="form-check-label" for="defaultCheck3">
                        Penginapan
                    </label>
                    </div>
                </div>
<!-- </form> -->
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit" id="submit">Submit</button>
                    <button class="btn btn-secondary" type="reset">Reset</button>
                </div>
                </div>   
            </div>
            </div>
        </div>
        </div>
    </section>
</div>
@endsection

@section('javascript')
<script>
$(document).ready(function() {
    $("#multiple-select-field").change(function() {
        $(this).each(function() {
            idgabung = $(this).val();
		}); 

    $("#submit").click(function() {
        $.ajax({
            type:'POST',
            url:'{{route("daftar-paket.store")}}',
            data:{'_token':'<?php echo csrf_token() ?>',
                'data':idgabung,
                'nama':$('#nama').val(),
                'lama_hari':$('#lama_hari').val(),
                'pax':$('#pax').val(),
                'harga':$('#harga').val(),
                },
            success: function(data){
                
            if(data.status == 'success')
            {
                Swal.fire({
                    title: 'Successfully Registered!',
                    text: 'Do you want to go to the Log In page?',
                    icon: 'success',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, send me there!'
                }).then(function(result) {
                if (result.isConfirmed) {
                    window.location.href = "/daftar-paket";
                }
                });
            }          

            }
        });
    });
  });
});

</script>
@endsection