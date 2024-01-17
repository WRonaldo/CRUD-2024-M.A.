<link rel="stylesheet" type="text/css" href="style.css">
<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    // Excluir o usuário com base no ID
    $sql = "DELETE FROM usuario WHERE ID = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Erro ao excluir registro: " . $conn->error;
    }
}

$conn->close();
?>
