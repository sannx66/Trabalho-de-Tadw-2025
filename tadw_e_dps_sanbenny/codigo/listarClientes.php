<?php
require_once "verificarlogado.php";

if ($_SESSION['tipo'] == 'c') {
    header("Location: home.php");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body id="lista_clientes_page">
<a href="home.php" class="voltar-seta-fixa">⟵</a>

<h1 id="lista_clientes_titulo">Lista de Clientes</h1>

<?php
require_once "conexao.php";
require_once "funcoes.php";

$lista_clientes = listarClientes($conexao);

if (count($lista_clientes) == 0) {
    echo "<p>Nenhum cliente cadastrado.</p>";
} else {
    echo "<table id='lista_clientes_tabela'>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Email</th>";
    echo "<th>Nome</th>";
    echo "<th>Telefone</th>";
    echo "<th>Endereço</th>";
    echo "<th colspan='2'>Ações</th>";
    echo "</tr>";

    foreach ($lista_clientes as $cliente) {
        $idcliente = $cliente['idcliente'];
        $email = $cliente['email'];
        $nome = $cliente['nome'];
        $telefone = $cliente['telefone'];
        $endereco = $cliente['endereco'];

        echo "<tr>";
        echo "<td>$idcliente</td>";
        echo "<td>$email</td>";
        echo "<td>$nome</td>";
        echo "<td>$telefone</td>";
        echo "<td>$endereco</td>";
        echo "<td><a href='deletarCliente.php?id=$idcliente'>Excluir</a></td>";
        echo "<td><a href='cadastrarCliente.php?id=$idcliente'>Editar</a></td>";
        echo "</tr>";
    }

    echo "</table>";
}
?>

<a href="home.php" id="lista_clientes_voltar">⟵ Voltar</a>

</body>
</html>
