<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include 'conexao.php';

        session_start();
        $_SESSION['logado']=false;


        if(isset($_POST['email']) && isset($_POST['senha'])) {
            $login_usuario = mysqli_escape_string($conexao, $_POST['email']);
            $senha_usuario = mysqli_escape_string($conexao, $_POST['senha']);

            function checaUsuario($login,$conexao) {
                $seleciona_usuario = "select * from tb_usuarios where ds_email = '$login'";

                $procura = mysqli_query($conexao,$seleciona_usuario);

                $checa_usuario = mysqli_num_rows($procura);

                return $checa_usuario > 0 ;
            }

            function checaTecnico($login,$conexao) {
                $seleciona_usuario = "select * from tb_tecnicos where ds_email = '$login'";

                $procura = mysqli_query($conexao,$seleciona_usuario);

                $checa_tecnico = mysqli_num_rows($procura);

                return $checa_tecnico > 0 ;
            }

            function verificaSenha($login,$senha_usuario,$conexao,$tipo) {
                $sql = "select ds_senha from $tipo where ds_email='$login'";
			
                $query = $conexao->query($sql);
                
                $res = $query->fetch_object();

                $password_hash = $res->ds_senha;
                echo  "<br/>";
                echo $password_hash . "<br/>";
                echo password_hash($senha_usuario, PASSWORD_ARGON2I) . "<br/>";

                $verify = password_verify($senha_usuario,$password_hash);
                echo $verify;
                return $verify;
            }


            if( checaUsuario($login_usuario,$conexao)) {
                $tipo = "tb_usuarios";
                                 
            }
            elseif (checaTecnico($login_usuario,$conexao)) {
                $tipo = "tb_tecnicos";
            }
            else {
                echo "<script>confirm('Login com erro, tente novamente!', window.location.href='../pages/index.html')</script>";
            }

            if (verificaSenha($login_usuario,$senha_usuario,$conexao, $tipo)) {
                $_SESSION['logado'] = true;
                $_SESSION['usu'] = $login_usuario;
                $_SESSION['tipo'] = substr($tipo, 3,-1);
                header("Location:../pages/home.php");
            }

            else {
                echo "<script>confirm('Senha com erro, tente novamente!', window.location.href='../pages/index.html')</script>";
            
            }
        }
    ?>
</body>
</html>