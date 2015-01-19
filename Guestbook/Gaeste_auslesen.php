
<?php
// Die folgenden Variablen sind dazu da um Errors oder Messages wie zum Beispiel "30 rows a..." auszugeben
$err = '';  $msg = ''; $tab = '';

$hk = "'";

$link = mysqli_connect('localhost', 'root', '0000', 'gaestebuch');
//Wenn der Link nicht erstellt werden konnte wird ein Error ausgegeben, ansonsten wird die Querry einfach weiter verarbeitet
if (!$link) {
	$err .= 'MySQL Error: ' . mysqli_connect_errno() . "<br>\n";
} else {
	$query = 'SELECT name,ueberschrift,text,datum from eintrag';
	
	$msg .= $query . "<br>\n";
	$res = mysqli_query($link, $query);
	
	
	//Mögliche Fehler werden ausgegeben
	if (!$res) {
		$err .= 'MySQL Error: ' . mysqli_error($link) . "<br>\n";
	} else {
		$msg .= 'Success... rows: ' . mysqli_num_rows($res) . "<br>\n";
		//Die Tabelle wird generiert --> Bilder und Schriften werden eingfügt
		while ($row = mysqli_fetch_assoc($res)) {
			$tab .= '<tr>'
				 .  '<td>'
				 .  $row['name']
				 .  '</td>'
				 .  '<td>'
				 .  $row['ueberschrift']
				 .  '</td>'
				 .  '<td>'
				 .  $row['text']
				 .  '</td>'
				 .  '<td>'
				 .  $row['datum']
				 .  '</td>'
				 .  '</tr>'
				 .  "\n";
		}
	}
	//mysqli_close schließt die verbindung mit der Datenbank
	mysqli_close($link);
	}

// HTML File generieren ERST NACH DEM PHP Teil wegen der Übersichtlichkeit
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
  "http://www.w3.org/TR/html4/loose.dtd">
<html lang="de">
	<head>
		<title>Gaeste auslesen</title>
	</head>
	<body>
	 <!-- Die Querry wird in Blau ausgegeben -->
		<?php 
		if ($err != '') echo '<span style="color:red">'  . $err . '</span>'; ?>
		<?php if ($msg != '') echo '<span style="color:blue">' . $msg . '</span>'; ?>
		<table border="1">
			<tr>
				<td>
					<b><h2>Name</h2></b>
				</td>
				<td>
					<b><h2>Ueberschrift</h2></b>
				</td>
				<td>
					<b><h2>Text</h2></b>
				</td>
				<td>
					<b><h2>Datum</h2></b>
				</td>
			</tr>
			<?php if ($tab != '') echo $tab; ?>
		</table>
	</body>
</html>
