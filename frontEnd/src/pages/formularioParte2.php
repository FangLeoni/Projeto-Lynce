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
            <h2 class="problema">DEFEITOS DE SOFTWARE</h2>
            <p class="pergunta">
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

      
      
  <script>
    let form = document.querySelector("form");
    let problema = document.querySelector(".problema");
    let pergunta = document.querySelector(".pergunta");
    // let descricao = document.querySelector(".descricao");
    
    async function carregarJSON() {
      const data = await fetch("/server/php/createFormulario.php")
                        .then(res => res.json());
      console.log(data.software);

      return data.android.software;
    }

    document.addEventListener("DOMContentLoaded", async function(event) {
      const data = await carregarJSON();
     
      let problemPosition = 0;
      let questionPosition = 0;

      let problemSize = data.length; 
      
      problema.innerHTML = data[problemPosition].problema;
      pergunta.innerHTML = data[problemPosition].opcoes[questionPosition].pergunta;
      // descricao.innerHTML = data[problemPosition].descricao;

      form.addEventListener("submit",(e)=> {
        e.preventDefault();


        let trueButton = document.querySelector("#trueButton").checked;
        let falseButton = document.querySelector("#falseButton").checked;
        let optionSize = data[problemPosition].opcoes.length;
        
        if(trueButton && data[problemPosition].opcoes[questionPosition].resposta == trueButton) {
          data[problemPosition].pontuacao =  data[problemPosition].pontuacao + data[problemPosition].opcoes[questionPosition].pontos;
        } 
        else if(falseButton && data[problemPosition].opcoes[questionPosition].resposta != falseButton) {
          data[problemPosition].pontuacao =  data[problemPosition].pontuacao + data[problemPosition].opcoes[questionPosition].pontos;
        }
        

        if(questionPosition === optionSize - 1 && problemPosition < problemSize ) {

          questionPosition = 0;
          problemPosition = problemPosition + 1;

          if(problemPosition === problemSize ) {
            console.log("--------FIM-------")
            data.forEach((point, index) => {
              console.log(` ${index+1} Pontos: ${point.pontuacao}`)
            })

            let formData = new FormData();
            let objeto = {};
            data.forEach((point, index) => {
              objeto[`problem_${index+1}`] = point.pontuacao;
            })
            const url = `./gfkg.php`;
            formData.append(`resultado`, objeto);

            fetch()

            console.log("--------FIM-------");
          } else {
            problema.innerHTML = data[problemPosition].problema;
            // descricao.innerHTML = data[problemPosition].descricao;
            pergunta.innerHTML = data[problemPosition].opcoes[questionPosition].pergunta;
          }

          
        } else if(questionPosition < optionSize && problemPosition < problemSize ) {
          questionPosition = questionPosition + 1;
          pergunta.innerHTML = data[problemPosition].opcoes[questionPosition].pergunta;
        }


        
      })
      

    });
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
