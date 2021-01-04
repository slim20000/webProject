<?php
	include("db.php");
	require_once "Utilisateur.php";

	class UtilisateurC {
		
		function ajouterUtilisateur($Utilisateur){
			$sql="INSERT INTO user (name, firstname,login,email, password) 
			VALUES (:name,:firstname,:login,:email,:password)";
			$db = config::getConnexion();
			try{
				$query = $db ->prepare($sql);
			
				$query->execute([
					'name' => $Utilisateur->getName(),
					'firstname' => $Utilisateur->getFirstname(),
					'login' => $Utilisateur->getLogin(),
					'email' => $Utilisateur->getEmail(),
					'password' => $Utilisateur->getPassword()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
	
	function afficherUtilisateurs(){
			
		$sql="SELECT * FROM user ";
		$db = config::getConnexion();
		try{
			$liste = $db->query($sql);
			return $liste;
		}
		catch (Exception $e){
			die('Erreur: '.$e->getMessage());
		}	
	}
}

?>