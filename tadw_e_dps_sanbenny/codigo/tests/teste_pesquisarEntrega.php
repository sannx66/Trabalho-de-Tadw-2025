<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$identrega = 1;

echo "<pre>";
print_r(pesquisarEntregaId($conexao, $identrega));
echo "</pre>";
?>
<!-- funcionando -->