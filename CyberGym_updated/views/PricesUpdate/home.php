<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['adress'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<style>
body {
    background-image: url("https://images.unsplash.com/photo-1580086319619-3ed498161c77?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80");
  background-position: 100% 100%;
;}
  form{
    text-align: center;
  }
table, th, td {
    border: 1px solid black;
    
}
table.center {
    width:20%; 
    margin-left:40%; 
    margin-right:15%;
    
  }
  label {
	cursor: pointer;
	color: blue;
	display: block;
	padding: 10px;
	margin: 3px;
}
</style>
<h1>ID <?php echo $_SESSION['id']; ?></h1>
     <h1>Hello, <?php echo $_SESSION['name']; ?></h1>
     

     <a href="logout.php">Logout</a>
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>
 <body>
 
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gym";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)  {
    die("Connection failed: " . $conn->connect_error);
} 
//MySQL query goes here
$sql = "SELECT abonner.codeAbo,type_abonnement.codeAbo,type_abonnement.Durée,type_abonnement.tarifsAbo,abonner.idAbo from type_abonnement,abonner where abonner.codeAbo=type_abonnement.codeAbo   ";


$result = $conn->query($sql);

?>

<?php
if ($result->num_rows > 0) {
    echo "<table  class='center'>
    <tr>
    <th>codeAbo</th> <!This is HTML table heading>

    <th>idAbo</th> <!This is HTML table heading>
    <th>Durée</th> <!This is HTML table heading>
    <th>tarifsAbo</th> <!This is HTML table heading>

    </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["codeAbo"]. "</td> <!This is HTML table data>

        <td>" . $row["idAbo"]. "</td> <!This is HTML table data>
        <td>" . $row["Durée"]. "</td> <!This is HTML table data>
        <td>" . $row["tarifsAbo"]. "</td> <!This is HTML table data>

        </tr>";
        
    }
    echo "</table>";
} else {
    echo "0 results";
}

?> 
<br>
<br>
<br>

<FORM> 
<SELECT name="Choisir un Offre" size="1">
<label>Code d' offre  :</label>

<OPTION>Choisir un Offre

<OPTION>Offre de 1 mois (94)
<OPTION>Offre de 3 mois (97)
<OPTION>Offre de 6 mois (96)
<OPTION>Offre de 12 mois (98)
</SELECT>
</FORM>
<br>
<br>
<div class="row justify-content-center">
<form action="add.php" method="POST">
<div class="form-group">

<label>Code d' offre  :</label>

    <input type="number" name="codeAbo" class="form-control" value="<?php echo $codeAbo;?>"placeholder="entret le code de offre">
  
    <div class="form-group">
        <label>idAbo :</label>
        <input type="number" name="idAbo" class="form-control" value="<?php echo $idAbo;?>" placeholder="entret ton id">
</div>
<div>
<button  type="submit" class ="btn btn-success" name="ajouter">ajouter</button>
</div>


</form>
<?php
$conn->close();
?>