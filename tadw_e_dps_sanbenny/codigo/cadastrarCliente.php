<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./jquery-3.7.1.min.js"></script>
</head>
<body>
  
  <form onsubmit="return validarFormulario()">
  <label for="email">E-mail:</label>
  <input type="email" id="email" name="email"> <br>

  <label for="senha">Senha:</label>
  <input type="text" id="senha" name="senha"> <br>

  <label for="nome">Nome</label>
  <input type="text" id="nome" name="nome"> <br>

  <label for="telefone">Telefone</label>
  <input type="text" id="telefone" name="telefone"> <br>

  <label for="endereco">Endereço</label>
  <input type="text" id="endereco" name="endereco"> <br>
  

  <button type="submit">Enviar</button>
</form>

<!-- fazer validação de campo -->

</body>
</html>