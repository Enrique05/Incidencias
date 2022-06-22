<template>
    <div id="app" class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-header">QQG | Incidents</div>

                    <div class="card-body">
                      
                      <form @submit.prevent="editarNota(incident)" v-if="modoEditar">
                        <h3>Editar incidente</h3>
                        <input type="text" class="form-control mb-2" 
                          placeholder="Incident:" v-model="incident.nameIncident">
                        <input type="text" class="form-control mb-2" 
                          placeholder="Descripción del incidente" v-model="incidente.body">
                        <button class="btn btn-warning" type="submit">Editar</button>
                        <button class="btn btn-danger" type="submit" 
                          @click="cancelarEdicion">Cancelar</button>
                      </form>

                      <form @submit.prevent="agregar" v-else>
                        <h3>Agregar incidente</h3>
                        <input type="text" class="form-control mb-2" 
                          placeholder="Incidente" v-model="incident.nameIncident">
                        <input type="text" class="form-control mb-2" 
                          placeholder="Descripción del incidente" v-model="incident.body">
                        <button class="btn btn-primary" type="submit">Agregar</button>
                      </form>

                      <hr>
                                          
                      <h3>Lista de Incidentes:</h3>
                          <!--   <ul class="list-group">
                                 <li class="list-group-item" 
                                    v-for="item in incidents" >
                                  <span class="badge badge-primary float-right">
                                    @{{item.id}}
                                  </span>
                                  <p>@{{item.nameIncident}}</p>
                                  <p>@{{item.body}}</p>
                                  <p>
                                    <button class="btn btn-warning btn-sm" 
                                        @click="editarFormulario(item)">Editar</button>
                                    <button class="btn btn-danger btn-sm" 
                                        @click="eliminarNota(item, index)">Eliminar</button>
                                  </p>
                                </li>
                            </ul> -->
                            <table class="table table-hover table-striped">
                                 <thead>
                                   <tr>
                                     <th>ID</th>
                                     <th>Incidente</th>
                                     <th colspan="2">
                                       &nbsp;
                                     </th>
                                   </tr>
                                 </thead>
                                 <tbody>
                                   <tr v-for="keep in incidents">
                                     <td width="10px">@{{keep.id}}</td>
                                     <td>@{{keep.nameIncident}}</td>
                                     <td width="10px">
                                       <a href="#" class="btn btn-warning btn-sn" v-on:click.prevent="editar(keep);">Edit</a>
                                     </td>
                                     <td width="10px">
                                       <a href="#" class="btn btn-danger btn-sn" v-on:click.prevent="eliminar(keep);" >Delete</a>
                                     </td>
                                   </tr>
                                 </tbody>
                                 
                             </table>
                             <div class="row">
                               <div class="col-8">
                                 @{{$data}}
                               </div>
                             </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<!-- <script>

export default {
    
    created: function() {
        this.getIncidents(1);
    },
    data: {
        incidents: [],
        pagination:{
            'total':0,
            'current_page':0,
            'per_page':0,
            'last_page':0,
            'from':0,
            'to':0
        },
        newIncident:'',
        fillIncident:{'id':'','nameIncident':''},
        errors:[],
        offset:3,
    },
    computed:{
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
    methods: {
        getIncidents: function(page) {
        var urlIncidents = 'incidentsvue?page='+page;
            axios.get(urlIncidents).then(response => {
                this.incidents = response.data.incidents,
                this.pagination = response.data.pagination
            });
        },
        deleteIncident: function(incident){
            var url = "incidents/"+incident.id;
            axios.delete(url).then(response =>{
               this.getIncidents();
               toastr.success("Incidente: "+incident.id+ " Eliminado correctamente."); 
            })
            //alert("Eliminar:"+keep);
        },
        createKeep:function(){
            var url = "incidents";
            axios.post(url,{
                incident: this.newIncident
            }).then(response=>{
                this.getIncidents();
                this.newIncident = '';
                this.errors = [];
                $('#create').modal('hide');
                toastr.success('Nueva task creada correctamente.');
            }).catch(error=>{
                this.errors = error.response.data;
            });

        },
        editKeep: function(incident){
            this.fillIncident.id = incident.id;
            this.fillIncident.nameIncident = incident.keep;
            $('#edit').modal("show");
        },
        updateKeep: function(id){
         var url = "incidents/"+id;
         axios.put(url, this.fillIncident).then(response => {
            this.getIncidents();
            this.fillIncident = {'id':'','nameIncident':''};
            this.errors = [];
            $('#edit').modal('hide');
            toastr.success("Codigo: "+id+" Incidente update");
         }).catch(error =>{
            this.errors = error.response.data
         }); 

        },
        changePage: function(page){
        this.pagination.current_page = page;
        this.getIncidents(page);
        }

    }
}


</script>
 -->
<script>
  export default {
  el:'#app',
  created(){
    var url = 'http://localhost/Incidencias/public/api/incidents';
    axios.get(url).then(res=>{
      alert('Muerdelo');
    })
  },
  data() {
           return {
                  incidents: [],
                  pagination:{
                    'total':0,
                    'current_page':0,
                    'per_page':0,
                    'last_page':0,
                    'from':0,
                    'to':0
                  },
                  modoEditar: false,
                  fillincidents: {user_id:'', status_id: '', operator_id:'', nameIncident:'', body: ''},
                  incident:''
                  }
  },
  
  methods:{
    agregar(){
      if(this.incident.nameIncident.trim() === '' || this.incident.body.trim() === ''){
        alert('Debes completar todos los campos antes de guardar.');
        return;
      }
      const incidentNueva = this.incident;
        this.incident = {user_id:'', status_id: '', operator_id:'', nameIncident:'', body: ''}
        axios.post('/incidentsvue', incidentNueva)
        .then((res) =>{
          const incidentServidor = res.data;
          this.incidents.push(incidentServidor);
      })
    },
    editar(item){
      this.incident.nameIncident = item.nameIncident;
      this.incident.body = item.body;
      this.incident.id = item.id;
      this.modoEditar = true;
    },
    editarNota(incident){
      const params = {nameIncident: incident.nameIncident, body: incident.body};
      axios.put(`/incidentsvue/${incident.id}`, params)
        .then(res=>{
          this.modoEditar = false;
          const index = this.incidents.findIndex(item => item.id === incident.id);
          this.incidents[index] = res.data;
        })
    },
    eliminar(incident, index){
      const confirmacion = confirm(`Desea eliminar incidente:${incident.nombre}`);
      if(confirmacion){
        axios.delete(`/incidentsvue/${incident.id}`)
          .then(()=>{
            this.incidents.splice(index, 1);
          })
      }
    },
    cancelarEdicion(){
      this.modoEditar = false;
      this.incident   = {user_id:'', status_id: '', operator_id:'', nameIncident:'', body: ''}
   
    }
  }
    }
</script>
