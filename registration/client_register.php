<?php
$con=mysqli_connect("localhost","shahida2","UxNq4L9pY56F","shahida2_registration");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
	$sql = "INSERT INTO clients (namaPakej, tarikhBerangkat_day, tarikhBerangkat_month, tarikhBerangkat_year, berapaOrang, namaPemohon, alamat, poskod, telefonPrabayar_area, telefonPrabayar_phone, telefonPejabat_area, telefonPejabat_phone, emailPeribadi, jantina, tarikhLahir_day, tarikhLahir_month, tarikhLahir_year, pekerjaan, kedudukanDiri, anggotaKeluarga, noPasport, kerakyatan, tarikhTamat_day, tarikhTamat_month, tarikhTamat_year, namaIbu, pernahkahAnda, maklumatKesihatan24, namaWaris, alamat28, poskod27, hubungan, noTel_area, noTel_phone, telPrabayar_area, telPrabayar_phone)
               VALUES
			   ('$_POST[namaPakej]','$_POST[tarikhBerangkat_day]','$_POST[tarikhBerangkat_month]','$_POST[tarikhBerangkat_year]','$_POST[berapaOrang]','$_POST[namaPemohon]','$_POST[alamat]','$_POST[poskod]','$_POST[telefonPrabayar_area]','$_POST[telefonPrabayar_phone]','$_POST[telefonPejabat_area]','$_POST[telefonPejabat_phone]','$_POST[emailPeribadi]','$_POST[jantina]','$_POST[tarikhLahir_day]','$_POST[tarikhLahir_month]','$_POST[tarikhLahir_year]','$_POST[pekerjaan]','$_POST[kedudukanDiri]','$_POST[anggotaKeluarga]','$_POST[noPasport]','$_POST[kerakyatan]','$_POST[tarikhTamat_day]','$_POST[tarikhTamat_month]','$_POST[tarikhTamat_year]','$_POST[namaIbu]','$_POST[pernahkahAnda]','$_POST[maklumatKesihatan24]','$_POST[namaWaris]','$_POST[alamat28]','$_POST[poskod27]','$_POST[hubungan]','$_POST[noTel_area]','$_POST[noTel_phone]','$_POST[telPrabayar_area]','$_POST[telPrabayar_phone]')";
      if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error());
  }
echo "1 record added";

mysqli_close($con);

   
?>


