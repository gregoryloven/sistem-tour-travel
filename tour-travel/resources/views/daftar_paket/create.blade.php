@extends('layouts.admin')

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Buat Paket Tour</h1>
        </div>

        <div class="section-body">

        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                <h4>Form Buat Paket Tour</h4>
                </div>
                <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Destinasi</label>
                    <select class="form-control" id='destinasi_id' name='destinasi_id' placeholder="Destinasi">
                        <option disabled selected>Pilih Destinasi</option>
                        @foreach($data as $d)
                            <option value="{{ $d->id }}">{{ $d->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Objek Wisata yang dikunjungi</label>
                      <select class="form-control select2" id="multiple-select-field" multiple="" required>
                        @foreach($data2 as $d)
                        <option value="{{ $d->id }}">{{ $d->nama }}</option>
                        @endforeach
                      </select>
                </div>
                <div class="form-group">
                    <label>Nama Paket</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Paket" required>
                </div>
                <div class="form-group">
                    <label>Overview</label>
                    <textarea class="form-control" id='overview' name='overview' style="height:250px;" required></textarea>
                </div>
                <div class="form-group">
                    <label>Lama Hari</label>
                    <select class="form-control" id='lama_hari' name='lama_hari' placeholder="Lama Hari">
                        <option disabled selected>Pilih lama hari</option>
                        @foreach($lamahari as $l)
                        <option value="{{$l->id}}">
                            @if($l->day === 0)
                                Half Day
                            @elseif($l->day === 1)
                                Full Day
                            @else
                                <b>{{$l->day}}</b> Day 
                                @if($l->night !== null)
                                    <b>{{$l->night}}</b> Night
                                @endif
                            @endif
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Tipe Harga</label>
                    <select class="form-control" id='tipe_harga' name='tipe_harga' onchange='checkTipeHarga(this)' required>
                        <option value="" disabled selected>Choose</option>
                        <option value="1">Min Pax</option>
                        <option value="2">Harga / Pax</option>
                    </select>
                </div>
                <!-- Kategori 1 -->
                <div class="form-group" style='display:none' id='label_tipe1'>
                    <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <label>Min Pax</label>
                        <input type="number" class="form-control" id="min_pax" name="min_pax" placeholder="0" min="1" required>
                    </div>

                    <div class="col-12 col-md-6 col-lg-6">
                        <label>Harga / Pax</label>
                        <input type="text" class="form-control" id="harga_min_pax" name="harga_min_pax" placeholder="0" min="1" required>
                    </div>
                    </div>
                </div>
                <!-- Kategori 2 -->
                <div class="form-group" style='display:none' id='label_tipe2'>

                <div class="table-responsive">
                    <table class="table table-bordered" id="myTable">
                        <thead>
                            <tr style="text-align: center;">
                                <th style="width: 40%;">Pax</th>
                                <th style="width: 40%;">Harga</th>
                                <th style="width: 20%;">Actions <button class="btn btn-primary ml-3" id='plus_button' onclick="addRow()"><i class="fa fa-plus-circle"></i></button></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                
                            </tr>
                        </tbody>
                    </table>
                </div>
                </div>

                <div class="form-group">
                    <label class="d-block">Include</label>
                    <div class="row">
                        @foreach($includeitem as $i)
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="include[]" value="{{$i->include}}">
                                <label class="form-check-label">
                                    {{$i->include}}
                                </label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="form-group">
                    <label class="d-block">What Bring</label>
                    <div class="row">
                        @foreach($whatbring as $w)
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="whatbring[]" value="{{$w->what_bring}}">
                                <label class="form-check-label">
                                    {{$w->what_bring}}
                                </label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="form-group">
                    <label class="d-block">General Term</label>
                    @foreach($generalterm as $g)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="generalterm[]" value="{{$g->general_term}}">
                            <label class="form-check-label">
                                {{$g->general_term}}
                            </label>
                        </div>
                    @endforeach
                </div>

                <!-- <div class="form-group">
                    <label class="d-block">Include</label>
                    <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="Kendaraan">
                    <label class="form-check-label" for="kendaraan">
                        Kendaraan
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="Makan">
                    <label class="form-check-label" for="makan">
                        Makan
                    </label>
                    </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="Fotografer">
                    <label class="form-check-label" for="Fotografer">
                        Fotografer
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="Penginapan">
                    <label class="form-check-label" for="Penginapan">
                        Penginapan
                    </label>
                    </div>
                    </div>
                    </div>
                </div> -->
                <!-- <div class="form-group">
                    <label class="d-block">What's Bring</label>
                    <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                    <div class="form-check">
                    <input class="form-check-bring" type="checkbox" id="Casual Shirt">
                    <label class="form-check-label" for="casual_shirt">
                        Casual Shirt
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-bring" type="checkbox" id="Long Sleeved Shirt">
                    <label class="form-check-label" for="long_sleeved_shirt">
                        Long Sleeved Shirt
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-bring" type="checkbox" id="Camera">
                    <label class="form-check-label" for="camera">
                        Camera
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-bring" type="checkbox" id="Sun Hat">
                    <label class="form-check-label" for="sun_hat">
                        Sun Hat
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-bring" type="checkbox" id="Hat or sun visor">
                    <label class="form-check-label" for="hat_sunvisor">
                        Hat or sun visor
                    </label>
                    </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-6">
                    <div class="form-check">
                    <input class="form-check-bring" type="checkbox" id="Sunglasses">
                    <label class="form-check-label" for="sunglasses">
                        Sunglasses
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-bring" type="checkbox" id="Sunscreen">
                    <label class="form-check-label" for="sunscreen">
                        Sunscreen
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-bring" type="checkbox" id="Walking Shoes">
                    <label class="form-check-label" for="walking_shoes">
                        Walking Shoes
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-bring" type="checkbox" id="Trekking Shoes">
                    <label class="form-check-label" for="walking_shoes">
                        Trekking Shoes
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-bring" type="checkbox" id="Money for Optional activities and souvenir">
                    <label class="form-check-label" for="money">
                        Money for Optional activities and souvenir
                    </label>
                    </div>

                    </div>
                    </div>
                    <label >Whats Bring</label>
                    <textarea class="form-control" id='whats_bring' name='whats_bring' style="height:250px;" placeholder="Gunakan tanda ',' sebagai pemisah" required></textarea>
                </div> -->
                <div class="form-group">
                    <label>Gambar</label>
                    <input type="file" value="" class="form-control" id="gambar" name="gambar" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])" required>
                    <img id="output" width="150px" height="150px">
                </div>
                <div class="form-group">
                    <label>Gambar2 (optional)</label>
                    <input type="file" value="" class="form-control" id="gambar2" name="gambar2" onchange="document.getElementById('output2').src = window.URL.createObjectURL(this.files[0])">
                    <img id="output2" width="150px" height="150px">
                </div>
                <div class="form-group">
                    <label>Gambar3 (optional)</label>
                    <input type="file" value="" class="form-control" id="gambar3" name="gambar3" onchange="document.getElementById('output3').src = window.URL.createObjectURL(this.files[0])">
                    <img id="output3" width="150px" height="150px">
                </div>
                <div class="form-group">
                    <label>Gambar4 (optional)</label>
                    <input type="file" value="" class="form-control" id="gambar4" name="gambar4" onchange="document.getElementById('output4').src = window.URL.createObjectURL(this.files[0])">
                    <img id="output4" width="150px" height="150px">
                </div>
                <div class="form-group">
                    <label>Gambar5 (optional)</label>
                    <input type="file" value="" class="form-control" id="gambar5" name="gambar5" onchange="document.getElementById('output5').src = window.URL.createObjectURL(this.files[0])">
                    <img id="output5" width="150px" height="150px">
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
    var idgabung = [];
    //checklist untuk destinasi id
    $("#multiple-select-field").change(function() {
        $(this).each(function() {
            idgabung = $(this).val();
		});
    });
    $("#submit").click(function(event) {
        
        event.preventDefault();
        var destinasi_id = $("#destinasi_id").val()
        var nama = $("#nama").val()
        var overview = $("#overview").val()
        var lama_hari = $("#lama_hari").val()
        var tipe_harga = $("#tipe_harga").val()
        var min_pax = $("#min_pax").val()
        var rp_min_pax = $("#harga_min_pax").val().substr(3)
        var harga_min_pax = rp_min_pax.replace(/\./g, '');
        // var what_bring = $("#what_bring").val()

        var formData = new FormData();

        console.log(harga_min_pax);

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

        //include YANG LAMA
        // const checkboxes = document.querySelectorAll('.form-check-input');
        // const checkedValues = [];

        // checkboxes.forEach(checkbox => {
        //     if (checkbox.checked) {
        //         checkedValues.push(checkbox.id);
        //     }
        // });

        //what bring YANG LAMA
        // const checkboxes2 = document.querySelectorAll('.form-check-bring');
        // const checkedValues2 = [];

        // checkboxes2.forEach(checkbox => {
        //     if (checkbox.checked) {
        //         checkedValues2.push(checkbox.id);
        //     }
        // });

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
        var pax_person = [];
        var harga_pax = [];
        const table = document.getElementById('myTable');
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
                // var rp = harga.substr(3);
                // harga_pax.push(rp);
                // var rp = harga.replace(/\./g, '').substr(3);

                var rp = harga.substr(3);
                var titik = rp.replace(/\./g, '');
                harga_pax.push(parseInt(titik));   
            }

        }   

        if(nama && lama_hari && gambar)
        {
            formData.append('_token', '<?php echo csrf_token() ?>');
            formData.append('data', idgabung);
            formData.append('include', selectedValues);
            formData.append('what_bring', selectedValues2);
            formData.append('general_term', selectedValues3);
            formData.append('destinasi_id', destinasi_id);
            formData.append('nama', nama);
            formData.append('overview', overview);
            formData.append('lama_hari', lama_hari);
            formData.append('tipe_harga', tipe_harga);
            formData.append('min_pax', min_pax);
            formData.append('harga_min_pax', harga_min_pax);
            formData.append('pax_person', pax_person);
            formData.append('harga_pax', harga_pax);
            
        $.ajax({
            type:'POST',
            url:'{{route("daftar-paket.store")}}',
            data: formData,
                processData: false, // Penting! Untuk mencegah jQuery memproses data
                contentType: false, // Penting! Untuk mencegah jQuery mengatur jenis konten
            success: function(data){

            if(data.status == 'success')
            {
                Swal.fire({
                    title: 'Data Berhasil Ditambahkan!',
                    icon: 'success',
                    showDenyButton: true,
                    confirmButtonColor:  '#00cc00',
                    denyButtonColor: '#3085d6',
                    confirmButtonText: 'Kembali ke Daftar Paket',
                    denyButtonText: 'Tambahkan Lagi!'
                }).then(function(result) {
                if (result.isConfirmed) {
                    window.location.href = "/daftar-paket";
                }
                else if (result.isDenied){
                    window.location.href = "/daftar-paket/create";
                }
                });
            }     
            }
        });
        }  
    });

    //format rupiah 
    var dengan_rupiah = document.getElementById('harga_min_pax');
    dengan_rupiah.addEventListener('keyup', function(e)
    {
        // console.log(e);
        const inputText = this.value;
        const numericOnly = inputText.replace(/\D/g, ''); // Hanya menyimpan karakter angka
        
        dengan_rupiah.value = formatRupiah(numericOnly, 'Rp. ');
    });

});

let i = 1;

function addRow() {
    const table = document.getElementById('myTable');
    const newRow = table.insertRow(table.rows.length);
    const cell1 = newRow.insertCell(0);
    const cell2 = newRow.insertCell(1);
    const cell3 = newRow.insertCell(2);

    
    cell1.innerHTML = '<input type="number" class="form-control pax_person" id="pax_person'+i+'" name="pax_person" placeholder="0" min="1" required>';
    cell2.innerHTML = '<input type="text" class="form-control harga_pax" id="harga_pax'+i+'" name="harga_pax" onkeyup="formatDenganRupiah(this)" required>';
    cell3.innerHTML = '<button style="margin-top:6%; margin-left:43%" class="btn btn-danger mb-4" id="delete_button" onclick="deleteRow(this)"><i class="fa fa-trash"></i></button>';

    i = i+1;
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

function deleteRow(button) {
    const row = button.parentNode.parentNode; // Dapatkan baris yang akan dihapus
    row.parentNode.removeChild(row); // Hapus baris dari tabel
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