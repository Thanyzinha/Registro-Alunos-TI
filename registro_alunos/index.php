<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Alunos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Registro de Alunos</h1>
        <div class="form-container">
            <form action="processar_registro.php" method="POST">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                
                <input type="submit" value="Registrar">
            </form>
        </div>
        <a href="listar_alunos.php" class="button">Listar Alunos</a>
    </div>
</body>
</html>
