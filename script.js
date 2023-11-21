function inserirUsuario() {
    // Obter valores do formulário
    var nome = document.getElementById('nome').value;
    var idade = document.getElementById('idade').value;
    var altura = document.getElementById('altura').value;
    var peso = document.getElementById('peso').value;
    var genero = document.getElementById('genero').value;
    var estado = document.getElementById('estado').value;
    var gosto = document.getElementById('gosto').value;

    // Enviar dados para o backend (PHP)
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "backend.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            alert(xhr.responseText); // Pode ser substituído por uma resposta mais amigável
        }
    };
    xhr.send("action=inserir&nome=" + nome + "&idade=" + idade + "&altura=" + altura + "&peso=" + peso +
        "&genero=" + genero + "&estado=" + estado + "&gosto=" + JSON.stringify(gosto));
}

function listarUsuarios() {
    // Obter a lista de usuários do backend (PHP)
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "backend.php?action=listar", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('listaUsuarios').innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}

function limparForm() {
    document.getElementById('userForm').reset();
}
