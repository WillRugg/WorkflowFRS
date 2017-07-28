<?php
require_once('Model/Model.php') ;

class Db2Model extends Model{


	public function listerEntite() {
			
	$query = "SELECT * FROM ".$this->biblio.".CMNDIV as princ
				join   COMEDBPROD.CZNDIV as sec on princ.cccono = sec.cccono and princ.ccdivi = sec.ccdivi
				where princ.CCCONO = '100'   order by princ.CCDIVI,princ.CCCONM";
	$stmt = $this->pdo->query($query);
				 
	return $stmt->fetchAll();
	} 

	public function listerSUCL() {
		
		$query 	= "SELECT trim(CTSTKY) AS CODE,trim(CTTX40) AS TXT40,trim(CTTX15) AS TXT15 FROM ".$this->biblio.".CSYTAB where ctcono =100 and ctstco ='SUCL' order by CTTX40 "	;
		$stmt = $this->pdo->query($query);
		 			 
		return $stmt->fetchAll();
		}
	
	public function listerTEDL() {
	 
		$query 	= "SELECT trim(CTSTKY) AS CODE,trim(CTTX40) AS TXT40,trim(CTTX15) AS TXT15 FROM ".$this->biblio.".CSYTAB where ctcono =100 and ctstco ='TEDL' and  ctlncd='FR'  order by CTTX15"	;
		$stmt = $this->pdo->query($query);
		 			 
		return $stmt->fetchAll();
		}

		public function listerPYME() {
	 
		$query 	= "SELECT trim(CTSTKY) AS CODE,trim(CTTX40) AS TXT40,trim(CTTX15) AS TXT15  FROM ".$this->biblio.".CSYTAB where ctcono =100 and ctstco ='PYME'  order by CTTX40 "	;
		$stmt = $this->pdo->query($query);
		 			 
		return $stmt->fetchAll();
		}

	public function listerTEPY() {
	 
		$query 	= "SELECT trim(CTSTKY) AS CODE,trim(CTTX40) AS TXT40,trim(CTTX15) AS TXT15  FROM ".$this->biblio.".CSYTAB where ctcono =100 and ctstco ='TEPY' and  ctlncd='FR'  order by CTTX40 "	;
		$stmt = $this->pdo->query($query);
		 			 
		return $stmt->fetchAll();
		}

	
	public function listerCUCD() {
	 
		$query 	= "SELECT trim(CTSTKY) AS CODE,trim(CTTX40) AS TXT40,trim(CTTX15) AS TXT15  FROM ".$this->biblio.".CSYTAB where ctcono =100 and ctstco ='CUCD'   order by	CTTX40 "	;
		$stmt = $this->pdo->query($query);
		 			 
		return $stmt->fetchAll();
		}

		public function listerCSCD() {
	 
		$query 	= "SELECT trim(CTSTKY) AS CODE,trim(CTTX40) AS TXT40,trim(CTTX15) AS TXT15 FROM ".$this->biblio.".CSYTAB where ctcono =100 and ctstco ='CSCD'   order by	CTTX40 "	;
		$stmt = $this->pdo->query($query);
		 			 
		return $stmt->fetchAll();
		}
	
	
	}

		 /*
	
	public function updateFiche($data,$statut) {
		 
		$erreurs = array();
	 
		if (empty($erreurs)) {
		
						
			$query = "UPDATE  ".$this->biblio.".ZSLEDG
						SET ZZSTATUT ='".$statut."'
							WHERE ZZSOURCE ='".$data[0]."' and ESDIVI ='".$data[4]."' and ESJRNO ='".$data[1]."' and ESJSNO ='".$data[2]."' and ESYEA4 =".$data[3]; 
			 		
			$stmt = $this->pdo->prepare($query);
			
				
			if ($stmt->execute()) {
				$result = $stmt->rowCount();
			} else {
				$erreurs['form'] = 'Pièce non modifiée !';
			}
			
		}
		if (isset($result)) {
		 	return ($result);
		} else {
			return($erreurs);
		} */

?>