<?php
$con=mysqli_connect("localhost","shahida2","UxNq4L9pY56F","shahida2_registration");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$result = mysqli_query($con,"SELECT * FROM clients");

echo "<center>";

echo "<table border='0'>
<tr align='center' bgcolor='red'>
<th>Nama Pakej</th>&nbsp;
<th>Tarikh Berangkat(Hari)</th>&nbsp;

<th>(Bulan)</th>&nbsp;
<th>(Tahun)</th>&nbsp;
<th>Berapa Orang</th>&nbsp;
<th>Nama Pemohon</th>&nbsp;
<th>Alamat</th>&nbsp;
<th>Poskod</th>&nbsp;
<th>H/P(Area Code)</th>&nbsp;
<th>H/P(Number)</th>&nbsp;
<th>Email</th>&nbsp;
<th>Gender</th>&nbsp;
<th>Occupation</th>&nbsp;
<th>Status</th>&nbsp;
<th>Citizenship</th>&nbsp;
<th>Mother Name</th>&nbsp;
<th>Health Info</th>&nbsp;
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr align='center' bgcolor='yellow'>";
  echo "<td>" . $row['namaPakej'] . "</td>";
  echo "<td>" . $row['tarikhBerangkat_day'] . "</td>";
  
  echo "<td>" . $row['tarikhBerangkat_month'] . "</td>";
  echo "<td>" . $row['tarikhBerangkat_year'] . "</td>&nbsp";
  echo "<td>" . $row['berapaOrang'] . "</td>&nbsp";
    echo "<td>" . $row['namaPemohon'] . "</td>&nbsp";
  echo "<td>" . $row['alamat'] . "</td>&nbsp";
  echo "<td>" . $row['poskod'] . "</td>&nbsp";
  echo "<td>" . $row['telefonPrabayar_area'] . "</td>&nbsp";
  echo "<td>" . $row['telefonPrabayar_phone'] . "</td>&nbsp";
  echo "<td>" . $row['emailPeribadi'] . "</td>&nbsp";
  echo "<td>" . $row['jantina'] . "</td>&nbsp";
  echo "<td>" . $row['pekerjaan'] . "</td>&nbsp";
  echo "<td>" . $row['kedudukanDiri'] . "</td>&nbsp";
  echo "<td>" . $row['kerakyatan'] . "</td>&nbsp";
  echo "<td>" . $row['namaIbu'] . "</td>&nbsp";
  echo "<td>" . $row['maklumatKesihatan24'] . "</td>&nbsp";
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