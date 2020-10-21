<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        $_SESSION['logado']=false;

                                  //local      login  senha   banco
        $conexao = mysqli_connect("localhost","root","","projetoLynce");

        if(mysqli_connect_errno())
        {
            echo "Aconexão MYSQLi apresentou erro: " . mysqli_connect_error();
        }

        if(isset($_POST['email'])) {
            $login_usuario = mysqli_escape_string($conexao, $_POST['email']);
            $senha_usuario = mysqli_escape_string($conexao, $_POST['senha']);

            $senha_usuario =  sha1($senha_usuario);

            $seleciona_usuario = "select * from tb_usuarios where ds_email = '$login_usuario' and
            ds_senha= '$senha_usuario'";

            $procura = mysqli_query($conexao,$seleciona_usuario);

            $checa_usuario = mysqli_num_rows($procura);


            if($checa_usuario > 0 ) {
                $_SESSION['logado'] = true;
                $_SESSION['usu'] = $login_usuario;
                header("Location:../pages/home.php");
            }

            else {
                echo "<script>confirm('Login ou senha com erro, tente novamente!', window.location.href='../pages/index.html')</script>";
            }
        }
    ?>
</body>
</html>