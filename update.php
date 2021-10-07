<?php
include("./inc/settings.php");
validar();
?>
<?php
/*
echo $_POST ['identificador']."<br>\n";
echo $_POST ['nombre']."<br>\n";
echo $_POST ['fecha']."<br>\n";
echo $_POST ['numero']."<br>\n";
echo $_POST ['numdouble']."<br>\n";

$identificador=$_POST ['identificador'];
$nombre=$_POST ['nombre'];
$fecha=$_POST ['fecha'];
$numero=$_POST ['numero'];  
$numdouble=$_POST ['numdouble'];
*/

$query="SELECT column1, column2, column3, column4, column5 FROM table1 WHERE column1 = ".$_GET['colum1'].";";

//echo $query;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$result = $conn->query($query);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ( $conn->query($query)== TRUE){
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      
      ?>
      <form action="update2.php" method="POST">
      <fieldset>
<legend>Cambie la información del registro.</legend>
  Id: <input type="number" name="identificador" id="" value="<?= $row['column1'] ?>" readonly><br>
  Nombre: <input type="text" name="nombre" id="" value="<?= $row['column2'] ?>"><br>
  Fecha: <input type="date" name="fecha" id="" value="<?= $row['column3'] ?>"><br>
  Numero: <input type="number" name="numero" id="" value="<?= $row['column4'] ?>"><br> 
  Num.Double: <input type="number" name="numdouble" id="" value="<?= $row['column5'] ?>"><br>
  <br>
  <input type="submit" value="Modificar"><br> 
</fieldset>
    </form>
      <?php
    }
}else{
    echo "Algo salio mal <a href='https://localhost/crud/crud.php'> clic aqui para volver al crud</a>" ;
    
}


?>
