<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>User</title>
     <link rel="stylesheet" type="text/css" href="galgje.css">
  </head>
  <body>
    <h1>Kies een woord.</h1>
        <form  action="#" method="post">
        <input type="text" name="woord">
    <button type="submit" name="button">Leuk woord</button>

<?php
if (isset($_POST['woord'])) {
$keuze = strtolower($_POST['woord']);
setcookie('woord' , $keuze , time() + (86400 * 10) );
header("Location: spelntje.php");
}
?>

</form>
  </body>
</html>
