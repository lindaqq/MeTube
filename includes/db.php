<?php
$db['db_host'] = "mysql1.cs.clemson.edu";
$db['db_user'] = "Metube_krf4";
$db['db_pass'] = "xiaoqi17";
$db['db_name'] = "Metube_aoy9";

//$db['db_host'] = "localhost";
//$db['db_user'] = "root";
//$db['db_pass'] = "";
//$db['db_name'] = "Metube";

foreach($db as $key => $value) {
    define(strtoupper($key), $value);
}

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//if ($connection) {
//    echo "we are connected";
//}
?>