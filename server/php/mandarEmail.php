<?php 
		if ($_POST) 
		{
			//Carrega as classes do PHPMailer
			include("../phpmailer/class.phpmailer.php"); 
			include("../phpmailer/class.smtp.php"); 
			
			//envia o e-mail para o visitante do site
			$mailDestino = $_POST['email']; 
			$nome = "Usuario";
			$mensagem = "Entre neste link para mudar a sua senha <br><br> <a href='localhost/frontEnd/src/pages/recuperarSenha.php'>RECUPERAR</a>";
			$assunto = "Recuperação de senha";
			include("../classes/mailerClass.php");
			
			//envia o e-mail para o administrador do site
			$mailDestino = 'lucas.fontes04@gmail.com'; 
			$nome = 'Projeto Lynce';	
			$assunto = "Mensagem recebida do site";
			$mensagem = "Recebemos uma mensagem no site <br/>
			<strong>e-mail:</strong> $_POST[email]<br/>";
			include("../classes/mailerClass.php");
			
		}
	?>