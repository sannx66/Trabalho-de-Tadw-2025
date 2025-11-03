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
  <title>Pesquisar Entrega</title>
  <link rel="stylesheet" href="estilo.css">
</head>

<body>
  <form action="pesquisarEntrega.php" method="get">
    ID da entrega: <br>
    <input type="number" name="valor"> <br><br>

    <input type="submit" value="Pesquisar">
  </form>

  <?php
  if (isset($_GET["valor"]) && !empty($_GET["valor"])) {
    $valor = intval($_GET["valor"]);

    require_once "conexao.php";
    require_once "funcoes.php";

    
    $entrega = pesquisarEntregaId($conexao, $valor);

    if (!$entrega) {
      echo "<p>Nenhuma entrega encontrada</p>";
    } else {
      echo "<br><table border='1'>";
      echo "<tr>";
      echo "<th>ID</th>";
      echo "<th>Cliente</th>";
      echo "<th>Endereço</th>";
      echo "<th>Data</th>";
      echo "<th>Status</th>";
      echo "<th>Observações</th>";
      echo "</tr>";

      echo "<tr>";
      echo "<td>" . htmlspecialchars($entrega["id"]) . "</td>";
      echo "<td>" . htmlspecialchars($entrega["cliente"]) . "</td>";
      echo "<td>" . htmlspecialchars($entrega["endereco"]) . "</td>";
      echo "<td>" . htmlspecialchars($entrega["data"]) . "</td>";
      echo "<td>" . htmlspecialchars($entrega["status"]) . "</td>";
      echo "<td>" . htmlspecialchars($entrega["observacoes"]) . "</td>";
      echo "</tr>";

      echo "</table>";
    }
  }
  ?>
</body>
</html>
