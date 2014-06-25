<?php

 // I'm skipping a lloooot of verification steps on the file here.
 // Also, I'm assuming you uploaded a jpg.

 move_uploaded_file($_FILES['image']['tmp_name'], 'uploaded/pic.jpg');
?>
<!DOCTYPE html>
<html>
  <head></head>
  <body>
    <img style="width: 100%;" src="uploaded/pic.jpg?v=<?php echo rand(0,1000) // rand() prevents the browser from displaying a previously cached image ?>"/>
  </body>
</html>