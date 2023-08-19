@extends('layouts.admin')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
          <h1>Daftar Lama Hari</h1>
        </div>

        <div class="section-body">
        

        <a href="#modalCreate" data-toggle='modal' class="btn btn-success btn-xs btn-flat"><i class="fa fa-plus-circle"></i> Tambah Destinasi</a><br><br>
        
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Daftar Lama Hari</h4>
                    </div>
                    <div class="card-body">
                    <table class="table" style="text-align: center;">
                        <thead>
                        <tr>
                            <th width="15%">No</th>
                            <th>Lama Hari</th>
                            <th width="20%"><i class="fa fa-cog"></i></th>
                        </tr>
                        </thead>
                        <tbody>
                            @php $i = 0; @endphp
                            @foreach($data as $d)
                            @php $i += 1; @endphp
                            <tr>
                                <td>@php echo $i; @endphp</td>
                                <td><b>{{$d->day}}</b> Day 
                                    @if($d->night !== null)
                                        <b>{{$d->night}}</b> Night
                                    @endif
                                </td>
                                <td>
                                    <form id="delete-form-{{ $d->id }}" action="{{ route('lama-hari.destroy', $d->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <!-- <a href="#modalEdit" data-toggle="modal" class="btn btn-icon btn-warning" onclick="EditForm({{ $d->id }})"><i class="far fa-edit"></i></a> -->

                                        <input type="hidden" class="form-control" id='id' name='id' placeholder="Type your name" value="{{$d->id}}">
                                        <button type="button" class="btn btn-icon btn-danger" data-id="{{ $d->id }}"><i class="fa fa-trash"></i></button>                                   
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>

        </div>
        </div>
    </section>
</div>

<!-- CREATE WITH MODAL -->
<div class="modal fade" id="modalCreate" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" >
            <form role="form" method="POST" action="{{ url('lama-hari') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Tambah Lama Hari</h4>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="form-body">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label>Day</label>
                                <input type="number" class="form-control" id='day' name='day' required>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label>Night</label>
                                <input type="number" class="form-control" id='night' name='night' required readonly>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- EDIT WITH MODAL-->
<div class="modal fade" id="modalEdit" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="modalContent">
            <div style="text-align: center;">
                <!-- <img src="{{ asset('res/loading.gif') }}"> -->
            </div>
        </div>
    </div>
</div>

@endsection

@section('javascript')
<script>
// Ambil elemen input "Day" dan "Night"
const dayInput = document.getElementById('day');
const nightInput = document.getElementById('night');

// Tambahkan event listener untuk memantau perubahan pada input "Day"
dayInput.addEventListener('input', function () {
    // Ambil nilai dari input "Day"
    const dayValue = parseInt(dayInput.value);

    // Set nilai input "Night" menjadi "Day" dikurangi 1 jika "Day" lebih besar dari 1
    if (dayValue > 1) {
        nightInput.value = dayValue - 1;
    } else {
        nightInput.value = ''; // Kosongkan jika "Day" adalah 1 atau lebih kecil
    }

    // Cek jika nilai "Day" adalah 1
    if (dayValue === 1) {
        // Jika nilainya 1, maka nonaktifkan input "Night"
        // nightInput.disabled = true;
        // Atur atribut "required" pada input "Night" menjadi false
        nightInput.removeAttribute('required');
    } else {
        // Jika nilainya bukan 1, maka aktifkan kembali input "Night"
        // nightInput.disabled = false;
        // Atur atribut "required" pada input "Night" menjadi true
        nightInput.setAttribute('required', 'required');
    }
});

// function EditForm(id)
// {
//   $.ajax({
//     type:'POST',
//     url:'{{route("lama-hari.EditForm")}}',
//     data:{'_token':'<?php echo csrf_token() ?>',
//           'id':id
//          },
//     success: function(data){
//       $('#modalContent').html(data.msg)
//     }
//   });
// }

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