<?php
    $conexao = mysqli_connect("localhost","root","","projetoLynce");

    if(mysqli_connect_errno())
    {
        echo "A conexão MYSQLi apresentou erro: " . mysqli_connect_error();
    }

    $cond1 = isset($_POST['nome']) /*&& isset($_POST['usuario']) */ && isset($_POST['senha'])&& isset($_POST['confSenha']);
    $cond2 = isset($_POST['estado']) && isset($_POST['cidade']) && isset($_POST['tel']) && isset($_POST['tipo_conta']);

    if($_POST['estado'] == 'null') {
        echo "<script>confirm('Estado não selecionado!', window.location.href='../pages/cadastro.html')</script>";
    }
    
    if( $cond1 && $cond2 && isset($_POST['email'])) {
            $nome_usuario = mysqli_escape_string($conexao, $_POST['nome']);
            // $apelido_usuario = mysqli_escape_string($conexao, $_POST['usuario']);
            $senha_usuario = mysqli_escape_string($conexao, $_POST['senha']);
            $confSenha_usuario = mysqli_escape_string($conexao, $_POST['confSenha']);
            $estado_usuario = mysqli_escape_string($conexao, $_POST['estado']);
            $cidade_usuario = mysqli_escape_string($conexao, $_POST['cidade']);
            $tel_usuario = mysqli_escape_string($conexao, $_POST['tel']);
            $email_usuario = mysqli_escape_string($conexao, $_POST['email']);

            if($senha_usuario != $confSenha_usuario ) {
                echo "<script>confirm('Senhas diferentes', window.location.href='../pages/cadastro.html')</script>";
            }

            
            function usuChecker($usu) {

                global $conexao;

                $cod_id = crc32(uniqid());
                $seleciona_usu = "select * from tb_usuarios where ds_email = '$usu'";

    
                $procura = mysqli_query($conexao,$seleciona_usu);
                
                $checa_usuario = mysqli_num_rows($procura);
                
                if($checa_usuario > 0 ) {
                    echo "<script>confirm('Usuario já cadastrado, tente novamente!', window.location.href='../pages/cadastro.html')</script>";
                }
                else {
                    return $cod_id;
                }

            };
            
            $cd_id = usuChecker($email_usuario);

            $senha_usuario = sha1($senha_usuario);

        if($_POST['tipo_conta'] == "usuario") {
            
            $envia_usuario = "insert into tb_usuarios (
                cd_usuario, 
                nm_usuario,
                ds_email,
                ds_senha,
                ds_telefone,
                sg_estado,
                nm_cidade 
            ) values (
                '$cd_id',
                '$nome_usuario',
                '$email_usuario',
                '$senha_usuario',
                '$tel_usuario',
                '$estado_usuario',
                '$cidade_usuario'
            )";

            echo $envia_usuario;

            $envia = mysqli_query($conexao,$envia_usuario);

            echo $envia;

            if($envia) {
                header("Location:../pages/index.html");

            }

            else {
                echo "<script>confirm('Cadastro teve um erro, tente novamente!', window.location.href='../pages/cadastro.html')</script>";
            }
        } else {

            if(!isset($_POST['endereco'])) {
                echo "<script>confirm('Endereço não definido', window.location.href='../pages/cadastro.html')</script>";
            } else {
                $endereco_usuario = $_POST['endereco'];
            }
            if(isset($_POST['num_complementar'])) {
                $num_complementar_usuario = $_POST['num_complementar'];
            } else {
                $num_complementar_usuario = null;
            }

            $envia_tecnico = "insert into tb_tecnicos (
                cd_tecnico,
                nm_tecnico,
                ds_email,
                ds_senha,
                ds_telefone,
                sg_estado,
                nm_cidade,
                ds_endereco,
                qt_numero_complementar
            ) values (
                '$cd_id',
                '$nome_usuario',
                '$email_usuario',
                '$senha_usuario',
                '$tel_usuario',
                '$estado_usuario',
                '$cidade_usuario',
                '$endereco_usuario',
                '$num_complementar_usuario'
            )";

            echo $envia_tecnico;

            $envia = mysqli_query($conexao,$envia_tecnico);

            echo $envia;

            if($envia) {
                header("Location:../pages/index.html");
                echo "lololo";
            }

            else {
                echo "<script>confirm('Cadastro teve um erro, tente novamente!', window.location.href='../pages/cadastro.html')</script>";
                // , window.location.href='../pages/cadastro.html'
            }
        }
    }

?>