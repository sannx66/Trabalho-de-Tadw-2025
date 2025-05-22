?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    
    $disponivel= "4";
    $tipo = "Milkshake";
    $nome = "Pudim";
    $ingredientes = "Sorvete de leite condensado, leite, calda de caramelo e chantilly";
    $valor_un = 20;
    

    salvarCliente($conexao, $disponivel, $tipo, $nome, $ingredientes, $valor_un);
?>