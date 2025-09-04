<?php

class PokemonModel
{
    //lien vers le pokedex (JSON)
    private $pokedex;
    //création du tableau 
    private $pokemons = [];

    public function __construct($pokedex = __DIR__ . '/../data/pokemon.json')
    {
        $this->pokedex = $pokedex;
        $this->loadData();
    }

    // Charge les données depuis le fichier JSON et transforme en tableau PHP
    private function loadData()
    {
        if (file_exists($this->pokedex)) {
            $json = file_get_contents($this->pokedex);
            $this->pokemons = json_decode($json, true) ?? [];
        }
    }

    /**
     * Retourne tous les Pokémon
     * @return array
     */
    public function getAll():array
    {
        return $this->pokemons;
    }

 
     /**  Retourne un Pokémon par son ID
     * @param int $id
     * @return array|null
     */
    public function getById($id)
    {
        foreach ($this->pokemons as $pokemon) {
            if ((int)$pokemon['id'] === (int)$id) {
                return $pokemon;
            }
        }
        return null; // si aucun Pokémon trouvé
    }
}
?>
