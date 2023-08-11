@extends('layouts.admin')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
            <h1>Daftar Objek Wisata</h1>
            </div>

            <div class="section-body">
            

            <a href="#modalCreate" data-toggle='modal' class="btn btn-success btn-xs btn-flat"><i class="fa fa-plus-circle"></i> Tambah Objek Wisata</a><br><br>
            
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                @foreach($data as $d)
                    <div class="card">
                    <div class="card-body">
                        <div class="media">
                        <img class="mr-3" src="{{asset('gambar/'.$d->gambar)}}" height='180px'>
                        <div class="media-body">  
                            <h4 class="mt-0">{{$d->nama}}</h4>
                            <p class="mb-0">{{$d->deskripsi}}</p><br>
                            <p class="mb-0"><b>Meta Title:</b> {{$d->meta_title}}</p>
                            <p class="mb-0"><b>Meta Description:</b> {{$d->meta_description}}</p>
                            <p class="mb-0"><b>Meta Keywords:</b> {{$d->meta_keywords}}</p>
                            <div class="card-footer text-right">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <form id="delete-form-{{ $d->id }}" action="{{ route('objek-wisata.destroy', $d->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        
                                        <a href="#modalEdit" data-toggle="modal" class="btn btn-icon btn-warning" onclick="EditForm({{ $d->id }})"><i class="far fa-edit"></i></a>

                                        <input type="hidden" class="form-control" id='id' name='id' placeholder="Type your name" value="{{$d->id}}">
                                        <button type="button" class="btn btn-icon btn-danger" data-id="{{ $d->id }}"><i class="fa fa-trash"></i></button>                                   
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                @endforeach
                </div>
            </div>
            </div>
        </section>
    </div>


<!-- CREATE WITH MODAL -->
<div class="modal fade" id="modalCreate" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" >
            <form role="form" method="POST" action="{{ url('objek-wisata') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Tambah Objek Wisata</h4>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="form-body">
                        <div class="form-group">
                            <label >Nama</label>
                            <input type="text" class="form-control" id='nama' name='nama' placeholder="Destinasi" required>
                        </div>
                        <div class="form-group">
                            <label >Deskripsi</label>
                            <textarea class="form-control" id='deskripsi' name='deskripsi' style="height:250px;" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Gambar</label>
                            <input type="file" value="" class="form-control" id="gambar" name="gambar" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])" required>
                            <img id="output" width="200px" height="200px">
                        </div>
                        <div class="form-group">
                            <label >Meta Title</label>
                            <input type="text" class="form-control" id='meta_title' name='meta_title' placeholder="Meta Title" required>
                        </div>
                        <div class="form-group">
                            <label >Meta Description</label>
                            <textarea class="form-control" id='meta_description' name='meta_description' style="height:150px;" required></textarea>
                        </div>
                        <div class="form-group">
                            <label >Meta Keywords</label>
                            <input type="text" class="form-control" id='meta_keywords' name='meta_keywords' placeholder="Meta Keywords" required>
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
function EditForm(id)
{
  $.ajax({
    type:'POST',
    url:'{{route("objek-wisata.EditForm")}}',
    data:{'_token':'<?php echo csrf_token() ?>',
          'id':id
         },
    success: function(data){
      $('#modalContent').html(data.msg)
    }
  });
}

$(document).on('click', '.btn-danger', function(e) {
    e.preventDefault();
    
    var id = $(this).data('id');
    
    Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Data akan dihapus!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Delete!'
    }).then((result) => {
        if (result.isConfirmed) {
            $('#delete-form-' + id).submit();
        }
    });
});
</script>
@endsection