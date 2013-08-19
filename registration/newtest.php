<?php
$con=mysqli_connect("localhost","shahida2","UxNq4L9pY56F","shahida2_registration");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="INSERT INTO newtest (namaPakej, tarikhBerangkat_day, tarikhBerangkat_month, tarikhBerangkat_year, berapaOrang, namaPemohon)
VALUES
('$_POST[namaPakej]','$_POST[tarikhBerangkat_day]','$_POST[tarikhBerangkat_month]','$_POST[tarikhBerangkat_year]','$_POST[berapaOrang]','$_POST[namaPemohon]')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error());
  }
echo "1 record added";

mysqli_close($con);
?>