<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $endereco = $_POST["endereco"];
    $telefone = $_POST["telefone"];
    $rg = $_POST["rg"];
    $cpf = $_POST["cpf"];
    $dataNascimento = $_POST["dataNascimento"];

    // Inserir novo usuário
    $sql = "INSERT INTO usuario (Nome, Endereco, Telefone, RG, CPF, DataNascimento) VALUES ('$nome', '$endereco', '$telefone', '$rg', '$cpf', '$dataNascimento')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Erro ao inserir registro: " . $conn->error;
    }
}

$conn->close();
?>
