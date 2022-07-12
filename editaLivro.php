<?php
require_once('repository/LivroRepository.php');
require_once('util/base64.php');
session_start();

$id = filter_input(INPUT_POST, 'idLivro', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$autor = filter_input(INPUT_POST, 'autor', FILTER_SANITIZE_SPECIAL_CHARS);
$tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_SPECIAL_CHARS);

$foto = converterBase64($_FILES['foto']);

$arqv = uploadArquivo($_FILES['arquivo']);

if (fnUpdateLivro($id, $nome, $foto, $autor, $tipo, $arqv)) {
    $msg = "Sucesso ao gravar";
} else {
    $msg = "Falha na gravação";
}

$_SESSION['id'] = $id;
$page = "formulario-edita-livro.php";
setcookie('notify', $msg, time() + 10, "livroteca/{$page}", 'localhost');
header("location: {$page}");
exit;