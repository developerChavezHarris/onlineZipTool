<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>eZip</title>
</head>
<body>
  <div class='container'>
    <h1>eZip</h1><p>&copy;eZip- A Better way to Zip!</p>
    <h3>Select all the files you want to zip</h3>
    <form method='post' action='upload.php' form enctype= multipart/form-data >
      <input type='file' name='upload[]' multiple='multiple'/>
     <input type='submit' value='Upload and Zip' />
    </form>
<?php 


// Create a temporary file in the temporary 
// files directory using sys_get_temp_dir()
$temp_file = sys_get_temp_dir();

//echo $temp_file;
?>




   </div>
</body>
</html>