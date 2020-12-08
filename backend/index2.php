

<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>PHP</title>
    <style>
table {
  position: relative;
  left:130;
  right: 0;
  width: 200px;
}
</style>
</head>
<body>


    <?php require_once 'config.php';?>
    <?php
    if (isset($_SESSION['message'])):?>
    <div class="alert alert-<?=$_SESSION['msg_type']?>">
    <?php
    echo $_SESSION['message'];
    unset ($_SESSION['message']);
    ?>
    </div>
        <?php endif ?>
    <div class="container">
    <?php
      $mysqli=new mysqli('localhost','root','','gym') or die (mysqli_error($mysqli));
      $result=$mysqli->query("SELECT * FROM type_abonnement") or die ($mysqli->error);
       
       ?>
       <div class="row justify-content-center">
           <table class="table">
           <?php require_once 'aaaa.php';?>
               <thread>
                   <tr>
                   <th>libelleAbo</th>
                       <th>descriptionAbo</th>
                       <th>tarifsAbo</th>
                       <th>Durée</th>
                       <th colspan="2">action</th> 
                      

</tr>
</thead>
<?php
while ($row=$result->fetch_assoc()): ?>
<tr>
    <td><?php echo $row ['libelleAbo']; ?></td>
    <td><?php echo $row ['descriptionAbo']; ?></td>
    <td><?php echo $row ['tarifsAbo']; ?></td>

    <td><?php echo $row ['Durée']; ?></td>
<td> 
    <a href ="index2.php?edit=<?php echo $row['codeAbo']; ?>"
    class="btn btn-info">Edit </a>
   <a href="index2.php?delete=<?php echo $row['codeAbo']; ?>"
   class="btn btn-info ">Delete </a>
   
</td>
</tr>
<?php endwhile; ?>
</table>
</div>


       <?php
function pre_r($array){
echo '<pre>';
print_r($array);
echo '</pre>';
}     
?>
    <div class="row justify-content-center">
<form action="config.php" method="POST">
    <input type="hidden" name="codeAbo" value="<?php echo $codeAbo;?>">
    <div class="form-group">
        <style>
   text {
float: left;
width: 10em;
margin-right: 1em;
}
    </style>

        <label>libelle</label>
        <input type="text" name="libelleAbo" class="form-control" value="<?php echo $libelleAbo;?>" placeholder="entret ton libelle">
</div>

<div class="form-group">
<label>descriptionAbo</label>
<input type="text" name="descriptionAbo" class="form-control" value="<?php echo $descriptionAbo;?>" placeholder="enterer ton description">
</div>
<div class="form-group">
<label>tarifsAbo</label>
<input type="text" name="tarifsAbo" class="form-control" value="<?php echo $tarifsAbo  ;?>" placeholder="entrer ton tarifs">
</div>
<div class="form-group">
<label>duree</label>
<input type="text" name="Durée" class="form-control" value="<?php echo $Durée ; ?>" placeholder="entrer le duree">
</div>

    <div class="form-group">
        <?php
        if ($update==true):
            ?>
<button type="submit" class ="btn btn-info" name="update">Update</button>
        <?php else: ?>
            <button type="submit" class ="btn btn-primary" name="save">Save</button>
        <?php endif; ?>
        <br>
        <br>
        <br>

        <a href="index.php"><img src="images\aaa.jpg" alt="HTML tutorial" style="width:42px;height:42px;"></a>

            </div>


</form>
</body>
</div>
</html>
}
