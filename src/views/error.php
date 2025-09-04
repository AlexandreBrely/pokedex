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
    </div>
</nav>

<!-- Main -->
<main class="container text-center py-5">
    <h1 class="display-4 text-warning">Error <?= htmlspecialchars($errorCode) ?></h1>
    <p class="lead mb-4"><?= htmlspecialchars($errorMessage) ?></p>
    <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/54.png"
         alt="Sad Psyduck" class="img-fluid mb-4" style="max-height:200px;">
    <div>
        <a href="index.php?url=home" class="btn btn-warning btn-pokedex">← Back to Pokédex</a>
    </div>
</main>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</html>