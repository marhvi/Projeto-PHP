<?php
require_once('repository/LivroRepository.php');
$nome = filter_input(INPUT_POST, 'nomeLivro', FILTER_SANITIZE_SPECIAL_CHARS);

header("location: listagem-de-livros.php?nome={$nome}");
exit;