<!DOCTYPE html>
<html lang="pt-br"> 
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../assets/images/logo_semFundo.png" type="image/x-icon">
	<title>Recuperar Senha</title>
	<!--Bootstrap -->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
	
	<!-- ---- CSS ---- -->
    <link rel="stylesheet" href="../../themes/global.css">
	<link rel="stylesheet" href="../styles/requisitarMudancaSenha.css">
    <!-- ------------- -->

	<!-- ---- Sweet_Alert2 ---- -->
    <link rel="stylesheet" href="../libraries/Sweet_alert2/sweetalert2.css">
    <script src="../libraries/Sweet_alert2/sweetalert2.js"></script>
    <!-- ---------------------- -->
</head>

<body>
	<header>
        <h1>PROJETO</h1>  
        <a href="./index.html">
            <img src="../../assets/images/logo_semFundo.png" alt="logo" class="logo">
        </a>
        <h1>LYNCE</h1>
    </header>

	<div class="container">
		
		<h2>Atenção</h2>

		<div class="atencao">
			<p>
				Insira o seu email para receber o link de troca de senha.
				Pode levar algum tempo até que receba, então fique de olho no seu inbox e 
				caso não apareça, olhe na caixa de spam.
			</p>
		</div>

        <form>
            <div class="col">
                <div class="inputBox">
                    <input type="email" name="email" id="email" required="required">
                    <span class="text" >Email</span>
                    <span class="line" ></span>
                </div>
            </div>
            <input type="submit" value="Enviar" >
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

    <script>
        let formulario = document.querySelector("form");

        formulario.addEventListener("submit",(e)=>{
            e.preventDefault();

            const formData = new FormData(formulario)

            const url = "/server/php/mandarEmail.php";
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
                    text: "Email enviado com sucesso!",
                    icon: 'success',
                    confirmButtonText: "Ok"
                })        
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

    </script>
</body>
</html>