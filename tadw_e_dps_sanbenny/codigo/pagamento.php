<?php
// Inicia a sessão para acessar o carrinho e dados do cliente
session_start();

// Se o carrinho estiver vazio, o usuário não deveria estar na tela de pagamento
if (empty($_SESSION['carrinho'])) {
    header("Location: carrinho.php"); // redireciona de volta ao carrinho
    exit;
}

// Importa conexão com banco e funções auxiliares
require_once "conexao.php";
require_once "funcoes.php";

// Calcula o total da compra somando todos os itens do carrinho
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

    <!-- Carrega jQuery -->
    <script src="jquery-3.7.1.min.js"></script>

    <!-- Plugin de máscara para formatar números (troco) -->
    <script src="jquery.mask.js"></script>

    <!-- Arquivo CSS exclusivo dessa página -->
    <link rel="stylesheet" href="estilo.css">

</head>

<body id="pagamento_page">

<!-- ============================================
     DIV PRINCIPAL QUE ISOLA O CSS DESTA PÁGINA
=============================================== -->
<div id="pagamento_page">

    <!-- TÍTULO DA PÁGINA -->
    <h1 id="pagamento_titulo">PAGAMENTO</h1>

    <!-- MOSTRA O TOTAL DA COMPRA CALCULADO EM PHP -->
    <p id="pagamento_total_text">
        <b>Total da compra:</b>
        <span id="pagamento_total">
            <?php echo number_format($total, 2, ',', '.'); ?>
        </span> golds
    </p>

    <!-- SEÇÃO: FORMAS DE PAGAMENTO -->
    <div id="pagamento_forma_pagamento">
        <p><b>Escolha a forma de pagamento:</b></p>

        <!-- Opção cartão -->
        <label class="pg_opcao">
            <input type="radio" name="pagamento" value="cartao"> Cartão
        </label><br>

        <!-- Opção golds (dinheiro do seu site) -->
        <label class="pg_opcao">
            <input type="radio" name="pagamento" value="golds"> Golds
        </label><br><br>
    </div>

    <!-- CAMPO DE TROCO – aparece somente se escolher golds -->
    <div id="pagamento_troco_box" style="display:none;">
        <label>Troco para quanto?</label><br>
        <input type="text" id="pagamento_troco">
    </div>

    <!-- SEÇÃO: ESCOLHA DA RETIRADA -->
    <div id="pagamento_retirada">
        <p><b>Escolha a forma de retirada:</b></p>

        <!-- Retirar no local (padrão) -->
        <label class="pg_retirada">
            <input type="radio" name="retirada" value="local" checked> Retirar no local
        </label><br>

        <!-- Delivery (cobra taxa) -->
        <label class="pg_retirada">
            <input type="radio" name="retirada" value="delivery"> Delivery (+5 golds)
        </label><br><br>
    </div>

    <!-- BOTÃO PARA IR PARA A PRÓXIMA ETAPA -->
    <button id="pagamento_continuar_btn" onclick="continuar()">Continuar</button>

    <!-- BOTÃO VOLTAR -->
    <div>
        <a id="pagamento_voltar" href="carrinho.php">Voltar para o carrinho</a>
    </div>

</div> <!-- FIM DO CONTAINER PRINCIPAL -->



<!-- ======================================================
     JAVASCRIPT DA PÁGINA
======================================================= -->
<script>

    /*
        ---------------------------------------------------
        Ativa máscara de dinheiro no campo "troco"
        Exemplo: digitar 1000 → vira 10,00
        ---------------------------------------------------
    */
    $("#pagamento_troco").mask('#.##0,00', {reverse: true});


    /*
        ---------------------------------------------------
        Mostra o campo de TROCO somente quando seleciona "golds"
        ---------------------------------------------------
    */
    document.querySelectorAll("input[name='pagamento']").forEach(radio => {
        radio.addEventListener("change", function () {

            // Se escolher golds → mostra troco
            if (this.value === "golds") {
                document.getElementById("pagamento_troco_box").style.display = "block";
            } 

            // Qualquer outro → esconde troco
            else {
                document.getElementById("pagamento_troco_box").style.display = "none";
            }
        });
    });


    /*
        ---------------------------------------------------
        Atualiza o TOTAL caso escolha "delivery"
        (adiciona 5 golds no valor final)
        ---------------------------------------------------
    */
    let totalOriginal = <?php echo $total; ?>;

    document.querySelectorAll("input[name='retirada']").forEach(radio => {
        radio.addEventListener("change", function () {
            let total = totalOriginal;

            // Se for delivery, acrescenta 5 golds
            if (this.value === "delivery") {
                total += 5;
            }

            // Atualiza o texto na tela
            document.getElementById("pagamento_total").innerText =
                total.toFixed(2).replace('.', ',');
        });
    });


    /*
        ---------------------------------------------------
        Função do botão CONTINUAR
        Decide para onde o cliente vai:
        → delivery.php  (se for entrega)
        → pagamento2.php (se for retirar no local)
        ---------------------------------------------------
    */
    function continuar() {

        const pagamento = document.querySelector("input[name='pagamento']:checked");
        const retirada = document.querySelector("input[name='retirada']:checked");
        const troco = document.getElementById("pagamento_troco").value;

        // Se não escolher tudo, alerta
        if (!pagamento || !retirada) {
            alert("Selecione as opções de pagamento e retirada");
            return;
        }

        /*
            --------------------------------------------
            Se escolher DELIVERY → vai para delivery.php
            --------------------------------------------
        */
        if (retirada.value === "delivery") {

            let url = "delivery.php?pg=" + pagamento.value;

            // inclui troco na URL
            if (pagamento.value === "golds" && troco !== "") {
                url += "&troco=" + troco;
            }

            window.location.href = url;
            return;
        }

        /*
            --------------------------------------------
            Se retirar no local → pagamento2.php
            --------------------------------------------
        */
        let url = "pagamento2.php?pg=" + pagamento.value + "&ret=" + retirada.value;

        // envia troco também se existir
        if (pagamento.value === "golds" && troco !== "") {
            url += "&troco=" + troco;
        }

        window.location.href = url;
    }

</script>

</body>
</html>
