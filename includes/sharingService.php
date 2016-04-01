<?php
require_once('mysqlClass.inc.php');
$db = new mysql_db(SERVER, USERNAME, PASSWORD, DATABASE);

function addMedia($title, $username, $type, $catetory, $sharetype, $sharedfriends, $path, $detail, $candiscuss, $canrate, $keywords) {
    $insert = "insert into media (title, username, type, category, sharetype, path, detail, canDiscuss, canrate, keywords) values ('$title', '$username', '$type', '$catetory', '$sharetype', '$path', '$detail', '$candiscuss', '$canrate', '$keywords')";
    mysql_query($insert) or die("insert to media fails". mysql_error());
    if (!$sharetype) {
        return 1;
    }

    $id = mysql_insert_id();
    foreach ($sharedfriends as $friend) {
        $shareInsert = "insert into sharedfriends (mediaid, username) values ('$id', '$friend')";
        mysql_query($shareInsert) or die("insert to sharefriends fails". mysql_error());
    }

    return 1;
}
//unit test
//echo addMedia('phpddd', 'fangyu1', 1, 1, 1, array('xiao1', 'xiao2'), '/upload', 'this is good', 1, 1, 'long, nike');
//echo addMedia('php2', 'fangyu1', 1, 1, 0, array(), '/upload', 'this is good', 1, 1, 'long, nike');

//function getMediaInfo()

?>
