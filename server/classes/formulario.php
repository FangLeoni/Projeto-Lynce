<?php

	include_once("../connection/conexao.php");

    class Formulario {
		public $db;
		public $id;
    public $fk;

		public $nmMarca;
    
		public $nmModelo;
		// public $fkMarca;

		public $nmTipo;
		public $nmDefeito;
		public $dsDescricao;
		public $dsPossivelSolucao;
		// public $fkModelo;
    
		public $dsPergunta;
		public $icResposta;
		public $qtPontos;
		// public $fkPossivelDefeito;


		public function __construct() {
			$connection = new DbConnect();
			$this->db = $connection->connect();
		}
		
		public function setId ($code = 0) { 
			if($code == 0) {
				$bytes = random_bytes(30);  
				$this->id = bin2hex($bytes);
			} 
      else { $this->id = $code; }
		}
		public function setFk ($fk) { $this->fk = $fk; }

		public function setNmMarca ( $nmMarca ) { $this->nmMarca = $nmMarca; }

		public function setNmModelo ( $nmModelo ) { $this->nmModelo = $nmModelo; }
		// public function setFkMarca ( $name ) { $this->name = $name; }


		public function setNmTipo ( $nmTipo ) { $this->nmTipo = $nmTipo; }
		public function setNmDefeito ( $nmDefeito ) { $this->nmDefeito = $nmDefeito; }
		public function setDsDescricao ( $dsDescricao ) { $this->dsDescricao = $dsDescricao; }
		public function setDsPossivelSolucao ( $dsPossivelSolucao ) { $this->dsPossivelSolucao = $dsPossivelSolucao; }


		// public function setFkModelo ( $name ) { $this->name = $name; }
		
		public function setDsPergunta ( $dsPergunta ) { $this->dsPergunta = $dsPergunta; }
		public function setIcResposta ( $icResposta ) { $this->icResposta = $icResposta; }
		public function setQtPontos ( $qtPontos ) { $this->qtPontos = $qtPontos; }
    
		public function setNovaMarca() {
      $sql = $this->db->prepare("INSERT INTO `tb_marcas` (
                            cd_marca,
                            nm_marca
                          ) VALUES (
                            :id,
                            :name
                          ) ");
      $data = [	
        "id" => $this->id,
        "name" => $this->nmMarca,
      ];
      $status = $sql->execute($data);

      if($status) {	
        return $status;
      } else {
        return die(header("HTTP/1.0 422 Falha ao cadastrar"));
      }
		}

    public function setNovoModelo() {
      $sql = $this->db->prepare("INSERT INTO `tb_modelos` (
                            cd_modelo,
                            nm_modelo,
                            fk_marca
                          ) VALUES (
                            :id,
                            :name,
                            :fk
                          ) ");
      $data = [	
        "id" => $this->id,
        "name" => $this->nmModelo,
        "fk" => $this->fk
      ];
      $status = $sql->execute($data);

      if($status) {	
        return $status;
      } else {
        return die(header("HTTP/1.0 422 Falha ao cadastrar"));
      }
		}

    public function setNovoPossivelDefeito() {
      $sql = $this->db->prepare("INSERT INTO `tb_possiveis_defeitos` (
                            cd_defeito,
                            nm_tipo,
                            nm_defeito,
                            ds_descricao,
                            ds_possivel_solucao,
                            fk_modelo
                          ) VALUES (
                            :id,
                            :tipo,
                            :name,
                            :descricao,
                            :solucao,
                            :fk
                          ) ");
      $data = [	
        "id" => $this->id,
        "tipo" => $this->nmTipo,
        "name" => $this->nmDefeito,
        "descricao" => $this->dsDescricao,
        "solucao" => $this->dsPossivelSolucao,
        "fk" => $this->fk
      ];
      $status = $sql->execute($data);

      if($status) {	
        return $status;
      } else {
        return die(header("HTTP/1.0 422 Falha ao cadastrar"));
      }
		}

    public function setNovaPergunta() {
      $sql = $this->db->prepare("INSERT INTO `tb_perguntas` (
                            cd_pergunta,
                            ds_pergunta,
                            ic_resposta,
                            qt_pontos,
                            fk_possivel_defeito
                          ) VALUES (
                            :id,
                            :pergunta,
                            :resposta,
                            :pontos,
                            :fk
                          ) ");
      $data = [	
        "id" => $this->id,
        "pergunta" => $this->dsPergunta,
        "resposta" => $this->icResposta,
        "pontos" => $this->qtPontos,
        "fk" => $this->fk
      ];
      $status = $sql->execute($data);

      if($status) {	
        return $status;
      } else {
        return die(header("HTTP/1.0 422 Falha ao cadastrar"));
      }
		}

		public function getModelo() {
			$sql = $this->db->prepare("SELECT cd_modelo, nm_modelo FROM tb_modelos AS m
                                 JOIN tb_marcas AS mar ON mar.cd_marca = m.fk_marca
                                 WHERE( mar.nm_marca = :marca AND nm_modelo = :modelo )
                                ");
      $data = [	
        "marca" => $this->nmMarca,
        "modelo" => $this->nmModelo
      ];
			$sql->execute($data);

			$res = $sql->fetch(PDO::FETCH_ASSOC);
			// print_r($res);
			$count = $sql->rowCount();

			if($count > 0) {	
				return $res;

			} else {
				return false;
			}
		}

    public function getAllModelosMarcaEspecifica() {
			$sql = $this->db->prepare("SELECT nm_modelo FROM tb_modelos AS m
                                 JOIN tb_marcas AS mar ON mar.cd_marca = m.fk_marca
                                 WHERE( mar.nm_marca = :marca )
                                ");
      $data = [	
        "marca" => $this->nmMarca
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

    public function getAllMarcas() {
			$sql = $this->db->prepare("SELECT nm_marca FROM tb_marcas");
			$sql->execute();

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

		public function getAllPossiveisDefeitos() {
			$sql = $this->db->prepare("SELECT * FROM tb_possiveis_defeitos WHERE( fk_modelo = :fk AND nm_tipo = :tipo )");
			$data = [	
        "fk" => $this->fk,
        "tipo" => $this->nmTipo
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
				
				return die(header("HTTP/1.0 404 Sem resultados para sua pesquisa no momento "));
			}
		}

		public function getAllPerguntas() {
			$sql = $this->db->prepare("SELECT * FROM tb_perguntas WHERE fk_possivel_defeito = :fk");
			$sql->bindParam(":fk", $this->fk );
			$sql->execute();

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
	}

  // $marca = "Apple";
  // $marca = "Samsung";
  // $marca = "Motorola";
  // $marca = "LG";

  // $modelo = "SM-G973FZBJZTO";
  // $tipo = "software";
  // $defeito = "Reboot Infinito";
  // $descricao = "O aparelho liga e desliga sozinho permanecendo travado na tela de inicialização (logo da marca), assim o impedindo de inicializar.";
  // $solucao = "Reparo de software Substituição de Firmware";
  // $pergunta = "A falha ocorreu após um descarregamento completo de sua carga?";
  // $resposta = false;
  // $pontos = 4;

  // $fk = "2f8ce5cc0f1157464c375ec9e3b1e895336f06c8ba03ce000bb9066da08c";

  // $formulario = new Formulario();
  // $formulario->setId();
  // $formulario->setNmMarca($marca);

  // $formulario->setNmModelo($modelo);

  // $formulario->setNmTipo($tipo);
  // $formulario->setNmDefeito($defeito);
  // $formulario->setDsDescricao($descricao);
  // $formulario->setDsPossivelSolucao($solucao);

  // $formulario->setDsPergunta($pergunta);
  // $formulario->setIcResposta($resposta);
  // $formulario->setQtPontos($pontos);
  // $formulario->setFk($fk);

  // $formulario->setNovaMarca();
  // $formulario->setNovoModelo();
  // $formulario->setNovoPossivelDefeito();
  // $formulario->setNovaPergunta();

?>