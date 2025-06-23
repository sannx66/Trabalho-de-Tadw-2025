<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$idlogin = 1;

echo "<pre>";
print_r(pesquisarLogin($conexao, $idlogin));
echo "</pre>";
?>