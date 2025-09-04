<?php

class HomeController
{
    public function index()
    {
        // Étape 1 : Charger le modèle qui gère les données Pokémon
        require_once __DIR__ . '/../models/PokemonModel.php';

        // Étape 2 : Créer une instance du modèle
        $pokemonModel = new PokemonModel();

        // Étape 3 : Récupérer tous les Pokémon depuis le fichier JSON
        $allPokemons = $pokemonModel->getAll();

        // Étape 4 : Vérifier si une recherche a été lancée via le formulaire
        $rechercheActive = false;
        $champRecherche = '';
        $valeurRecherche = '';

        if (isset($_GET['by']) && isset($_GET['q'])) {
            $champRecherche = $_GET['by'];      // Peut être "name", "id" ou "type"
            $valeurRecherche = $_GET['q'];      // Ce que l'utilisateur a tapé
            $rechercheActive = true;
        }

        // Étape 5 : Si une recherche est active, filtrer les Pokémon
        if ($rechercheActive && $valeurRecherche !== '') {
            // On prépare une nouvelle liste pour stocker les résultats filtrés
            $filteredPKMN = [];

            // On convertit la valeur recherchée en minuscules pour ignorer la casse
            $valeurRechercheMinuscule = strtolower($valeurRecherche);

            // On parcourt tous les Pokémon pour voir s'ils correspondent
            foreach ($allPokemons as $pokemon) {

                // Cas 1 : Recherche par nom
                if ($champRecherche === 'name') {
                    $nomPokemon = strtolower($pokemon['name']);

                    if (strpos($nomPokemon, $valeurRechercheMinuscule) !== false) {
                        $filteredPKMN[] = $pokemon;
                    }
                }

                // Cas 2 : Recherche par ID
                if ($champRecherche === 'id') {
                    $idPokemon = (int)$pokemon['id'];
                    $idRecherche = (int)$valeurRecherche;

                    if ($idPokemon === $idRecherche) {
                        $filteredPKMN[] = $pokemon;
                    }
                }

                // Cas 3 : Recherche par type
                if ($champRecherche === 'type') {
                    foreach ($pokemon['types'] as $typePokemon) {
                        $typePokemonMinuscule = strtolower($typePokemon);

                        if ($typePokemonMinuscule === $valeurRechercheMinuscule) {
                            $filteredPKMN[] = $pokemon;
                            break; // On arrête dès qu'un type correspond
                        }
                    }
                }
            }

            // On remplace la liste complète par la liste filtrée
            $allPokemons = $filteredPKMN;
        }

        // Étape 6 : Envoyer la liste (filtrée ou complète) à la vue home.php
        // La variable $allPokemons sera accessible dans le fichier home.php
        require __DIR__ . '/../views/home.php';
    }
}