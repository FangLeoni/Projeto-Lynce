<?php
// header('Content-type: application/json');
// header('HTTP/1.1 301 Moved Permanently');

    // session_start();

    // if($_SESSION['logado'] != true ) {
    //     header("Location: ./login.html");
    // }
    // echo "lolololololo";

    // $data = json_decode(file_get_contents('php://input'), true);
    // print_r($data);

?> 


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
    

    <header>
      <a href="./formularioParte1.php" class="voltarBranco "><--</a>

      <div>
        <img src="../../assets/images/logo_semFundo.png" alt="logo" class="logo">
     
        <h1>SEGUNDA PARTE</h1>  
      </div>
        
    </header>
      <form>
          <main>
            <h2 class="problema">Não carregou</h2>
            
            <p class="pergunta">
                Não carregou
            </p>
            
              <div class="inputCont">
                <label for="">
                Sim
                <input type="radio" name="true" value ="true" id="trueButton">
                </label>
                <label for="">
                Não
                <input type="radio" name="true" value ="false" id="falseButton">
                </label>
              </div>
              <input type="submit" name="true" value ="Próximo">
          </main>

      </form>

  <script>
    let returnedJSON = JSON.parse(localStorage.getItem('returnedJSON'));

    let form = document.querySelector("form");
    let problema = document.querySelector(".problema");
    let pergunta = document.querySelector(".pergunta");
    let descricao = document.querySelector(".descricao");

    function compare( a, b ) {
      if ( a.pontuacao > b.pontuacao ){
        return -1;
      }
      if ( a.pontuacao < b.pontuacao ){
        return 1;
      }
      return 0;
    }
    
    function resultRanking(newObjeto) {
      let somaResultados = 0;
      let arraySize = newObjeto.problemas.length

      newObjeto.problemas.forEach((item) => {
        somaResultados += item.pontuacao 
      })

      newObjeto.problemas.map((item) => {
        item.pontuacao = Math.round(100*(item.pontuacao/somaResultados))
      })
      newObjeto.problemas.sort(compare)

      newObjeto.problemas.length = 3;

      newObjeto.problemas.forEach((item) => {
        if(item.pontuacao >= 66) {
          item.chance = "Alto"
        } else if(item.pontuacao >= 33) {
          item.chance = "Médio"
        } else {
          item.chance = "Baixo"
        }
      })

      return newObjeto;

    }


    document.addEventListener("DOMContentLoaded", async function(event) {
      const data = returnedJSON[returnedJSON.defeito];

      let problemPosition = 0;
      let questionPosition = 0;

      let problemSize = data.length; 
      
      problema.innerHTML = data[problemPosition].problema;
      pergunta.innerHTML = data[problemPosition].opcoes[questionPosition].pergunta;
    

      form.addEventListener("submit",(e)=> {
        e.preventDefault();


        let trueButton = document.querySelector("#trueButton").checked;
        let falseButton = document.querySelector("#falseButton").checked;
        let optionSize = data[problemPosition].opcoes.length;
        
        if(
          trueButton 
          && 
          data[problemPosition].opcoes[questionPosition].resposta == trueButton
        ) {
          data[problemPosition].pontuacao =  data[problemPosition].pontuacao + data[problemPosition].opcoes[questionPosition].pontos;
        } 
        else if(
          falseButton 
          && 
          data[problemPosition].opcoes[questionPosition].resposta != falseButton
        ){
          data[problemPosition].pontuacao =  data[problemPosition].pontuacao + data[problemPosition].opcoes[questionPosition].pontos;
        }
        

        if(
            questionPosition === optionSize - 1 
            && 
            problemPosition < problemSize 
        ) {

          questionPosition = 0;
          problemPosition = problemPosition + 1;

          if(problemPosition === problemSize ) {
            console.log("--------FIM-------")
            data.forEach((point, index) => {
              console.log(` ${index+1} Pontos: ${point.pontuacao}`)
            })

            let formData = new FormData();
            let objeto = {
              "marca": returnedJSON.marca,
              "modelo": returnedJSON.modelo,
              "defeito": returnedJSON.defeito,
              "problemas": []
            };
            data.forEach((item, index) => {

              objeto.problemas[index] = {
                "problema": item.problema,
                "descricao": item.descricao,
                "solucao":item.solucao,
                "pontuacao": item.pontuacao
              };
            })
            
            console.log("--------FIM-------");

            let resultado = resultRanking(objeto);
            
            console.log(resultado);

            console.log("--------FIM-------");

            // localStorage.removeItem('returnedJSON');

            localStorage.setItem('resultado', JSON.stringify(resultado));
            // console.log(localStorage.getItem('resultado'))


            window.location.href = "./opcoes.php";
          } else {
            problema.innerHTML = data[problemPosition].problema;
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
