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

		public function setClientId () { 
			// $bytes = random_bytes(30);
			// $this->id = bin2hex($bytes);
			$bytes = crc32(uniqid());
			$this->id = $bytes;
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

		public function getClientData() {
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
		
		public function verifyClient () {
			$ClientData = $this->getClientData();
	
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
			$ClientData = $this->getClientData();
	
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

	}
?>