<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>EmilyZip</title>
</head>
<body>
  <div class='container'>
    <h1>EmilyZip</h1>
    <h3>Zip a Single file</h3>
    <form method='post' action='upload.php' form enctype= multipart/form-data >
      <input type='file' name='upload[]' multiple='multiple'/>
     <input type='submit' value='Upload and Zip' />
    </form>
   </div>
</body>
</html>