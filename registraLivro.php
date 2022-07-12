<?php

require_once('repository/LivroRepository.php');
require_once('util/base64.php');

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$autor = filter_input(INPUT_POST, 'autor', FILTER_SANITIZE_EMAIL);
$tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_SPECIAL_CHARS);

$foto = converterBase64($_FILES['foto']);

if (empty($nome) || empty($autor) || empty($tipo) || empty($foto)) {
    $msg = "Preencher todos os campos primeiro.";
} else {
    if (fnAddLivro($nome, $foto, $autor, $tipo)) {
        $msg = "Sucesso ao gravar";
    } else {
        $msg = "Falha na gravação";
    }
}

$page = "formulario-cadastro-livro.php";
setcookie('notify', $msg, time() + 10, "livroteca/{$page}", 'localhost');
header("location: {$page}");
exit;