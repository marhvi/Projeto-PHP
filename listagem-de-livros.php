<?php
include('config.php');
require_once('repository/LivroRepository.php');
require_once('repository/LoginRepository.php');

$nome = filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
?>
<!doctype html>
<html lang="pt_BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listagem de Livros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <?php include('navbar.php'); ?>
    <div class="col-6 offset-3">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Autor</th>
                    <th>Tipo</th>
                    <th>Data cadastro</th>
                    <th colspan="2">Gerenciar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach (fnLocalizaLivroPorNome($nome) as $livro) : ?>
                <tr>
                    <td><?= $livro->id ?></td>
                    <td><?= $livro->nome ?></td>
                    <td><?= $livro->autor ?></td>
                    <td><?= $livro->tipo ?></td>
                    <td><?= $livro->created_at ?></td>
                    <? if (fnLogin("livroteca@gmail.com", "livroteca@123")) : ?>
                    <td><a href="#" onclick="gerirUsuario(<?= $livro->id ?>, 'edit');">Editar</a></td>
                    <td><a href="#"
                            onclick="return confirm('Deseja realmente excluir?') ? gerirLivro(<?= $livro->id ?>, 'del') : '';">Excluir</a>
                    </td>
                    <td>
                        <a href="<? $livro->arqv ?>" download>Dowload</a>
                    </td>
                    <? endif ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <?php if (isset($notificacao)) : ?>
            <tfoot>
                <tr>
                    <td colspan="7"><?= $_COOKIE['notify'] ?></td>
                </tr>
            </tfoot>
            <?php endif; ?>
        </table>
    </div>
    <?php include("rodape.php"); ?>
    <script>
    window.post = (data) => {
        return fetch(
                'set-session.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                }
            )
            .then(response => {

                console.log(`Requisição completa! Resposta:`, response);
            });
    }

    function gerirLivro(id, action) {

        post({
            data: id
        });

        url = 'excluirLivro.php';
        if (action === 'edit')
            url = 'formulario-edita-livro.php';
        window.location.href = url;
    }
    </script>
</body>

</html>