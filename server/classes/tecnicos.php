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
		public $descript;

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
		public function setTechDescription ( $descript ) { $this->descript = $descript ; }

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
				return die(header("HTTP/1.0 401 Tecnico nao econtrado"));
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
				return die(header("HTTP/1.0 422 Tecnico ja existente com esse email"));
			}
		}

		public function getMultiTechData() {
			
			$sql = $this->db->prepare("SELECT * FROM tb_tecnicos 
			WHERE(nm_cidade = :cidade AND sg_estado = :estado )");

			$data = [	
				"estado" => $this->state,
				"cidade" => $this->city
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

		public function updateTechProfilePhoto() {
			$sql = $this->db->prepare("UPDATE tb_tecnicos SET `md_picture` = :imagem WHERE ds_email = :email");
			$data = [	
				"email" => $this->email,
				"imagem" => $this->photo
			];
			
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

		public function updateProTechProfileData() {
			$sql = $this->db->prepare(" UPDATE tb_tecnicos SET 
															nm_tecnico = :name,
															ds_email = :email,
															ds_telefone = :phone,
															sg_estado = :state,
															nm_cidade = :city,
															ds_endereco = :endereco,
															ds_numero_complementar = :numComp,
														  ds_descricao_loja = :descript
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
				"numComp" => $this->compNumber,
				"descript" => $this->descript
			];
			
			$status = $sql->execute($data);

			if($status) {	
				return $status;
			} else {
				return die(header("HTTP/1.0 401 Falha ao atualizar perfil"));
			}
		}

		public function togglePremium() {
			$sql = $this->db->prepare(" UPDATE tb_tecnicos SET 
															ic_premium = NOT ic_premium
															WHERE cd_tecnico = :id "
			);
			$data = [	
				"id" => $this->id
			];
			
			$status = $sql->execute($data);

			if($status) {	
				return header("HTTP/1.0 200 Mundancas feitas com sucesso");
			} else {
				return die(header("HTTP/1.0 401 Falha ao executar mudancas"));
			}
		}

		public function toggleLicenciado() {
			$sql = $this->db->prepare(" UPDATE tb_tecnicos SET 
															ic_licenciado = NOT ic_licenciado
															WHERE cd_tecnico = :id "
			);
			$data = [	
				"id" => $this->id
			];
			
			$status = $sql->execute($data);

			if($status) {	
				return header("HTTP/1.0 200 Mundancas feitas com sucesso");
			} else {
				return die(header("HTTP/1.0 401 Falha ao executar mudancas"));
			}
		}

	}

	// $tecnico = new Technicians();
	// $tecnicoClass->setTechId("d9dab6f8f258f564dbe76916174de09f40e932430beb0b4c32be6aed0153");
	// $res = $tecnico->togglePremium();
	// $res = $tecnico->getMessages(129831);

	// $res = $tecnico->getConv(1275251979);
	// $tecnico->setTechEmail("m");
	// $res = $tecnico->getMultiTechData();

	// print_r($res);

?>