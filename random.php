<?php

$mistrakecounter = 0;

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
        $mistrakecounter++;
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
<INPUT TYPE="submit" NAME="letter" VALUE="a">
<INPUT TYPE="submit" NAME="letter" VALUE="b">
<INPUT TYPE="submit" NAME="letter" VALUE="c">
<INPUT TYPE="submit" NAME="letter" VALUE="d">
<INPUT TYPE="submit" NAME="letter" VALUE="e">
<INPUT TYPE="submit" NAME="letter" VALUE="f">
<INPUT TYPE="submit" NAME="letter" VALUE="g">
<INPUT TYPE="submit" NAME="letter" VALUE="h">
<INPUT TYPE="submit" NAME="letter" VALUE="i">
<INPUT TYPE="submit" NAME="letter" VALUE="j">
<INPUT TYPE="submit" NAME="letter" VALUE="k">
<INPUT TYPE="submit" NAME="letter" VALUE="l">
<INPUT TYPE="submit" NAME="letter" VALUE="m">
<INPUT TYPE="submit" NAME="letter" VALUE="n">
<INPUT TYPE="submit" NAME="letter" VALUE="o">
<INPUT TYPE="submit" NAME="letter" VALUE="p">
<INPUT TYPE="submit" NAME="letter" VALUE="q">
<INPUT TYPE="submit" NAME="letter" VALUE="r">
<INPUT TYPE="submit" NAME="letter" VALUE="s">
<INPUT TYPE="submit" NAME="letter" VALUE="t">
<INPUT TYPE="submit" NAME="letter" VALUE="u">
<INPUT TYPE="submit" NAME="letter" VALUE="v">
<INPUT TYPE="submit" NAME="letter" VALUE="w">
<INPUT TYPE="submit" NAME="letter" VALUE="x">
<INPUT TYPE="submit" NAME="letter" VALUE="y">
<INPUT TYPE="submit" NAME="letter" VALUE="z">
<INPUT TYPE="hidden" NAME="gecodwoord" VALUE="'.$gecod_woord.'">
<INPUT TYPE="hidden" NAME="bezig" VALUE="'.$punten.'">
<INPUT TYPE="hidden" NAME="pogingen" VALUE="'.$poging.'">
<INPUT TYPE="hidden" NAME="geproblet" VALUE="'.$geproblet.'"></b>';



?>
<?php

  if($mistrakecounter === 0){
    echo('<img id="dood" src="galgje1.png">');
  } if($mistrakecounter === 1) {
    echo('<img id="dood" src="galgje2.png">');
  } if($mistrakecounter === 2) {
    echo('<img id="dood" src="galgje3.png">');
  }if($mistrakecounter === 3) {
    echo('<img id="dood" src="galgje4.png">');
  }if($mistrakecounter === 4) {
    echo('<img id="dood" src="galgje5.png">');
  }if($mistrakecounter === 5) {
    echo('<img id="dood" src="galgje6.png">');
  }if($mistrakecounter === 6) {
    echo('<img id="dood" src="galgje7.png">');
  } if($mistrakecounter === 7) {
    echo('<img id="dood" src="galgje7.png">');
  }
?>
