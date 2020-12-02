<?php 
    session_start();
    include 'conexao.php';

    if(isset($_GET["pesquisa"])) {
        // echo "Chegou";
        $tipo = $_SESSION['tipo'];
        $email = mysqli_escape_string($conexao,$_GET["pesquisa"]);


        if($tipo == "usuario") {
            $outro = "tecnico";
        } else {
            $outro = "usuario";
        }


        $sql = "SELECT cd_" . $outro . ", nm_" . $outro . ", nm_cidade, md_picture FROM tb_" . $outro . "s WHERE ds_email LIKE '$email%' ";

        
        // echo $sql;


        $procura =  mysqli_query($conexao,$sql);
        $count = mysqli_num_rows($procura);

        if($count < 1) {
            echo "<p class='noResults'>Sem resultados</p>";

        } else {
            while($user = $procura->fetch_assoc()){
               ?>
                    <div class="userConversation" >
                        <img src="../../profilePics/<?php echo $user['md_picture']; ?>" />
            
                        <div>
                            <h4><?php echo $user['nm_'. $outro]; ?></h4>
                            <h4><?php echo $user['nm_cidade']; ?></h4>
                        </div>
                    </div>
                <?php 
            }
        }

        // if($count < 1) {
        //     echo "<p class='noResults'>Sem resultados</p>";
        // } else {
        //     while($user = $result->fetch_assoc()){
        //         
        //             <img src="../../assets/icons/user.svg" alt="user">
        //             <div>
        //                 <h4>$user[nm_tecnico]</h4>
        //                 <h4>$user[nm_cidade]</h4>
        //             </div>
        //         
        //     }
        // }

        // <div class="row"  >
        //                 <img src="../../profilePics/<?php // echo $user['md_Picture']; " />
        //                 <p><?php // echo $user['nm_tecnico']; </p>
        //             </div> 
        

    } else {
        echo "Failed to send data";
    }

    
?>