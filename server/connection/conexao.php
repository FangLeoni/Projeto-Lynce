<?php
                             //local      login  senha   banco
    // $conexao = mysqli_connect("localhost","root","","projetoLynce");

    // if(mysqli_connect_errno())
    // {
    //     echo "Aconexão MYSQLi apresentou erro: " . mysqli_connect_error();
    // }

    class DbConnect {
		private $host = 'localhost';
		private $dbName = 'projetoLynce';
		private $user = 'root';
		private $pass = '';

		public function connect() {
			try {
				$conn = new PDO('mysql:host=' . $this->host . '; dbname=' . $this->dbName, $this->user, $this->pass);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return $conn;
			} catch( PDOException $e) {
				echo 'Database Error: ' . $e->getMessage();
			}
		}
	}

?>