<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perguntas e respostas</title>
    <!-- ---- CSS ---- -->
    <link rel="stylesheet" href="../../themes/global.css">
    <link rel="stylesheet" href="../styles/index.css">
    <!-- ------------- -->
</head>
<body>
    <?php
        session_start();

        if($_SESSION['logado'] != true ) {
            header("Location: index.html");
        }
        else {
            echo "<h1>Seja bem-vindo," . $_SESSION['usu'] ."</h1>";
            session_destroy();
        }
    ?>

    <div class="container">
        <h1>SUCESSO NO ACESSO!</h1>
        <a href="../php/logout.php"><button>Sair</button></a>
    </div>
</body>
</html>