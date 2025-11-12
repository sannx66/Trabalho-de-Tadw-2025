<?php
session_start();

if (empty($_SESSION['carrinho'])) {
    header("Location: carrinho.php"); 
    exit;
}

require_once "conexao.php";
require_once "funcoes.php";
require_once "verificarlogado.php";


$total = 0;

foreach ($_SESSION['carrinho'] as $id => $qtd) {
    $p = pesquisarProdutoId($conexao, $id); // Busca produto no BD pelo ID
    $total += $p['valor_un'] * $qtd; // soma valor unitário × quantidade
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Pagamento</title>
    <script src="jquery-3.7.1.min.js"></script>
    <script src="jquery.mask.js"></script>
    <link rel="stylesheet" href="estilo.css">

</head>

<body id="pagamento_page">


<div id="pagamento_page">

    <h1 id="pagamento_titulo">PAGAMENTO</h1>

    <p id="pagamento_total_text">
        <b>Total da compra:</b>
        <span id="pagamento_total">
            <?php echo number_format($total, 2, ',', '.'); ?>
        </span> golds
    </p> 
    <!-- calcula total da compra -->

    <div id="pagamento_forma_pagamento">
        <p><b>Escolha a forma de pagamento:</b></p>
        <label class="pg_opcao">
            <input type="radio" name="pagamento" value="cartao"> Cartão
        </label><br>

        <label class="pg_opcao">
            <input type="radio" name="pagamento" value="golds"> Golds
        </label><br><br>
    </div>

    <div id="pagamento_troco_box" style="display:none;">
        <label>Troco para quanto?</label><br>
        <input type="text" id="pagamento_troco">
    </div>
    <!-- pro troco aparecer só se a pessoa escolher pagamento em golds -->

    <div id="pagamento_retirada">
        <p><b>Escolha a forma de retirada:</b></p>

        <label class="pg_retirada">
            <input type="radio" name="retirada" value="local" checked> Retirar no local
        </label><br>

        <label class="pg_retirada">
            <input type="radio" name="retirada" value="delivery"> Delivery (+5 golds)
        </label><br><br>
    </div>

    <button id="pagamento_continuar_btn" onclick="continuar()">Continuar</button>

    <div>
        <a id="pagamento_voltar" href="carrinho.php">Voltar para o carrinho</a>
    </div>

</div> 




<script>

   
    $("#pagamento_troco").mask('#.##0,00', {reverse: true});
    // mascara de dindin

    
    document.querySelectorAll("input[name='pagamento']").forEach(radio => {
        radio.addEventListener("change", function () {

            // mostra troco SE escolher golds
            if (this.value === "golds") {
                document.getElementById("pagamento_troco_box").style.display = "block";
            } 

            // se n escolher n aparece o campo troco
            else {
                document.getElementById("pagamento_troco_box").style.display = "none";
            }
        });
    });


  
    let totalOriginal = <?php echo $total; ?>;

    document.querySelectorAll("input[name='retirada']").forEach(radio => {
        radio.addEventListener("change", function () {
            let total = totalOriginal;

            
            if (this.value === "delivery") {
                total += 5;
            }
                // adiciona 5 golds do delivery

            // Atualiza o total na tela dps do delivery
            document.getElementById("pagamento_total").innerText =
                total.toFixed(2).replace('.', ',');
        });
    });


   
    function continuar() {

        const pagamento = document.querySelector("input[name='pagamento']:checked");
        const retirada = document.querySelector("input[name='retirada']:checked");
        const troco = document.getElementById("pagamento_troco").value;

        // Se não escolher tudo, alerta
        if (!pagamento || !retirada) {
            alert("Selecione as opções de pagamento e retirada");
            return;
        }

        
        if (retirada.value === "delivery") {

            let url = "delivery.php?pg=" + pagamento.value;
            // se escolher delivery vai para a pag de delivery para colocar o endereço

           
            if (pagamento.value === "golds" && troco !== "") {
                url += "&troco=" + troco;
            }

            window.location.href = url;
            return;
        }

       
        let url = "pagamento2.php?pg=" + pagamento.value + "&ret=" + retirada.value;

    //    caso escolhe retirada vai direto pra finalização (pagamento2.php)
        if (pagamento.value === "golds" && troco !== "") {
            url += "&troco=" + troco;
        }

        window.location.href = url;
        // window n precisa de tag a e é universal
    }

</script>

</body>
</html>
