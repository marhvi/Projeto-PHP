<?php

require_once('repository/LivroRepository.php');
require_once('util/base64.php');
require_once('util/upload.php');

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$autor = filter_input(INPUT_POST, 'autor', FILTER_SANITIZE_SPECIAL_CHARS);
$tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_SPECIAL_CHARS);

$foto = converterBase64($_FILES['foto']);
$arqv = uploadArquivo($_FILES['arquivo']);

if (empty($nome) || empty($autor) || empty($tipo) || empty($foto) || empty($arqv)) {
    $msg = "Preencher todos os campos primeiro.";
} else {
    if (fnAddLivro($nome, $foto, $autor, $tipo, $arqv)) {
        $msg = "Sucesso ao gravar";
    } else {
        $msg = "Falha na gravação";
    }
}

$page = "formulario-cadastro-livro.php";
setcookie('notify', $msg, time() + 10, "livroteca/{$page}", 'localhost');
header("location: {$page}");
exit;