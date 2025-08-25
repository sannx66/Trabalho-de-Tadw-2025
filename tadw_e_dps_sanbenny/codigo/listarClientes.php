<?php
// Inclui o arquivo com as funções
include 'funcoes.php';

// Faz a conexão com o banco
$conexao = mysqli_connect("localhost", "usuario", "senha", "banco");

// Chama a função para listar os clientes
$clientes = listarClientes($conexao);
?>

<h2>Lista de Clientes</h2>

<table border ="1" cellpadding="5">
    <tr>
        <th>Email</th>
        <!-- <th>Senha</th> -->
        <th>Nome</th>
        <th>Telefone</th>
        <th>Endereco</th>
    </tr>

    <?php foreach ($clientes as $cliente): ?>
    <tr>
        <td><?= $cliente['email'] ?></td>
        <!-- <td><?= $cliente['senha'] ?></td> -->
        <td><?= $cliente['nome'] ?></td>
        <td><?= $cliente['telefone'] ?></td>
        <td><?= $cliente['endereco'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>
