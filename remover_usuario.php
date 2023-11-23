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

// Verifica se o ID do usuário foi passado na URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_usuario = $_GET['id'];

    // Consulta preparada para remover o usuário
    $stmt = $conn->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->bind_param("i", $id_usuario);

    if ($stmt->execute()) {
        echo "Usuário removido com sucesso!";
    } else {
        echo "Erro ao remover usuário: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "ID do usuário inválido.";
}

$conn->close();
    
    
?>

<?php echo "<a href='index.php'><button type='button'>Ir para Cadastro</button></a>";
?>
