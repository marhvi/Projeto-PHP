<?php

require_once('repository/LivroRepository.php');
session_start();

if (fnDeleteLivro($_SESSION['id'])) {
    $msg = "Sucesso ao apagar";
} else {
    $msg = "Falha ao apagar";
}

unset($_SESSION['id']);

$page = "listagem-de-livros.php";
setcookie('notify', $msg, time() + 10, "/livroteca/{$page}", 'localhost');
header("location: {$page}");
exit;