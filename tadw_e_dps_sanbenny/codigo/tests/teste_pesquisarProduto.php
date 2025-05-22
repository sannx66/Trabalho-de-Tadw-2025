<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$idproduto = 1;

echo "<pre>";
print_r(pesquisarProdutoId($conexao, $idproduto));
echo "</pre>";
?>

<!-- funcionando -->