<?php

$link = mysqli_connect('localhost', 'root', '0000', 'gaestebuch');

$query = 'SELECT id FROM eintrag';

$res = mysqli_query($link, $query);

while ($row = mysqli_fetch_assoc($res)) {
	if((isset($_POST['id'])) && ($row['id'] == $_POST['id'])) {
		$id .= $row['id']
                .  "<br>";
	}
	else {
		$id .= $row['id']
                .  "<br>";
	}
}

$query = 'SELECT name FROM eintrag';

$res = mysqli_query($link, $query);

while ($row = mysqli_fetch_assoc($res)) {
	if((isset($_POST['name'])) && ($row['name'] == $_POST['name'])) {
		$name .= $row['name']
                .  "<br>";
	}
	else {
		$name .= $row['name']
                .  "<br>";
	}
}

$query = 'SELECT datum FROM eintrag';

$res = mysqli_query($link, $query);

while ($row = mysqli_fetch_assoc($res)) {
	if((isset($_POST['datum'])) && ($row['datum'] == $_POST['datum'])) {
		$datum .= $row['datum']
                .  "<br>";
	}
	else {
		$datum .= $row['datum']
                .  "<br>";
	}
}

$query = 'SELECT ueberschrift FROM eintrag';

$res = mysqli_query($link, $query);

while ($row = mysqli_fetch_assoc($res)) {
	if((isset($_POST['ueberschrift'])) && ($row['ueberschrift'] == $_POST['ueberschrift'])) {
		$ueberschrift .= $row['ueberschrift']
                .  "<br>";
	}
	else {
		$ueberschrift .= $row['ueberschrift']
                .  "<br>";
	}
}

$query = 'SELECT text FROM eintrag';

$res = mysqli_query($link, $query);

while ($row = mysqli_fetch_assoc($res)) {
	if((isset($_POST['text'])) && ($row['text'] == $_POST['text'])) {
		$text .= $row['text']
                .  "<br>";
	}
	else {
		$text .= $row['text']
                .  "<br>";
	}
}

$query = 'INSERT INTO eintrag VALUES (3, "Lukas Mustermann", "2015-01-13", "Ueberschrift", "Text")';

$res = mysqli_query($link, $query);
		
mysqli_close($link);

?>

<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Gästebuch Prototyp</title>
	</head>

	<body>

		<?php echo $id; ?>
        <?php echo $name; ?>
        <?php echo $datum; ?>
        <?php echo $ueberschrift; ?>
        <?php echo $text; ?>

	</body>
</html>