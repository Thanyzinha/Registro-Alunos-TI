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

$nome = $conn->real_escape_string($_POST['nome']);
$email = $conn->real_escape_string($_POST['email']);

// Verificar se o email já existe
$sql_check = "SELECT id FROM alunos WHERE email = '$email'";
$result_check = $conn->query($sql_check);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado do Registro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
        if ($result_check->num_rows > 0) {
            // Email já registrado
            echo "<h1>Email já registrado</h1>";
            echo "<p>O email '$email' já está registrado. Por favor, use outro email.</p>";
        } else {
            // Inserir novo registro
            $sql_insert = "INSERT INTO alunos (nome, email) VALUES ('$nome', '$email')";
            
            if ($conn->query($sql_insert) === TRUE) {
                echo "<h1>Registro Completo</h1>";
                echo "<p>Aluno registrado com sucesso!</p>";
            } else {
                echo "<h1>Erro</h1>";
                echo "<p>Erro ao registrar aluno: " . $conn->error . "</p>";
            }
        }
        $conn->close();
        ?>
        <a href="index.php" class="button button-red">Voltar à Página Inicial</a>
    </div>
</body>
</html>
