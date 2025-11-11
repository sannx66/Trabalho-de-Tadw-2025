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

<body id="pesquisar_entrega_page">
<a href="home.php" class="voltar-seta-fixa">⟵</a>

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
      echo "<th>Id da entrega</th>";
      echo "<th>Entregador</th>";
      echo "<th>Id do carrinho</th>";
      
      
      echo "</tr>";

      echo "<tr>";
      echo "<td>" . htmlspecialchars($entrega["identrega"]) . "</td>";
      echo "<td>" . htmlspecialchars($entrega["entregador"]) . "</td>";
      echo "<td>" . htmlspecialchars($entrega["idcarrinho"]) . "</td>";
      
      echo "</tr>";

      echo "</table>";
    }
  }
  ?>
</body>
<a href="home.php">Voltar</a>
</html>
