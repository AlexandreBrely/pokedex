<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/stylesheet.css">
</head>

<body class="bg-dark text-white">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-0 shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php?url=home">Kanto Pokédex</a>
            <div class="ms-auto d-flex gap-2">
                <a class="btn btn-light btn-sm btn-pokedex" href="index.php?url=home">Home</a>
                <a class="btn btn-warning btn-sm btn-pokedex" href="views/home.php">Pokedex</a>
            </div>
        </div>
    </nav>

    <!-- Main -->
    <main class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <!-- Bloc recherche -->
                <div class="card bg-transparent border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <h1 class="h4 mb-3 text-warning">Search the Pokédex</h1>

                        <form class="mb-3" action="index.php" method="get">
                            <input type="hidden" name="url" value="home">

                            <div class="row g-2">
                                <div class="col-12 col-md-3">
                                    <select id="by" name="by" class="form-select bg-dark text-white border-secondary">
                                        <option value="name" selected>Name</option>
                                        <option value="id">ID</option>
                                        <option value="type">Type</option>
                                    </select>
                                </div>

                                <div class="col-12 col-md-7">
                                    <input
                                        id="q"
                                        name="q"
                                        type="text"
                                        class="form-control bg-dark text-white border-secondary"
                                        placeholder="e.g. Pikachu, 25, Electric"
                                        autocomplete="off">
                                </div>

                                <div class="col-12 col-md-2 d-grid">
                                    <button type="submit" class="btn btn-warning btn-pokedex">Search</button>
                                </div>
                            </div>
                        </form>

                        <div class="d-flex gap-2">
                            <a class="btn btn-secondary btn-pokedex" href="index.php?url=home">Show all</a>
                        </div>
                    </div>
                </div>

                <!-- Pokémon Cards -->
                <div class="row g-4">
                    <?php if (!empty($allPokemons)): ?>
                        <?php foreach ($allPokemons as $pokemon): ?>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                <div class="card pokedex-card h-100 bg-dark text-white border-0 shadow-lg">
                                    <img src="<?= htmlspecialchars($pokemon['image']) ?>"
                                        class="card-img-top p-3"
                                        alt="<?= htmlspecialchars($pokemon['name']) ?>">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title text-warning">
                                            #<?= htmlspecialchars($pokemon['id']) ?> - <?= htmlspecialchars($pokemon['name']) ?>
                                        </h5>
                                        <p class="mb-1">
                                            <strong>Type:</strong>
                                            <?php foreach ($pokemon['types'] as $type): ?>
                                                <span class="badge-type <?= strtolower($type) ?>">
                                                    <?= htmlspecialchars($type) ?>
                                                </span>
                                            <?php endforeach; ?>
                                        </p>
                                        <p class="card-text small flex-grow-1">
                                            <?= htmlspecialchars($pokemon['description']) ?>
                                        </p>
                                        <a href="index.php?url=details/<?= $pokemon['id'] ?>" class="btn btn-sm btn-warning mt-auto btn-pokedex">
                                            View Details
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="alert alert-warning text-center border-0">
                            No Pokémon found for your search.
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </main>



</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</html>