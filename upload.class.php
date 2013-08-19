<?php 

/////////////// Upload FILE CLASS //////////////// 
//*********************************************** 
//************************************************ 
//************** CREATED BY RK ******************* 
//************ Owner of Tracepk.net ************** 
/////////////////////////////////////////////////// 


class Upload { 

     
    var $fieldname; 
    //var $type; 
    var $upload_dir; 
    var $filename; 
     
     
    function __construct( $n_fieldname, $n_upload_dir ){ 
     
        $this->fieldname = $n_fieldname; 
        //$this->type = $n_type; 
        $this->upload_dir = $n_upload_dir; 
        //$this->filename = $n_filename; 
        $this->uploaded();     
     
    } 
     
     
     
    function uploaded(){ 
     
        if( $_FILES[$this->fieldname]){ 
     
            if( $_FILES[$this->fieldname]["error"] == 0){ 
             
                echo "<b>File name: </b>" . $_FILES[$this->fieldname]["name"] . "<br />"; 
                //echo "<b>File type: </b>" . $_FILES[$this->fieldname]["type"] . "<br />"; 
                echo "<b>File size: </b>" . (($_FILES[$this->fieldname]["size"] / 1024)/1024) . " Mb<br />"; 
                echo "<b>File Tmp: </b>" . $_FILES[$this->fieldname]["tmp_name"] . "<br />"; 
                 
                if(move_uploaded_file( $_FILES[$this->fieldname]["tmp_name"], $this->upload_dir . $_FILES[$this->fieldname]["name"])){ 
                 
                    echo "Uploaded.."; 
                 
                } 
                 
            } else { 
             
                echo "Error: " . $_FILES[$this->fieldname]["error"] . "<br />"; 
             
            } 
             
        } else { 
         
            echo "Wrong file type.."; 
         
        } 
     
    } 
     

} 
?> 