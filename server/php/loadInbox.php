<?php 
    session_start();
    include_once '../classes/conversas.php';

    $tipo = $_SESSION["tipo"];
    $codigo = $_SESSION["codigo"];

    $mensagens = new Messages();
    $mensagens->setMainUserCode($codigo);
    $mensagens->setUserType($tipo);

    $infos = $mensagens->getConv();

    if($infos != false) {

        foreach($infos as $info){
            
            ?>

                <div class="userConversation" onclick="chat(<?php echo $info['cd_conversa']; ?>,<?php echo $tipo == 'cliente' ? $info['cd_tecnico'] : $info['cd_usuario']; ?>); subscribe(<?php echo $info['cd_conversa']; ?>) ;">
                        <img src="/server/profilePics/<?php echo $info['md_picture']; ?>" alt="user">
                        <div>
                            <h4><?php echo $tipo == 'cliente' ? $info['nm_tecnico'] : $info['nm_usuario']; ?></h4>
                            <h4><?php echo $info['nm_cidade']; ?></h4>
                        </div>
                    </div>
            <?php
        }
        
    } else {
        echo "<p class='noResults'>Sem resultados</p>";
    }

    // $sql = "SELECT cd_" . $tipo . " FROM tb_" . $tipo . "s WHERE ds_email LIKE '$email' ";

    
    // $query = mysqli_query($conexao,$sql);
    // $codigo = $query->fetch_assoc();
    
    // // echo $codigo['cd_usuario'];

    // $codigo = $codigo['cd_'. $tipo];
    
    // // $sql = "SELECT fk_" . $outro . " FROM tb_conversas WHERE fk_" . $tipo . " = '$codigo' ";

    // $sql = "SELECT cd_conversa, tc.nm_" . $outro . ", tc.nm_cidade, tc.md_picture FROM tb_conversas AS conv  
    //         JOIN tb_" . $outro . "s AS tc ON conv.fk_" . $outro . " = tc.cd_" . $outro . "
    //         WHERE fk_" . $tipo . " = '$codigo'";

    // // echo $sql;
    // $query = mysqli_query($conexao,$sql);

    // $count = mysqli_num_rows($query);

    // if($count < 1) {
    //     echo "<p class='noResults'>Sem conversas anteriores</p>";

    // } else {
    //     while($user = $query->fetch_assoc()){
    //         ?>
    <!-- //             <div class="userConversation" onclick="chat(<?php //echo $user['cd_conversa'] ?>)" >
    //                 <img src="../../profilePics/<?php //echo $user['md_picture']; ?>" />
        
    //                 <div>
    //                     <h4><?php //echo $user['nm_'. $outro] ?></h4>
    //                     <h4><?php //echo $user['nm_cidade']; ?></h4>
    //                 </div>
    //             </div> -->
    <?php 
    //     }
    // }

    // mysqli_close($conexao);
  
?>


    
    
  


