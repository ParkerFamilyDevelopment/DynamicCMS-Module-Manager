<?php
error_reporting(0);
$yourStartingPath = "modules";
$all_dirs = glob($yourStartingPath . '/*' , GLOB_ONLYDIR);
echo "<h3 class='display-9'>List Installed Modules <a href='/?mod=module_manager&act=install' class='btn btn-success'>Install Module</a></h3>";
echo "<div class='table-responsive'><table class='table'>";
echo "<tr><th>Directory</th><th>Name</th><th>Author</th><th>Actions</th></tr>";
foreach($all_dirs as $file) { 
$result = end(explode('/', $file)); 
$echo = basename($result);
$modname = file_get_contents("modules/$echo/name.txt");
$authorname = file_get_contents("modules/$echo/author.txt");
echo "<tr>";
echo "<td>";
echo $echo;
echo "</td>";
echo "<td>";
echo $modname;
echo "</td>";
echo "<td>";
echo $authorname;
echo "</td>";
echo "<td>";
echo "<a href='/?mod=module_manager&act=delete&id=$echo' class='btn btn-danger'>Delete</a>";
echo "<br /><br />";
echo "<a href='/?mod=module_manager&act=deactivate&id=$echo' class='btn btn-secondary'>Deactivate</a>";

echo "</td>";
echo "</tr>";
        } 
echo "</table></div>";



echo "<br />";
$yourStartingPath1 = "$absolutepath/deactivated_modules";
$all_dirs1 = glob($yourStartingPath1 . '/*' , GLOB_ONLYDIR);
echo "<h3 class='display-9'>List Deactivated Modules</h3>";
echo "<div class='table-responsive'><table class='table'>";
echo "<tr><th>Directory</th><th>Name</th><th>Author</th><th>Actions</th></tr>";
foreach($all_dirs1 as $file1) { 
$result1 = end(explode('/', $file1)); 
$echo1 = basename($result1);
$modname1 = file_get_contents("$absolutepath/deactivated_modules/$echo1/name.txt");
$authorname1 = file_get_contents("$absolutepath/deactivated_modules/$echo1/author.txt");
echo "<tr>";
echo "<td>";
echo $echo1;
echo "</td>";
echo "<td>";
echo $modname1;
echo "</td>";
echo "<td>";
echo $authorname1;
echo "</td>";
echo "<td>";
echo "<a href='/?mod=module_manager&act=reactivate&id=$echo1' class='btn btn-secondary'>Reactivate</a>";
echo "</td>";
echo "</tr>";
        } 
echo "</table></div>";
?>