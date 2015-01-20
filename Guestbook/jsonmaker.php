<?php
$result = mysql_query(your sql here);    
$data = array();
while ($row = mysql_fetch_assoc($result)) {
    // Generate the output in desired format
    $data = array(
        'cols' => ....
        'rows' => ....
        'p' => ...
    );
}

$json_data = json_encode($data);
file_put_contents('your_json_file.json', $json_data);
?>