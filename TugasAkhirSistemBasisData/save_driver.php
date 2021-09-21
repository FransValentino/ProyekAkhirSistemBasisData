<html>
<body>
<?php
$name = $_GET["Driver_name"];
$nopol= $_GET["Driver_Nopol"];
$Balanced=$_GET["Driver_Balanced"];
$Loc=$_GET["Driver_Location"];
$id =$_GET["id"];
$x =$_GET["edit"];
include "konekdb.php";
echo $x;
if ($x=="t")
	{
		$sql = "INSERT INTO drivers (Driver_name,Driver_Nopol,Driver_Balanced,Driver_Location) VALUES ('$name','$nopol','$Balanced','$Loc')";	
	}
	else
	{
		$sql = "UPDATE drivers set Driver_name='$name',Driver_Nopol='$nopol',Driver_Balanced=$Balanced,Driver_Location='$Loc' where Driver_id = $id";
	}


if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
  <br><br>
  <p><a href="index.html">ke Menu Utama</a></p>
<p><a href="x.php">ke Daftar Driver</a></p>



</body>
</html> 