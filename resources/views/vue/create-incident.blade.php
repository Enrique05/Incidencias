<!-- Modal create -->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
         Reportar nueva incidencia
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          <form method="POST" v-on:submit.prevent="saveincident();">
              <div class="form-group">
                <label>Incidente</label>
                <input type="text" name="name" class="form-control" v-model="newincident">
              </div>
              <div class="form-group">
                <label>Comentario</label>
                <textarea name="body" class="form-control" v-model="newbody"></textarea>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
          </form>
        </div>
    </div>
  </div>
</div>