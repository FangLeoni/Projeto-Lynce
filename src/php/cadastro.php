<?php
    $conexao = mysqli_connect("localhost","root","","projetoLynce");

    if(mysqli_connect_errno())
    {
        echo "Aconexão MYSQLi apresentou erro: " . mysqli_connect_error();
    }

    $cond1 = isset($_POST['nome']) && isset($_POST['usuario']) && isset($_POST['senha']);
    $cond2 = isset($_POST['estado']) && isset($_POST['cidade']) && isset($_POST['tel']);

    if( $cond1 && $cond2 ) {
        $nome_usuario = mysqli_escape_string($conexao, $_POST['nome']);
        $apelido_usuario = mysqli_escape_string($conexao, $_POST['usuario']);
        $senha_usuario = mysqli_escape_string($conexao, $_POST['senha']);
        $estado_usuario = mysqli_escape_string($conexao, $_POST['estado']);
        $cidade_usuario = mysqli_escape_string($conexao, $_POST['cidade']);
        $tel_usuario = mysqli_escape_string($conexao, $_POST['tel']);
        

        
        function usuChecker($usu) {

            global $conexao;

            $cod_id = crc32(uniqid());
            $seleciona_usu = "select * from tb_usuarios where nm_apelido = '$usu'";

 
            $procura = mysqli_query($conexao,$seleciona_usu);
            
            $checa_usuario = mysqli_num_rows($procura);
            
            if($checa_usuario > 0 ) {
                echo "<script>confirm('Usuario já cadastrado, tente novamente!', window.location.href='../pages/cadastro.html')</script>";
            }
            else {
                echo "Passou";
                return $cod_id;
            }

        };
        
        $cd_id = usuChecker($apelido_usuario);

        $senha_usuario = sha1($senha_usuario);

        $envia_usuario = "insert into tb_usuarios values (
            '$cd_id',
            '$nome_usuario',
            '$apelido_usuario',
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
            echo "lololo";
        }

        else {
            echo "<script>confirm('Cadastro teve um erro, tente novamente!')</script>";
            // , window.location.href='../pages/cadastro.html'
        }
    }

?>