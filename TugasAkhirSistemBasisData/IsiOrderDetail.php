<?php
//panggil file koneksi.php yang sudah anda buat
include "konekdb.php";
// ambil data kiriman dari page pemanggil
  session_start();
  $user_check =$_SESSION['login_user']; 
  $member = $_SESSION['usr_member'];
  $xNama =$_SESSION['Nama'];
  $xId = $_SESSION['XId'];
  $xBalanced =$_SESSION['XBalanced'];
  if(!isset($user_check))  // jika mau akses tidak melalui login, diarahkan ke login
  {
    header("Location: index.html");
  }
  //session_destroy();
  echo "<table border='1' width='900' align='center'>";
  echo "<tr>";
  echo "<td>";
    echo "User aktif : $user_check <br>" ;
	echo "status : $member <br>";
    echo "Nama   : $xNama <br>" ;
	echo "Id : $xId <br> ";  //id user
    echo "Balanced : $xBalanced <br>" ;
  echo "</td>";
  echo "</tr>";
  echo "</table>";
// akhir ambil data kiriman dari page pemanggil

 $Ship_nota = $_GET["id"];   // pegangannya no ship_nota
 $resid = $_GET["resid"];  
 
  echo "<table border='1' width='900' align='center'>";
  echo "<tr>";
  echo "<td>";
  echo "No Nota : ".$Ship_nota;
  echo "</td>";
  echo "</tr>";

  echo "<tr>";
  echo "<td>";

 // cari driver dgn cara random
	//ambil data dari tb_driver 
$ssql = "SELECT shipping.*, restaurant.*, drivers.*, shipping.Driver_Id
FROM (drivers INNER JOIN shipping ON drivers.driver_id = shipping.Driver_Id) INNER JOIN restaurant ON shipping.Restaurant_Id = restaurant.restaurant_id
WHERE (((shipping.Ship_nota)='$Ship_nota'))";
		$resultssql = mysqli_query($conn, $ssql);
		if (mysqli_num_rows($resultssql) > 0) 
		{
		   while($row = mysqli_fetch_assoc($resultssql)) 
		   {
			$Driver_Id= $row["Driver_Id"];
			$Driver_name= $row["Driver_name"];
			}
		}
?>
<!DOCTYPE html>
<html>
<head>
 <title>Input Makanan dan Minuman</title>
</head>
<body>
<h3>Pilih Makanan:</h3>


<form action="save_oder_detail.php" method="get">
<input type="hidden" name="edit" value="t"/> 
<input type="hidden" name="Ship_nota" value="<?php echo $Ship_nota ?>"/> 
<input type="hidden" name="new" value="t"/> 
<input type="hidden" name="resid" value="<?php echo $resid ?>"/> 


<select name="idfood">
 <?php
   //ambil data dari tb_rest dan foodndrink
  
$ssql = "SELECT restaurant.*, food_and_drink.*
FROM restaurant INNER JOIN food_and_drink 
ON restaurant.Restaurant_Id = food_and_drink.Restaurant_Id
where food_and_drink.Restaurant_Id = $resid order by restaurant_name";
   $ambildata=mysqli_query($conn, $ssql);
   while($a=mysqli_fetch_array($ambildata))
   {
    ?>
     <option value="<?php echo $a['FodDr_Id'];?>"><?php echo $a['FodDr_Id']. " ".$a['FoDr_Name']. " " . $a['FoDr_Price'] ;?></option>
	<?php 
	}

  ?>
</select>
   Qty: <input type="text" name="qtyfood" ><br><br>
  <input type="submit" value="Ok">


  </td>
  </tr>
  </table>
  
  <table border='1' width='900' align='center'>
  <tr>
  <td>Makanan</td>
  <td>Harga</td>
  <td>Qty</td>
  <td>Total</td>
  </tr> 

  <?php
$sqldet="SELECT orderlistdetailed.*, food_and_drink.*, orderlistdetailed.Ship_nota
FROM orderlistdetailed INNER JOIN food_and_drink ON orderlistdetailed.FodDr_Id = food_and_drink.FodDr_Id
WHERE (((orderlistdetailed.Ship_nota)='$Ship_nota'))";
$ambildatadet=mysqli_query($conn, $sqldet);
$tot = 0;
while($a=mysqli_fetch_array($ambildatadet))
{
	 echo "<td align='right'>";
	 echo $a['FoDr_Name'];	

	 echo "</td>";
	 
	 echo "<td align='right'>";
	 echo $a['FoDr_Price'];
	 echo "</td>";
	 
	 echo "<td align='right' width='50'>";
	 echo $a['Ord_qty'];
	 echo "</td>";

	 echo "<td align='right'>";
	 echo $a['FoDr_Price']*$a['Ord_qty'];
	 $tot = ($a['FoDr_Price']*$a['Ord_qty'])+$tot;
  
	 echo "</td>";
     echo "<td align='right'>";
	 echo '<a href="del_order_det.php" title="Delete Order Detail">Delete</a></td>';
     echo "</td>";	 
	 echo "</tr>";
}
 ?>

  </td>
  </tr>
      <td colspan="3"><a href="om.php" title="kembali">kembali</a></td>
	  <td align="right"> <?php echo $tot ?> </td>
	 <td ><a href="save_oder_detail.php?id=<?php echo $Ship_nota;?>&resid=<?php echo  $resid ?>&edit=ok" title="fix">Fix Pesann</a></td>
	  
  </table>
</body>
</html>