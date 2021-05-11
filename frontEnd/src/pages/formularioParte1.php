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
      <a href="./home.php" class="voltarBranco "><--</a>

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
          <input type="radio" name="marca" value="Motorola">
          <input type="radio" name="marca" value="LG">
          <input type="radio" name="marca" value="Apple">
          <input type="radio" name="marca" value="Samsung">
        </div>
      </section>

      <section class="modelos">
        <h2>Escolha o modelo</h2>
        <p>Você pode encontrar o código do aparelho na caixa do aparelho</p>

        <select name="modelo" id="modelos">
          <option value="SM-A526BZKJZTO">SM-A526BZKJZTO</option>
          <option value="SM-A526BZKJZTO">SM-A526BZKJZTO</option>
          <option value="SM-A526BZKJZTO">SM-A526BZKJZTO</option>
        </select>
      </section>

      <section class="modelos">
        <h2>Escolha o problema</h2>

        <select name="tipoProb" id="tipo">
          <option value="tela">Tela</option>
          <option value="software">Sistema</option>
          <option value="bateria">Bateria</option>
        </select>
      </section>

      <div class="btnCont">
        <!-- <button type="submit">Próximo</button> -->
        <a href="./formularioParte2.php">Próximo</a>
      </div>

    </form>

<!-- 
    <script>
      let form = document.querySelector("form");

      form.addEventListener("submit",(e) =>{
        e.preventDefault();

        const url = `/server/php/createFormulario.php`;

        const formData = new FormData();
        const options = {
          method: "POST",
          body: formData
        }
        fetch(url, options)
        .then()
      })
    </script> -->

      
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
