<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../assets/images/logo_semFundo.png" type="image/x-icon">
    <title>Perguntas</title>

    <link rel="stylesheet" href="../../themes/global.css">
    <link rel="stylesheet" href="../styles/perguntas.css">
    
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
        <a href="./escolhaproblema.php" >
            <h3> 
            <svg viewBox="0 0 115 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M78.9538 27.4338L114.806 27.4338V32.8246L78.9538 32.8246V27.4338ZM78.9538 13.4031L114.806 13.4031V18.7938L78.9538 18.7938V13.4031ZM34.657 27.4338L80.4416 27.4338V32.8246L34.657 32.8246V27.4338ZM34.657 13.4031L80.4416 13.4031V18.7938L34.657 18.7938L34.657 13.4031ZM20.2309 45.6L0.144714 23.1138L20.2309 0.627692L24.8093 4.54154L20.1939 9.56308C19.5047 10.3754 18.8278 11.0769 18.1632 11.6677C17.4986 12.2585 16.6616 12.8369 15.6524 13.4031L36.1447 13.4031L36.1447 18.7938L11.8493 18.7938L7.89856 23.1138L11.8493 27.4338L36.1447 27.4338V32.8246L15.6524 32.8246C16.6616 33.3908 17.4986 33.9692 18.1632 34.56C18.8278 35.1508 19.5047 35.8523 20.1939 36.6646L24.8093 41.6862L20.2309 45.6Z" fill="#2EFF81"/>
                </svg>  
            </h3>              
            <h4>voltar</h4>
        </a>
    </div>

    <div class="titulo">
         <!-- <div class="logo"> -->
            <img src="../../assets/images/logo_semFundo.png" alt="logo" class="logo">
        <!-- </div> --> 
        <h1 class="titulo">PROJETO LYNCE</h1>
    </div>

    <div class="infoCell">
        <h2>Marca: <br><span id="marca">Samsung</span> </h2>
        <h2>Modelo: <br><span id="modelo">A-30SPLUS</span> </h2>
        <h2>Problema: <br><span id="problema">Tela quebrada</span> </h2>
    </div>

    <div class="perguntas">
        <form action="#" method="post">

            <div class="boxPergunta">
                <h2 class="tituloPergunta">Pergunta 1</h2>
                <p class="pergunta">Pergunta relacionada a pergunta do lorem ipsum dolor amenet doleralus</p>
                <div class="opcoes">
                    <div class="opcao">
                        <label class="btnRadio">
                            <input type="radio" name="resp1" id="resp01">
                            <p class="txtopcao"> opção 1 </p>
                            <span></span>
                        </label>
                    </div>

                    <div class="opcao">
                        <label class="btnRadio">
                            <input type="radio" name="resp1" id="resp02">
                            <p class="txtopcao"> opção 2 </p>
                            <span></span>
                        </label>
                    </div>

                    <div class="opcao">
                        <label class="btnRadio">
                            <input type="radio" name="resp1" id="resp03">
                            <p class="txtopcao"> opção 3 </p>
                            <span></span>
                        </label>
                    </div>

                    <div class="opcao">
                        <label class="btnRadio">
                            <input type="radio" name="resp1" id="resp04">
                            <p class="txtopcao"> opção 4 </p>
                            <span></span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="boxPergunta">
                <h2 class="tituloPergunta">Pergunta 2</h2>
                <p class="pergunta">Pergunta relacionada a pergunta do lorem ipsum dolor amenet doleralus</p>
                <div class="opcoes">
                    <div class="opcao">
                        <label class="btnRadio">
                            <input type="radio" name="resp2" id="resp01">
                            <p class="txtopcao"> opção 1 </p>
                            <span></span>
                        </label>
                    </div>

                    <div class="opcao">
                        <label class="btnRadio">
                            <input type="radio" name="resp2" id="resp01">
                            <p class="txtopcao"> opção 2 </p>
                            <span></span>
                        </label>
                    </div>

                    <div class="opcao">
                        <label class="btnRadio">
                            <input type="radio" name="resp2" id="resp01">
                            <p class="txtopcao"> opção 3 </p>
                            <span></span>
                        </label>
                    </div>

                    <div class="opcao">
                        <label class="btnRadio">
                            <input type="radio" name="resp2" id="resp01">
                            <p class="txtopcao"> opção 4 </p>
                            <span></span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="boxPergunta">
                <h2 class="tituloPergunta">Pergunta 3</h2>
                <p class="pergunta">Pergunta relacionada a pergunta do lorem ipsum dolor amenet doleralus</p>
                <div class="centralizarBotao">
                    <select name="resp3" id="resp3" class="select">
                        <option value="opcao1"></option>
                        <option value="opcao1">opcao1</option>
                        <option value="opcao1">opcao2</option>
                        <option value="opcao1">opcao3</option>
                        <option value="opcao1">opcao4</option>
                    </select>
                </div>
            </div>

            <div class="boxPergunta">
                <h2 class="tituloPergunta">Pergunta 4</h2>
                <p class="pergunta">Pergunta relacionada a pergunta do lorem ipsum dolor amenet doleralus</p>
                <div class="centralizarBotao">
                    <select name="resp3" id="resp4" class="select">
                        <option value="opcao1"></option>
                        <option value="opcao1">opcao1</option>
                        <option value="opcao1">opcao2</option>
                        <option value="opcao1">opcao3</option>
                        <option value="opcao1">opcao4</option>
                    </select>
                </div>
            </div>
            <br><br><br>

            <a href="./home.php">
                <div class="centralizarBotao">
                    <input class="botao" type="button" value="Finalizar">
                </div>
            </a>
        </form>
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

    <script type="javascript/text" src="../js/perguntas.js"></script>
</body>

</html>