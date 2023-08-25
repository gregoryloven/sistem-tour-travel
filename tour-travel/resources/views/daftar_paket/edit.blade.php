@extends('layouts.admin')

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Ubah Paket Tour</h1>
        </div>

        <div class="section-body">

        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                <h4>Form Ubah Paket Tour</h4>
                </div>
                <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Destinasi</label>
                    <select class="form-control" id='destinasi_id' name='destinasi_id' placeholder="Destinasi">
                        @foreach($destinasi as $d)
                            <option value="{{ $d->id }}" {{ $d->id == $data->destinasi_id ? 'selected' : '' }}> {{ $d->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="d-block">Objek Wisata yang dikunjungi</label>
                    <div class="row">
                        @foreach($objekwisata as $d)
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="objekwisata[]" value="{{$d->id}}" {{ in_array($d->id, $objekwisata_data) ? 'checked' : '' }}>
                                <label class="form-check-label">
                                    {{ $d->nama }}
                                </label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label>Nama Paket</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{$data->nama}}" placeholder="Nama Paket" required>
                </div>
                <div class="form-group">
                    <label>Overview</label>
                    <textarea class="form-control" id='overview' name='overview' value="{{$data->overview}}" style="height:250px;" required>{{$data->overview}}</textarea>
                </div>
                <div class="form-group">
                    <label>Lama Hari</label>
                    <select class="form-control" id='lama_hari' name='lama_hari' placeholder="Lama Hari">
                        @foreach($lamahari as $d)
                        <option value="{{$d->id}}" {{ $d->id == $data->lama_hari ? 'selected' : '' }}>
                            @if($d->day === 0)
                                Half Day
                            @elseif($d->day === 1)
                                Full Day
                            @else
                                <b>{{$d->day}}</b> Day 
                                @if($d->night !== null)
                                    <b>{{$d->night}}</b> Night
                                @endif
                            @endif
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Tipe Harga</label>
                    <select class="form-control" id='tipe_harga' name='tipe_harga' onchange='checkTipeHarga(this)' disabled>
                        <option value="1" {{ $data->tipe == 1 ? 'selected' : '' }}>Min Pax</option>
                        <option value="2" {{ $data->tipe == 2 ? 'selected' : '' }}>Harga / Pax</option>
                    </select>
                </div>
                <!-- Kategori 1 -->
                @if($data->tipe == 1)
                <div class="form-group" id='label_tipe1'>
                    <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <label>Min Pax</label>
                        <input type="number" class="form-control" id="min_pax" name="min_pax" value="{{$data->min_pax}}" min="1" required>
                    </div>

                    <div class="col-12 col-md-6 col-lg-6">
                        <label>Harga / Pax</label>
                        <input type="text" class="form-control" id="harga_min_pax" name="harga_min_pax" value="{{$data->harga}}" min="1" required>
                    </div>
                    </div>
                </div>
                <!-- Kategori 2 -->
                @else
                <div class="form-group" id='label_tipe2'>
                <div class="table-responsive">
                    <table class="table table-bordered" style="text-align: center;" id="myTablee">
                        <thead>
                            <tr>
                                <th style="width: 40%;">Pax</th>
                                <th style="width: 40%;">Harga</th>
                                <th style="width: 20%;">Action<button class="btn btn-primary ml-3" id='plus_button' onclick="addRow()"><i class="fa fa-plus-circle"></i></button></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tipeharga as $d)
                            <tr>
                                <td>
                                    <input type="number" style="text-align: center;" class="form-control pax_person" id="pax_person'+i+'" name="pax_person" value="{{$d->pax_person}}" min="1" required>
                                </td>
                                <td>
                                    <input type="text" style="text-align: center;" class="form-control harga_pax" id="harga_pax'+i+'" name="harga_pax" value="@currency($d->harga)" onkeyup="formatDenganRupiah(this)" required>
                                </td>
                                <td>
                                    <button style="margin-top:10%; margin-left:20%" class="btn btn-danger mb-4" id="delete_button" onclick="deleteRow(this)"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
                @endif
                <div class="form-group">
                    <label class="d-block">Include</label>
                    <div class="row">
                        @foreach($include as $d)
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="include[]" value="{{$d->id}}" {{ in_array($d->include, $include_data) ? 'checked' : '' }}>
                                <label class="form-check-label">
                                    {{ $d->include }}
                                </label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label class="d-block">What Bring</label>
                    <div class="row">
                        @foreach($whatbring as $d)
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="whatbring[]" value="{{$d->id}}" {{ in_array($d->what_bring, $whatbring_data) ? 'checked' : '' }}>
                                <label class="form-check-label">
                                    {{ $d->what_bring }}
                                </label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label class="d-block">General Term</label>
                    <div class="row">
                        @foreach($generalterm as $d)
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="generalterm[]" value="{{$d->id}}" {{ in_array($d->general_term, $generalterm_data) ? 'checked' : '' }}>
                                <label class="form-check-label">
                                    {{ $d->general_term }}
                                </label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label>Gambar</label>
                    <input type="file" value="{{$data->gambar}}" class="form-control" id="gambar" name="gambar" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                    <img id="output" src="{{asset('gambar/'.$data->gambar)}}" width="80px" height="80px">
                </div>
                <div class="form-group">
                    <label>Gambar 2 (optional)</label>
                    <input type="file" value="{{$data->gambar2}}" class="form-control" id="gambar2" name="gambar2" onchange="document.getElementById('output2').src = window.URL.createObjectURL(this.files[0])">
                    <img id="output2" src="{{asset('gambar/'.$data->gambar2)}}" alt="Belum ada gambar" width="80px" height="80px">
                </div>
                <div class="form-group">
                    <label>Gambar 3 (optional)</label>
                    <input type="file" value="{{$data->gambar3}}" class="form-control" id="gambar3" name="gambar3" onchange="document.getElementById('output3').src = window.URL.createObjectURL(this.files[0])">
                    <img id="output3" src="{{asset('gambar/'.$data->gambar3)}}" alt="Belum ada gambar" width="80px" height="80px">
                </div>
                <div class="form-group">
                    <label>Gambar 4 (optional)</label>
                    <input type="file" value="{{$data->gambar4}}" class="form-control" id="gambar4" name="gambar4" onchange="document.getElementById('output4').src = window.URL.createObjectURL(this.files[0])">
                    <img id="output4" src="{{asset('gambar/'.$data->gambar4)}}" alt="Belum ada gambar" width="80px" height="80px">
                </div>
                <div class="form-group">
                    <label>Gambar 5 (optional)</label>
                    <input type="file" value="{{$data->gambar5}}" class="form-control" id="gambar5" name="gambar5" onchange="document.getElementById('output5').src = window.URL.createObjectURL(this.files[0])">
                    <img id="output5" src="{{asset('gambar/'.$data->gambar5)}}" alt="Belum ada gambar" width="80px" height="80px">
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

    $("#submit").click(function(event) {
        event.preventDefault();
        var destinasi_id = $("#destinasi_id").val()
        var nama = $("#nama").val()
        var overview = $("#overview").val()
        var lama_hari = $("#lama_hari").val()
        // var tipe_harga = $("#tipe_harga").val()
        var min_pax = $("#min_pax").val()

        if($("#harga_min_pax").val())
        {
            var harga_min_pax = $("#harga_min_pax").val().substr(3)
        }

        var formData = new FormData();

        var gambar = $("#gambar")[0].files[0]
        var gambar2 = $("#gambar2")[0].files[0]
        var gambar3 = $("#gambar3")[0].files[0]
        var gambar4 = $("#gambar4")[0].files[0]
        var gambar5 = $("#gambar5")[0].files[0]

        formData.append('gambar', gambar);
        formData.append('gambar2', gambar2);
        formData.append('gambar3', gambar3);
        formData.append('gambar4', gambar4);
        formData.append('gambar5', gambar5);

        //Objek Wisata YANG BARU (DIPAKAI)
        var selectedValues4 = [];
        $("input[name='objekwisata[]']:checked").each(function () {
            selectedValues4.push($(this).val());
        });
        
        //Inlude YANG BARU (DIPAKAI)
        var selectedValues = [];
        $("input[name='include[]']:checked").each(function () {
            selectedValues.push($(this).val());
        });

        //What Bring YANG BARU (DIPAKAI)
        var selectedValues2 = [];
        $("input[name='whatbring[]']:checked").each(function () {
            selectedValues2.push($(this).val());
        });

        //General Term YANG BARU (DIPAKAI)
        var selectedValues3 = [];
        $("input[name='generalterm[]']:checked").each(function () {
            selectedValues3.push($(this).val());
        });

        //array tipe 2
        if ({{ $data->tipe }} == 2)
        {
            var pax_person = [];
            var harga_pax = [];
            const table = document.getElementById('myTablee');
            const newRow = table.insertRow(table.rows.length);

            for (let i = 1; i < table.rows.length; i++) {
                var a = "pax_person" + i;
                var b = "harga_pax" + i;
                if($('#'+a).val() != null)
                {
                    pax_person.push($('#'+a).val());
                }
                if($('#'+b).val() != null)
                {
                    var harga = $('#'+b).val();

                    var rp = harga.substr(3);
                    var titik = rp.replace(/\./g, '');
                    harga_pax.push(parseInt(titik));   
                }

            }   
        }
        if({{ $data->tipe }} == 1)
        {
            if(selectedValues4.length == 0 || !nama || !overview || !min_pax || !harga_min_pax || selectedValues.length == 0 || selectedValues2.length == 0 || selectedValues3.length == 0)
            {
                Swal.fire({
                icon: 'error',
                title: 'Kesalahan',
                text: 'Mohon Lengkapi Semua Data!',
                })
            }
            else if(min_pax == 0 || harga_min_pax == 0)
            {
                Swal.fire({
                icon: 'error',
                title: 'Kesalahan',
                text: 'Min Pax atau Harga minimal 1!',
                })
            }
            else
            {
                formData.append('_token', '<?php echo csrf_token() ?>');
                formData.append('objek_wisata', selectedValues4);
                formData.append('include', selectedValues);
                formData.append('what_bring', selectedValues2);
                formData.append('general_term', selectedValues3);
                formData.append('destinasi_id', destinasi_id);
                formData.append('nama', nama);
                formData.append('overview', overview);
                formData.append('lama_hari', lama_hari);
                // formData.append('tipe_harga', tipe_harga);
                formData.append('min_pax', min_pax);
                formData.append('harga_min_pax', harga_min_pax);
                formData.append('pax_person', pax_person);
                formData.append('harga_pax', harga_pax);

                $.ajax({
                    type:'POST',
                    url:'{{route("daftar-paket.update")}}',
                    data: formData,
                        processData: false, 
                        contentType: false, 
                    success: function(data){

                    if(data.status == 'success')
                    {
                        Swal.fire({
                            title: 'Data Berhasil Diubah!',
                            icon: 'success',
                            showDenyButton: true,
                            confirmButtonColor:  '#00cc00',
                            denyButtonColor: '#3085d6',
                            confirmButtonText: 'Kembali ke Detail Paket',
                            denyButtonText: 'Tambahkan Lagi!'
                        }).then(function(result) {
                        if (result.isConfirmed) {
                            window.location.href = "/daftar-paket/show";
                        }
                        else if (result.isDenied){
                            window.location.href = "/daftar-paket/create";
                        }
                        });
                    }     
                    }
                });
            }
        }
        else if ({{ $data->tipe }} == 2)
        {
            if(selectedValues4.length == 0 || !nama || !overview ||  selectedValues.length == 0 || selectedValues2.length == 0 || selectedValues3.length == 0)
            {
                Swal.fire({
                icon: 'error',
                title: 'Kesalahan',
                text: 'Mohon Lengkapi Semua Data!',
                })
            }
            else if(min_pax == 0 || harga_min_pax == 0)
            {
                Swal.fire({
                icon: 'error',
                title: 'Kesalahan',
                text: 'Min Pax atau Harga minimal 1!',
                })
            }
            else
            {
                formData.append('_token', '<?php echo csrf_token() ?>');
                formData.append('objek_wisata', selectedValues4);
                formData.append('include', selectedValues);
                formData.append('what_bring', selectedValues2);
                formData.append('general_term', selectedValues3);
                formData.append('destinasi_id', destinasi_id);
                formData.append('nama', nama);
                formData.append('overview', overview);
                formData.append('lama_hari', lama_hari);
                // formData.append('tipe_harga', tipe_harga);
                formData.append('min_pax', min_pax);
                formData.append('harga_min_pax', harga_min_pax);
                formData.append('pax_person', pax_person);
                formData.append('harga_pax', harga_pax);

                $.ajax({
                    type:'POST',
                    url:'{{route("daftar-paket.update")}}',
                    data: formData,
                        processData: false, 
                        contentType: false, 
                    success: function(data){

                    if(data.status == 'success')
                    {
                        Swal.fire({
                            title: 'Data Berhasil Diubah!',
                            icon: 'success',
                            showDenyButton: true,
                            confirmButtonColor:  '#00cc00',
                            denyButtonColor: '#3085d6',
                            confirmButtonText: 'Kembali ke Detail Paket',
                            denyButtonText: 'Tambahkan Lagi!'
                        }).then(function(result) {
                        if (result.isConfirmed) {
                            window.location.href = "/daftar-paket/show";
                        }
                        else if (result.isDenied){
                            window.location.href = "/daftar-paket/create";
                        }
                        });
                    }     
                    }
                });
            }
        }
   
    });

    //format rupiah 
    var dengan_rupiah = document.getElementById('harga_min_pax');

    // Tambahkan "Rp." pada kolom Harga / Pax saat halaman dimuat
    var formattedValue = formatRupiah(dengan_rupiah.value.replace(/\D/g, ''), 'Rp. ');
    dengan_rupiah.value = formattedValue;

    dengan_rupiah.addEventListener('keyup', function(e)
    {
        const inputText = this.value;
        const numericOnly = inputText.replace(/\D/g, ''); // Hanya menyimpan karakter angka
        
        dengan_rupiah.value = formatRupiah(numericOnly, 'Rp. ');
    });

});

let i = 1;

function addRow() {
    const table = document.getElementById('myTablee');
    const newRow = table.insertRow(table.rows.length);
    const cell1 = newRow.insertCell(0);
    const cell2 = newRow.insertCell(1);
    const cell3 = newRow.insertCell(2);

    
    cell1.innerHTML = '<input type="number" style="text-align: center;" class="form-control pax_person" id="pax_person'+i+'" name="pax_person" min="1" required>';
    cell2.innerHTML = '<input type="text" style="text-align: center;" class="form-control harga_pax" id="harga_pax'+i+'" name="harga_pax" onkeyup="formatDenganRupiah(this)" required>';
    cell3.innerHTML = '<button style="margin-top:10%; margin-left:20%" class="btn btn-danger mb-4" id="delete_button" onclick="deleteRow(this)"><i class="fa fa-trash"></i></button>';

    i = i+1;
}

function deleteRow(button) {
    const row = button.parentNode.parentNode; // Dapatkan baris yang akan dihapus
    row.parentNode.removeChild(row); // Hapus baris dari tabel
}


function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split    = number_string.split(','),
        sisa     = split[0].length % 3,
        rupiah     = split[0].substr(0, sisa),
        ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
        
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }
    
    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}

function formatDenganRupiah(input) {
    const inputText = input.value;
    const numericOnly = inputText.replace(/\D/g, '');

    input.value = formatRupiah(numericOnly, 'Rp. ');
}

function checkTipeHarga(tipe) {

if($(tipe).val() == '1')
{
    $('#label_tipe1').show()
    
    $('#label_tipe2').hide()
    $('.pax_person').prop('required',false)
    $('.harga_pax').prop('required',false)
}
else
{
    $('#label_tipe2').show()
    
    $('#label_tipe1').hide()
    $('#min_pax').prop('required',false)
    $('#harga_min_pax').prop('required',false)
}
}

</script>
@endsection