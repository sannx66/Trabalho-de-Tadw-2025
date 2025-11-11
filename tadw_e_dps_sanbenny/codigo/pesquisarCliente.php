<?php
  // Garante que o usuário está logado
    require_once "verificarlogado.php";

    // Verifica a permissão de acesso (apenas 'g' - gerente/admin)
    if ($_SESSION['tipo'] != 'g') {
        header("Location: home.php");
        exit(); // Boa prática
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

<body>
  <form action="pesquisarCliente.php" method="get">
    Nome do cliente: <br>
    <input type="text" name="valor" required> <br><br> <input type="submit" value="Pesquisar">
  </form>
  
  <?php
  if (isset($_GET["valor"]) && !empty($_GET["valor"])) {
    // O valor a pesquisar é o nome (ou parte do nome) do cliente
    $nomePesquisa = trim($_GET["valor"]);

    require_once "conexao.php";
    require_once "funcoes.php";

    // Chama a função correta para pesquisar clientes por nome
    
    $clientes = pesquisarClienteNome($conexao, $nomePesquisa); 

    if (empty($clientes)) {
      echo "<p>Nenhum cliente encontrado com o nome ou parte do nome informado.</p>";
    } else {
      // Tabela para exibir os dados do cliente
      echo "<br><table border='1'>";
      echo "<tr>";
      echo "<th>ID</th>";
      echo "<th>Nome</th>";
      echo "<th>Email</th>";
      echo "<th>Telefone</th>";
      echo "<th>Endereço</th>";
      
      echo "</tr>";
      
      foreach ($clientes as $cliente) {
        echo "<tr>";
        // Campos do cliente (adaptado da sua tabela de produtos)
        echo "<td>" . htmlspecialchars($cliente["idcliente"]) . "</td>";
        echo "<td>" . htmlspecialchars($cliente["nome"]) . "</td>";
        echo "<td>" . htmlspecialchars($cliente["email"]) . "</td>";
        echo "<td>" . htmlspecialchars($cliente["telefone"]) . "</td>";
        echo "<td>" . htmlspecialchars($cliente["endereco"]) . "</td>";
        echo "</tr>";
      }
      echo "</table>";
    }
  }
  
  ?>
</body>
<a href="home.php">Voltar</a>
</html>