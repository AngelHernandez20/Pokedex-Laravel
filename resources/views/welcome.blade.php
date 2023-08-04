<!DOCTYPE html>
<html>
<head>
    <title>Pokédex</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="d-flex align-items-center" style="height: 100vh;">
        <div class="card mx-auto" style="width: 20rem;">
          <div class="card-body">
            <h5 class="card-title">Nombre del Pokémon: {{ $pokemonData['name'] }}</h5>
            <img id="imagenPokemon" src="{{ $pokemonData['sprites']['front_default'] }}" alt="">
          </div>
          <button type="button" class="btn btn-outline-success" onclick="window.location='{{ route('obtenerPokemonAleatorio') }}'">Cambiar Pokemon</button>
          <button type="button" class="btn btn-outline-primary" onclick="window.location.href='{{ route('mostrarPokemones') }}'">Mostrar Pokémon guardados</button>
        </div>
        </div>
    </div>
</body>
</html>
<script>
    // Función para recargar la página cada 30 segundos
    function recargarPagina() {
      location.reload();
    }

    // Llamar a la función de recarga cada 30 segundos
    setInterval(recargarPagina, 30000);
</script>
