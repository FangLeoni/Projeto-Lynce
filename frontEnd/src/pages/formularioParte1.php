<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../../assets/images/logo_semFundo.png" type="image/x-icon">
    <title>PRIMERIA PARTE</title>

    <link rel="stylesheet" href="../../themes/global.css">
    <link rel="stylesheet" href="../styles/formularioParte1.css" />

  </head>

  <body>
    <?php
        session_start();

        if($_SESSION['logado'] != true ) {
            header("Location: ./login.html");
        }
    ?>  

    <header>
      <a href="./algumProblema.php" class="voltarBranco "><--</a>

      <div>
        <img src="../../assets/images/logo_semFundo.png" alt="logo" class="logo">
     
        <h1>PRIMERIA PARTE</h1>  
      </div>
        
    </header>
    <form>
      <section class="marcas">
        <h2>Escolha a Marca</h2>
        <div>
          <img src="../../assets/icons/motorola_logo.png" alt="Motorola">
          <img src="../../assets/icons/lg_logo.png" alt="LG">
          <img src="../../assets/icons/apple_logo.png" alt="Apple">
          <img src="../../assets/icons/samsung_logo.png" alt="Samsung">
        </div>
        <div>
          <input type="radio" name="marca" id="">
          <input type="radio" name="marca" id="">
          <input type="radio" name="marca" id="">
          <input type="radio" name="marca" id="">
        </div>
      </section>

      <section class="modelos">
        <h2>Escolha o modelo</h2>
        <p>Você pode encontrar o código do aparelho na caixa do aparelho</p>

        <select name="modelos" id="modelos">
          <option value="AS_12908">AS_12908</option>
          <option value="AS_12908">AS_12342308</option>
          <option value="AS_12908">AS_12gfd8</option>
        </select>
      </section>

      <section class="modelos">
        <h2>Escolha o problema</h2>

        <select name="modelos" id="modelos">
          <option value="Tela">Tela</option>
          <option value="Sistema">Sistema</option>
          <option value="Bateria">Bateria</option>
        </select>
      </section>

      <div class="btnCont">
        <!-- <button type="submit">Próximo</button> -->
        <a href="./formularioParte2.php">Próximo</a>
      </div>

    </form>

      
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
