<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="index.css">
    <title>Document</title>

    <?php if (isset($_GET['erro']) && $_GET['erro'] == 'usuario_nao_cadastrado'): ?>
<script>
    alert("Usuário não cadastrado");
</script>
<?php endif; ?>
</head>
<body id="index_page">

    <div id="index_container">

        <!-- LOGO -->
        <div id="index_left">
            <img id="index_logo" src="./fotos/logo_diego.png" alt="logo_doceria">
        </div>

        <!-- TEXTOS E BOTÕES -->
        <div id="index_right">

            <h1 id="index_title">Doceria</h1>
            <h3 id="index_subtitle">Le Doux Amour</h3>

            <a class="index_button" href="cadastrarCliente.php">Cadastrar</a>
            <a class="index_button" href="formCliente.php">Entrar</a>

        </div>

    </div>

</body>


</html>