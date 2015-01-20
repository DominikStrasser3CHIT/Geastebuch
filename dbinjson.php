<?php 


    
    mysql_connect("localhost", "root", "root", "gaestebuch");
    mysql_select_db("gaestebuch");      
    
    $res = mysql_query("SELECT * FROM eintrag");
    $records = array();
    while($obj = mysql_fetch_object($res)) {
        $records []= $obj;
    }
    file_put_contents("data.json", json_encode($records));
    


?> 