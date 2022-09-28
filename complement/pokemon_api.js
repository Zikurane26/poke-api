const pokemonContainer = document.querySelector(".pokemon-container");
const buscadorPokemon = document.querySelector("#buscador-pokemon");
function fetchPokemon(id) {
    fetch(`https://pokeapi.co/api/v2/pokemon/${id}/`)
    .then((res) => res.json())
    .then((data) => console.log(data));
}

function pokemones(id) {
    fetch(`https://pokeapi.co/api/v2/pokemon/${id}/`)
    .then((res) => res.json())
    .then((data) => {
        const pokemon = {
            name: data.name,
            id: data.id,
            image: data.sprites["front_default"],
            type: data.types.map((type) => type.type.name).join(", "),
        };
        console.log(pokemon);
    });
}
function infoPokemones(number){
    for(let i=1;i<=number;i++){
        pokemones(i);
    }
}
// Hay 905 pokemones
//Crear un filtro para los pokemones por nombre en el input class="buscador_pokemon"
//pokemones('pikachu');
function filterPokemon(){
    const input = document.querySelector(".buscador_pokemon").value;
    const pokemonName = document.querySelectorAll(".pokemon-name");
    pokemonName.forEach((el) => {
        if(el.innerText.toLowerCase().indexOf(input) > -1){
            el.parentElement.style.display = "";
        }else{
            el.parentElement.style.display = "none";
        }
    });
}
$(document).ready(function(){

const buscador = document.getElementById('buscador-pokemon');

buscador.addEventListener('keyup', function() {
    pokemones(buscador.value);
    console.log('Escibiste algo');
    console.log(buscador.value);
});

});