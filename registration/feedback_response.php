<?php
$con=mysqli_connect("localhost","shahida2","UxNq4L9pY56F","shahida2_registration");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$result = mysqli_query($con,"SELECT * FROM feedback");

echo "<center>";

echo "<table border='0'>
<tr align='center' bgcolor='red'>
<th>Nama</th>&nbsp;
<th>Phone(Code)</th>&nbsp;
<th>Phone(Number)</th>&nbsp;
<th>Email</th>&nbsp;
<th>Nature of feedback</th>&nbsp;
<th>Category of service</th>&nbsp;
<th>Comment</th>&nbsp;

</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr align='center' bgcolor='yellow'>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['code'] . "</td>";  
  echo "<td>" . $row['phone'] . "</td>";
  echo "<td>" . $row['email'] . "</td>&nbsp";
  echo "<td>" . $row['nature'] . "</td>&nbsp";
  echo "<td>" . $row['category'] . "</td>&nbsp";
  echo "<td>" . $row['comment'] . "</td>&nbsp";  
  echo "</tr>";
  }
echo "</table>";

echo "<br />";
echo "</center>";
mysqli_close($con);

?>
<center>
<a href="logout.php">Logout</a>
</center>