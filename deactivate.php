<?php
error_reporting(0);
if(isset($_GET['confirm'])) {
mkdir("$absolutepath/deactivated_modules/$getid", 0777, true);

  $dir = "modules/$getid";
    $dirNew = "$absolutepath/deactivated_modules/$getid";
    // Open a known directory, and proceed to read its contents
    if (is_dir($dir)) {
        if ($dh = opendir($dir)) {
            while (($file = readdir($dh)) !== false) {
            //if ($file=="index.php") continue; for example if you have index.php in the folder

            if (rename($dir.'/'.$file,$dirNew.'/'.$file))
                {
                //if files you are moving are images you can print it from 
                //new folder to be sure they are there 
                }
                else { }
            }
            closedir($dh);
        }
    }
 rmdir("modules/$getid");



echo "<div class='alert alert-success'>You have successfully deactivated the module. <a href='/?mod=module_manager' class='btn btn-primary'>Manage Modules</a></div>";
}
?>




<h3 class="display-9">Confirm Deactivation</h3>  



<div class="card"><div class="card-header">Are you sure?</div><div class="card-body">
<p class="card-text">Are you sure you wish to deactivate this module?</p>

<a href="/?mod=module_manager&act=deactivate&id=<?php echo $getid; ?>&confirm=true" class="btn btn-danger">Confirm</a>
<br /><br /><br />
<a href="/?mod=module_manager" class="btn btn-primary">Cancel</a>
</div></div>

</br>