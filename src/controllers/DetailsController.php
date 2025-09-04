<?php

class DetailsController {
    public function show($id) {
        // 1. Charger le modèle
        require_once __DIR__ . '/../models/PokemonModel.php';

        // 2. Instancier le modèle
        $pokemonModel = new PokemonModel();

        // 3. Récupérer le Pokémon par ID
        $pokemon = $pokemonModel->getById($id);

        // 4. Gérer le cas où le Pokémon n'existe pas
        if (!$pokemon) {
            // Ici, tu peux soit rediriger vers une page 404, soit afficher un message
            die("Pokémon not found");
        }

        // 5. Envoyer le Pokémon à la vue
        // La variable $pokemon sera disponible dans details.php
        require __DIR__ . '/../views/details.php';
    }
}