<template>
	
<div id="app">
  <v-app id="inspire">
    <v-data-table
      :headers="headers"
      :items="desserts"
      item-key="name"
      sort-by="name"
      group-by="category"
      class="elevation-1"
      show-group-by
    ></v-data-table>
  </v-app>
</div>
 

</template>
<script>
export default{
	vuetify: new Vuetify(),
	data(){
		return{
			info:'Bienvenidos a QQG'

		}
	}

}
</script>