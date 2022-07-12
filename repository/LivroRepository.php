<?php
require_once('Connection.php');

function fnAddLivro($nome, $foto, $autor, $tipo)
{
    $con = getConnection();

    $sql = "insert into livros (nome, foto, autor, tipo) values (:pNome, :pFoto, :pAutor, :pTipo)";

    $stmt = $con->prepare($sql);
    $stmt->bindParam(":pNome", $nome);
    $stmt->bindParam(":pFoto", $foto);
    $stmt->bindParam(":pAutor", $autor);
    $stmt->bindParam(":pTipo", $tipo);

    return $stmt->execute();
}

function fnListlivros()
{
    $con = getConnection();

    $sql = "select * from livros";

    $result = $con->query($sql);

    $lstlivros = array();
    while ($livro = $result->fetch(PDO::FETCH_OBJ)) {
        array_push($lstlivros, $livro);
    }

    return $lstlivros;
}

function fnLocalizaLivroPorNome($nome)
{
    $con = getConnection();

    $sql = "select * from livros where nome like :pNome limit 20";

    $stmt = $con->prepare($sql);

    $stmt->bindValue(":pNome", "%{$nome}%");

    if ($stmt->execute()) {
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        return $stmt->fetchAll();
    }
}

function fnLocalizaLivroPorId($id)
{
    $con = getConnection();

    $sql = "select * from livros where id = :pID";

    $stmt = $con->prepare($sql);
    $stmt->bindParam(":pID", $id);

    if ($stmt->execute()) {
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    return null;
}

function fnUpdateLivro($id, $nome, $foto, $autor, $tipo)
{
    $con = getConnection();

    $sql = "update livros set nome = :pNome, foto = :pFoto, autor = :pAutor, tipo = :pTipo where id = :pID";

    $stmt = $con->prepare($sql);
    $stmt->bindParam(":pID", $id);
    $stmt->bindParam(":pNome", $nome);
    $stmt->bindParam(":pFoto", $foto);
    $stmt->bindParam(":pAutor", $autor);
    $stmt->bindParam(":pTipo", $tipo);

    return $stmt->execute();
}

function fnDeleteLivro($id)
{
    $con = getConnection();

    $sql = "delete from livros where id = :pID";

    $stmt = $con->prepare($sql);
    $stmt->bindParam(":pID", $id);

    return $stmt->execute();
}