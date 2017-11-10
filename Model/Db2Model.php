<?php
require_once('Model/Model.php') ;

class Db2Model extends Model{

	public function AfficheFournisseursExistants(){
		$query = "SELECT trim(IDSUNM) AS IDSUNM,trim(SAADR3) AS SAADR3  FROM ".$this->biblio.".CIDMAS INNER JOIN m3edbprod.CIDADR ON IDCONO = SACONO AND IDSUNO = SASUNO WHERE IDSTAT =20";
		$stmt = $this->pdo->query($query);
					 
		return $stmt->fetchAll();

	}

	public function rechercheDernierFrsM3() {
	// attention changer Bib pour mise en prod 
	$query = "SELECT max(idsuno) FROM m3edbprod.CIDMAS where idsuno between '00000' and '99999' "  ;
		$stmt = $this->pdo->query($query);
					 
		return $stmt->fetch();
	}

	 

	public function listerEntite() {
			
		$query = "SELECT trim(princ.CCDIVI) as code , trim(princ.CCCONM) as TXT40  FROM ".$this->biblio.".CMNDIV as princ
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

	public function listerBKIN() {
	 
		$query 	= "SELECT trim(BIBKIN) AS CODE,trim(BITX40) AS TXT40,trim(BITX15) AS TXT15 FROM ".$this->biblio.".FBANID where bicono =100  order by BITX40 "	;
		$stmt = $this->pdo->query($query);
		 			 
		return $stmt->fetchAll();
	}


		public function creerCompteBancaireM3($post,$numeroString) {

		$erreur = array();

		$acho = $numeroString;
		$bana = $post['nomBanq'];
		$bkin = $post['idBanq'];
		$baf1 =	$post['codeBanq'];
		$baf2 =	$post['etabBanq'];
		$baf3 =	$post['numCompte'];
		$baf4 =	$post['cleCompte'];
		$bkag =	$post['swift'];
		$iban = $post['iban'];
		$today = date("Ymd");
		$todayU = date("Ymd");
		$lncd= $post['langue'] ;

		if ($post['deviseHG'] != "" )
		{
			$cucd=$post['deviseHG'];
		} 
		
		
		
		$query = "INSERT INTO m3edbprod.cbanac(BCCONO,
				 				BCDIVI,
								BCBKID, 
								BCBKTP,
								BCACHO,
								BCBKNO,
								BCBBRN,
								BCSTAT,
								BCBANA,
								BCAIT1,
								BCAIT2,
								BCAIT3,
								BCAIT4,
								BCAIT5,
								BCAIT6,
								BCAIT7,
								BCCUCD,
								BCBKIN,
								BCBAF1,
								BCBAF2,
								BCBAF3,
								BCBAF4,
								BCBAF5,
								BCBKPL,
								BCARTP,
								BCBMDA,
								BCBMCA,
								BCFCDC,
								BCBIDC,
								BCBMDI,
								BCFCCO,
								BCDNOV,
								BCCNOV,
								BCBKAG,
								BCFINC,
								BCC1QF,
								BCC1RA,
								BCFIAN,
								BCBRNO,
								BCC2QF,
								BCC2RA,
								BCFICU,
								BCNCHL,
								BCCBPY,
								BCPYCD,
								BCLNCD,
								BCNODY,
								BCEBAT,
								BCPYTK,
								BCCSTC,
								BCIBAN,
								BCACGR,
								BCTXID,
								BCRGDT,
								BCRGTM,
								BCLMDT,
								BCCHNO,
								BCCHID,
								BCLMTS)
								VALUES 
								(100,
				 				'',
								'SWIFT', 
								3,
								:acho,
								'',
								'',
								'10',
								:bana,
								'',
								'',
								'',
								'',
								'',
								'',
								'',
								:cucd,
								:bkin,
								:baf1,
								:baf2,
								:baf3,
								:baf4,
								'',
								'',
								0,
								0,
								0,
								0,
								0,
								0,
								0,
								0,
								0,
								:bkag,
								'',
								'',
								'',
								'',
								'',
								'',
								'',
								'',
								0,
								1,
								'',
								:lncd,
								0,
								'',
								0,
								0,
								:iban,
								'',
								0,
								:today,
								0,
								:todayU,
								0,
								'DSINADNOY',
								0) ";
 
		$stmt=$this->pdo->prepare($query) ;
		$stmt->execute(array(
							'acho'=>$acho,
							'bana'=>$bana,
							'cucd'=>$cucd,
							'bkin'=>$bkin,
							'baf1'=>$baf1,
							'baf2'=>$baf2,
							'baf3'=>$baf3,
							'baf4'=>$baf4,
							'bkag'=>$bkag,
							'lncd'=>$lncd,
							'iban'=>$iban,
							'today'=>$today,
							'todayU'=>$todayU
							));
					 
		$result = $stmt->rowCount();
		 

		if ($result == 0) {
			$erreur["CBANAC"] = "Compte bancaire non inséré";
		}
		else {
			$erreur["succes"] = "Fournisseur".$acho." crée en CRS692";
		}

		return($erreur);
	}
	


	
	public function  creerCompteBancaireM3Old($post,$numeroString) {

		$erreur = array();

		$acho = $numeroString;
		$bana = $post['nomBanq'];
		$bkin = $post['idBanq'];
		$baf1 =	$post['codeBanq'];
		$baf2 =	$post['etabBanq'];
		$baf3 =	$post['numCompte'];
		$baf4 =	$post['cleCompte'];
		$bkag =	$post['swift'];
		$iban = $post['iban'];
		$today = date("Ymd");

		if ($post['deviseHG'] != "" )
		{
			$cucd=$post['deviseHG'];
		} 
		else 
		{
			$cucd=$post['devise'];
		}

		if ($post['paysCommande'] == "FR" )
		{
			$lncd= "FR";
		} 
		else 
		{
			$lncd= "GB";
		}
	  
 		$query = "INSERT INTO " .$this->biblio.".cbanac(
				(BCCONO,BCDIVI,BCBKID,BCBKTP,BCACHO,BCBKNO,BCBBRN,BCSTAT,BCBANA,BCAIT1,BCAIT2,BCAIT3,BCAIT4,BCAIT5,BCAIT6,BCAIT7,BCCUCD,BCBKIN,BCBAF1,BCBAF2,BCBAF3,BCBAF4,BCBAF5,BCBKPL,
				BCARTP,BCBMDA,BCBMCA,BCFCDC,BCBIDC,BCBMDI,BCFCCO,BCDNOV,BCCNOV,BCBKAG,BCFINC,BCC1QF,BCC1RA,BCFIAN,BCBRNO,BCC2QF,BCC2RA,BCFICU,BCNCHL,BCCBPY,BCPYCD,BCLNCD,BCNODY,BCEBAT,
				BCPYTK,BCCSTC,BCIBAN,BCACGR,BCTXID,BCRGDT,BCRGTM,BCLMDT,BCCHNO,BCCHID,BCLMTS)
				VALUES 
				(100 ,''   ,:'SWIFT',03 ,:acho,'','','10',:bana,'','','','','','','',:cucd,:bkin,:baf1,:baf2,:baf3,:baf4,'','',
				0,0,0,0,0,0,0,0,0,:bkag,'','','','','','','','',0,1,'',:lncd,0,'',
				0,0,:iban,'',0,:date,0,:date,0,'DAVLAM',0)";  

 
		$stmt=$this->pdo->prepare($query);
		$stmt->bindParam(":acho",$acho,PDO::PARAM_STR);
		$stmt->bindParam(":bana",$bana,PDO::PARAM_STR);
		$stmt->bindParam(":cucd",$cucd,PDO::PARAM_STR);
		$stmt->bindParam(":bkin",$bkin,PDO::PARAM_STR);
		$stmt->bindParam(":bfa1",$bfa1,PDO::PARAM_STR);
		$stmt->bindParam(":bfa2",$bfa2,PDO::PARAM_STR);
		$stmt->bindParam(":bfa3",$bfa3,PDO::PARAM_STR);
		$stmt->bindParam(":bfa4",$bfa4,PDO::PARAM_STR);
		$stmt->bindParam(":bkag",$bkag,PDO::PARAM_STR);
		$stmt->bindParam(":lncd",$lncd,PDO::PARAM_STR);
		$stmt->bindParam(":iban",$iban,PDO::PARAM_STR);
		$stmt->bindParam(":date",$today,PDO::PARAM_INT);  
		$stmt->execute($query);
					 
		$result = $stmt->rowCount();
		 

		if ($result == 0) {
			$erreur["CBANAC"] = "Compte bancaire non inséré";
		}
		else {
			$erreur["SUCCES"]['CBANAC'] = "Fournisseur".$acho." crée en CRS692";
		}

		return($erreur);

	}

	// pas UTILISE  => test
	public function majFrsM3 ($post,$numeroString) {

 
		$erreurs = array();
	 
		if (empty($erreurs)) {
		
						
			$query = "UPDATE  m3edbtest.CIDMAS
									SET  IDSUNM ='TEST SQL'
									WHERE IDSUNO='09110'"; 
			var_dump($query)	;	 		
			$stmt = $this->pdo->prepare($query);
			
				
			if ($stmt->execute()) {
				$result = $stmt->rowCount();
			} else {
				$erreurs['form'] = 'FRS non modifie !';
			}
			
		}
		if (isset($result)) {
		 	return ($result);
		} else {
			return($erreurs);
		}
	}

	

	
}
	 
?>