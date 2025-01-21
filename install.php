<?php
error_reporting(0);
 if(isset($_POST["btn_zip"]))  
 {  
      $output = '';  
      if($_FILES['zip_file']['name'] != '')  
      {  
           $file_name = $_FILES['zip_file']['name'];  
           $array = explode(".", $file_name);  
           $name = $array[0];  
           $ext = $array[1];  
           if($ext == 'zip')  
           {  
                $path = 'modules/';  
                $location = $path . $file_name;  
                if(move_uploaded_file($_FILES['zip_file']['tmp_name'], $location))  
                {  
                     $zip = new ZipArchive;  
                     if($zip->open($location))  
                     {  
                          $zip->extractTo($path);  
                          $zip->close();  
                     }  
                     $files = scandir($path . $name);  
                     //$name is extract folder from zip file  
                     foreach($files as $file)  
                     {  
                          $file_ext = end(explode(".", $file));  
                          $allowed_ext = array('jpg', 'png');  
                          if(in_array($file_ext, $allowed_ext))  
                          {  
                               $new_name = md5(rand()).'.' . $file_ext;  
                               $output .= '<div class="col-md-6"><div style="padding:16px; border:1px solid #CCC;"><img src="upload/'.$new_name.'" width="170" height="240" /></div></div>';  
                               copy($path.$name.'/'.$file, $path . $new_name);  
                               unlink($path.$name.'/'.$file);  
                          }       
                     }  
                     unlink($location);  
                     rmdir($path . $name);  
    include("modules/$name/installer_functions.php");
     echo "<div class='alert alert-success'>The module $name was successfully installed. <a href='/?mod=module_manager' class='btn btn-primary'>Manage Modules</a></div>";
                }  
           }  
    
      }  

 }  
 ?>  

           <div class="container" style="width:500px;">  
                <h3 class="display-9">Module Installer</h3>
                <p class="lead">This installer will only work properly with modules developed following the DynamicCMS module development guidelines.</p>
                <form method="post" enctype="multipart/form-data" action="/?mod=module_manager&act=install">  
                
                     <input type="file" name="zip_file" class="form-control"/>  
                     <br />  
                     <input type="submit" name="btn_zip" class="btn btn-primary" value="Install Module" />  
                </form>  
                <br />  
                <?php  
                if(isset($output))  
                {  
                     echo $output;  
                }  
                ?>  
           </div>  
   
 
</form>