
<?php	

 //vá na pagina do GMAIL :
// https://myaccount.google.com    clique em SEGURANÇA, depois abaixo em "acesso a app menos seguro" clique am "ativar acesso", na página que abrir ative a opção de permissão.

	$mail = new PHPMailer(true);
	$mail->IsSMTP(); 
	$mail->CharSet = 'UTF-8';
	$mail->Host = "smtp.gmail.com"; // SMTP servers do gmail, se o seu for outro, pesquise como referenciar
	$mail->Port = 587; //serve no gmail
	$mail->SMTPAuth = true; // Caso o servidor SMTP precise de autenticação
	$mail->Username = "lucas.fontes04@gmail.com"; // SMTP username
	$mail->Password = "bater1sta"; // SMTP password  COLOQUE A SENHA 
	$mail->From = "lucas.fontes04@gmail.com"; // From
	$mail->FromName = "Empresa" ; // Nome de quem envia o email
	$mail->AddAddress($mailDestino, $nome); // Email e nome de quem receberá //Responder
	$mail->WordWrap = 50; // Definir quebra de linha
	$mail->IsHTML = true ; // Enviar como HTML
	$mail->Subject = $assunto ; // Assunto
	$mail->Body = '<br/>' . $mensagem . '<br/>' ; //Corpo da mensagem caso seja HTML
	$mail->AltBody = "$mensagem" ; //PlainText, para caso quem receber o email não aceite o corpo HTML

	if(!$mail->Send()) // Envia o email
	{	
		echo "Erro no envio da mensagem";
	}	
?>