<form role="form" method='POST' action="{{ url('destinasi/'.$data->id )}}" enctype="multipart/form-data">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Ubah Destinasi</h4>
    </div>
    <div class="modal-body">
        @csrf
        @method('PUT')
        <div class="form-body">
            <div class="form-group">
                <label >Nama</label>
                <input type="hidden" class="form-control" value="{{$data->id}}" id='id' name='id' placeholder="Type your name">
                <input type="text" class="form-control" value="{{$data->nama}}" id='nama' name='nama' placeholder="Destinasi" required>
            </div>
            <div class="form-group">
                <label >Deskripsi</label>
                <textarea class="form-control" id='deskripsi' name='deskripsi' style="height:250px;" required>{{$data->deskripsi}}</textarea>
            </div>
            <div class="form-group">
                <label>Gambar</label>
                <input type="file" value="{{$data->gambar}}" class="form-control" id="gambar" name="gambar" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                <img id="output" src="{{asset('gambar/'.$data->gambar)}}" width="80px" height="80px">
            </div>
            <div class="form-group">
                <label >Meta Title</label>
                <input type="text" class="form-control" value="{{$data->meta_title}}" id='meta_title' name='meta_title' placeholder="Meta Title" required>
            </div>
            <div class="form-group">
                <label >Meta Description</label>
                <textarea class="form-control" id='meta_description' name='meta_description' style="height:150px;" required>{{$data->meta_description}}</textarea>
            </div>
            <div class="form-group">
                <label >Meta Keywords</label>
                <input type="text" class="form-control" value="{{$data->meta_keywords}}" id='meta_keywords' name='meta_keywords' placeholder="Meta Keywords" required>
            </div>
        </div>
    </div>
  <div class="modal-footer">
    <button type="submit" class="btn btn-info">Save</button>
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
  </div>
</form>