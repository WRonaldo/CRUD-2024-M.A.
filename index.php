
<link rel="stylesheet" type="text/css" href="style.css">

<?php
include("conexao.php");

// Selecionar todos os registros da tabela usuario
$result = $conn->query("SELECT * FROM usuario");

// Exibir a lista de usuários
echo "<h2>Lista de Usuários</h2>";
echo "<a href='form_inserir.php'>Inserir Novo Usuário</a>";
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Nome</th><th>Endereço</th><th>Telefone</th><th>RG</th><th>CPF</th><th>Data de Nascimento</th><th>Ações</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr><td>{$row['ID']}</td><td>{$row['Nome']}</td><td>{$row['Endereco']}</td><td>{$row['Telefone']}</td><td>{$row['RG']}</td><td>{$row['CPF']}</td><td>{$row['DataNascimento']}</td><td><a href='edit.php?id={$row['ID']}'>Editar</a> | <a href='excluir.php?id={$row['ID']}'>Excluir</a></td></tr>";
}

echo "</table>";

$conn->close();
?>
