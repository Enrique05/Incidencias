<div class="modal fade" id="comments" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
         <strong>
         Comentarios de Incidente: @{{incident.id}}  
         </strong>
                   
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      @{{incident}}
    <ul class="list-group">
      <li class="list-group-item">
        
      </li>
      <li  class="list-group-item" v-for="data in comments" style="font-size: 0.9em" >
        
          User:<i>@{{data.id }}</i> Comment:@{{data.body}}<br>@{{new Date(data.created_at)}} 

      </li>
    </ul>
  </div>
    <div class="row justify-content-center">
      <div class="col-10"> 
         <form  method="POST" v-on:submit.prevent="savecomments();">
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Nuevo comentario</label>
            <input type="hidden" name="incident_id">
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="body"></textarea>
          </div>
          <div class="form-group">
            <input type="submit" value="Enviar" class="btn btn-primary mx-auto">
          </div>
          </form>
      </div>
    </div>

  </div>
</div>
</div>