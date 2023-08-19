<form role="form" method='POST' action="{{ url('general-term/'.$data->id )}}" enctype="multipart/form-data">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Ubah General Term</h4>
    </div>
    <div class="modal-body">
        @csrf
        @method('PUT')
        <div class="form-body"> 
            <div class="form-group">
                <label>Item</label>
                <input type="hidden" class="form-control" value="{{$data->id}}" id='id' name='id' placeholder="Type your name">
                <input type="text" class="form-control" value="{{$data->general_term}}" id='general_term' name='general_term' required>
            </div>
        </div>
    </div>
  <div class="modal-footer">
    <button type="submit" class="btn btn-info">Save</button>
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
  </div>
</form>