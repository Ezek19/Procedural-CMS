<?php
Header("content-type: application/x-javascript");
$pathstring=pathinfo($_SERVER['PHP_SELF']);
$locationstring="http://" . $_SERVER['HTTP_HOST'].$pathstring['dirname'] . "/";

function returnimages($dirname=".") {
	 $pattern="(\.jpg$)|(\.png$)|(\.jpeg$)|(\.gif$)";
   $files = array();
	 $curimage=0;
   if($handle = opendir($dirname)) {
       while(false !== ($file = readdir($handle))){
               if(eregi($pattern, $file)){
                     echo 'picsarray[' . $curimage .']="' . $file . '";';
                     $curimage++;
               }
       }

       closedir($handle);
   }
   return($files);
}

echo 'var locationstring="' . $locationstring . '";';
echo 'var picsarray=new Array();';
returnimages()
?> 