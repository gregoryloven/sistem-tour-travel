<form role="form" method='POST' action="{{ url('lama-hari/'.$data->id )}}" enctype="multipart/form-data">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Ubah Lama Hari</h4>
    </div>
    <div class="modal-body">
        @csrf
        @method('PUT')
        <div class="form-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label>Day</label>
                        <input type="hidden" class="form-control" value="{{$data->id}}" id='id' name='id' placeholder="Type your name">
                        <input type="number" class="form-control" value="{{$data->day}}" id='day' name='day' required>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label>Night</label>
                        <input type="number" class="form-control" value="{{$data->night}}" id='night' name='night' required>
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