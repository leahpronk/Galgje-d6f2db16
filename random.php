<?php
$foutmelding=NULL;

$woordenlijst=array("gekoloniseerd", "Empire", "Republic", "Mandalorian");


if(isset($_POST["gecodwoord"]))
{
    $gecod_woord=$_POST["gecodwoord"];
    foreach($woordenlijst as $w)
    {
         if (md5($w)==$gecod_woord)
         {
              $woord=$w;
         }
    }
}
else
{
    $woord=$woordenlijst[array_rand($woordenlijst,1)];
    $gecod_woord=md5($woord);
}

if(isset($_POST["geproblet"]))
{
    $geproblet=$_POST["geproblet"];
}
else
{
    $geproblet=NULL;
}

if(isset($_POST["pogingen"]))
{
    $poging=$_POST["pogingen"];
}
else
{
    $poging=0;
}


if(isset($_POST["bezig"]))
{
    $punten=$_POST["bezig"];
}
else
{
    $lengte=strlen($woord);
    $x=0;

    if(!isset($punten))
    {
         $punten=NULL;
         while(($x < $lengte))
         {
              $punten .= ".";
              $x++;
         }
    }
}



if(isset($_POST["letter"]) and ($_POST["letter"]!=NULL))
{
    $letter=$_POST["letter"];

    $offset=0;
    $positie = 0;
    $positie = strpos($woord,$letter,$offset);

    while($positie!== false)
    {
         $positie = strpos($woord,$letter,$offset);
         $offset=$positie+1;
         if($positie != '0')
         {
              $punten = substr_replace($punten,$letter,$positie,1);
         }
         else
         {
              if(strpos($woord,$letter,0)=='0')
              {
                   $punten = substr_replace($punten,$letter,0,1);
              }
         }
    }

    if((strpos($woord,$letter)===false) and (isset($letter)))
    {
        $foutmelding="<font color=red>Niet voorkomende letter:</font> ";
        $poging++;
    }
}
else
{
    if(isset($_POST["gecodwoord"]))
    {
         echo "<font color=red>Fout!, je hebt geen letter ingevuld</font>";
    }
    $letter=NULL;
}


if($poging==7)
{
    echo "Je hebt verloren! het woord was: <b>".$woord."</b>";
    exit;
}

echo $foutmelding;
unset($foutmelding);

$geproblet .= " ". $letter;

echo "<b>".$letter."</b>";
echo "<h2>".$punten."</h2>";
echo "<b>fouten:</b> <font color=red>".$poging."</font>";
echo "<br>";
echo "<b>geprobeerde letters:</b> <font color=red>".$geproblet."</font>";

$zelf = $_SERVER['PHP_SELF'];

if($punten==$woord)
{
    echo "<br><br><b>Gefeliciteerd, je hebt het woord gevonden! </b>";
    exit;
}


echo '<br>
<FORM ACTION="'.$zelf.'" width="150" METHOD="POST">
<b>Probeer de letter:<br>
<INPUT TYPE="text" NAME="letter" SIZE="1" MAXLENGTH="1">
<INPUT TYPE="hidden" NAME="gecodwoord" VALUE="'.$gecod_woord.'">
<INPUT TYPE="hidden" NAME="bezig" VALUE="'.$punten.'">
<INPUT TYPE="hidden" NAME="pogingen" VALUE="'.$poging.'">
<INPUT TYPE="hidden" NAME="geproblet" VALUE="'.$geproblet.'">
<INPUT TYPE="submit" VALUE="Probeer"></b>';



?>
<?php

  if($poging === 1){
    echo('<img id="dood" src="galgje1.png">');
  } if($poging === 2) {
    echo('<img id="dood" src="galgje2.png">');
  } if($poging === 3) {
    echo('<img id="dood" src="galgje3.png">');
  }if($poging === 4) {
    echo('<img id="dood" src="galgje4.png">');
  }if($poging === 5) {
    echo('<img id="dood" src="galgje5.png">');
  }if($poging === 6) {
    echo('<img id="dood" src="galgje6.png">');
  }if($poging === 7) {
    echo('<img id="dood" src="galgje7.png">');
  }
?>
