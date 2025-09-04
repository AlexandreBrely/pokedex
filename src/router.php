<?php
// 1. Récupérer la page demandée ou mettre 'home' par défaut
$url = isset($_GET['url']) ? $_GET['url'] : 'home';

// 2. Découper l'URL en segments
// Exemple : "details/25" => ["details", "25"]
$params = explode('/', $url);

// 3. Récupérer la première partie (nom du contrôleur)
$page = $params[0];

// 4. Router vers le bon contrôleur
switch ($page) {
    case 'home':
        require_once __DIR__ . '/controllers/HomeController.php';
        $controller = new HomeController();
        $controller->index();
        break;

    case 'details':
        require_once __DIR__ . '/controllers/DetailsController.php';
        $controller = new DetailsController();

        // Vérifier si un ID est passé en paramètre
        $id = isset($params[1]) ? (int)$params[1] : null;

        if ($id) {
            $controller->show($id);
        } else {
            die("No Pokémon ID provided");
        }
        break;

    default:
        // Page non trouvée
        http_response_code(404);
        echo "404 - Page not found";
        break;
}