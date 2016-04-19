<?php
require_once('mysqlClass.inc.php');
//$db = new mysql_db(SERVER, USERNAME, PASSWORD, DATABASE);

function updateKeywords($keywords) {
    $query = "UPDATE keywords
        SET words = concat(words,',','$keywords') limit 1";
    echo $query;
    mysql_query($query) or die ("viewplus() failed. Could not query the database: <br />". mysql_error());
    return 1;
}
//unit test
//echo updateKeywords("sky,blue,car,audio,fly,man,cool,japan,fast,ac,ssss,asd,music,comfortable,beautiful");

function getKeywords() {
    $query = "select * from keywords limit 1";
    $result = mysql_query($query) or die("remove block to sharefriends fails". mysql_error());
    $row = mysql_fetch_array($result, MYSQL_ASSOC);
    $storeArray = array();
    
                    $wordstr = $row["words"];
                    $wordstr = preg_replace('/\s+/', '', $wordstr);
                    $words = split(",",$wordstr);
                    foreach($words as $word) {
                      if ($word == "") {
                        continue;
                      }
                      $storeArray[] = $word;
                    }

    return $storeArray;
}
//unit test
//print_r( getKeywords());

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
    updateKeywords($keywords);

    return 1;
}
//unit test
//echo addMedia('phpddd', 'fangyu1', 1, 1, 1, array('xiao1', 'xiao2'), '/upload', 'this is good', 1, 1, 'long, nike');
//echo addMedia('php2', 'fangyu1', 1, 1, 0, array(), '/upload', 'this is good', 1, 1, 'long, nike');

function rmBlock($mediaid, $friend) {
    $query = "select * from sharedfriends where mediaid = '$mediaid' and username = '$friend'";
    $result = mysql_query($query)
        or die("check share exist fails". mysql_error());
    $row = mysql_fetch_assoc($result);
    if ($row != 0) {
        return 1;
    }

    $shareInsert = "insert into sharedfriends (mediaid, username) values ('$mediaid', '$friend')";
    mysql_query($shareInsert) or die("remove block to sharefriends fails". mysql_error());
    return 1;
}
//unit test
//echo rmblock(9, 'xiao3');

function getUploads($username) {
    $query = "select mediaid, title, username, sharetype, viewcount, posttime from media where username = '$username'";
    $result = mysql_query($query) or die("remove block to sharefriends fails". mysql_error());
    $storeArray = Array();
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        if ($row['sharetype'] == 0) {
            $row['block'] = array();
            $storeArray[] = $row;
            continue;
        }
        $mediaid = $row['mediaid'];
        $blockquery = "select userid2 from contact where userid1='$username' and userid2 not in(select username from sharedfriends where mediaid='$mediaid')";
        $blocks = mysql_query($blockquery) or die("blockquery fails". mysql_error());

        $storeBlock = Array();
        while ($rowBlock = mysql_fetch_array($blocks, MYSQL_ASSOC)) {
            $storeBlock[] =  $rowBlock['userid2'];
        }

        $row['block'] = $storeBlock;
        $storeArray[] = $row;
    }
    return $storeArray;
}
//unit test
//echo '<pre>'; print_r(getUploads('fangyu1')); echo '</pre>';

function viewplus($mediaid) {
    $query = "UPDATE media
        SET viewcount = viewcount + 1
        WHERE mediaid = '$mediaid'";
    mysql_query($query) or die ("viewplus() failed. Could not query the database: <br />". mysql_error());
    return 1;
}
//unit test
//echo viewplus(1);

function updateAvgrate($mediaid) {
    $query = "select count(score) as num from rate where mediaid = '$mediaid'";
    $result = mysql_query($query) or die ("updateAvgrate() failed. Could not query the database: <br />". mysql_error());
    $row = mysql_fetch_assoc($result);
    if ($row['num'] == 0) {
        return 1;
    }

    $query = "update media set avgrate = (select sum(score)/count(score) from rate where mediaid = '$mediaid') where mediaid = '$mediaid'";
    mysql_query($query) or die ("updateAvgrate() failed. Could not query the database: <br />". mysql_error());
    return 1;
}
//unit test
//echo updateAvgrate(1);

function viewMedia($mediaid) {
    updateAvgrate($mediaid);
    $query = "select * from media where mediaid = '$mediaid'";
    $result = mysql_query($query) or die("viewMedia fails". mysql_error());
    $row = mysql_fetch_array($result, MYSQL_ASSOC);
    viewplus($mediaid);
    return $row;
}
//unit test
//echo '<pre>'; print_r(viewMedia('1')); echo '</pre>';
?>
