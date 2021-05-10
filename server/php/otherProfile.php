<?php

    session_start();
    include_once '../classes/clientes.php';
    include_once '../classes/tecnicos.php';

    $tipo = $_SESSION["tipo"];
    $otherId = $_GET["otherId"];

    if($tipo == "cliente") {
        $tecnicoClass = new Technicians();
        $tecnicoClass->setTechId($otherId);
        
        $res = $tecnicoClass->getTechDataByCode();
    } else {
        $clienteClass = new Clients();
        $clienteClass->setClientId($otherId);

        $res = $clienteClass->getClientDataByCode();
    }
    
    if($res) {
        ?>
            <div class="topCont">
                <p class="voltar" onclick="loadInbox()"><--</p>

                <div class="photoCont" onclick="loadInbox()">
                    <img src="/server/profilePics/<?php echo $_SESSION['codigo']?>/<?php echo $_SESSION['profPic']; ?>" alt="perfil" >
                </div>
            </div>

            <div class="profileCont">
                <div class="imgProfCont">
                    <div id="uploadPic" >
                        <img src="/server/profilePics/<?php echo $tipo == 'cliente' ? $res['cd_tecnico'] : $res['cd_cliente']; ?>/<?php echo $tipo == 'cliente' ? $res['md_picture'] : $res['md_Picture']; ?>" alt="perfil" id="profilePhoto" >
                    </div>
                </div>

                <form class="profInfoCont">
                    <div class="inputCont">
                        <label for="name">Nome</label>
                        <p><?php echo $tipo != 'cliente' ? $res['nm_cliente'] : $res['nm_tecnico']; ?></p>
                    </div>
                    <div class="inputCont">
                        <label for="email">Email</label>
                        <p><?php echo $res['ds_email']; ?></p>
                    </div>
                    <div class="inputCont">
                        <label for="state">Estado</label>
                        <p><?php echo $res['sg_estado']; ?></p>
                    </div>
                    <div class="inputCont">
                        <label for="city">Cidade</label>
                        <p><?php echo $res['nm_cidade']; ?></p>
                    </div>
                    <div class="inputCont">
                        <label for="phone">Telefone</label>
                        <p><?php echo $res['ds_telefone']; ?></p>
                    </div>
                    <?php if($tipo != "tecnico") {
                        ?>
                    <div class="inputCont">
                        <label for="address">Endereço</label>
                        <p><?php echo $res['ds_endereco']; ?></p>
                    </div>
                    <div class="inputCont">
                        <label for="address">Numero Complementar</label>
                        <p><?php echo $res['ds_numero_complementar']; ?></p>
                    </div>
                        <?php
                    } ?>
                </form>
            </div>
        

        <?php

    } else {
        $res;
    }

?>


        