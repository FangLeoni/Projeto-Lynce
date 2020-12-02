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

    <div class="sair">
      <a href="../php/logout.php">
        <h2>sair <?php echo $_SESSION['tipo'] ?></h2>
      </a>
    </div>

    <div class="left-top">
      <a href="./marca.php">
        <div class="problemaContainer">
          <div class="imgContainer">
            <img
              class="celularImg"
              src="../../assets/icons/file-text.png"
              alt="celular-quebrado"
            />
          </div>
          <h2 class="primario-text">Algum Problema?</h2>
        </div>
      </a>
    </div>
    
    <div class="centerContanier">
      <h1 class="projeto-text">PROJETO</h1>
      <div class="centerLogo">
        <img src="../../assets/images/logo_semFundo.png" alt="">
      </div>
      <h1 class="lynce-text">LYNCE</h1>
    </div>

    <div class="rightContainer">
      <a href="./chat.php">
        <div class="secundario-div">
          <div class="imgContainer">
            <img class="lamp-img" src="../../assets/icons/message-circle.png" alt="lamp" />
          </div>
          <h2 class="secundario-text">Chat</h2>
        </div>
      </a>
    </div>
      
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
