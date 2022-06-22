<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
         Modificar incidencia: {{$incident->id}}
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <div class="form-group">
  
    <label>Incidente</label>
      <input type="text" name="name" class="form-control" value="{{$incident->nameIncident}}">
      </div>
      <div class="form-group">
      <label>Descripción</label>
      <textarea name="body" class="form-control" >
        {{$incident->body}}
      </textarea>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>