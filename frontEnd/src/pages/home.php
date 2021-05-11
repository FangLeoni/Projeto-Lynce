<?php
    session_start();

    if($_SESSION['logado'] != true ) {
        header("Location: login.html");
    }
    else {
    }
?> 
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


    <div class="bgTriangle"></div>

    <div class="sair">
      <a href="/server/php/logout.php">
        <p>sair</p>
      </a>
    </div>

    <div class="imgProfile">
      <img src="/server/profilePics/<?php echo $_SESSION['codigo']?>/<?php echo $_SESSION['profPic'] ?>" alt="perfil">
    </div>
    
    <main class="buttonsGrid">
      <a href="./formularioParte1.php" class="linkButtons Item1">
            <img class="lamp-img" src="../../assets/icons/celular-quebrado.png" alt="lamp" />
          <h2 class="secundario-text">Algum problema ?</h2>
      </a>

      <a href="./mapa.php" class="linkButtons Item2">
          <img class="lamp-img" src="../../assets/icons/map_pin.svg" alt="lamp" />
          <h2 class="secundario-text">Mapa</h2>
      </a>

      
      <a href="./dicas-rapidas.php" class="linkButtons Item4">
          <img class="lamp-img" src="../../assets/icons/bulbIcon.svg" alt="lamp" />
          <h2 class="secundario-text">Dicas Rápidas</h2>
      </a>
      
      <a href="./chat.php" class="linkButtons Item3">
            <img class="lamp-img" src="../../assets/icons/chatIcon.svg" alt="lamp" />
          <h2 class="secundario-text">Chat</h2>
      </a>

      <p class="logoImg Item5">
        <img src="../../assets/images/logo_semFundo.png" alt="">
      </p>
      
    </main>
    
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
