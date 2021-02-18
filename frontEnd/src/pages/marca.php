<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../assets/images/logo_semFundo.png" type="image/x-icon">
    <title>Marca - Lynce</title>
    <link rel="stylesheet" href="../../themes/global.css">
    <link rel="stylesheet" href="../styles/marca.css">
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
    
    <div class="voltar">
        <a href="./home.php" >
            <h3> 
            <svg width="72" height="49" viewBox="0 0 72 49" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M21.8439 48.728L0.0638742 24.536L21.8439 0.344L29.2959 6.752L24.2559 12.224C22.8159 13.832 21.3999 15.26 20.0079 16.508C18.6159 17.78 17.1879 18.908 15.7239 19.892L71.5599 19.892V29.18L15.6159 29.18C17.1519 30.14 18.6039 31.256 19.9719 32.528C21.3399 33.8 22.7679 35.24 24.2559 36.848L29.2959 42.32L21.8439 48.728Z" fill="white"/>
            </svg>
 
            </h3>              
            <h4>voltar</h4>
        </a>
    </div>

    <h1 class="title">PROJETO LYNCE</h1>
    <div class="div-logo"><br>
       
       <img class="motorola-logo logos" src="../../assets/icons/motorola-logo.png" alt="motorola-logo">  
       <img class="lg-logo logos" src="../../assets/icons/lg-logo.png" alt="lg-logo"> 
       <img class="apple-logo logos" src="../../assets/icons/apple-logo.png" alt="apple-logo"> 
    <img class="samsung-logo logos" src="../../assets/icons/samsung-logo.png" alt="samsung-logo">
<br><br>    
</div>

    <a href="./escolhaoproblema.php">
        <div class="btn-escolha-marca">
            <h2>ESCOLHA A MARCA</h2>
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