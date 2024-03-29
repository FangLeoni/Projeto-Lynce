<?php

	include_once("../connection/conexao.php");

    class Messages {
        public $db;
        public $convId;
        public $chatId;
        public $tipo;
        public $main;
        public $other;

		public function __construct() {
			$connection = new DbConnect();
			$this->db = $connection->connect();
        }
        
        public function setConvCode ( $convId=0 ) { 
                
                // if($convId == 0){
                //     // $bytes = random_bytes(30);
                //     // $this->convId = bin2hex($bytes);
                //     $this->convId = rand(-10000,2147483646);
                // } else {
                //     $this->convId = $convId;
                // }

                if($convId == 0) {
                    $bytes = random_bytes(30);  
                    $this->convId = bin2hex($bytes);
                } else {
                    $this->convId = $convId;
                }
        }
        public function setChatCode ($code = 0) {
            // if($code == 0) {
            //     $this->chatId = rand(-10000,2147483646);
            // } else {
            //     $this->chatId = $code;
            // }

            if($code == 0) {
				$bytes = random_bytes(30);  
				$this->chatId = bin2hex($bytes);
			} else {
				$this->chatId = $code;
			}
        }
        public function setMainUserCode ( $main ) { $this->main = $main; }
        public function setOtherUserCode ( $other ) { $this->other = $other; }
        public function setUserType ( $tipo ) { $this->tipo = $tipo; }

        public function getConv($specify=false) {
            if(!$specify){
                if($this->tipo == "cliente") {
                    $sql = $this->db->prepare("SELECT cd_conversa,tc.cd_tecnico, tc.nm_tecnico, tc.nm_cidade, tc.md_picture FROM tb_conversas AS conv  
                                           JOIN tb_tecnicos AS tc ON conv.fk_tecnico = tc.cd_tecnico
                                           WHERE fk_cliente = ?"
                    );
                } else {
                    $sql = $this->db->prepare("SELECT cd_conversa, tc.cd_cliente, tc.nm_cliente, tc.nm_cidade, tc.md_picture FROM tb_conversas AS conv  
                                           JOIN tb_clientes AS tc ON conv.fk_cliente = tc.cd_cliente
                                           WHERE fk_tecnico = ?"
                    );
                }
                $sql->execute(array($this->main));
                
                $count = $sql->rowCount();
                
                $lista = array();
    
                if($count > 0) {
    
                    while($res = $sql->fetch(PDO::FETCH_ASSOC)){
                        array_push($lista, $res);
                    }
                    return $lista;
                    
                } else {
                    return false;
                }
            } else {
                $sql = $this->db->prepare("SELECT * FROM tb_conversas 
                                           WHERE cd_conversa = ?"
                );
                
                $sql->execute(array($this->convId));
                
                $count = $sql->rowCount();
    
                if($count > 0) {	
                    
                    return true;
                    
                } else {
                    return false;
                }
            }
        }
        
        public function createConv(){
            $existConv = $this->getConv(true);

            if($existConv == false){
                // echo "Não existia";
                $sql = $this->db->prepare("INSERT INTO `tb_conversas` (
                                                            cd_conversa,
                                                            dt_modification,
                                                            dt_creation,
                                                            fk_cliente,
                                                            fk_tecnico
                                                        ) VALUES (
                                                            :id,
                                                            NOW(),
                                                            NOW(),
                                                            :cliente,
                                                            :tecnico	
                                                        ) ");

                
                $data = [	
                    "id" => $this->convId,
                    "cliente" => $this->tipo == "cliente" ? $this->main : $this->other,
                    "tecnico" => $this->tipo == "cliente" ? $this->other : $this->main
                ];

                $status = $sql->execute($data);

                if(!$status) {
                    return die(header("HTTP/1.0 422 Falha ao criar conversa"));	
                }
                    
            }
        }

		public function getMessages(){
			$sql = $this->db->prepare("SELECT * FROM (
                                            SELECT fk_conversa,md_file, ds_message, cd_main, dt_creation FROM tb_messages WHERE fk_conversa LIKE ? ORDER BY dt_creation DESC LIMIT 20
                                        ) sub
                                        ORDER BY dt_creation ASC");

			$sql->execute(array($this->convId));
			
			$count = $sql->rowCount();
			
			$lista = array();

			if($count > 0) {	

				while($res = $sql->fetch(PDO::FETCH_ASSOC)){
					array_push($lista, $res);
				}
				return $lista;
				
			} else {
				return false;
			}
		}

        public function getConvByEmail() {
            if($this->tipo == "cliente") {
                $sql = $this->db->prepare("SELECT
                                                tc.cd_tecnico,
                                                tc.nm_cidade,
                                                tc.nm_tecnico,
                                                tc.md_picture,
                                                IF(cv.cd_conversa IS NOT NULL, cv.cd_conversa, 0 ) AS cd_conversa
                                            FROM tb_tecnicos AS tc
                                            LEFT JOIN tb_conversas AS cv ON cv.fk_tecnico = tc.cd_tecnico AND cv.fk_cliente = :mainCode
                                            WHERE(tc.ds_email LIKE :email)");
            } else {
                $sql = $this->db->prepare("SELECT
                                                cl.cd_cliente,
                                                cl.nm_cidade,
                                                cl.nm_cliente,
                                                cl.md_picture,
                                                IF(cv.cd_conversa IS NOT NULL, cv.cd_conversa, 0 ) AS cd_conversa
                                            FROM tb_clientes AS cl
                                            LEFT JOIN tb_conversas AS cv ON cv.fk_cliente = cl.cd_cliente AND cv.fk_tecnico = :mainCode
                                            WHERE(cl.ds_email LIKE :email)");
            }
            
            $data = [	
                "mainCode" => $this->main,
                "email" => $this->other . "%"
            ];
			$sql->execute($data);
			
			$count = $sql->rowCount();
			
			$lista = array();

			if($count > 0) {	

				while($res = $sql->fetch(PDO::FETCH_ASSOC)){
					array_push($lista, $res);
				}

				return $lista;
				
			} else {
				
				return false;
			}
		}

        public function sendMessage($message){

            $sql = $this->db->prepare("INSERT INTO `tb_messages` (
                cd_message,
                ds_message,
                dt_creation,
                cd_main,
                cd_other,
                fk_conversa
            ) VALUES (
                :cd_message,
                :mensagem,
                NOW(),
                :codigoMain,
                :codigoOther,
                :idConversa	
            ) ");


            $data = [	
                "cd_message" => $this->chatId,
                "mensagem" => $message,
                "codigoMain" => $this->main,
                "codigoOther" => $this->other,
                "idConversa" => $this->convId
            ];

            print_r($data);

            $status = $sql->execute($data);

            if($status) {
                return header("HTTP/1.0 200 Mensagem registrada com sucesso");
            } else {
                return die(header("HTTP/1.0 422 Falha ao registrar mensagem"));
            }
        }

        public function sendFile($file){

            $sql = $this->db->prepare("INSERT INTO `tb_messages` (
                cd_message,
                md_file,
                dt_creation,
                cd_main,
                cd_other,
                fk_conversa
            ) VALUES (
                :cd_message,
                :newFile,
                NOW(),
                :codigoMain,
                :codigoOther,
                :idConversa	
            ) ");


            $data = [	
                "cd_message" => $this->chatId,
                "newFile" => $file,
                "codigoMain" => $this->main,
                "codigoOther" => $this->other,
                "idConversa" => $this->convId
            ];

            // print_r($data);

            $status = $sql->execute($data);
// return $status;
            // echo $status;

            if($status) {
                return header("HTTP/1.0 200 Arquivo registrada com sucesso");
            } else {
                return die(header("HTTP/1.0 422 Falha ao registrar arquivo"));
            }
        }

        public function deleteConv(){

            $sql = $this->db->prepare("DELETE FROM `tb_messages` WHERE fk_conversa = :convId");

            $data = [	
                "convId" => $this->convId,
            ];

            $status = $sql->execute($data);

            if($status) {
                $sql = $this->db->prepare("DELETE FROM `tb_conversas` WHERE cd_conversa = :convId");

                $data = [	
                    "convId" => $this->convId,
                ];

                $status = $sql->execute($data);
                if($status) {
                    echo "FOI";
                    return header("HTTP/1.0 200 Conversa deletada com sucesso");	
                } else {
                    echo "Não FOI";
                    return die(header("HTTP/1.0 422 Falha deletar conversa"));	
                }
            } else {
                echo "FLOL";
                return die(header("HTTP/1.0 422 Falha deletar conversa"));	
            }
                    
            
        }

    }
    
    // $mensagens = new Messages();
    // $convIdConversa = 105057839;
    // $mensagens->setConvCode($convIdConversa);

    // $mensagens->deleteConv()
    // $convIdConversa = 2147483647;
    // $convIdConversa = 0;

    // $otherUsu = 0;
    // $otherUsu = "m";
    // $otherUsu = "teste";
    
    // $otherUsu = 1667061383;

    // $mainUsu = 1275251979;
    // $mainUsu = 1667061383;
    // $mensagens->setUserType("cliente");

    // $mensagens->setUserType("tecnico");
    // $mensagens->setMainUserCode($mainUsu);
    // $mensagens->setOtherUserCode($otherUsu);

    // $res = $mensagens->getConvByEmail();
    // print_r($res);
?>


