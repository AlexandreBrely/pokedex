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
    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card pokedex-card bg-dark text-white border-0 shadow-lg">
                    <div class="row g-0">
                        <!-- Image -->
                        <div class="col-md-5 d-flex align-items-center justify-content-center bg-black">
                            <img src="<?= htmlspecialchars($pokemon['image']) ?>"
                                alt="<?= htmlspecialchars($pokemon['name']) ?>"
                                class="img-fluid p-3"
                                style="max-height: 300px;">
                        </div>

                        <!-- Infos -->
                        <div class="col-md-7">
                            <div class="card-body">
                                <h2 class="card-title text-warning">
                                    #<?= htmlspecialchars($pokemon['id']) ?> - <?= htmlspecialchars($pokemon['name']) ?>
                                </h2>

                                <p class="mb-2">
                                    <strong>Type:</strong>
                                    <?php foreach ($pokemon['types'] as $type): ?>
                                        <span class="badge badge-type <?= strtolower($type) ?>">
                                            <?= htmlspecialchars($type) ?>
                                        </span>
                                    <?php endforeach; ?>
                                </p>

                                <p class="card-text"><?= htmlspecialchars($pokemon['description']) ?></p>

                                <a href="index.php?url=home" class="btn btn-secondary btn-pokedex mt-3">
                                    ← Back to Pokédex
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>



</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</html>