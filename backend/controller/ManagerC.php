<?php
	
require_once "../config.php";
	require_once '../model/Manager.php';


	class ManagerC {
		
		function ajouterManager($Manager){
			$sql="INSERT INTO manager (firstname, lastname,gender,email,password,confirmpassword) 
			VALUES (:firstname,:lastname,:gender,:email,:password,:confirmpassword)";
			$db = config::getConnexion();
			try{
				$query = $db ->prepare($sql);
			
				$query->execute([
					'firstname' => $Manager->getFirstname(),
                    'lastname' => $Manager->getLastname(),
                    'gender' => $Manager->getGender(),
					'email' => $Manager->getEmail(),
                    'password' => $Manager->getPassword(),
                    'confirmpassword' => $Manager->getConfirmpassword()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
	
	function afficherManager(){
			
		$sql="SELECT * FROM manager ";
		$db = config::getConnexion();
		try{
			$liste = $db->query($sql);
			return $liste;
		}
		catch (Exception $e){
			die('Erreur: '.$e->getMessage());
		}	
	}
	function recupererManager($id){
		$sql="SELECT * from manager where id=$id";
		$db = config::getConnexion();
		try{
			$query=$db->prepare($sql);
			$query->execute();

			$user=$query->fetch();
			return $user;
		}
		catch (Exception $e){
			die('Erreur: '.$e->getMessage());
		}
	}
	function supprimerManager($id){
		$sql="DELETE FROM manager WHERE id= :id";
		$db = config::getConnexion();
		$req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		try{
			$req->execute();
		}
		catch (Exception $e){
			die('Erreur: '.$e->getMessage());
		}
	}
	function modifierManager($Manager, $id){
		try {
			$db = config::getConnexion();
			$query = $db->prepare(
				'UPDATE manager SET 
					name = :name, 
					firstname = :firstname,
                    login = :login,
					email = :email,
					
					password = :password
				WHERE id = :id'
			);
			$query->execute([
				'name' => $Manager->getName(),
                'firstname' => $Manager->getFirstname(),
                'login' => $Manager->getLogin(),
				'email' => $Manager->getEmail(),
				'password' => $Manager->getPassword(),
				'id' => $id
			]);
		 
		} catch (PDOException $e) {
			$e->getMessage();
		}
    }
    function login ($email, $password) {
    $db = config::getConnexion();
    try {
      $query = "select * from `manager` where `email`=:email and `password`=:password";
      $stmt = $db->prepare($query);
      $stmt->bindParam('email', $email, PDO::PARAM_STR);
      $stmt->bindValue('password', $password, PDO::PARAM_STR);
      $stmt->execute();
      $count = $stmt->rowCount();
      $row   = $stmt->fetch(PDO::FETCH_ASSOC);
      if($count == 1 && !empty($row)) {
        /******************** Your code ***********************/
        return $row;
      } else {
        return null;
      }
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  } 
  
}

?>