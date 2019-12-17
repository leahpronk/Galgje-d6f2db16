<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
        <link rel="stylesheet" type="text/css" href="galgje.css">
	</head>
	<body>
		<div class="mid">
			<?php

			$antlFouten = 0;
			if(isset($_POST['button'])){
				if($_POST['button'] != 'reset'){
					$ltsteKarakter   = $_POST['button'];
					if(isset($_COOKIE['characters'])){
						$karakters = $_COOKIE['characters'] . ',' . $_POST['button'];
					} else {
						$karakters = $_POST['button'];
					}
					setcookie('characters' , $karakters , time() + (86400 * 10) );
					header("Location: spelntje.php");
				} else {
					setcookie("woord", "", time() - 3600);
					setcookie("characters", "", time() - 3600);
					setcookie("mistakes", "", time() - 3600);
					header("Location: galgje.php");
				}
			}

			if (!isset($_COOKIE['characters'])) {
				$_COOKIE['characters'] = " ";
			}
			$woordKarakters = str_split($_COOKIE['woord']);
			$keuzeKarakters = explode(",", $_COOKIE['characters']);
			$win = true;
			foreach ($woordKarakters as $woordKarakter) {
				$keuzeCorrect = false;
				foreach ($keuzeKarakters as $keuzeKarakter) {
					if($woordKarakter === $keuzeKarakter){
						$keuzeCorrect = true;
					}
                }
                echo "<div id='streep'>";
				if($keuzeCorrect){
					echo($woordKarakter);
				} else {
					echo('_ ');
					$win = false;
                }
                echo "</div>";

			}
			foreach ($keuzeKarakters as $keuzeKarakter) {
				$keuzeCorrect = false;
				foreach ($woordKarakters as $woordKarakter) {
					if($woordKarakter === $keuzeKarakter){
						$keuzeCorrect = true;
					}
				}

				if(!$keuzeCorrect){
					$antlFouten++;
				}
			}
			$verloren = false;
			if($antlFouten === 7){
				$verloren = true;
			}

			if($win){
				echo '<br>' . '<h1>Je hebt gewonnen</h1>';
			}
			if($verloren){
				echo '<br>' . '<h1>Je hebt verloren</h1>';
			}
			?>
			<br>
			<br>
			<br>
			<form action="spelntje.php" method="post">
			<button type="submit" name="button" value="reset">reset</button>

			<?php
				$alphabet = range("a","z");
				foreach ($alphabet as $value) {
					$display = true;
					foreach ($keuzeKarakters as $keuzeKarakter) {
						if ($value === $keuzeKarakter) {
							$display = false;
						}
					}
					if ($win) {
						$display = false;
					}
					if ($verloren){
						$display = false;
					}
					if ($display){
						echo('<button type="submit" name="button" value="' . $value . '">' . $value . '</button>');
					} else {
						echo('<button type="submit" name="button" value="' . $value . '" disabled>' . $value . '</button>');
					}

				}
			?>

			</form>

			<h1>Gebruikte letters:</h1><p>
			<?php
				foreach ($keuzeKarakters as $keuzeKarakter) {
					echo($keuzeKarakter . ' , ');
				}
			?>
			</p>
		</div>
		<div class="right">
			<?php

				if($antlFouten === 1){
					echo('<img id="dood" src="galgje1.png">');
				} if($antlFouten === 2) {
					echo('<img id="dood" src="galgje2.png">');
				} if($antlFouten === 3) {
					echo('<img id="dood" src="galgje3.png">');
				}if($antlFouten === 4) {
					echo('<img id="dood" src="galgje4.png">');
				}if($antlFouten === 5) {
					echo('<img id="dood" src="galgje5.png">');
				}if($antlFouten === 6) {
					echo('<img id="dood" src="galgje6.png">');
				}if($antlFouten === 7) {
					echo('<img id="dood" src="galgje7.png">');
				}
			?>
		</div>

	</body>
</html>
