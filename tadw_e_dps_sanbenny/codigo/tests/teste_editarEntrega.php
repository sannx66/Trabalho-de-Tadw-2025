<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    $identrega = 1;
    $entregador= "Iasminny";
    $idcarrinho= 1;
  
    

    editarEntrega($conexao, $entregador, $idcarrinho, $identrega);
?>