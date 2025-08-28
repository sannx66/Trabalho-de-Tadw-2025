<?php
require_once "./conexao.php";
require_once "./funcoes.php";


        E-mail: <br>
        <input type="text" name="email"> <br><br>
        Senha: <br>
        <input type="text" name="senha"> <br><br>
        Nome: <br>
        <input type="text" name="nome"> <br><br>
        Telefone: <br>
        <input type="text" name="telefone"> <br><br>
        Endereço: <br>
        <input type="text" name="endereco"> <br><br>
        Status: <br>
        <input type="text" name="status"> <br><br>
        Tipo: <br>
        <input type="text" name="tipo"> <br><br>

        
    cadastrarCliente($conexao, $email, $senha, $nome, $telefone, $endereco, $status, $tipo);
?>


        <!-- <a href="formUsuario.php">Primeiro acesso</a> <br><br> n sei pra q isso mas deve ser útil-->

        <input type="submit" value="Cadastrar">

        <!-- exemplo do pq existe name nos formulários//$nome =$_POST['nome']_ -->
    </form>
</body>
</html>