async function obtenerPokemonAleatorio() {
    try {
      const response = await fetch('https://pokeapi.co/api/v2/pokemon/?limit=1000');
      if (!response.ok) {
        throw new Error('No se pudo obtener la lista de Pokémon');
      }
      const data = await response.json();
      const pokemonList = data.results;
      const randomIndex = Math.floor(Math.random() * pokemonList.length);
      const randomPokemon = pokemonList[randomIndex];
      const pokemonResponse = await fetch(randomPokemon.url);
      if (!pokemonResponse.ok) {
        throw new Error('No se pudo obtener los detalles del Pokémon');
      }
      const pokemonData = await pokemonResponse.json();
      console.log(pokemonData)
      document.getElementById('nombrePokemon').innerText = `Nombre del Pokémon: ${pokemonData.name}`;
      document.getElementById('imagenPokemon').src = pokemonData.sprites.front_default;

      // Realizar la solicitud POST para guardar el Pokémon en la base de datos
      const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
      const guardarPokemonResponse = await fetch('/guardar-pokemon', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({
          nombre: pokemonData.name,
          imagen: pokemonData.sprites.front_default
        })
      });

      if (!guardarPokemonResponse.ok) {
        throw new Error('No se pudo guardar el Pokémon en la base de datos');
      }
    } catch (error) {
      console.error('Error al obtener el Pokémon:', error);
    }
  }

  setInterval(obtenerPokemonAleatorio, 30000);
