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
									
									<?php  
										if($info["ds_message"]) {
											?>
											<p><?php echo $info["ds_message"]; ?></p>
											<?php
										} else {
											$ext = pathinfo($info["md_file"], PATHINFO_EXTENSION);
											if(
												$ext == "png" ||
												$ext == "jpeg" ||
												$ext == "jpg" ||
												$ext == "svg"
											) {
												?>
												<div>
													<img src="/server/uploads/<?php echo $info["fk_conversa"]."/".$info["md_file"]; ?>" alt="">	
												</div>
												<?php 
											} else {
												?>
												<a href="/server/uploads/<?php echo $info["fk_conversa"]."/".$info["md_file"]; ?>" download><?php echo $info["md_file"]; ?></a>
												<?php
											}
										}
										?>

										<span><?php echo $info["dt_creation"]; ?> //</span>
										
									</div>
								</div>
							<?php
						}
					?>
					</div>
						<form class="messageForm">
							<label class="custom-file-upload">
									<input type="file" name="arquivo" id="arquivo">
							</label>
							<input type="text" name="message" id="message" autocomplete="off">
							<!-- <button type="submit" class="sendButton"> <img src="/frontEnd/assets/images/send.svg" alt=""> </button> -->
						</form>
					<?php
            
        } else {
            ?>
                <div class="Chat">

                </div>
                <form class="messageForm">
								<label class="custom-file-upload">
									<input type="file" name="arquivo" id="arquivo">
							</label>
                    <input type="text" name="message" id="message"  autocomplete="off">
                </form>

            <?php
        }

    } 
    

    ?>