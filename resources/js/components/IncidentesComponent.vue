<template>

<!-- <meta http-equiv="refresh" content="10">
 -->
<!--  <form-create></form-create> -->
<!-- Search and Create -->
 <!-- <div class="table-responsive flex"> -->
  <div class="container-fluid">
    
   <div class="row">
    <div class="col-6">
      <h1>QQG | Monitor de Incidencias</h1>
    </div> 
    <div class="col-6">
    <a href="#" type="button" class="btn btn-secondary pull-right" data-toggle="modal" data-target="#create">Crear incidencia
    </a> 
    <input type="text" placeholder="Buscar" name="buscar" v-model="buscar"  class="form-group">
    </div>
   </div>

<!-- Modal create -->
<form method="POST" v-on:submit.prevent="saveincident();">
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
    <div class="form-group">
   
    <label>Incidente</label>
      <input type="text" name="name" class="form-control" v-model="newincident">
      </div>
      <div class="form-group">
      <label>Comentario</label>
      <textarea name="body" class="form-control" v-model="newbody"></textarea>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>
<!-- Form editar -->
<form method="PUT" v-on:submit.prevent="updateincident(fillIncident.id,pagination.current_page);">
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
         Modificar incidencia: {{fillIncident.id}}
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <div class="form-group">
  
    <label>Incidente</label>
      <input type="text" name="name" class="form-control" v-model="fillIncident.nameIncident">
      </div>
      <div class="form-group">
      <label>Descripción</label>
      <textarea name="body" class="form-control" v-model="fillIncident.body">
        
      </textarea>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form> 

<!-- @include('incidents.fragment.error') -->
<!-- Comentarios -->

<div class="modal fade" id="comments" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
         Commentarios
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <ul>
      <li  v-for="data in comments" style="font-size: 0.9em">
        
          User:<i>{{data.user_id }}</i> Comment:{{data.body}}<br>{{new Date(data.created_at)}} 
          
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


<!-- fin de comentarios -->
    <!--Listado   -->

<table class="table table-striped table-bordered table-hover">
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
      <td>{{data.id}}</td>
      <td>{{data.created_at}}</td>
      <td>{{data.nameIncident}}</td>
      <td>{{data.user.name}}</td>
      <td>
      <a href="" class="badge badge-dark" data-toggle="tooltip" data-placement="top" title="Ver comentarios" v-on:click.prevent="getcomments(data.comments)">{{data.comments.length}}</a>
      </td>          
      <td>{{data.name}}</td>
      <td v-if="data.status_id == 1 " style="background: red;font-size: 1.2em;">{{data.status.name}}</td>
      <td v-if="data.status_id == 2 " style="background: yellow;font-size: 1.2em;">{{data.status.name}}</td>
      <td v-if="data.status_id == 3 " style="background: green;font-size: 1.2em;">{{data.status.name}}</td>
      
      <td v-if="data.status_id == 1" class="bg-dark">
        <div class="btn-group">
        <button type="button" class="btn btn-secondary" v-on:click.prevent="atender(data, pagination.current_page);">Atender</button>
        <button type="button" class="btn btn-secondary" v-on:click.prevent="deleteincident(data, pagination.current_page);">Eliminar</button>  
        </div>
      </td>  
      <td v-if="data.status_id == 2" class="bg-dark">
        <div class="btn-group" role="group" aria-label="Basic example">
           <button type="button" class="btn btn-secondary" v-on:click.prevent="editar(data, pagination.current_page);">Editar</button>
           <button type="button" class="btn btn-secondary" v-on:click.prevent="deleteincident(data, pagination.current_page);">Eliminar</button>
           <button type="button" class="btn btn-secondary" v-on:click.prevent="cerrar(data, pagination.current_page);">Cerrar</button>
        </div>
      </td>
      <td v-if="data.status_id == 3" class="bg-dark">
        <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-check2-square" fill="currentColor">
         <path fill-rule="evenodd" d="M15.354 2.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L8 9.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
         <path fill-rule="evenodd" d="M1.5 13A1.5 1.5 0 0 0 3 14.5h10a1.5 1.5 0 0 0 1.5-1.5V8a.5.5 0 0 0-1 0v5a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V3a.5.5 0 0 1 .5-.5h8a.5.5 0 0 0 0-1H3A1.5 1.5 0 0 0 1.5 3v10z"/>
        </svg>
      </td>
    </tr>
    

  </tbody>
</table>

  <nav class="pagination justify-content-center">
    <ul class="pagination justify-content-center">
      <li class="page-item" v-if="pagination.current_page > 1">
        <a class="page-link" href="#" @click.prevent="changePage(pagination.current_page - 1)">
          <span> Atras </span>
        </a>
      </li>
     
      <li class="page-item" v-for="page in pagesNumber" v-bind:class="[page == isActived ? 'active':'']"  >
        <a class="page-link" href="#" @click.prevent="changePage(page)">
          {{ page }}
        </a>
      </li>
      
      <li class="page-item" v-if="pagination.current_page < pagination.last_page">
        <a class="page-link" href="#" @click.prevent="changePage(pagination.current_page + 1)">
          <span> Siguiente </span>
        </a>
      </li>
    </ul>
  </nav>

<!-- fin paginacion -->


</div>
</div>

</template>		   

<script>

export default {
        
        data(){
            return{
            incidents:[],
            loading:true,
            errored:false,
            newbody:'',
            newincident:'',
            fillIncident:{'id':'','nameIncident':'','body':''},
            buscar:'',
            editincident:'',
            pagination:{
            'total':0,
            'current_page':0,
            'per_page':0,
            'last_page':0,
            'from':0,
            'to':0
            },
            offset:3,
            comments:[]
            }   
        },
        mounted () {
          this.getIncidents(1);
        },
        methods:{
          getIncidents:function(page){
          axios
          .get('api/incidents?page='+page)
          .then(response => {
            this.incidents = response.data.incidents.data
            this.pagination = response.data.pagination
          })
          .catch(error =>{
              console.log(error)
              this.errored = true
          })
          .finally(() => this.loading = false);
          },
          saveincident:function(currentpage){
            var url = "api/incidents";

            axios.post(url,{
                nameIncident: this.newincident,
                body:this.newbody
            }).then(response=>{
                this.getIncidents(currentpage);
                this.newincident = '';
                this.newbody = '';
                this.errors = [];
                $('#create').modal('hide');
                toastr.success('Nueva incidencia creada.');
            }).catch(error=>{
                this.errors = error.response.data;
            });
          },
          deleteincident: function(incident, currentpage){
            var conf = confirm('Desea eliminar este registro?');
            if(conf){
            var url = "api/incidents/"+incident.id;
            axios.delete(url).then(response =>{
               this.getIncidents(currentpage);
               toastr.success("Codigo: "+incident.id+ " Eliminado correctamente."); 
            })
              
            }
            //alert("Eliminar:"+keep);
          },
          editar:function(incident){
            this.fillIncident.id = incident.id;
            this.fillIncident.nameIncident = incident.nameIncident;
            this.fillIncident.body = incident.body;
            $('#edit').modal("show");        
          },

          updateincident:function(id,currentpage){
            var url = "api/incidents/"+id;
            axios.put(url, this.fillIncident).then(response => {
            this.getIncidents(currentpage);
            this.fillIncident = {'id':'','nameIncident':'','body':''};
            this.errors = [];
            $('#edit').modal('hide');
            toastr.success("Codigo: "+id+" Incidente update");
            }).catch(error =>{
            this.errors = error.response.data
            }); 

          },
          atender:function(incident,currentpage){
           
            axios.get('api/incidents/atender/'+incident.id)
            .then(response =>{
              this.getIncidents(currentpage);  
            })

            
          },
          cerrar:function(incident,currentpage){
          if(confirm("Desea cerrar este caso?")){
           axios.get('api/incidents/cerrar/'+incident.id)
            .then(response =>{
              this.getIncidents(currentpage);  
            })

          }
          },
          changePage: function(page){
          this.pagination.current_page = page;
          this.getIncidents(page);
          },
          getcomments:function(comments){
            this.comments = comments;
            $('#comments').modal("show");  
            //alert(this.comments);
          }
        
        },
        computed:{
          searchincidents:function(){ 
          return this.incidents.filter((data)=> data.name.includes(this.buscar)||data.user.name.includes(this.buscar)||data.nameIncident.includes(this.buscar)||data.body.includes(this.buscar)||data.status.name.includes(this.buscar)||data.created_at.includes(this.buscar));
          },
          isActived: function(){
          return this.pagination.current_page;
          },
          pagesNumber: function(){
            
            if(!this.pagination.to){
                return [];
            }
            var from = this.pagination.current_page - this.offset;
            if(from < 1){
                from = 1;
            }
            var to = from + (this.offset * 2);

            if(to >= this.pagination.last_page){
                to = this.pagination.last_page;
            }
            var pagesArray = [];
            while(from <= to){
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
          }

        },
        filters: {
        capitalize: function (value) {
        if (!value) return ''
        value = value.toString()
        return value.charAt(0).toUpperCase() + value.slice(1)
        }
        }

}

</script>	