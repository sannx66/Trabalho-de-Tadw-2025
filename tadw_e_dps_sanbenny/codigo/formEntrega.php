<?php
require_once("conexao.php");
require_once("funcoes.php");

$identrega = "";
$entregador = "";
$idcarrinho = "";

if (isset($_GET["identrega"])) {
    $identrega = $_GET["identrega"];
    $entrega = pesquisarEntregaId($conexao, $identrega);

    if ($entrega) {
        $entregador = $entrega["entregador"];
        $idcarrinho = $entrega["idcarrinho"];
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Entregas</title>
</head>
<body>
    <h2>Cadastro de Entregas</h2>

    <form action="salvarEntrega.php" method="post">
        <input type="hidden" name="identrega" value="<?php echo $identrega; ?>">

        <label>Entregador:</label><br>
        <input type="text" name="entregador" value="<?php echo $entregador; ?>" required><br><br>

        <label>ID Carrinho:</label><br>
        <input type="number" name="idcarrinho" value="<?php echo $idcarrinho; ?>" required><br><br>

        <input type="submit" value="Salvar">
        <a href="listarEntregas.php">Voltar</a>
    </form>
</body>
</html>
