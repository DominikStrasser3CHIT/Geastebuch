<?php
//retrieve our DATA FROM POST
$name = $_POST['name'];
$ueberschrift = $_POST['ueberschrift'];
$text = $_POST['text'];
$date = date("d M Y");

$mysqli = new mysqli('localhost', 'root', '', 'gaestebuch');
$conn = NEW PDO('mysql:host=localhost;dbname=gaestebuch', 'root', '');

$query = "SELECT * 
        FROM eintrag;";
 
$name = $mysqli->real_escape_string($name);
 
$result = $mysqli->query($query);

if($result->num_rows == 0){
	$qry = $conn->PREPARE('INSERT INTO member (name, datum, ueberschrift, text) VALUES (?, ?, ?, ?)');
	$qry->EXECUTE(array($name, $date ,$ueberschrift , $text));
	echo "";
	echo "Danke für Ihren Eintrag";
	header("Location: eintrag_erstellen.html");
}else{
	echo "<br></br>";
	header('Refresh: 3; URL=register.html');
}
?>