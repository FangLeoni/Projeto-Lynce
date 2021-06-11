<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../../assets/images/logo_semFundo.png" type="image/x-icon">
    <title>Mapa</title>

    <link rel="stylesheet" href="../../themes/global.css">
    <link rel="stylesheet" href="../styles/mapa.css" />


    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin=""/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

  </head>

  <body>
    <!-- <?php
        session_start();

        if($_SESSION['logado'] != true ) {
            header("Location: ./login.html");
        }
    ?>    -->

    <header>
      <a href="./home.php" class="voltarBranco "><--</a>
      <div>
        <img src="../../assets/images/logo_semFundo.png" alt="logo" class="logo">
        <h1>PROJETO LYNCE</h1>  
      </div>
    </header>

    <section class="atencao">
        <h2>ATENÇÃO</h2>
        <p>
            Tenha cuidado ao ir a um técnico sem conhece-lo, tome as devidas precausões antes de ir até o local indicado e caso tenha problemas, reporte para nós pela página de ajuda
        </p>
    </section>

    <section class="mapaCont">
        <div id="mapa"></div>
        <form>
            <h2>Endereço</h2>
            <input type="text" name="endereco" id="endereco">
            <button type="submit">PROCURAR</button>
            <p>Seu endereço não será salvo, apenas utilizado para te localizar no mapa à esquerda</p>
        </form>
    </section>

    <p class="middleWarning">Clique em  <img src="/frontEnd/assets/icons/message-circle.png" alt=""> para criar uma conversa com o técnico</p>

    <section class="tecnicos">
        <div class="tecnicosParceiros">

            <div class="parceiro">
                <h1>Jorge Reparos <span>●</span> Parceiro</h1>
                <div class="generalDataCont">
                    <div class="imgPerfil">
                        <img src="/server/profilePics/d9dab6f8f258f564dbe76916174de09f40e932430beb0b4c32be6aed0153/MonumetoNiemayer.jpg" alt="">
                    </div>
                    <div class="dataCont">
                        <p>Jorge Reparos</p>
                        <p>Rua dos bobos, 0 | SP</p>
                        <p>(13) 99402-8922</p>
                        <a href="/frontEnd/src/pages/chat.php?addTech=">
                            <p>Chamar Assistência</p>
                            <img src="/frontEnd/assets/icons/message-circle.png" alt="">
                        </a>  
                        <div class="star-widget">
                            <input type="radio" name="rate" id="rate-5">
                            <label for="rate-5" class="fas fa-star"></label>
                            <input type="radio" name="rate" id="rate-4">
                            <label for="rate-4" class="fas fa-star"></label>
                            <input type="radio" name="rate" id="rate-3">
                            <label for="rate-3" class="fas fa-star"></label>
                            <input type="radio" name="rate" id="rate-2">
                            <label for="rate-2" class="fas fa-star"></label>
                            <input type="radio" name="rate" id="rate-1">
                            <label for="rate-1" class="fas fa-star"></label>
                        </div>
                    </div>
                </div>
                <p class="description">
                    Uma descrição bem legal que fala sobre essa assistência, o que ela oferece e quis tipos de celular ela concerta
                </p>
            </div>
            
            
            <div class="parceiro">
                <h2>Jorge Reparos <span>●</span> Parceiro</h2>
                <div class="generalDataCont">
                    <div class="imgPerfil">
                        <img src="/server/profilePics/d9dab6f8f258f564dbe76916174de09f40e932430beb0b4c32be6aed0153/MonumetoNiemayer.jpg" alt="">
                    </div>
                    <div class="dataCont">
                        <p>Jorge Reparos</p>
                        <p>Rua dos bobos, 0 | SP</p>
                        <p>(13) 99402-8922</p>
                        <a href="/frontEnd/src/pages/chat.php">
                            <p>Chamar Assistência</p>
                            <img src="/frontEnd/assets/icons/message-circle.png" alt="">
                        </a>          
                        <div class="star-widget">
                            <input type="radio" name="rate" id="rate-5">
                            <label for="rate-5" class="fas fa-star"></label>
                            <input type="radio" name="rate" id="rate-4">
                            <label for="rate-4" class="fas fa-star"></label>
                            <input type="radio" name="rate" id="rate-3">
                            <label for="rate-3" class="fas fa-star"></label>
                            <input type="radio" name="rate" id="rate-2">
                            <label for="rate-2" class="fas fa-star"></label>
                            <input type="radio" name="rate" id="rate-1">
                            <label for="rate-1" class="fas fa-star"></label>
                        </div>
                    </div>
                </div>
                <p class="description">
                    Uma descrição bem legal que fala sobre essa assistência, o que ela oferece e quis tipos de celular ela concerta
                </p>
            </div>

        </div>
        <div class="maisPerto tecnico">
            <p>Mais perto de você</p>
            <ul>
                <li>Jorge Reparos 
                    <a href="/frontEnd/src/pages/chat.php">
                        <img src="/frontEnd/assets/icons/message-circle.png" alt="">
                    </a>
                </li>
                <li>Jorge Reparos 
                    <a href="/frontEnd/src/pages/chat.php">
                        <img src="/frontEnd/assets/icons/message-circle.png" alt="">
                    </a>
                </li>
            </ul>
        </div>
        <div class="tecnico licenciados">
            <p>Licenciados</p>
            <ul>
                <li>Jorge Reparos 
                    <a href="/frontEnd/src/pages/chat.php">
                        <img src="/frontEnd/assets/icons/message-circle.png" alt="">
                    </a>
                </li>
                <li>Jorge Reparos 
                    <a href="/frontEnd/src/pages/chat.php">
                        <img src="/frontEnd/assets/icons/message-circle.png" alt="">
                    </a>
                </li>
            </ul>
        </div>
    </section>
      
    <a href="./home.php" class="back">Voltar para o Início</a>


    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>
    <script>

			const tecnicos = document.querySelector(".tecnicos");
			const form = document.querySelector("form")

			let mymap = L.map('mapa').setView([51.5, -0.09], 14);

			L.tileLayer(
				'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png?{foo}', 
			{
				foo: 'bar', 
				attribution: 'Map data &copy; <a href="https://www.openstreetmap.org  ">OpenStreetMap</a> contributors, <a href="https://creativecommons.org  licenses/by-sa/2.0/">CC-BY-SA</a>'
			}).addTo(mymap);

			async function getMapData(cidade, estado) {
				const url = `/server/php/getMapData.php`;

				const formData = new FormData()

				formData.append("cidade", cidade)
				formData.append("estado", estado)

				const options = {
						method: "POST",
						body: formData
				}

				const res = await fetch(url,options);
				const data = await res.json();

				
				if(data) {
					
					// console.log(data)

					data.forEach(async (item,index) => {
					const apiURL = `https://nominatim.openstreetmap.org/search?format=json&limit=1&street=${item.endereco}&city=${cidade}&state=${estado}&country=Brazil`

					const result = await fetch(apiURL)
					const dataResult = await result.json();

					if(index == 0) {
						mymap.setView([dataResult[0].lat, dataResult[0].lon], 14);
						
					}

					let marker = L.marker([dataResult[0].lat, dataResult[0].lon]).addTo(mymap);
					marker.bindPopup(`<b>${item.nome}</b>`).openPopup();
					
				})
				}

			}

			async function getTechsData(cidade, estado) {
				const url = `/server/php/getListTechData.php`;

				const formData = new FormData()

				formData.append("cidade", cidade)
				formData.append("estado", estado)

				const options = {
						method: "POST",
						body: formData
				}

				const res = await fetch(url,options);
				const data = await res.text();

				tecnicos.innerHTML = data;
			}

			async function getUserData() {
				const url = `/server/php/getListTechData.php`;

				const res = await fetch(url);
				const data = await res.json();

				getTechsData(data.cidade, data.estado)
				
				getMapData(data.cidade, data.estado)

				returnedData = {
					"cidade": data.cidade, 
					"estado": data.estado
				}

				return returnedData;
			}

			document.addEventListener("DOMContentLoaded", async (event) => {
				const location = await getUserData();
				console.log(location);

				let markerHome = false;

				form.addEventListener("submit", async (e)=> {
					e.preventDefault();

					let endereco = document.querySelector("#endereco").value;

					const url = `https://nominatim.openstreetmap.org/search?format=json&limit=1&street=${ endereco }&city=${location.cidade}&state=${location.estado}&country=Brazil`

					const res = await fetch(url);
					const data = await res.json();
					console.log(data)

					

					if(markerHome) {
						mymap.removeLayer(markerHome)
					}

					markerHome = L.marker([data[0].lat, data[0].lon]).addTo(mymap);

					markerHome.bindPopup(`<b>Estou AQUI!</b>`).openPopup();
					
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



<!-- 
    - HTML / CSS
    - Mudanças no banco dos técnicos:
    -- Adicionar pontuação 
    -- Descrição
    -- 
 -->