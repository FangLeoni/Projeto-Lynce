<?php
    session_start();
    // include 'conexao.php';
    include_once '../classes/conversas.php';

    $idConversa = $_GET["id"];
    $otherUsu = $_GET["otherUsu"];
    $mainUsu = $_SESSION["codigo"];
    $tipo = $_SESSION['tipo'];
    if(isset($idConversa) && isset($otherUsu)){
        $mensagens = new Messages();
        $mensagens->setUserType($tipo);
        $mensagens->setMainUserCode($mainUsu);
        $mensagens->setOtherUserCode($otherUsu);

        $mensagens->setConvCode($idConversa);
        
        $mensagens->createConv();

        $infos = $mensagens->getMessages();
        if($infos != false) {
                
                ?>
                <div class="Chat">
                <?php
                    foreach($infos as $info){
                        ?>
                            <div class="<?php echo $info['cd_main'] == $mainUsu ? "main" : "other"; ?>MessageCont">
                                <div class="<?php echo $info['cd_main'] == $mainUsu ? "main" : "other"; ?>UserCont">
                                    <p><?php echo $info["ds_message"]; ?></p>
                                    <span><?php echo $info["dt_creation"]; ?> //</span>
                                </div>
                            </div>
                        <?php
                    }
                ?>
                </div>
                    <form class="messageForm">
                        <input type="text" name="message" id="message" autocomplete="off">
                        <button type="submit" class="sendButton"> > </button>
                    </form>
                <?php
            
        } else {
            ?>
                <div class="Chat">

                </div>
                <form class="messageForm">
                    <input type="text" name="message" id="message">
                    <button type="submit" class="sendButton"> > </button>
                </form>

            <?php
        }

    } 
    

    ?>