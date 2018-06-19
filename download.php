<?php error_reporting(E_ALL); ini_set('display_errors', 1);?>
<?php
if (file_exists('zipper/files.zip')) {

// We'll be outputting a zip file
header('Content-Type: application/zip');
// It will be called zip-files.zip
header('Content-Disposition: attachment; filename="zip-files.zip"');
// The PDF source is in zipper/files.zip
readfile('zipper/files.zip');
//file size
header('Content-Length: '.filesize('zipper/zip-files.zip'));
ignore_user_abort(true);
unlink('zipper/files.zip'); // delete the zip-file.zip from the server once user initiate the download
exit;
}  else {
 header("Location: index.php"); /* Redirect browser */
}
?>