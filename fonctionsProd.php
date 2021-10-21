<?php
    //met à jour produit
	function updateProd( $libelle, $quantite, $minimale) {
		try {
			$con = getDatabaseConnexion();
			$requete = "UPDATE produits set 
						libelle = '$libelle',
						quantite = '$quantite',
						miimale = '$minimale',
 						where reference = '$id' ";
			$stmt = $con->query($requete);
		}
	    catch(PDOException $e) {
	    	echo $sql . "<br>" . $e->getMessage();
	    }
	}

	// suprime un produit
	function deleteProd($id) {
		try {
			$con = getDatabaseConnexion();
			$requete = "DELETE from produits where reference = '$id' ";
			$stmt = $con->query($requete);
		}
	    catch(PDOException $e) {
	    	echo $sql . "<br>" . $e->getMessage();
	    }
	}
?>