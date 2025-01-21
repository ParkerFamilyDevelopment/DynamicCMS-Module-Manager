<?php
error_reporting(0);
if(isset($_GET['confirm'])) {


function removeDir(string $dir): void {
    $it = new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS);
    $files = new RecursiveIteratorIterator($it,
                 RecursiveIteratorIterator::CHILD_FIRST);
    foreach($files as $file) {
        if ($file->isDir()){
            rmdir($file->getPathname());
        } else {
            unlink($file->getPathname());
        }
    }
    rmdir($dir);
}

include("modules/$getid/uninstaller_functions.php");
removeDir("modules/$getid");
echo "<div class='alert alert-success'>You have successfully deleted the module. <a href='/?mod=module_manager' class='btn btn-primary'>Manage Modules</a></div>";
}
?>




<h3 class="display-9">Confirm Deletion</h3>  



<div class="card"><div class="card-header">Are you sure?</div><div class="card-body">
<p class="card-text">Are you sure you wish to delete this module? this action can not be undone.</p>

<a href="/?mod=module_manager&act=delete&id=<?php echo $getid; ?>&confirm=true" class="btn btn-danger">Confirm</a>
<br /><br /><br />
<a href="/?mod=module_manager" class="btn btn-primary">Cancel</a>
</div></div>

</br>