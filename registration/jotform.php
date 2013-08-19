<?php
$con=mysqli_connect("localhost","shahida2","UxNq4L9pY56F","shahida2_registration");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="INSERT INTO feedback (name, code, phone, email, nature, category, comment)
VALUES
('$_POST[name]','$_POST[code]','$_POST[phone]','$_POST[email]','$_POST[nature]','$_POST[category]','$_POST[comment]')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error());
  }
  


mysqli_close($con);
?>

<html>
<head>
                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
                        <meta name="HandheldFriendly" content="true" /><title>Thank You</title><style>body{ font-size:12px; font-family:Verdana; }</style></head><body><p> </p>
<div style="text-align: center;">
<h1><span style="font-family: arial, helvetica, sans-serif;">Thank You!</span></h1>
</div>
<div style="text-align: center;"><span style="font-family: arial, helvetica, sans-serif;">Your submission has been received.</span></div>
<div style="text-align: center;"></div>
<div style="text-align: center;"><span style="color: #008000; font-size: medium; font-family: arial, helvetica, sans-serif;"><a href="">Home</a></strong></span></div>

</body>
</html>