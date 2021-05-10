<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../../assets/images/logo_semFundo.png" type="image/x-icon">
    <title>Opcões</title>

    <link rel="stylesheet" href="../../themes/global.css">
    <link rel="stylesheet" href="../styles/opcoes.css" />

  </head>

  <body>
    <!-- <?php
        session_start();

        if($_SESSION['logado'] != true ) {
            header("Location: ./login.html");
        }
    ?>   -->

    <header>
      <a href="./formularioParte1.php" class="voltarBranco "><--</a>

      <div>
        <img src="../../assets/images/logo_semFundo.png" alt="logo" class="logo">
     
        <h1>PROJETO LYNCE</h1>  
      </div>
        
    </header>
    <form>
        <h2>Atenção</h2>
            <p>
                Ao  ir para outra página sem baixar o pdf atual, você irá perder seu documento!
            </p>
        <main> 
            <p>O que deseja fazer?</p>
            
            <!-- <button type="submit" name="pdf">Baixar o pdf</button>
            <button type="submit" name="tecnico"><a href="./mapa.html">Encontrar um técnico</a></button>
            <button type="submit" name="outro">Fazer outro formulário</button> -->
            <a href="#">Baixar o pdf</a>
            <a href="./mapa.php">Encontrar um técnico</a>
            <a href="./formularioParte1.php">Fazer outro formulário</a>
        </main>
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
