<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../../assets/images/logo_semFundo.png" type="image/x-icon">
    <title>SEGUNDA PARTE</title>

    <link rel="stylesheet" href="../../themes/global.css">
    <link rel="stylesheet" href="../styles/formularioParte2.css" />

  </head>

  <body>
    <?php
        session_start();

        if($_SESSION['logado'] != true ) {
            header("Location: ./login.html");
        }
    ?>  

    <header>
      <a href="./formularioParte1.php" class="voltarBranco "><--</a>

      <div>
        <img src="../../assets/images/logo_semFundo.png" alt="logo" class="logo">
     
        <h1>SEGUNDA PARTE</h1>  
      </div>
        
    </header>
    <form>
        <main>
            <h2>DEFEITOS DE SOFTWARE</h2>
            <p>
                O aparelho apresenta alguma mensagem de Erro ao inicializar?
            </p>
            
            <div class="inputCont">
                <!-- <input type="submit" name="true" value ="Sim">
                <input type="submit" name="false" value = "Não"> -->
                <a href="./opcoes.php">Sim</a>
                <a href="./opcoes.php">Não</a>
              </div>
            </main>

            <div class="btnCont">
              <!-- <button type="submit">Anteriror</button> -->
              <a href="./formularioParte1.php">Anterior</a>
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
