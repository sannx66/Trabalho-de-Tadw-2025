<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$idcarrinho = 1;

echo "<pre>";
print_r(pesquisarCarrinhoId($conexao, $idcarrinho));
echo "</pre>";
?>
<!-- funcionando -->