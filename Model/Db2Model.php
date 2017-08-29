<?php
require_once('Model/Model.php') ;

class Db2Model extends Model{

	public function AfficheFournisseursExistants(){
		$query = "SELECT trim(IDSUNM) AS IDSUNM,trim(SAADR3) AS SAADR3  FROM ".$this->biblio.".CIDMAS INNER JOIN M3EDBPROD.CIDADR ON IDCONO = SACONO AND IDSUNO = SASUNO WHERE IDSTAT =20";
		$stmt = $this->pdo->query($query);
					 
		return $stmt->fetchAll();

	}

	public function rechercheDernierFrsM3() {
	// attention changer Bib pour mise en prod 
	$query = "SELECT max(idsuno) FROM m3edbtest.CIDMAS where idsuno between '00000' and '99999' "  ;
		$stmt = $this->pdo->query($query);
					 
		return $stmt->fetch();
	}

	

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
	
	public function listerGrpAppartenance() {
	 
		$query 	= "SELECT trim(IDSUNO) AS CODE,trim(IDSUNM) AS NOM  FROM ".$this->biblio.".CIDMAS where idcono =100 and IDSUTY = 3 order by	IDSUNM "	;
		$stmt = $this->pdo->query($query);
		 			 
		return $stmt->fetchAll();
	}


	public function creerfrsM3($post,$numeroString) {


		$erreur = array();
  		
		// alimenter champ en dur ===> ne fonctionne pas avec le poste CIDMAS
		 
		$suno = $numeroString;
		$sunm = $post['rsCommande'];
		$alsu = $post['rsCommande'];
		$cscd =	$post['paysCommande'];
		$phno =	$post['telephone'];
		$tfno =	$post['fax'];
		$corg =	$post['siret'];
		$cor2 =	$post['complement'];
		$vrno =	$post['tvaIntra'];
	 	 

 		$query = "INSERT INTO " .$this->biblio.".cidmas(
					IDCONO,IDSUNO,IDSUTY,IDSUNM,IDALSU,IDCORG,IDCOR2,IDLNCD,IDPHNO,IDTFNO,IDCSCD,IDDTFM,IDEDIT,IDVRNO,IDMEPF,IDCFI1,IDCFI3,IDCFI5,IDSTAT ) 
			VALUES (100,:suno,0,:sunm,:alsu,:corg,:cor2,'FR',:phno,:tfno,:cscd,'DMY','\',:vrno, 41,'&D ','&D ','& ',  10)";

 		$stmt=$this->pdo-> prepare($query);
		$stmt->bindParam(':suno',$suno,PDO::PARAM_STR);
		$stmt->bindParam(':sunm',$sunm,PDO::PARAM_STR);
		$stmt->bindParam(':alsu',$alsu,PDO::PARAM_STR);
		$stmt->bindParam(':corg',$corg,PDO::PARAM_STR);
		$stmt->bindParam(':cor2',$cor2,PDO::PARAM_STR);
		$stmt->bindParam(':phno',$phno,PDO::PARAM_STR);
		$stmt->bindParam(':tfno',$tfno,PDO::PARAM_STR);
		$stmt->bindParam(':cscd',$cscd,PDO::PARAM_STR);
		$stmt->bindParam(':vrno',$vrno,PDO::PARAM_STR);

		$stmt->execute();
					 
		$result = $stmt->rowCount();
		 
		if ($result == 0) {
			$erreurs["CRS620"] = "Fournisseur non inséré";
		}
		else {
			$erreurs["SUCCES"]['CIDMAS'] = "Fournisseur".$suno." en CRS620";
		}
 
			// cidven
			$cobi =	$post['groupeAppartenance'];
			$orty =	$post['natureFournisseur'];
			$sucl =	$post['groupeFournisseur'];
			$edit = '/';
			$tedl =	$post['incotermGroupe'];
			$modl =	 '&D ';
			$teaf =	'1';
			$dt4d =	'1';
			$dtcd =	'1'; 
			$cucd =	$post['deviseHG'];
			$crtp=	1;
			$tepy =	$post['conditionReglementHG'];
			$pyme =	$post['modeReglement'];
			$atpr =	'2';
			$acrf =	'HG';	
			$vtcd =	'01';
			$txap =	'1';
			$tepa = '&D ';
			$absk = '1';
			$absm = 1;
			$buye = 'MOVEX';
			$shst =	0;
			$sust = 1;
			$susy = 2;
			$shac = 2;
			$tame = 1;
			$iatp = 2;
			$iapc = 1;
			$iape = 1;
			$iapf = 3;
			$qucl = '';
			$ecar = '';
			$iapf = '';

		return ($erreur) ;

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