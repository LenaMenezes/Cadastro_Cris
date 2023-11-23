<!DOCTYPE#0000FFl>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body{    
        background-color: blue;
        display:flex;
        flex-direction: column;
        justify-content: center;
        background-color: #F6CEF5;
        margin-left: 480px;

        }
        
        #userForm{
            display:flex;
            flex-direction: column;
            width: 500px;
           
        }
        input{
            width: 320px;
            height:30px;
            border-radius: 20px;
        }
        select{
            width: 320px;
            height:30px;
            border-radius: 20px; 
        }
        button{
            width: 320px;
            height:30px;
            border-radius: 20px; 
        }
        a{
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<body>
    <?php
    include   'backend.php';
    ?>
    <h1>Cadastro de Usuário</h1>
    <form id="userForm">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" required>

        <label for="idade">Idade:</label>
        <input type="number" id="idade" required>

        <label for="altura">Altura:</label>
        <input type="number" id="altura" step="0.01" required>

        <label for="peso">Peso:</label>
        <input type="number" id="peso" step="0.01" required>

        <label for="genero">Gênero:</label>
        <select id="genero" required>
            <option value="Feminino">Feminino</option>
            <option value="Masculino">Masculino</option>
        </select>

        <label for="estado">Estado:</label>
        <input type="text" id="estado" required>

        <label for="gosto">Gosto de:</label>
        <input type="text" id="gosto" required>
           

        <button type="button" onclick="inserirUsuario()">Inserir</button>
        <button type="button" onclick="listarUsuarios()">Listar</button>
        <button type="button" onclick="limparForm()">Limpar</button>

        <button type="button"><a href="remove.php">Remover</a></button>
        
        
    </form>

    <div id="listaUsuarios"></div>

    <script src="script.js"></script>
</body>
</html>
