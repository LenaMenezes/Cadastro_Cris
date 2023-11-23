<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
</head>

<body>

<?php
$servername = "localhost";
$username = "Cris";
$password = "1234";
$dbname = "cadastro";


// Cria a conexão usando mysqli
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Consulta para obter usuários
$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Lista de Usuários</h2>";
    while ($row = $result->fetch_assoc()) {
        echo "<p>ID: " . $row["id"] . "<br>Nome: " . $row["nome"] . "<br>Idade: " . $row["idade"] . "<br>Altura: " . $row["altura"] .
            "<br>Peso: " . $row["peso"] . "<br>Gênero: " . $row["genero"] . "<br>Estado: " . $row["estado"] .
            "<br>Gosto: " . $row["gosto"] . 
            "<br><a href='remover_usuario.php?id=" . $row["id"] . "&nome=" . $row["nome"] . "'>Remover</a></p><hr>";
    }
} else {
    echo "Nenhum usuário cadastrado.";
}

$conn->close();
?>
<?php echo "<a href='index.php'><button type='button'>Ir para Cadastro</button></a>";
?>
</body>
</html>
