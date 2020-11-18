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
            <svg width="72" height="49" viewBox="0 0 72 49" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M21.8439 48.728L0.0638742 24.536L21.8439 0.344L29.2959 6.752L24.2559 12.224C22.8159 13.832 21.3999 15.26 20.0079 16.508C18.6159 17.78 17.1879 18.908 15.7239 19.892L71.5599 19.892V29.18L15.6159 29.18C17.1519 30.14 18.6039 31.256 19.9719 32.528C21.3399 33.8 22.7679 35.24 24.2559 36.848L29.2959 42.32L21.8439 48.728Z" fill="white"/>
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