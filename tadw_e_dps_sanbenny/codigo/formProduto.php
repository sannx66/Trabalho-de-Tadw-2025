<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Produto</title>
</head>
<body>
    <h1>Cadastro de Produto</h1>
    <form action="/cadastrar_produto" method="post">
        <label for="idproduto">ID do Produto:</label>
        <input type="number" id="idproduto" name="idproduto" required><br><br>

        <label for="disponivel">Disponível:</label>
        <input type="number" id="disponivel" name="disponivel" min="0" max="1" required><br><br>

        <label for="tipo">Tipo:</label>
        <input type="text" id="tipo" name="tipo" maxlength="45" required><br><br>

        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" maxlength="90" required><br><br>

        <label for="ingredientes">Ingredientes:</label>
        <input type="text" id="ingredientes" name="ingredientes" maxlength="300"><br><br>

        <label for="valor_un">Valor Unitário:</label>
        <input type="number" id="valor_un" name="valor_un" step="0.01" required><br><br>

        <label for="observacoes">Observações:</label>
        <input type="text" id="observacoes" name="observacoes" maxlength="45"><br><br>

        <button type="submit">Cadastrar Produto</button>
    </form>
</body>
</html>