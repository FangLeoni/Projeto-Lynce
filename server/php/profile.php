<?php

    session_start();
    include_once '../classes/clientes.php';
    include_once '../classes/tecnicos.php';

    $tipo = $_SESSION["tipo"];
    $email = $_SESSION['email'];

    if($tipo == "cliente") {
        $clienteClass = new Clients();
        $clienteClass->setClientEmail($email);

        $res = $clienteClass->getClientDataByEmail();
    } else {
        $tecnicoClass = new Technicians();
        $tecnicoClass->setTechEmail($email);
        
        $res = $tecnicoClass->getTechDataByEmail();
    }
    
    if($res) {
        ?>
            <div class="topCont">
            <p class="voltar" onclick="loadInbox()"><--</p>

                <div class="photoCont" onclick="loadInbox()">
                    <img src="/server/profilePics/<?php echo $_SESSION['codigo']?>/<?php echo $_SESSION['profPic'] ?>" alt="perfil" class="selected">
                </div>
            </div>

            <div class="profileCont">
                <div class="imgProfCont">
                    <!-- <form method="post" enctype="multipart/form-data" id="uploadPic" action="/server/php/updatePhoto.php"> -->
                    <form method="post" enctype="multipart/form-data" id="uploadPic" >
                        <img src="/server/profilePics/<?php echo $_SESSION['codigo']?>/<?php echo $_SESSION['profPic'] ?>" alt="perfil" id="profilePhoto" >
                        <input type="file" name="profilePhoto" id="profilePhotoInput" accept="image/*" onchange="readURL(this.files)" >
                        <!-- <span><button>/</button></span> -->
                        <span>/</span>
                    </form>
                </div>

                <form class="profInfoCont">
                    <div class="inputCont">
                        <label for="name">Nome</label>
                        <input type="text" name="name" id="name" autocomplete="off" value="<?php echo $tipo == 'cliente' ? $res['nm_cliente'] : $res['nm_tecnico']; ?>">
                    </div>
                    <div class="inputCont">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" autocomplete="off" value="<?php echo $res['ds_email']; ?>">
                    </div>
                    <div class="inputCont">
                        <label for="state">Estado</label>
                        <input type="text" name="state" id="state" autocomplete="off" value="<?php echo $res['sg_estado']; ?>">
                    </div>
                    <div class="inputCont">
                        <label for="city">Cidade</label>
                        <input type="text" name="city" id="city" autocomplete="off" value="<?php echo $res['nm_cidade']; ?>">
                    </div>
                    <div class="inputCont">
                        <label for="phone">Telefone</label>
                        <input type="text" name="phone" id="phone" autocomplete="off" value="<?php echo $res['ds_telefone']; ?>">
                    </div>
                    <?php if($tipo == "tecnico") {
                        ?>
                    <div class="inputCont">
                        <label for="address">Endereço</label>
                        <input type="text" name="address" id="address" autocomplete="off" value="<?php echo $res['ds_endereco']; ?>">
                    </div>
                    <div class="inputCont">
                        <label for="numComp">Numero Complementar</label>
                        <input type="text" name="numComp" id="numComp" autocomplete="off" value="<?php echo $res['ds_numero_complementar']; ?>">
                    </div>
                        <?php
                    } ?>
                    <button>Atualizar</button>
                </form>
            </div>
        

        <?php

    } else {
        $res;
    }

?>


        