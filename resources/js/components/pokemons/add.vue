<template>
<div class="modal fade" id="addPokemon" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Pokemon</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form @submit.prevent="savePokemon"><!-- es necesario prevenir que el formulario se envie por post y que se envie pon un metodo en javascript -->
	        <div class="form-group">
			    <label>Pokemon</label>
			    <input type="text" class="form-control" placeholder="Ingresa el nombre del pokemon" v-model="name">
		  	</div>
		  	<div class="form-group">
			    <label>Picture</label>
			    <input type="text" class="form-control" placeholder="Ingresa la url de una imagen" v-model="picture">
		  	</div>
		  	<button type="submit" class="btn btn-primary">Save</button>
	  	</form>
      </div>
    </div>
  </div>
</div>
</template>
<script>
    import EventBus from '../../event-bus'; // importamos el eventbus que se nos ayuda a redireccionar a show de pokemones despues de que se agregan
    export default{
        data(){
            return {
                name: null,
                picture: null
            }
        },
        methods: {
            savePokemon: function(){
                //console.log(this.name) Para verificar si se pasan los datos
                //console.log(this.picture)
                let currentRoute = window.location.pathname
                //axios.post('http://127.0.0.1:8000/pokemons',{
                axios.post(`http://127.0.0.1:8000${currentRoute}/pokemons`,{ //axios nos permite realizar peticiones http mediante promesas puede ser get post
                    name: this.name,
                    picture: this.picture
                })
                .then(function(res){ //este response es para dar respuesta de que se agrego el pokemon
                    $('#addPokemon').modal('hide')
                    EventBus.$emit('pokemon-added', res.data.pokemon)// genero el evento con informacion para que lo escuche el componente de pokemonscomponents para listarlos
                    console.log(res.data.pokemon)
                })
                .catch(function(err){
                    console.log(err)
                });
            }
        }
    }
    
</script>
<style>

</style>
