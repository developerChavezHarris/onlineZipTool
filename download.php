<?php

// We'll be outputting a zip file
header('Content-Type: application/zip');

// It will be called downloaded.pdf
header('Content-Disposition: attachment; filename="zipfile.zip"');



// The PDF source is in myzip.zip
readfile('zip/zipfile.zip');

//file size
header('Content-Length: '.filesize('zip/zipfile.zip'));

?>