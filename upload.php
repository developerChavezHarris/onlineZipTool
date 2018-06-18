<?php
// count the number of file uploaded
$total = count($_FILES['upload']['name']);
// Loop through each file
for( $i=0 ; $i < $total ; $i++ ) {
  //Get the temp_name as well as the file path
  $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
  //Make sure we have a file path
  if ($tmpFilePath != ""){
    //Setup our new file path
    $newFilePath = "Zipped-Files/" . $_FILES['upload']['name'][$i];
    //Upload the file into the new path we created
    if(move_uploaded_file($tmpFilePath, $newFilePath)) {
      //Handle other code here
       //echo  "<h2>Files were successfully uploaded</h2>" . "<br />";
  }
}
}
$path = "Zipped-Files/";
// list all the files in the directory 
$files = array_diff( scandir($path), array(".", "..") ); // exclude "." and ".." from the directory listing
foreach ($files as &$value) { // for every file in the directory
   // echo $value . '<br/>'; // lets echo the name of each of those files
    
    $zip = new ZipArchive(); // lets create a zip archive 
    $zip->open('zipper/files.zip', ZipArchive::CREATE);
     
    $zip->addFile($path.'/'.$value); // and add the files that we uploaded using the form button to it
    
     
    $zip->close(); // lets close the zip archive - php unlock the zipped archives
}

//// since we already moved the files to the zip archive we created, we do not want uncompress files
//// any longer, so we'll delete them next

$filesToDelete = 'Zipped-Files/'; // lets create a variable to hold the path that the files to be deleted lives in
if (file_exists($filesToDelete)) { // now we are asking if the path do contain actual files

 chmod($filesToDelete, 0777); // lets grant permission/ Access to the folder so that php can successfully remove the files from it
 foreach(glob('Zipped-Files/*.*') as $file) // we now create a foreach loop to loop through each file in the directory
 if(is_file($file)) // and if the file is really a file, then we will delete it
     @unlink($file);
     //echo 'Files Deleted'; // we'll echo "Files Deleted" when we successfully delete the files
 } 
 else {
     echo 'Files does not exists'; // if the deletion was unsuccessful then we echo "Files does not exists"
 }

?>

<?php
if (file_exists('zipper/files.zip')) {
echo "<a href=" . "download.php>" . "Download Files</a>";
} else {
  header("Location: index.php"); /* Redirect browser */
}

 
  
 


?>