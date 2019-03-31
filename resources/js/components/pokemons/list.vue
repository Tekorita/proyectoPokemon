<template>
    <div class="row">
        <spinner v-show="loading"></spinner>
        <div class="col-sm" v-for="pokemon in pokemons">                
            <div class="card text-center" style="width: 18rem; margin-top: 70px">
            <img style="margin: 20px; height: 100px; width: 100px; background-color:#EFEFEF" class="card-img-top rounded-circle mx-auto d-block" v-bind:src="pokemon.picture" alt="">
                <div class="card-body">
                <h5 class="card-title">{{ pokemon.name }}</h5>
                    <p class="card-text">Some quick in the pokemon example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Ver detalle</a>
                </div>
            </div>        
        </div>
    </div>        
</template>

<script>
    import EventBus from '../../event-bus';
    export default{
        data(){
            return {
                pokemons: [],
                loading: true
            }
        },
        created() {
            EventBus.$on('pokemon-added', data=> { //este esvento .$on nos sirve para escuchar la peticion del componente de created y mostrarla
                this.pokemons.push(data) //el evento push nos permite agregar la data en un arreglo
            })
        },
        mounted() {
            axios
                .get('http://127.0.0.1:8000/pokemons')
                .then((res)=>{
                    this.pokemons = res.data
                    this.loading = false
                })
        }
    }
</script>

