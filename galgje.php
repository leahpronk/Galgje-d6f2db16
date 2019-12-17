<?php
session_start();

if(isset($_POST['reset']))
{
    session_destroy();
    header("location: ".$_SERVER['REQUEST_URI']);
    exit;
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>opties</title>
     <link rel="stylesheet" type="text/css" href="galgje.css">
  </head>
    <body>

    <div id="index">
        <h1>Galgje</h1>
        <h2>kies een optie: </h2>
    </div>

    <div>
        <form action="random.php" method="post">
            <button  type="submit" name="random">Random woord</button>
        </form>
        <form action="woordgalgje.php" method="post">
            <button type="submit" name="submit" >zelf een woord kiezen</button>
        </form>
    </div>
  </body>
</html>
