<?php

// classe Model qui fait la connection à la BDD
Class Model {
	// proteced : accessible classe et enfants si extends
	protected $pdo;
	
	protected $biblio;

	// constructeur appelé automatiquement lors de la création de l instance 
	public function __construct($biblio=null) {
		$this->biblio = $biblio;
		// connexion à maiao
		try {
			$this->pdo = new PDO(PDO_DSN,PDO_USERNAME,PDO_PASSWORD,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
				$this->pdo->exec('SET NAMES "utf8"');
		} catch (PDOException $e) {
			echo 'la Connexion à ODBC de DB2 a échouée : ' . $e->getMessage();
		}
		// connexion à sqlserver
		try {
			$this->pdoSql = new PDO(PDOS_DSN,PDOS_USERNAME,PDOS_PASSWORD);
		} catch (PDOException $e) {
			echo 'la Connexion à ODBC de SQL a échouée : ' . $e->getMessage();
		}
		

		
	}
	 
} 

?>