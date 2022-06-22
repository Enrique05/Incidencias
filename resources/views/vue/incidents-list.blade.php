{{-- <table class="table table-response table-striped table-bordered table-hover"> --}}
<table class="table table-response table-striped table-hover">
<caption>QQG | Ing. Enrique Martinez</caption>
  <thead class="table-dark">
    <tr>
      <th>Código</th>
      <th>Fecha</th>
      <th>Incidencia</th>
      <th>Usuario</th>
      <th>Comentario</th>
      <th>Operador</th>
      <th>Status</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="data in searchincidents">
      <td>@{{data.id}}</td>
      <td>@{{data.created_at}}</td>
      <td>@{{data.nameIncident}}</td>
      <td>@{{data.user.name}}</td>
      <td>
        <button type="button" class="btn btn-secondary" v-if="data.comments.length == 0" v-on:click.prevent="getcomments(data)" title="Crear comentario" >
         <span class="badge badge-dark">+</span>
        </button>
        <button type="button" class="btn btn-secondary" v-if="data.comments.length > 0" v-on:click.prevent="getcomments(data)" title="Ver comentarios" >
         <span class="badge badge-dark">@{{data.comments.length}}</span>
        </button>

      </td>          
      <td>@{{data.name}}</td>
      <td v-if="data.status_id == 1 " style="background: red;font-size: 1.2em;">@{{data.status.name}}</td>
      <td v-if="data.status_id == 2 " style="background: yellow;font-size: 1.2em;">@{{data.status.name}}</td>
      <td v-if="data.status_id == 3 " style="background: green;font-size: 1.2em;">@{{data.status.name}}</td>
      
      <td v-if="data.status_id == 1" class="bg-dark">
        <div class="btn-group">
          {{--Atender  --}}
        <button type="button" class="btn btn-secondary" v-on:click.prevent="atender(data, pagination.current_page);"><i class="fa fa-hand-paper-o" aria-hidden="true"></i>


        </button>
        {{-- Eliminar --}}
        <button type="button" class="btn btn-secondary" v-on:click.prevent="deleteincident(data, pagination.current_page);"><i class="fa fa-trash" aria-hidden="true"></i>
           </button>  
        </div>
      </td>  
      <td v-if="data.status_id == 2" class="bg-dark">
        <div class="btn-group" role="group" aria-label="Basic example">
           {{--Editar  --}}
           <button type="button" class="btn btn-secondary" v-on:click.prevent="editar(data, pagination.current_page);"><i class="fa fa-pencil-square" aria-hidden="true"></i>

           </button>
           {{-- Eliminar --}}
           <button type="button" class="btn btn-secondary" v-on:click.prevent="deleteincident(data, pagination.current_page);"><i class="fa fa-trash" aria-hidden="true"></i>
           </button>
           {{-- Cerrar --}}
           <button type="button" class="btn btn-secondary" v-on:click.prevent="cerrar(data, pagination.current_page);"><i class="fa fa-times-circle" aria-hidden="true"></i>
           </button>
        </div>
      </td>
      <td v-if="data.status_id == 3" class="bg-dark">
       {{--  <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-check2-square" fill="currentColor">
         <path fill-rule="evenodd" d="M15.354 2.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L8 9.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
         <path fill-rule="evenodd" d="M1.5 13A1.5 1.5 0 0 0 3 14.5h10a1.5 1.5 0 0 0 1.5-1.5V8a.5.5 0 0 0-1 0v5a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V3a.5.5 0 0 1 .5-.5h8a.5.5 0 0 0 0-1H3A1.5 1.5 0 0 0 1.5 3v10z"/>
        </svg> --}}
        <i class="fa fa-check-square-o" aria-hidden="true"></i>

      </td>
    </tr>
    

  </tbody>
</table>