<?php
    require_once "conexao.php";

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM tb_cliente WHERE email = '$email'";

    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) == 0) {

    echo '<script>alert("Usuário não cadastrado");';
    echo 'location.href="formCliente.php"; </script>';  
        // local para ir depois que aparecer o alert
     }

    else {
        $linha = mysqli_fetch_array($resultado);
        $senha_banco = $linha['senha'];
        $tipo = $linha['tipo'];

        if (password_verify($senha, $senha_banco)) {
            session_start();
            $_SESSION['logado'] = 'sim';
            $_SESSION['tipo'] = $tipo;
            header("Location: categorias.php");
        }
        else {
            echo '<script>alert("Senha incorreta");';
            echo 'location.href="formCliente.php"; </script>';  
                // local para ir depois que aparecer o alert


        }
    }
?>