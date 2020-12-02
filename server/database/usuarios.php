<?php
    session_start();
    include 'conexao.php';

    class usuarios {
        private $id;
        private $nome;
        private $email;
        private $loginStatus;



        function getTecnico($email) {
            $sql = "SELECT cd_tecnico FROM tb_tecnicos WHERE ds_email LIKE '$email' ";
    
            $query = mysqli_query($conexao,$sql);
            $codigo = $query->fetch_assoc();
            
            // echo $codigo['cd_usuario'];
        
            $codigo = $codigo['cd_'. $tipo];
        }
        
        
    }

?>