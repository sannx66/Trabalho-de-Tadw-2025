<?php
session_start();

// Se não houver itens no carrinho → volta
if (empty($_SESSION['carrinho'])) {
    header("Location: carrinho.php");
    exit;
}

// Conexão e funções
require_once "conexao.php";
require_once "funcoes.php";

// Calcula o total do carrinho com base na sessão
$total = 0;

foreach ($_SESSION['carrinho'] as $id => $qtd) {
    $p = pesquisarProdutoId($conexao, $id);
    $total += $p['valor_un'] * $qtd;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Pagamento</title>
    <script src="jquery-3.7.1.min.js"></script>
    <script src="jquery.mask.js"></script>
</head>

<body>

    <h1>PAGAMENTO</h1>

    <!-- Exibe o total calculado -->
    <p><b>Total da compra:</b> <span id="total"><?php echo number_format($total, 2, ',', '.'); ?></span> golds</p>

    <!-- FORMAS DE PAGAMENTO -->
    <p><b>Escolha a forma de pagamento:</b></p>

    <!-- Cartão não tem troco -->
    <label>
        <input type="radio" name="pagamento" value="cartao"> Cartão
    </label><br>

    <!-- Golds pode ter troco -->
    <label>
        <input type="radio" name="pagamento" value="golds"> Golds
    </label><br><br>

    <!-- CAMPO DE TROCO (inicia escondido) -->
    <div id="troco_box" style="display:none; margin-bottom:15px;" aria-placeholder="0,00">
        <label>
            Para quanto vai o troco?
            <input type="text" id="campo_troco">
        </label>
    </div>

    <!-- RETIRADA -->
    <p><b>Escolha a forma de retirada:</b></p>

    <label>
        <input type="radio" name="retirada" value="local" checked> Retirar no local
    </label><br>

    <label>
        <input type="radio" name="retirada" value="delivery"> Delivery (+5 golds)
    </label><br><br>

    <!-- Botão continuar -->
    <button onclick="continuar()">Continuar</button>

    <br><br>
    <a href="carrinho.php">Voltar para o carrinho</a>


    <!-- ======================================================
         SCRIPTS 
         ====================================================== -->

    <!-- jQuery (necessário para a máscara) -->
    <script src="../jquery-3.7.1.min.js"></script>

    <!-- Biblioteca de máscara -->
    <script src="../jquery.mask.js"></script>

    <script>

        /* ======================================================
           1. MÁSCARA DE DINHEIRO NO CAMPO DE TROCO
           ====================================================== */

        // Aplica a máscara: formato 0.000,00
        $("#campo_troco").mask('#.##0,00', {reverse: true});


        /* ======================================================
           2. MOSTRAR/OCULTAR CAMPO DE TROCO
           ====================================================== */

        document.querySelectorAll("input[name='pagamento']").forEach(radio => {
            radio.addEventListener("change", function () {

                // Se o valor selecionado for golds → exibir campo de troco
                if (this.value === "golds") {
                    document.getElementById("troco_box").style.display = "block";
                } else {
                    document.getElementById("troco_box").style.display = "none";
                }
            });
        });


        /* ======================================================
           3. Atualizar total se selecionar DELIVERY
           ====================================================== */

        let totalOriginal = <?php echo $total; ?>;

        document.querySelectorAll("input[name='retirada']").forEach(radio => {
            radio.addEventListener("change", function () {

                let total = totalOriginal;

                // Delivery soma +5
                if (this.value === "delivery") {
                    total += 5;
                }

                // Atualiza o total na tela
                document.getElementById("total").innerText =
                    total.toFixed(2).replace('.', ',');
            });
        });


        /* ======================================================
           4. BOTÃO CONTINUAR
           ====================================================== */

        function continuar() {

            const pagamento = document.querySelector("input[name='pagamento']:checked");
            const retirada = document.querySelector("input[name='retirada']:checked");
            const troco = document.getElementById("campo_troco").value;

            // Validar se escolheu ambas
            if (!pagamento || !retirada) {
                alert("Selecione as opções de pagamento e retirada");
                return;
            }

            // Se for DELIVERY → redirecionar para delivery.php
            if (retirada.value === "delivery") {
                let url = "delivery.php?pg=" + pagamento.value;

                // enviar troco apenas se for golds e usuário digitou
                if (pagamento.value === "golds" && troco !== "") {
                    url += "&troco=" + troco;
                }

                window.location.href = url;
                return;
            }

            // Se for LOCAL → ir para pagamento2.php
            let url = "pagamento2.php?pg=" + pagamento.value + "&ret=" + retirada.value;

            if (pagamento.value === "golds" && troco !== "") {
                url += "&troco=" + troco;
            }

            window.location.href = url;
        }
    </script>

</body>
</html>
