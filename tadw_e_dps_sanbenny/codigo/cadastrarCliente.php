<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./jquery-3.7.1.min.js"></script>
</head>
<body>
    <form id="meuForm" action="salvarUsuario.php" method="post">
    
  E-mail     <input type="text" id="email" name="email" required><br>
  Senha     <input type="text" id="senha" name="senha" required> <br>
  Nome      <input type="text" id="nome" name="nome" required> <br>
  Telefone  <input type="text" id="telefone" name="telefone" required><br>
  Endereço  <input type="text" id="endereco" name="endereco" required><br><br>

  <button id="meuBotao">Cadastrar</button>

    </form>
    <div id="mensagem"></div>

    <script>

    $(document).ready(function() {
  $("#meuBotao").click(function(event) {
    event.preventDefault(); // Impede o envio padrão do formulário

    let camposPreenchidos = true;
    $("#meuForm input[required]").each(function() {
      if ($(this).val() === "") {
        camposPreenchidos = false;
        return false; // Sai do loop 'each' se encontrar um campo vazio
      }
    });

    if (camposPreenchidos) {
      $("#mensagem").text("Todos os campos foram preenchidos.").css("color", "green");
      // Aqui você pode adicionar o código para enviar o formulário
    } else {
      $("#mensagem").text("Por favor, preencha todos os campos.").css("color", "red");
    }
  });
});
</script>



</body>
</html>