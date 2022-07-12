<?php
include('config.php');
require_once('repository/LivroRepository.php');

$id = $_SESSION['id'];
$livro = fnLocalizaLivroPorId($id);
?>
<!doctype html>
<html lang="pt_BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulário Cadastro Livroteca</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <?php include('navbar.php'); ?>
    <div class="col-6 offset-3">
        <fieldset>
            <legend>Edição de Livroteca</legend>
            <form action="editaLivro.php" method="post" class="form" enctype="multipart/form-data">
                <div class="card col-4 offset-4 text-center">
                    <img src="<?= $livro->foto ?>" id="avatarId" class="rounded" alt="foto do usuário">
                </div>
                <div class="mb-3 form-group">
                    <label for="fotoId" class="form-label">Foto</label>
                    <input type="file" name="foto" id="fotoId" class="form-control">
                    <div id="helperFoto" class="form-text">Importe a foto</div>
                </div>
                <div>
                    <input type="hidden" name="idLivro" id="livroId" value="<?= $livro->id ?>">
                </div>
                <div class="mb-3 form-group">
                    <label for="zipId" class="form-label">Livro</label>
                    <input type="file" name="arquivo" id="zipId" class="form-control">
                    <div id="helperZip" class="form-text">Importe o Livro </div>
                </div>
                <div class="mb-3 form-group">
                    <label for="nomeId" class="form-label">Nome</label>
                    <input type="text" name="nome" id="nomeId" class="form-control" placeholder="Informe o nome"
                        value="<?= $livro->nome ?>">
                    <div id="helperNome" class="form-text">Informe o nome completo</div>
                </div>
                <div class="mb-3 form-group">
                    <label for="autorId" class="form-label">Autor</label>
                    <input type="autor" name="autor" id="autorId" class="form-control" placeholder="Informe o autor"
                        value="<?= $livro->autor ?>">
                    <div id="helperAutor" class="form-text">Informe o autor</div>
                </div>
                <div class="mb-3 form-group">
                    <label for="tipoId" class="form-label">Tipo</label>
                    <input type="text" name="tipo" id="tipoId" class="form-control" placeholder="Informe a tipo"
                        value="<?= $livro->tipo ?>">
                    <div id="helperTipo" class="form-text">Informe o tipo</div>
                </div>
                <button type="submit" class="btn btn-dark">Enviar</button>
                <div id="notify" class="form-text text-capitalize fs-4">
                    <?= isset($_COOKIE['notify']) ? $_COOKIE['notify'] : '' ?></div>
            </form>
        </fieldset>
    </div>
    <?php include("rodape.php"); ?>
    <script src="js/base64.js"></script>
</body>

</html>