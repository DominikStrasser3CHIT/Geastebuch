<?php 


    
    mysql_connect("localhost", "root", "0000", "gaestebuch");
    mysql_select_db("gaestebuch");      
    
    $res = mysql_query("SELECT * FROM eintrag");
    $records = array();
    while($obj = mysql_fetch_object($res)) {
        $records []= $obj;
    }
    file_put_contents("data.json", json_encode($records));
    echo "JSON File im Ordner erstellt!";


?> 