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
                <form method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="form-group">
                    <label>Destinasi</label>
                      <select class="form-control select2" id="multiple-select-field" multiple="" required>
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
                    <select class="form-control" id='lama_hari' name='lama_hari' placeholder="Lama Hari">
                    <option disabled selected>Pilih lama hari</option>
                    <option>Half Day</option>
                    <option>One Day</option>
                    <option>2D 1N</option>
                    <option>3D 2N</option>
                    <option>4D 3N</option>
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
                    <table class="table table-bordered">
                        <thead>
                            <tr style="text-align: center;">
                                <th style="width: 40%;">Pax</th>
                                <th style="width: 40%;">Harga</th>
                                <th style="width: 20%;">Actions <button class="btn btn-secondary ml-3" id='plus_button' onclick="addRow()"><i class="fa fa-plus-circle"></i></button></th>
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
                <button class="btn btn-secondary mb-4" style="float: right;" id='plus_button' onclick="addRow()"><i class="fa fa-plus-circle"></i></button>

                <div class="table-responsive">
            <table class="table table-bordered" id="myTable">
                <thead>
                    <tr style="text-align: center;">
                        <th style="width: 40%;">Pax</th>
                        <th  style="width: 40%;">Harga</th>
                        <th  style="width: 20%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <!-- <td>
                            <input type="number" class="form-control" id="harga" name="harga" placeholder="0" min="1" required>
                        </td>
                        <td>
                            <input id="dengan-rupiah" type="text" class="form-control" name="diskon">
                        </td> 
                        <td>
                            <button class="btn btn-secondary mb-4" id='delete_button' onclick="deleteRow(this)"><i class="fa fa-plus-circle"></i></button>
                        </td> -->
                    </tr>
                </tbody>
            </table>
        </div>

                </div>


                <div class="form-group">
                    <label class="d-block">Included</label>
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
                </div>
                <div class="form-group">
                    <label >Whats Bring</label>
                    <textarea class="form-control" id='whats_bring' name='whats_bring' style="height:250px;" placeholder="Gunakan tanda ',' sebagai pemisah" required></textarea>
                </div>
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
        var nama = $("#nama").val()
        var lama_hari = $("#lama_hari").val()
        var tipe_harga = $("#tipe_harga").val()
        var min_pax = $("#min_pax").val()
        var harga_min_pax = $("#harga_min_pax").val()
        var whats_bring = $("#whats_bring").val()

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

        const checkboxes = document.querySelectorAll('.form-check-input');
        const checkedValues = [];

        checkboxes.forEach(checkbox => {
            if (checkbox.checked) {
                checkedValues.push(checkbox.id);
            }
        });

        if(nama && lama_hari && gambar)
        {
            formData.append('_token', '<?php echo csrf_token() ?>');
            formData.append('data', idgabung);
            formData.append('check', checkedValues);
            formData.append('nama', nama);
            formData.append('lama_hari', lama_hari);
            formData.append('tipe_harga', tipe_harga);
            formData.append('min_pax', min_pax);
            formData.append('harga_min_pax', harga_min_pax);
            formData.append('whats_bring', whats_bring);
            
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

function addRow() {
    const table = document.getElementById('myTable');
    const newRow = table.insertRow(table.rows.length);
    const cell1 = newRow.insertCell(0);
    const cell2 = newRow.insertCell(1);
    const cell3 = newRow.insertCell(2);
    
    cell1.innerHTML = '<input type="number" class="form-control" id="pax_person" name="pax_person" placeholder="0" min="1" required>';
    cell2.innerHTML = '<input type="text" class="form-control" id="harga_pax" name="harga_pax" onkeyup="formatDenganRupiah(this)">';
    cell3.innerHTML = '<button style="margin-top:8%; margin-left:43%" class="btn btn-secondary mb-4" id="delete_button" onclick="deleteRow(this)"><i class="fa fa-trash"></i></button>';

}

function getDataTipe2() {
    
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