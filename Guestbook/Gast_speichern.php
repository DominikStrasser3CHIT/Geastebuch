<table align="center">
	<tr>
		<td>
			<a href="Startseite Gästebuch.html">Zur&uuml;ck zum Gaestebuch</a>
		</td>
	</tr>
</table>
<?php

// 1.) Variablen initialisieren
session_start();

$err = '';
$id = '5';
$name = '';
$datum = '2';
$ueberschrift = '';
$text = '';
// 2.) Eingaben übernehmen und prüfen

// Fehlende Eingaben bestimmen
if (isset($_POST['speichern'])) {
	if (empty($_POST['name'])) {
		$err .= 'Bitte geben Sie einen Namen ein!' . "<br>\n";
	}
	if (empty($_POST['text'])) {
		$err .= 'Bitte geben Sie einen Text ein!' . "<br>\n";
	} 
	if (empty($_POST['ueberschrift'])) {
		$err .= 'Bitte geben Sie eine Ueberschrift ein!' . "<br>\n";
	} 
}

// 3.) Verbindung zum DB-Server aufbauen
$link = mysqli_connect('localhost', 'root', '0000', 'gaestebuch');

if (!$link) {
    $err .= 'MySQL Error: ' . mysqli_connect_errno() . "<br>\n";
} else {
    // $msg .= 'Success... ' . mysqli_get_host_info($link) . "<br>\n";

    // 4.) Queries ausführen
	
	// Datensatz einfügen?
	if (isset($_POST['speichern'])) {
		 $query = 'INSERT INTO eintrag  VALUES ('
			      ."null, "
				  ."'".$_POST['name']."', "
				  ."null, "
				  ."'".$_POST['ueberschrift']."', "
				  ."'".$_POST['text']."' "
				  .')';
			
		 $msg .= $query . "<br>\n";
		 $res = mysqli_query($link, $query);
		 if (!$res) {
            $err .= 'MySQL Error: ' . mysqli_error($link) . "<br>\n";
		 } else {
            mysqli_affected_rows($link);
			}
		 echo "Der Film wurde erfolgreich gespeichert";
 	}
    // 5.) Verbindung zum Server abbauen
    mysqli_close($link);
}

// 6.) HTML-Dokument mit dynamischen Inhalten generieren bzw. ergänzen
// ev. Sortierrichtung wechseln 
?>
</tr>
</table>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
  "http://www.w3.org/TR/html4/loose.dtd">
<html lang="de">
    <head>
        <title>Gast INSERTS</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
		<h1>Gast speichern</h1>
        <?php if ($err != '') echo '<span style="color:red">'  . $err . '</span>'; ?>
        <?php if ($msg != '') echo '<span style="color:blue">' . $msg . '</span>'; ?>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<table border="1">
				<tr>
					<td>
						Name
					</td>
					<td>
						<input type="text" name="name" value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>">
					</td>
				</tr>
				<tr>
					<td>
						Ueberschrift
					</td>
					<td>
						<input type="text" name="ueberschrift" value="<?php if (isset($_POST['ueberschrift'])) echo $_POST['ueberschrift']; ?>">
					</td>
				</tr>
				<tr>
					<td>
						Text
					</td>
					<td>
						<input type="text" name="text" value="<?php if (isset($_POST['text'])) echo $_POST['text']; ?>">
					</td>
				</tr>
			</table>
			<input type="submit" name="speichern" value="Film speichern">
		</form>
		<!-- jQuery (notwendig für Bootstrap's JavaScript Plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Alle Plugins als verkleinerte Version laden -->
    <script src="js/bootstrap.min.js"></script>
	<!--Einbinden der Ajax/XML (Javascript) Datei welche mir die Elemente zuweist -->
	<script src="mein_JQueryXML_Code.js"></script> 
    </body>
</html>
