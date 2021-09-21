<html>
 <body>
  <form action="save_cons.php" method="get">
   <input type="hidden" name="id" value="<?php echo $id?>"/>
   <input type="hidden" name="edit" value="t"/>    <!--  edit untuk kondisi di save_driver (jika y -> update) -->
  
   Name Consumer: <input type="text" name="Cons_Nama"><br>
   Balanced: <input type="text" name="Cons_Balanced"><br>
   Location: <input type="text" name="Cons_Location"><br>
   <input type="submit">

     <br><br>
  <p><a href="index.html">ke Menu Utama</a></p>
<p><a href="c.php">ke Daftar Consumer</a></p>

  </form>
 </body>
</html>  