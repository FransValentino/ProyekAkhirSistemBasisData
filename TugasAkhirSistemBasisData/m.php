<?php
//panggil file koneksi.php yang sudah anda buat
include "konekdb.php";
?>
<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
	<head>
       <title>Data Restoran</title>
	</head>
<body>
<h1 align="center"> Data Restoran</h1>
    <table border="1" width="900" align="center">
       <thead>
       <tr>
           <td colspan="9"><a href="input_food.php" title="input data">Tambah</a></td>
       </tr>
       <tr>
           <th>Restaurant_Id</th>
           <th>Restaurant_Name</h>
           <th>Retaurant_Location</th>
		   <th>food Id</th>
           <th>food / drink</th>
           <th>Price</h>
           <th>Stock</th>
		   
       </tr>
       </thead>

       <tbody>
<?php
//ambil data dari tb_rest dan foodndrink
$ssql = "SELECT restaurant.*, food_and_drink.*
FROM restaurant INNER JOIN food_and_drink 
ON restaurant.Restaurant_Id = food_and_drink.Restaurant_Id order by restaurant_name";

$ambildata=mysqli_query($conn,$ssql);
while($a=mysqli_fetch_array($ambildata))
{ 
 ?>
   <tr>
           <td><?php echo $a['Restaurant_Id'];?></td>
           <td><?php echo $a['Restaurant_Name'];?></td>
           <td><?php echo $a['Retaurant_Location'];?></td>
           <td><?php echo $a['FodDr_Id'];?></td>   
   		   <td><?php echo $a['FoDr_Name'];?></td>
	       <td><?php echo $a['FoDr_Price'];?></td>
		   <td><?php echo $a['FoDr_Stock'];?></td>

           <td><a href="edit_food.php?id=<?php echo $a['FodDr_Id']."&R=".$a['Restaurant_Name'] ;?>" title="edit data"><button>Edit</button></a> |
           <a href="del_food.php?id=<?php echo $a['FodDr_Id'];?>" title="hapus data"><button>Hapus</button></a></td>
       </tr>
<?php
  }
?>

  </tbody>

</table>
<h1 align="center"> 
  <p><a href="index.html">ke Menu Utama</a></p>
</h1>
</body>
</html>

