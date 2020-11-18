<?php 
    session_start();
    include 'conexao.php';

    if(isset($_GET["pesquisa"])) {
        echo "Chegou";
        $usuario = $_SESSION['usu'];
        $pesquisado = mysqli_escape_string($conexao,$_GET["pesquisa"]);
        
        $seleciona = $conexao->prepare("SELECT nm_tecnico, nm_cidade, md_picture FROM tb_tecnicos 
                                                 WHERE ds_email = '$pesquisado' ORDER BY nm_tecnico DESC LIMIT 20");
        $seleciona->execute();
        $result = $seleciona->get_result();
        $count = $result->num_rows;

        if($count < 1) {
            echo "<p class='noResults'>Sem resultados</p>";
            exit("dswddadwadw");
        } else {
            while($user = $result->fetch_assoc()){
               ?>
                    <div class="row" onclick="$('#searchContainer').hide(); chat('<?php echo $user['cd_id']; ?>');" >
                        <img src="profilePics/<?php echo $user['md_Picture']; ?>" />
                        <p><?php echo $user['nm_Username']; ?></p>
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
        

    } else {
        echo "Failed to send data";
    }

    
?>