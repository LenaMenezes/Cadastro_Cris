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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = isset($_POST["action"]) ? $_POST["action"] : null;

    if ($action == "inserir") {
        $nome = mysqli_real_escape_string($conn, $_POST["nome"]);
        $idade = $_POST["idade"];
        $altura = $_POST["altura"];
        $peso = $_POST["peso"];
        $genero = mysqli_real_escape_string($conn, $_POST["genero"]);
        $estado = mysqli_real_escape_string($conn, $_POST["estado"]);
        $gosto = isset($_POST["gosto"]) ? json_decode($_POST["gosto"]) : null;

        // Consulta preparada para prevenir injeção SQL
        $stmt = $conn->prepare("INSERT INTO usuarios (nome, idade, altura, peso, genero, estado, gosto) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sddssss", $nome, $idade, $altura, $peso, $genero, $estado, $gosto);

        if ($stmt->execute()) {
            echo "Usuário inserido com sucesso!";
        } else {
            echo "Erro ao inserir usuário: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Ação desconhecida.";
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
    $action = isset($_GET["action"]) ? $_GET["action"] : null;

    if ($action == "listar") {
        $sql = "SELECT * FROM usuarios";
        $result = $conn->query($sql);

        if ($result) {
            if ($result->num_rows > 0) {
                // Exibir lista de usuários
                echo "<h2>Lista de Usuários</h2>";
                while ($row = $result->fetch_assoc()) {
                    echo "<br>Nome: " . $row["nome"] . "<br>Idade: " . $row["idade"] . "<br>Altura: " . $row["altura"] .
                        "<br>Peso: " . $row["peso"] . "<br>Gênero: " . $row["genero"] . "<br>Estado: " . $row["estado"] .
                        "<br>Gosto: " . $row["gosto"] . "</p><hr>";
                }
            } else {
                echo "Nenhum usuário cadastrado.";
            }
        } else {
            echo "Erro ao listar usuários: " . $conn->error;
        }
    }
}

$conn->close();
?>
