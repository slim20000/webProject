<?php
    include "config.php";
    require_once "testing.php";

    class testingC{
        function addTesting($testing){
            $sql="INSERT INTO testing(name,email,website,comment) VALUES(:name,:email,;website,:comment)";
            $db= config::getConnexion();
            try{
				$query = $db->prepare($sql);
			
				$query->execute([
                    'name' => $testing->getName(),	
                    'email' => $testing->getEmail(),				
					'website' => $testing->getWebsite(),
                    'comment' => $testing->getComment()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}
        }
    }
