<?php

namespace App\Http\Controllers;
use App\Models\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PokemonController extends Controller
{
    public function obtenerPokemonAleatorio()
    {
        $response = Http::get('https://pokeapi.co/api/v2/pokemon/?limit=1000');
        $pokemonList = $response->json()['results'];
        $randomPokemon = $pokemonList[array_rand($pokemonList)];

        $pokemonResponse = Http::get($randomPokemon['url']);
        $pokemonData = $pokemonResponse->json();

        $pokemon = new Pokemon();
        $pokemon->nombre = $pokemonData['name'];
        $pokemon->imagen = $pokemonData['sprites']['front_default'];
        $pokemon->save();

        return view('welcome', compact('pokemonData'));
    }

    public function mostrarPokemones()
    {
        $pokemones = Pokemon::all();
        return view('mostrar_pokemones', compact('pokemones'));
    }

}
