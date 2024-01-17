<link rel="stylesheet" type="text/css" href="style.css">

<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    // Selecionar o usuário com base no ID
    $result = $conn->query("SELECT * FROM usuario WHERE ID = $id");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Usuário não encontrado.";
        exit;
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $endereco = $_POST["endereco"];
    $telefone = $_POST["telefone"];
    $rg = $_POST["rg"];
    $cpf = $_POST["cpf"];
    $dataNascimento = $_POST["dataNascimento"];

    // Atualizar o usuário
    $sql = "UPDATE usuario SET Nome='$nome', Endereco='$endereco', Telefone='$telefone', RG='$rg', CPF='$cpf', DataNascimento='$dataNascimento' WHERE ID=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Erro ao atualizar registro: " . $conn->error;
    }
}

$conn->close();
?>

<h2>Editar Usuário</h2>
<form method="post" action="edit.php">
    <input type="hidden" name="id" value="<?php echo $row['ID']; ?>">
    Nome: <input type="text" name="nome" value="<?php echo $row['Nome']; ?>"><br>
    Endereço: <input type="text" name="endereco" value="<?php echo $row['Endereco']; ?>"><br>
    Telefone: <input type="text" name="telefone" value="<?php echo $row['Telefone']; ?>"><br>
    RG: <input type="text" name="rg" value="<?php echo $row['RG']; ?>"><br>
    CPF: <input type="text" name="cpf" value="<?php echo $row['CPF']; ?>"><br>
    Data de Nascimento: <input type="date" name="dataNascimento" value="<?php echo $row['DataNascimento']; ?>"><br>
    <input type="submit" value="Atualizar">
</form>
