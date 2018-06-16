
<?php
// gonna get the files from temporary memory and upload them to the /uploadedFiles directory



//$files = array_filter($_FILES['upload']['name']); //something like that to be used before processing files.

// Count # of uploaded files in array
$total = count($_FILES['upload']['name']);

// Loop through each file
for( $i=0 ; $i < $total ; $i++ ) {

  //Get the temp file path
  $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

  //Make sure we have a file path
  if ($tmpFilePath != ""){
    //Setup our new file path
    $newFilePath = "./uploadedFiles/" . $_FILES['upload']['name'][$i];

    //Upload the file into the temp dir
    if(move_uploaded_file($tmpFilePath, $newFilePath)) {

      //Handle other code here
    //   echo  "test" . "<br />";

  }
}
}

$path = "uploadedFiles/";
// $files = scandir($path);
$files = array_diff( scandir($path), array(".", "..") );

foreach ($files as &$value) {
    echo $value . '<br/>';
    

    $zip = new ZipArchive();
    $zip->open('zip/zipfile.zip', ZipArchive::CREATE);
     
    $zip->addFile($path.'/'.$value);
    
     
    $zip->close();

}






// We'll be outputting a PDF
// header('Content-Type: application/zip');

// It will be called downloaded.pdf
// header('Content-Disposition: attachment; filename="zipfile.zip"');



// The PDF source is in original.pdf
// readfile('zip/zipfile.zip');

//file size
// header('Content-Length: '.filesize('zip/zipfile.zip'));

// $zip = new ZipArchive();
// $zip->open('zip/zipfile.zip', ZipArchive::CREATE);
 
// $zip->addFile($path.'/'.$value);

 
// $zip->close();















// Create ZIP file
// if(isset($_POST['create'])){
//  $zip = new ZipArchive();
//  $filename = "./zipfile.zip";

//  if ($zip->open($filename, ZipArchive::CREATE)!==TRUE) {
//   exit("cannot open <$filename>\n");
//  }

//  $dir = 'includes/';

 // Create zip
//  createZip($zip,$dir);

//  $zip->close();
// }

// Create zip
// function createZip($zip,$dir){
//  if (is_dir($dir)){

//   if ($dh = opendir($dir)){
//    while (($file = readdir($dh)) !== false){
 
    // If file
    // if (is_file($dir.$file)) {
    //  if($file != '' && $file != '.' && $file != '..'){
 
    //   $zip->addFile($dir.$file);
    //  }
    // }else{
     // If directory
     // if(is_dir($dir.$file) ){

     //  if($file != '' && $file != '.' && $file != '..'){

       // Add empty directory
       // $zip->addEmptyDir($dir.$file);

       // $folder = $dir.$file.'/';
 
       // Read data of the folder
//        createZip($zip,$folder);
//       }
//      }
 
//     }
 
//    }
//    closedir($dh);
//   }
//  }
// }

// Download Created Zip file
// if(isset($_POST['download'])){
 
//  $filename = "myzipfile.zip";

//  if (file_exists($filename)) {
//   header('Content-Type: application/zip');
//   header('Content-Disposition: attachment; filename="'.basename($filename).'"');
//   header('Content-Length: ' . filesize($filename));

//   flush();
//   readfile($filename);
  // delete file
  // unlink($filename);
 
//  }
// }
?>
<h2>Files Successfully Zipped, Please Download</h2>
<hr>
<a href="download.php">Download Zipped Files</a>