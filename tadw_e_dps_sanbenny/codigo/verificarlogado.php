<?php
    session_start();
    if ($_SESSION['logado'] = "sim") {
        
    }else{
        header("Location: index.php");
    }
?>