var app = new Vue({
		el:"#main",

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
            comments:[],
            incidentcomment:''
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
                // toastr.success('Nueva incidencia creada.');
                swal({
                     title: "Nueva incidencia creada.",
                     icon: "success",
                     button: "Continuar!",
                });
            }).catch(error=>{
                this.errors = error.response.data;
            });
          },
          deleteincident: function(incident, currentpage){
            var conf = swal("Are you sure you want to do this?", {
            buttons: ["Oh noez!", "Aww yiss!"],
            });
  
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
            this.comments = comments.comments;
            this.incidentcomment = comments;
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


});