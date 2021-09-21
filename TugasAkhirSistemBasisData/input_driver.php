<html>
 <body>
  <form action="save_driver.php" method="get">
   <input type="hidden" name="id" value="<?php echo $id?>"/>
   <input type="hidden" name="edit" value="t"/>    <!--  edit untuk kondisi di save_driver (jika y -> update) -->
  
   Name Driver: <input type="text" name="Driver_name"><br>
   No Pol: <input type="text" name="Driver_Nopol"><br>
   Balanced: <input type="text" name="Driver_Balanced"><br>
   Location: <input type="text" name="Driver_Location"><br>
   <input type="submit">
   <p><a href="index.html">kembali ke menu utama</a></p>
   
     <br><br>
  <p><a href="index.html">ke Menu Utama</a></p>
<p><a href="x.php">ke Daftar Driver</a></p>

  </form>
 </body>
</html>  