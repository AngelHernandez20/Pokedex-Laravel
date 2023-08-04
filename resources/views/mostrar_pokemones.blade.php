<!DOCTYPE html>
<html>
<head>
    <title>Pokédex</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('obtenerPokemonAleatorio') }}">Pokedex</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('obtenerPokemonAleatorio') }}">Home</a>
          </li>
        </ul>
      </div>
    </div>
</nav>
<body>
    <div class="container">
        @foreach($pokemones->chunk(3) as $chunk)
          <div class="row">
            @foreach($chunk as $pokemon)
              <div class="col-sm-4">
                <div class="card">
                  <img src="{{ $pokemon->imagen }}" alt="{{ $pokemon->nombre }}">
                  <div class="card-body">
                    <h5 class="card-title">{{ $pokemon->nombre }}</h5>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        @endforeach
    </div>

</body>
</html>
