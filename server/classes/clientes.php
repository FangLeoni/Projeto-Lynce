<?php

	include_once("../connection/conexao.php");

    class Clients {
		public $db;
		public $id;
		public $name;
		public $email;
		public $pswd;
		public $phone;
		public $state;
		public $city;
		public $photo;
		public $cep;

		public function __construct() {
			$connection = new DbConnect();
			$this->db = $connection->connect();
		}

		public function setClientId ($code=0) { 
			// $bytes = random_bytes(30);
			// $this->id = bin2hex($bytes);
			if($code == 0) {
				$bytes = rand(-10000,2147483646);
				$this->id = $bytes;
			} else {
				$this->id = $code;
			}
		}

		public function setClientName ( $name ) { $this->name = $name; }
		public function setClientEmail ( $email ) { $this->email = $email ; }
		public function setClientPassword ( $pswd, $crypto=0 ) { 
			if($crypto == 0){
				$this->pswd= $pswd ; 
			}
			elseif($crypto == 1) {
				$this->pswd= password_hash($pswd, PASSWORD_ARGON2I); 
			}
			else{
				return false;
			}
		}
		public function setClientPhone ( $phone ) { $this->phone = $phone ; }
		public function setClientState ( $state ) { $this->state = $state ; }
		public function setClientCity ( $city ) { $this->city = $city ; }
		public function setClientPhoto ( $photo ) { $this->photo = $photo ; }
		public function setClientCep ( $cep ) { $this->cep = $cep ; }

		public function getClientDataByEmail() {
			$sql = $this->db->prepare("SELECT * FROM tb_usuarios WHERE ds_email = :email ");
			$sql->bindParam(":email", $this->email );
			$sql->execute();

			$res = $sql->fetch(PDO::FETCH_ASSOC);
			// print_r($res);
			$count = $sql->rowCount();

			if($count > 0) {	
				return $res;

			} else {
				return false;
			}
		}

		public function getClientDataByCode() {
			$sql = $this->db->prepare("SELECT * FROM tb_usuarios WHERE cd_tecnico = :codigo");
			$sql->bindParam(":codigo", $this->id );
			$sql->execute();

			$res = $sql->fetch(PDO::FETCH_ASSOC);
			// print_r($res);
			$count = $sql->rowCount();

			if($count > 0) {	
				return $res;

			} else {
				return false;
			}
		}
		
		public function verifyClient () {
			$ClientData = $this->getClientDataByEmail();
	
			if($ClientData != false) {
				$password_hash = $ClientData["ds_senha"];

				$verify = password_verify( $this->pswd ,$password_hash);

				if($verify) {
					return $verify;
				}
				else {
					return die(header("HTTP/1.0 422 Erro com a senha!")); 
				}
			}
			else {
				return die(header("HTTP/1.0 401 Cliente não econtrado"));
			}

		}

		public function createClient() {
			$ClientData = $this->getClientDataByEmail();
	
			if($ClientData == false) {
				$sql = $this->db->prepare("INSERT INTO `tb_usuarios` (
														 cd_usuario,
														 nm_usuario,
														 ds_email,
														 ds_senha,
														 ds_telefone,
														 sg_estado,
														 nm_cidade
														) VALUES (
														 :id,
														 :name,
														 :email,
														 :pswd,
														 :phone,
														 :state,
														 :city	
														) ");
				$data = [	
					"id" => $this->id,
					"name" => $this->name,
					"email" => $this->email,
					"pswd" => $this->pswd,
					"phone" => $this->phone,
					"state" => $this->state,
					"city" => $this->city
				];
				$status = $sql->execute($data);

				if($status) {	
					return $status;
				} else {
					return die(header("HTTP/1.0 422 Falha ao cadastrar"));
				}
			}
			else{
				return die(header("HTTP/1.0 422 Cliente já existente com esse email"));
			}
		}

		public function getMultiClientData() {
			$sql = $this->db->prepare("SELECT
										tc.cd_usuario,
										tc.nm_cidade,
										tc.nm_usuario,
										tc.md_picture,
										IF(cv.cd_conversa IS NOT NULL, cv.cd_conversa, 0 ) AS cd_conversa
									FROM tb_usuarios AS tc
									LEFT JOIN tb_conversas AS cv ON cv.fk_usuario = tc.cd_usuario
									WHERE ds_email LIKE ?");
			$sql->execute(array("$this->email%"));
			
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

		public function updateClientProfilePhoto() {
			$sql = $this->db->prepare("UPDATE tb_usuarios SET `md_Picture` = :imagem WHERE ds_email = :email");
			$data = [	
				"email" => $this->email,
				"imagem" => $this->photo
			];
			print_r($data);
			$status = $sql->execute($data);

			if($status) {	
				return "registrou no banco";
			} else {
				return die(header("HTTP/1.0 401 Falha ao mudar imagem no banco"));
			}
		}

		public function updateClientProfileData() {
			$sql = $this->db->prepare(" UPDATE tb_usuarios SET 
															nm_usuario = :name,
															ds_email = :email,
															ds_telefone = :phone,
															sg_estado = :state,
															nm_cidade = :city
														   WHERE cd_usuario = :id "
			);
			$data = [	
				"id" => $this->id,
				"name" => $this->name,
				"email" => $this->email,
				"phone" => $this->phone,
				"state" => $this->state,
				"city" => $this->city
			];
			
			$status = $sql->execute($data);

			if($status) {	
				return $status;
			} else {
				return die(header("HTTP/1.0 401 Falha ao atualizar perfil"));
			}
		}
		
		public function updateProfilePassword() {
			$sql = $this->db->prepare("UPDATE tb_usuarios SET `md_Picture` = :imagem WHERE cd_usuario = :codigo");
			$data = [	
				"codigo" => $this->id,
				"imagem" => $this->photo
			];
			
			$status = $sql->execute($data);

			if($status) {	
				return "Registrou no banco";
			} else {
				return die(header("HTTP/1.0 401 Falha ao mudar imagem no banco"));
			}
		}

		

	}

	



?>