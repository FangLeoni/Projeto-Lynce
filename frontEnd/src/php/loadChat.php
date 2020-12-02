<?php
    session_start();
    include 'conexao.php';

    $idConversa = $_GET["id"];
    $tipo = $_SESSION["tipo"];
    $email = $_SESSION["usu"];


    if(isset($idConversa)) {

        $_SESSION["conv"] = $idConversa;

        if($tipo == "usuario") {
            $outro = "tecnico";
        } else {
            $outro = "usuario";
        }
        
        $sql = "SELECT cd_" . $tipo . " FROM tb_" . $tipo . "s WHERE ds_email LIKE '$email' ";
    
        
        $query = mysqli_query($conexao,$sql);
        $codigo = $query->fetch_assoc();
    
        $codigo = $codigo['cd_'. $tipo];

        // echo $codigo;

        $sql = "SELECT ds_message, cd_main FROM tb_chats WHERE fk_conversa LIKE $idConversa ORDER BY dt_creation ";
        // echo $sql;

        $query = mysqli_query($conexao,$sql);

        $count = mysqli_num_rows($query);

        if($count < 1) {
            echo "<p class='noResults'>Sem conversas anteriores</p>";

        } else {
            while($message = $query->fetch_assoc()){
                ?>
                    <div class="<?php echo $message['cd_main'] == $codigo ? "main" : "other"; ?>UserContainer">
                        <div class="<?php echo $message['cd_main'] == $codigo ? "main" : "other"; ?>UserMessage">
                            <p>
                                <?php echo $message["ds_message"]; ?>
                            </p>
                        </div>
                    </div>
                <?php 
            }
        }

        mysqli_close($conexao);

    } else {
        echo "Erro";
    }

?>