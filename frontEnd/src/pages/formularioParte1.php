<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../../assets/images/logo_semFundo.png" type="image/x-icon">
    <title>PRIMERIA PARTE</title>

    <link rel="stylesheet" href="../../themes/global.css">
    <link rel="stylesheet" href="../styles/formularioParte1.css" />

    
    <!-- ---- Sweet_Alert2 ---- -->
    <link rel="stylesheet" href="../libraries/Sweet_alert2/sweetalert2.css">
    <script src="../libraries/Sweet_alert2/sweetalert2.js"></script>
    <!-- ---------------------- -->
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
        <div class="imagens">
          <img src="../../assets/icons/motorola_logo.png" alt="Motorola" required>
          <img src="../../assets/icons/lg_logo.png" alt="LG">
          <img src="../../assets/icons/apple_logo.png" alt="Apple">
          <img src="../../assets/icons/samsung_logo.png" alt="Samsung" >
        </div>
        <div class="radioInputs">
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
          <!-- <option value="SM-A526BZKJZTO">SM-A526BZKJZTO</option>
          <option value="SM-A526BZKJZTO">SM-A526BZKJZTO</option>
          <option value="SM-A526BZKJZTO">SM-A526BZKJZTO</option> -->
        </select>
      </section>

      <section class="modelos">
        <h2>Escolha o problema</h2>

        <select name="tipoProb" id="tipo">
          <option value="software">Sistema</option>
          <option value="tela">Tela</option>
          <option value="bateria">Bateria</option>
        </select>
      </section>

      <div class="btnCont">
        <button type="submit">Próximo</button>
        <!-- <a href="./formularioParte2.php">Próximo</a> -->
      </div>

    </form>

    <script>
      let imagens = document.querySelectorAll(".imagens img");
      let radioInputs = document.querySelectorAll(".radioInputs input");
      let modelos = document.querySelector("#modelos");

      let form = document.querySelector("form");

/* postFormPart2
      // async function postFormPart2(dataJSON) { 
      //   const url = `./formularioParte2.php`;
      //   // return console.log("Ola", dataJSON)
      //   const options = {
      //     method: "POST",
      //     headers: {
      //       'Accept': 'application/json',
      //       'Content-Type': 'application/json'
      //     },
      //     redirect: 'follow',
      //     body: JSON.stringify(dataJSON)
      //   }
      //   const res = await fetch(url, options)
      //   const dataNew = await res.text()

      //   document.body.innerHTML = dataNew;
      //   console.log(dataNew)
      // }
*/


      async function getFormulario() { 
        const url = `/server/php/createFormulario.php`;

        const formData = new FormData(form);
        const options = {
          method: "POST",
          body: formData
        }
        const res = await fetch(url, options)
        .then(function(response) {
            if (!response.ok) {
                throw Error(response.statusText);
            }
            return response;
        })
        .catch((err) => {
            Swal.fire({
                title: 'Oops!',
                text: err,
                icon: 'error',
                confirmButtonText: "Tentar novamente"
            })
        });

        const dataJSON = await res.json();
        console.log(dataJSON)
        localStorage.setItem('returnedJSON', JSON.stringify(dataJSON));
        window.location.href = "./formularioParte2.php";
      }

      function compare( a, b ) {
      if ( a.nm_marca < b.nm_marca ){
        return -1;
      }
      if ( a.nm_marca > b.nm_marca ){
        return 1;
      }
      return 0;
    }

      async function getMarcas() {
        const url = `/server/php/getFormularioData.php`;

        const res = await fetch(url);
        const dataJSON = await res.json();

        dataJSON.sort(compare)

        radioInputs.forEach((item, index)=> {
          item.value = dataJSON[index].nm_marca;
        }) 
        
        imagens.forEach((item, index) => {
          item.src = `../../assets/icons/${dataJSON[index].nm_marca.toLowerCase()}_logo.png`;
        }) 

      }

      radioInputs.forEach((item, index)=> {
        item.addEventListener("click", async () => {

          const url = `/server/php/getFormularioData.php`;

          const formData = new FormData();
          formData.append("marcaSelecionada", item.value)

          const options = {
            method: "POST",
            body: formData
          }
          const res = await fetch(url, options)
          const dataJSON = await res.json();
            
           if(dataJSON) {
            modelos.innerHTML = "";

            dataJSON.forEach(item => {
              modelos.innerHTML += `<option value='${item.nm_modelo}'>${item.nm_modelo}</option>`
            })   
           } else {
            modelos.innerHTML = "<option value='null'>Não há modelos registrados</option>";
           }
        

        })
      }) 

      form.addEventListener("submit",(e) =>{
        e.preventDefault();

        getFormulario()
      })

      document.addEventListener("DOMContentLoaded", async function(event) {
        
        getMarcas();
        
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

