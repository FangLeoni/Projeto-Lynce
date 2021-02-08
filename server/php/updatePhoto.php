<?php
    session_start();

    $mainCode = $_SESSION["codigo"];
    $mainEmail = $_SESSION["email"];
    $tipo = $_SESSION["tipo"];

    include_once '../classes/clientes.php';
    include_once '../classes/tecnicos.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $imagename = $_FILES['profilePhoto']['name'];
        $imagetemp = $_FILES['profilePhoto']['tmp_name'];
        $imagePath = "../profilePics/" . $mainCode . "/";
        if (!is_dir($imagePath)) {
            mkdir($imagePath, 0777, true);
        }

        if(is_uploaded_file($imagetemp)) {
            $files = glob($imagePath."*");
            foreach($files as $file){
                if(is_file($file)) {
                    unlink($file);
                }
            }

            if(move_uploaded_file($imagetemp, $imagePath.$imagename)) {
                if($tipo == "cliente"){
                    $clienteClass = new Clients();
                    $clienteClass->setClientEmail($mainEmail);
                    $clienteClass->setClientPhoto($imagename);

                    $res = $clienteClass->updateClientProfilePhoto();
                } else {
                    $tecnicoClass = new Technicians();
                    $tecnicoClass->setTechEmail($mainEmail);
                    $tecnicoClass->setTechPhoto($imagename);

                    $res = $tecnicoClass->updateTechProfilePhoto();
                }

                if($res) {
                    $_SESSION["profPic"] = $imagename;
                    echo $res;
                }else {
                    die(header("HTTP/1.0 401 Erro ao guardar imagem na base de dados"));
                }
            }
        }
        else {
            die(header("HTTP/1.0 401 Erro no upload da imagem"));
        }
    } else {
        die(header("HTTP/1.0 401 Faltam Parametros"));
    }

    // $target_dir = "../profilePics/" . $mainCode . "/";
    // if (!is_dir($target_dir)) {
    //     mkdir($target_dir, 0777, true);
    // }
    // $files = glob($target_dir."*"); // get all file names
    // foreach($files as $file){ // iterate files
    //     if(is_file($file)) {
    //         unlink($file); // delete file
    //     }
    // }
    // $target_file = $target_dir . basename($_FILES["profilePhoto"]["name"]);
    // $uploadOk = 1;
    // $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    

    // if (move_uploaded_file($_FILES["profilePhoto"]["tmp_name"], $target_file)) {
    //     header("HTTP/1.0 200 Foto atualizada com sucesso");
    // } else {
    //     echo "Sorry, there was an error uploading your file.";
    //     die(header("HTTP/1.0 422 Erro ao subir o arquivo"));
    // }

    
?>