<?php

	include_once("../connection/conexao.php");

    class Technicians {
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
		public $address;
		public $compNumber;

		public function __construct() {
			$connection = new DbConnect();
			$this->db = $connection->connect();
		}

		public function setTechId ($code=0) { 
			// $bytes = random_bytes(30);  
			// $this->id = bin2hex($bytes);  // gera 60 caracteres, o dobro do random_bytes
			if($code == 0) {
				$bytes = random_bytes(30);  
				$this->id = bin2hex($bytes);
			} else {
				$this->id = $code;
			}
		}

		public function setTechName ( $name ) { $this->name = $name; }
		public function setTechEmail ( $email ) { $this->email = $email ; }
		public function setTechPassword ( $pswd, $crypto=0 ) { 
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
		public function setTechPhone ( $phone ) { $this->phone = $phone ; }
		public function setTechState ( $state ) { $this->state = $state ; }
		public function setTechCity ( $city ) { $this->city = $city ; }
		public function setTechPhoto ( $photo ) { $this->photo = $photo ; }
		public function setTechCep ( $cep ) { $this->cep = $cep ; }
		public function setTechAddress ( $address ) { $this->address = $address ; }
		public function setTechCompNumber ( $compNumber ) { $this->compNumber = $compNumber ; }

		public function getTechDataByEmail() {
			$sql = $this->db->prepare("SELECT * FROM tb_tecnicos WHERE ds_email = :email OR cd_tecnico = :codigo");
			$sql->bindParam(":email", $this->email );
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

		public function getTechDataByCode() {
			$sql = $this->db->prepare("SELECT * FROM tb_tecnicos WHERE cd_tecnico = :codigo");
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
		
		public function verifyTech () {
			$TechData = $this->getTechDataByEmail();
	
			if($TechData != false) {
				$password_hash = $TechData["ds_senha"];

				$verify = password_verify( $this->pswd ,$password_hash);

				if($verify) {
					return $verify; 
				}
				else {
					return die(header("HTTP/1.0 422 Erro com a senha!")); 
				}
			}
			else {
				return die(header("HTTP/1.0 401 Técnico não econtrado"));
			}
		}

		public function createTech() {
			$TechData = $this->getTechDataByEmail();
	
			if($TechData == false) {
				$sql = $this->db->prepare("INSERT INTO `tb_tecnicos` (
														 cd_tecnico,
														 nm_tecnico,
														 ds_email,
														 ds_senha,
														 ds_telefone,
														 sg_estado,
														 nm_cidade,
														 ds_endereco,
														 ds_numero_complementar
														) VALUES (
														 :id,
														 :name,
														 :email,
														 :pswd,
														 :phone,
														 :state,
														 :city,
														 :address,
														 :compNumber
														) ");
				$data = [	
					"id" => $this->id,
					"name" => $this->name,
					"email" => $this->email,
					"pswd" => $this->pswd,
					"phone" => $this->phone,
					"state" => $this->state,
					"city" => $this->city,
					"address" => $this->address,
					"compNumber" => $this->compNumber
				];
				$status = $sql->execute($data);

				if($status) {	
					return $status;
				} else {
					return die(header("HTTP/1.0 422 Falha ao cadastrar"));
				}
			}
			else{
				return die(header("HTTP/1.0 422 Técnico já existente com esse email"));
			}
		}

		public function getMultiTechData() {
			
			$sql = $this->db->prepare("SELECT
										tc.cd_tecnico,
										tc.nm_cidade,
										tc.nm_tecnico,
										tc.md_picture,
										IF(cv.cd_conversa IS NOT NULL, cv.cd_conversa, 0 ) AS cd_conversa
									FROM tb_tecnicos AS tc
									LEFT JOIN tb_conversas AS cv ON cv.fk_tecnico = tc.cd_tecnico
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

		public function updateTechProfilePhoto() {
			$sql = $this->db->prepare("UPDATE tb_tecnicos SET `md_picture` = :imagem WHERE ds_email = :email");
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

		public function updateTechProfileData() {
			$sql = $this->db->prepare(" UPDATE tb_tecnicos SET 
															nm_tecnico = :name,
															ds_email = :email,
															ds_telefone = :phone,
															sg_estado = :state,
															nm_cidade = :city,
															ds_endereco = :endereco,
															ds_numero_complementar = :numComp
														   WHERE cd_tecnico = :id "
			);
			$data = [	
				"id" => $this->id,
				"name" => $this->name,
				"email" => $this->email,
				"phone" => $this->phone,
				"state" => $this->state,
				"city" => $this->city,
				"endereco" => $this->address,
				"numComp" => $this->compNumber
			];
			
			$status = $sql->execute($data);

			if($status) {	
				return $status;
			} else {
				return die(header("HTTP/1.0 401 Falha ao atualizar perfil"));
			}
		}

	}

	// $tecnico = new Technicians();
	// $res = $tecnico->getMessages(129831);

	// $res = $tecnico->getConv(1275251979);
	// $tecnico->setTechEmail("m");
	// $res = $tecnico->getMultiTechData();

	// print_r($res);

?>