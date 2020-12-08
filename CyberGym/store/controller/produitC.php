<?PHP
	include "../config.php";
	require_once '../model/produit.php';

	class produitC {
		
		function ajouterProduit($produit){
			$sql="INSERT INTO products (name, description, price, quantity, image) 
			VALUES (:name,:description,:price, :quantity, :image)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					'name' => $produit->getName(),
					'description' => $produit->getDescription(),
					'price' => $produit->getPrice(),
					'quantity' => $produit->getQuantity(),
					'image' => $produit->getImage()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function afficherProduit(){
			
			$sql="SELECT * FROM products";
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