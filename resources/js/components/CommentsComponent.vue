<template>

<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="alert alert-primary" role="alert" v-if="messaje">
              {{messaje}}
             </div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4">
			<input type="text" v-model="messaje">
		</div>
	</div>

</div>

</template>		   

<script>

export default {
        
        data(){
            return{
            	messaje:''
            }
           
        }
        
}

</script>	
