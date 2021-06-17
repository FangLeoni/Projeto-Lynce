<?php
    session_start();

    if($_SESSION['logado'] != true ) {
        header("Location: login.html");
    }
?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" href="../../assets/images/logo_semFundo.png" type="image/x-icon">
    <title>Perfil</title>

    <!-- ---- CSS ---- -->
    <link rel="stylesheet" href="../../themes/global.css">
    <link rel="stylesheet" href="../styles/perfil.css">
    <!-- ------------- -->

    <!-- ---- Sweet_Alert2 ---- -->
    <link rel="stylesheet" href="../libraries/Sweet_alert2/sweetalert2.css">
    <script src="../libraries/Sweet_alert2/sweetalert2.js"></script>
    <!-- ---------------------- -->
</head>

<body>
    <a href="./home.php">
    <div class="imgProfile">
      <img src="/server/profilePics/<?php echo $_SESSION['codigo']?>/<?php echo $_SESSION['profPic'] ?>" alt="perfil">
    </div>
    </a>

	<main class="main">

		<form class="middle" action="#">
			<div class="grid2">
				<div class="grid_header">
					<div class="photoCont">
					<img src="/server/profilePics/<?php echo $_SESSION['codigo']?>/<?php echo $_SESSION['profPic'] ?>" class="userPic" alt="perfil">
					<input type="file" name="profilePhoto" id="profilePhotoInput" accept="image/*" onchange="readURL(this.files)" >
					</div>
				</div>

				<div class="col">
					<div class="inputBox">
						<input type="text" name="name" id="nomeCompleto" required="required" maxlength="80">
						<span class="text">Nome Completo</span>
						<span class="line"></span>
					</div>
				</div>

				<div class="col">
					<div class="inputBox">
						<input type="email" name="email" id="email" required="required" maxlength="80">
						<span class="text">Email</span>
						<span class="line"></span>
					</div>
				</div>
				
				<div class="col">
					<div class="inputBox">
						<select id="estado" name="state">
								<option hidden value="null">Estado</option>
								<option value="AC">Acre</option>
								<option value="AL">Alagoas</option>
								<option value="AP">Amapá</option>
								<option value="AM">Amazonas</option>
								<option value="BA">Bahia</option>
								<option value="CE">Ceará</option>
								<option value="DF">Distrito Federal</option>
								<option value="ES">Espírito Santo</option>
								<option value="GO">Goiás</option>
								<option value="MA">Maranhão</option>
								<option value="MT">Mato Grosso</option>
								<option value="MS">Mato Grosso do Sul</option>
								<option value="MG">Minas Gerais</option>
								<option value="PA">Pará</option>
								<option value="PB">Paraíba</option>
								<option value="PR">Paraná</option>
								<option value="PE">Pernambuco</option>
								<option value="PI">Piauí</option>
								<option value="RJ">Rio de Janeiro</option>
								<option value="RN">Rio Grande do Norte</option>
								<option value="RS">Rio Grande do Sul</option>
								<option value="RO">Rondônia</option>
								<option value="RR">Roraima</option>
								<option value="SC">Santa Catarina</option>
								<option value="SP">São Paulo</option>
								<option value="SE">Sergipe</option>
								<option value="TO">Tocantins</option>
						</select>
						<span class="line"></span>
					</div>
				</div>

				<div class="col">
					<div class="inputBox">
						<input type="text" name="city" id="cidade" required="required" maxlength="80">
						<span class="text">Cidade</span>
						<span class="line"></span>
					</div>
				</div>

				<div class="col">
					<div class="inputBox">
						<input type="text" name="phone" id="telefone" required="required" maxlength="80">
						<span class="text">Telefone</span>
						<span class="line"></span>
					</div>
				</div>

				<?php
					if($_SESSION["tipo"] != "cliente") {
						?>
						
						<div class="col">
							<div class="inputBox">
								<input type="text" name="address" id="endereco" required="required" maxlength="80">
								<span class="text">Endereço</span>
								<span class="line"></span>
							</div>
						</div>

						<div class="col">
							<div class="inputBox">
								<input type="text" name="numComp" id="num_comp" required="required" maxlength="80">
								<span class="text">Número Complementar</span>
								<span class="line"></span>
							</div>
						</div>
						
						<div class="col descDiv">
							<div class="inputBox">
									<input type="text" name="description" id="desc" required="required" maxlength="200">
									<span class="text">Descrição</span>
									<span class="line"></span>
							</div>
						</div>

						<?php	
					}
				?>

			</div>

			<div class="contEnvPerfil">
					<input type="submit" value="ATUALIZAR">
				<?php
					if($_SESSION["tipo"] != "cliente") {
						?>
							<h5>Deseja ser Premium? <br> 
								<a class="link" id="premiumLink" onclick="togglePremium()">SEJA PREMIUM!</a>
							</h5>
							<h5>É Autorizada da marca? <br> 
								<a class="link" id="licenciadoLink" onclick="toggleLicenciado()">SIM!</a>
							</h5>
						<?php
					}
				
				?>
			</div>
		</form>
	</main>


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

    <script src="../libraries/Vanilla_masker/vanilla-masker.min.js"></script>

	<script>

		let nomeCompleto = document.querySelector("#nomeCompleto");
		let email = document.querySelector("#email");
		let telefone = document.querySelector("#telefone");
		let estado = document.querySelector("#estado");
		let cidade = document.querySelector("#cidade");
		let endereco = document.querySelector("#endereco");
		let numComplementar = document.querySelector("#num_comp");
		let desc = document.querySelector("#desc");
		
		let formulario = document.querySelector("form");

		let profilePhotoInput = document.querySelector("#profilePhotoInput")

		profilePhotoInput.addEventListener("change",async () => { 
				const formData = new FormData();

				formData.append("profilePhoto", profilePhotoInput.files[0])

				const url = "/server/php/updatePhoto.php";
				
				const options = {
						method: "POST",
						body: formData
				}

				await fetch(url,options)
				.then(function(response) {
            if (!response.ok) {
							throw Error(response.statusText);
            }
            return response;
        })
        .then((res) => {
					Swal.fire({
                title: 'Sucesso!',
                text: res.statusText,
                icon: 'success',
                confirmButtonText: "Ok"
							}).then((isConfirmed) => {if(isConfirmed) location.href = './perfil.php'})               
						})
						.catch((err) => {
							Swal.fire({
                title: 'Oops!',
                text: err,
                icon: 'error',
                confirmButtonText: "Tentar novamente"
            })
        });
		})
		
		formulario.addEventListener("submit", (e)=> {
			e.preventDefault();
			
			const formData = new FormData(formulario)
			
			const url = "/server/php/updateProfile.php";
        const options = {
					method: "POST",
            body: formData
					}
        
        fetch(url,options)
        .then(function(response) {
            if (!response.ok) {
							throw Error(response.statusText);
            }
            return response;
        })
        .then((res) => {
					Swal.fire({
                title: 'Sucesso!',
                text: res.statusText,
                icon: 'success',
                confirmButtonText: "Ok"
							}).then((isConfirmed) => {if(isConfirmed) location.href = './perfil.php'})               
						})
						.catch((err) => {
							Swal.fire({
                title: 'Oops!',
                text: err,
                icon: 'error',
                confirmButtonText: "Tentar novamente"
            })
        });
		})
		
		function togglePremium() {
			const url = `/server/php/togglePremium.php`;
			fetch(url)
			.then(function(response) {
					if (!response.ok) {
						throw Error(response.statusText);
					}
					return response;
			})
			.then((res) => {
				Swal.fire({
					title: 'Sucesso!',
					text: res.statusText,
					icon: 'success',
					confirmButtonText: "Ok"
				}).then((isConfirmed) => {if(isConfirmed) location.href = './perfil.php'})               
				})
				.catch((err) => {
					Swal.fire({
					title: 'Oops!',
					text: err,
					icon: 'error',
					confirmButtonText: "Tentar novamente"
				})
			});

		}
		function toggleLicenciado() {
			const url = `/server/php/toggleLicenciado.php`;
			fetch(url)
			.then(function(response) {
					if (!response.ok) {
						throw Error(response.statusText);
					}
					return response;
			})
			.then((res) => {
				Swal.fire({
							title: 'Sucesso!',
							text: res.statusText,
							icon: 'success',
							confirmButtonText: "Ok"
						}).then((isConfirmed) => {if(isConfirmed) location.href = './perfil.php'})               
					})
					.catch((err) => {
						Swal.fire({
							title: 'Oops!',
							text: err,
							icon: 'error',
							confirmButtonText: "Tentar novamente"
					})
			});
		}
		
		function inputHandler(masks, max, event) {
			let c = event.target;
			let v = c.value.replace(/\D/g, '');
			let m = c.value.length > max ? 1 : 0;
			VMasker(c).unMask();
			VMasker(c).maskPattern(masks[m]);
			c.value = VMasker.toPattern(v, masks[m]);
		}
		
		async function getUserData() {
			const url = `/server/php/profilePageData.php`;
			
				const res = await fetch(url);
				const data = await res.json();

				if(data.endereco) {
					if(data.premium == 1) {
						desc.value = data.descricao
						let premiumLink = document.querySelector("#premiumLink");

						premiumLink.innerText = "Deixar de ser membro"
					} else {
						let descDiv = document.querySelector(".descDiv");
						descDiv.remove();
					}

					if(data.licenciado == 1) {
						let licenciadoLink = document.querySelector("#licenciadoLink");

						licenciadoLink.innerText = "Deixar de ser licenciado"
					}
				}

				nomeCompleto.value = data.nome
				email.value  = data.email
				telefone.value  = data.telefone
				estado.value  = data.estado
				cidade.value  = data.cidade
				
				if(data.tipo == "tecnico") {
					endereco.value = data.endereco
					numComplementar.value = data.numero_complementar
				
				}
				
				let telMask = ['(99) 9999-99999', '(99) 99999-9999'];
				VMasker(telefone).maskPattern(telMask[0]);
				telefone.addEventListener('input', inputHandler.bind(undefined, telMask, 14), false);
				
		}

		function readURL(input) {
				
				if (input && input[0]) {
						const profilePhoto = document.querySelector(".userPic");
						let reader = new FileReader();

						reader.addEventListener("load", function () {
								profilePhoto.src = reader.result;
						}, false);

						if (input[0]) {
								reader.readAsDataURL(input[0]);
						}
				}
		}
		
		document.addEventListener("DOMContentLoaded", async function(event) {
        
			getUserData();

			
			
			
		});

	</script>

</body>

</html>