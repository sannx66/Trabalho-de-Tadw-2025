<?php
// Garante que o usuário está logado
require_once "verificarlogado.php";

// Verifica a permissão de acesso (apenas 'g' - gerente/admin)
if ($_SESSION['tipo'] != 'g') {
    header("Location: home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar Cliente</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body id="pesquisar_cliente_page">

    <form id="pesquisar_cliente_form" action="pesquisarCliente.php" method="get">
        <h2>Pesquisar Cliente</h2>
        <br>

        Nome do cliente:
        <input type="text" name="valor" required>

        <input type="submit" value="Pesquisar">
    </form>

    <?php
    if (isset($_GET["valor"]) && !empty($_GET["valor"])) {

        $nomePesquisa = trim($_GET["valor"]);

        require_once "conexao.php";
        require_once "funcoes.php";

        $clientes = pesquisarClienteNome($conexao, $nomePesquisa);

        if (empty($clientes)) {
            echo "<p>Nenhum cliente encontrado com esse nome.</p>";
        } 
        else {
            echo "<table id='pesquisar_cliente_tabela'>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Nome</th>";
            echo "<th>Email</th>";
            echo "<th>Telefone</th>";
            echo "<th>Endereço</th>";
            echo "</tr>";

            foreach ($clientes as $cliente) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($cliente['idcliente']) . "</td>";
                echo "<td>" . htmlspecialchars($cliente['nome']) . "</td>";
                echo "<td>" . htmlspecialchars($cliente['email']) . "</td>";
                echo "<td>" . htmlspecialchars($cliente['telefone']) . "</td>";
                echo "<td>" . htmlspecialchars($cliente['endereco']) . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        }
    }
    ?>

    <a id="pesquisar_cliente_voltar" href="home.php">⟵ Voltar</a>

</body>
</html>
