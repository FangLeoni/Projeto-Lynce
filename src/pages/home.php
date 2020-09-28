<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../../assets/images/logo_semFundo.png" type="image/x-icon">
    <title>Home - Lynce</title>

    <link rel="stylesheet" href="../../themes/global.css">
    <link rel="stylesheet" href="../styles/home.css" />

  </head>

  <body>
  <?php
        session_start();

        if($_SESSION['logado'] != true ) {
            header("Location: index.html");
        }
        else {
        }
    ?>
    <div class="left-top">
      <a href="./marca.php">
        <div class="primario-div">
          <img
            class="celular-img"
            src="../../assets/icons/celular-quebrado.png"
            alt="celular-quebrado"
          />
          <h2 class="primario-text">Algum Problema?</h2>
        </div>
      </a>

      <h1 class="projeto-text">PROJETO</h1>
    </div>

    
    <div class="right-bottom">
    </div>      

    <div class="sair">
      <a href="../php/logout.php">
        <h2>sair</h2>
      </a>
    </div>
    
    

    <h1 class="lynce-text">LYNCE</h1>

    <a href="./dicasRapidas.php">
      <div class="secundario-div">
        <img class="lamp-img" src="../../assets/icons/dica-icone.svg" alt="lamp" />
        <h2 class="secundario-text">Dicas Rápidas</h2>
      </div>
    </a>
      
    <!-- ---------------- VLibras------------- -->
    <div vw class="enabled">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
          <div class="vw-plugin-top-wrapper"></div>
        </div>
      </div>
      <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
      <script>
        new window.VLibras.Widget('https://vlibras.gov.br/app');
      </script>
    <!-- ---------------- VLibras------------- -->

  </body>
</html>
