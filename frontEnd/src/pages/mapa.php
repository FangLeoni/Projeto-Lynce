<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../../assets/images/logo_semFundo.png" type="image/x-icon">
    <title>Mapa</title>

    <link rel="stylesheet" href="../../themes/global.css">
    <link rel="stylesheet" href="../styles/mapa.css" />


    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin=""/>

  </head>

  <body>
    <?php
        session_start();

        if($_SESSION['logado'] != true ) {
            header("Location: ./login.html");
        }
    ?>   

    <header>
      <a href="./home.php" class="voltarBranco "><--</a>
      <div>
        <img src="../../assets/images/logo_semFundo.png" alt="logo" class="logo">
        <h1>PROJETO LYNCE</h1>  
      </div>
    </header>

    <section class="atencao">
        <h2>ATENÇÃO</h2>
        <p>
            Tenha cuidado ao ir a um técnico sem conhece-lo, tome as devidas precausões antes de ir até o local indicado e caso tenha problemas, reporte para nós pela página de ajuda
        </p>
    </section>

    <div id="mapa"></div>

    <section class="opcoes">
        <div class="opcao">
            <p>Patrocínio</p>
            <ul>
                <li>Jorge Reparos 
                    <a href="/frontEnd/src/pages/chat.php">
                        <img src="/frontEnd/assets/icons/message-circle.png" alt="">
                    </a>
                </li>
                <li>Jorge Reparos 
                    <a href="/frontEnd/src/pages/chat.php">
                        <img src="/frontEnd/assets/icons/message-circle.png" alt="">
                    </a>
                </li>
            </ul>
        </div>
        <div class="opcao">
            <p>Mais perto de você</p>
            <ul>
                <li>Jorge Reparos 
                    <a href="/frontEnd/src/pages/chat.php">
                        <img src="/frontEnd/assets/icons/message-circle.png" alt="">
                    </a>
                </li>
                <li>Jorge Reparos 
                    <a href="/frontEnd/src/pages/chat.php">
                        <img src="/frontEnd/assets/icons/message-circle.png" alt="">
                    </a>
                </li>
            </ul>
        </div>
        <div class="opcao">
            <p>Licensiados</p>
            <ul>
                <li>Jorge Reparos 
                    <a href="/frontEnd/src/pages/chat.php">
                        <img src="/frontEnd/assets/icons/message-circle.png" alt="">
                    </a>
                </li>
                <li>Jorge Reparos 
                    <a href="/frontEnd/src/pages/chat.php">
                        <img src="/frontEnd/assets/icons/message-circle.png" alt="">
                    </a>
                </li>
            </ul>
        </div>
    </section>
      
    <a href="./home.php" class="back">Voltar para o Início</a>


    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>
    <script>
        let mymap = L.map('mapa').setView([51.505, -0.09], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png?{foo}', {foo: 'bar', attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>'}).addTo(mymap);

        
    </script>

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
