<?php include('config.php');
require_once('repository/LivroRepository.php');


$nome = filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
?>
<!doctype html>
<html lang="pt_BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home - Livroteca</title>
    <link rel="stylesheet" href="css/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <?php include('navbar.php'); ?>
    <div class="col-10 offset-1 mt-5">
        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-3">
                <h1 class="display-5 fw-bold">Livroteca - a sua biblioteca virtual</h1>
                <p class="col-md-8 fs-4">Seja muito Bem-vindo(a)!</p>
            </div>
        </div>
    </div>
    <?php foreach (fnLocalizaLivroPorNome($nome) as $livro) : ?>
    <div class="card">
        <img src="<?= $livro->foto ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Nome: <?= $livro->nome ?></h5>
            <p class="card-text">Autor: <?= $livro->autor ?></p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Tipo: <?= $livro->tipo ?></li>
            <a href="<?= $livro->zip ?>" class="btn btn-dark" download>Baixar</a>
        </ul>
    </div>
    <?php endforeach; ?>
    </div>
    <?php include("rodape.php"); ?>
</body>

</html>