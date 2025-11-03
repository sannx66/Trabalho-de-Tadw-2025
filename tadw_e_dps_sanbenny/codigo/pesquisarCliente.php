<?php
    require_once "verificarlogado.php";

    if ($_SESSION['tipo'] != 'g') {
        header("Location: home.php");
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
    Id do cliente: <br>
    <input type="number" name="valor"> <br><br>

    <input type="submit" value="Pesquisar">
  </form>

  <?php
  if (isset($_GET["valor"]) && !empty($_GET["valor"])) {
    $valor = intval($_GET["valor"]); 

    require_once "conexao.php";
    require_once "funcoes.php";

    
    $cliente = pesquisarClienteId($conexao, $valor);

    if (!$cliente) {
      echo "<p>Nenhum cliente encontrado</p>";
    } else {
      echo "<br><table border='1'>";
      echo "<tr>";
      echo "<th>ID</th>";
      echo "<th>Nome</th>";
      echo "<th>Email</th>";
      echo "<th>Telefone</th>";
      echo "<th>Endereço</th>";
      echo "</tr>";

      echo "<tr>";
      echo "<td>" . htmlspecialchars($cliente["idcliente"]) . "</td>";
      echo "<td>" . htmlspecialchars($cliente["nome"]) . "</td>";
      echo "<td>" . htmlspecialchars($cliente["email"]) . "</td>";
      echo "<td>" . htmlspecialchars($cliente["telefone"]) . "</td>";
      echo "<td>" . htmlspecialchars($cliente["endereco"]) . "</td>";
      echo "</tr>";

      echo "</table>";
    }
  }
  ?>
</body>
</html>
