<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registro_alunos";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verificar se há um ID de aluno para excluir
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    $sql_delete = "DELETE FROM alunos WHERE id = $delete_id";

    if ($conn->query($sql_delete) === TRUE) {
        echo "<p>Aluno excluído com sucesso!</p>";
    } else {
        echo "<p>Erro ao excluir aluno: " . $conn->error . "</p>";
    }
}

$sql = "SELECT id, nome, email, data_registro FROM alunos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alunos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Lista de Alunos</h1>
        <?php if ($result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Data de Registro</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php echo $row["nome"]; ?></td>
                            <td><?php echo $row["email"]; ?></td>
                            <td><?php echo $row["data_registro"]; ?></td>
                            <td>
                                <a href="?delete_id=<?php echo $row["id"]; ?>" class="button button-red">Excluir</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Não há alunos registrados.</p>
        <?php endif; ?>
        <a href="index.php" class="button button-red">Voltar</a>
    </div>
</body>
</html>

<?php
$conn->close();
?>
