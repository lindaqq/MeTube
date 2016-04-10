<?php
include_once ("mysqlClass.inc.php");
//$db = new mysql_db(SERVER, USERNAME, PASSWORD, DATABASE);
//basic
function existUser ($username){
	$query = "select * from account where username='$username'";
	$result = mysql_query( $query );
	if (!$result){
        die ("user_exist_check() failed. Could not query the database: <br />". mysql_error());
        return 1;
	}

    $row = mysql_fetch_assoc($result);
    if($row == 0){
        return 0;
    }
    return 1;
}
//unit test
//echo existUser('ad');

function loginCheck($username, $password)
{
	$query = "select * from account where username='$username'";
	$result = mysql_query( $query );

	if (!$result)
	{
	   die ("user_pass_check() failed. Could not query the database: <br />". mysql_error());
	}

    $row = mysql_fetch_row($result);
    if(strcmp($row[2],$password))
        return 0; //wrong password
    else
        return 1; //Checked.
}
//unit test
//echo loginCheck('add', 'aaa');

function addUser($username, $password) {
    if (existUser($username)) {
        return 0;
    }
	$query = "insert into account (username, password) values ('$username', '$password')";
	$result = mysql_query( $query );

	if (!$result)
	{
	   die ("addUser() failed. Could not query the database: <br />". mysql_error());
	}
    return 1;
}
//unit test
//echo addUser('fangyu1', '2017');


function updateProfile($username, $addr, $detail) {
    if (!existUser($username)) {
        return 0;
    }
    $query = "update account set addr = '$addr' , detail = '$detail' where username = '$username'";
    $result = mysql_query($query);

	if (!$result)
	{
	   die ("updateProfile() failed. Could not query the database: <br />". mysql_error());
	}
    return 1;
}
//unit test
//echo updateProfile('xiaoqi', 'greenwi', 'good');

function getProfile($username) {
    if (!existUser($username)) {
        return 0;
    }
    $query = "select addr, detail from account  where username = '$username'";
    $result = mysql_query($query);

	if (!$result)
	{
	   die ("getProfile() failed. Could not query the database: <br />". mysql_error());
	}
    $row = mysql_fetch_assoc($result);

    return $row;
}
//unit test
//echo getProfile('xiaoqi1')['detail'];


function updatePasswd($username, $password) {
    if (!existUser($username)) {
        return 0;
    }
    $query = "update account set password = '$password'  where username = '$username'";
    $result = mysql_query($query);

	if (!$result)
	{
	   die ("updatePasswd() failed. Could not query the database: <br />". mysql_error());
	}
    return 1;
}
//unit test
//echo updatePasswd('xiaoqi', '2016');

/////////////////////addition--subscription parts
function existChannel($subscriber_id, $channel_id) {
	$query = "select * from subscription where subscriber_id='$subscriber_id' and channel_id = '$channel_id'";
	$result = mysql_query( $query );
	if (!$result){
        die ("existChannel() failed. Could not query the database: <br />". mysql_error());
        return 1;
	}

    $row = mysql_fetch_assoc($result);
    if($row == 0){
        return 0;
    }
    return 1;
}
//unit test
//echo existChannel('fangyu1', 'xiaoqi1');

function addChannel($subscriber_id, $channel_id)
{
    if (existChannel($subscriber_id, $channel_id)) {
        return 0;
    }
	$query = "insert into subscription (subscriber_id, channel_id) values ('$subscriber_id', '$channel_id')";
	$result = mysql_query( $query );

	if (!$result)
	{
	   die ("addChannel() failed. Could not query the database: <br />". mysql_error());
	}
    return 1;
}
//unit test
//echo addChannel('1', '1');

function rmChannel($subscriber_id, $channel_id) {
    if (!existChannel($subscriber_id, $channel_id)) {
        return 0;
    }
	$query = "delete from subscription where  subscriber_id = '$subscriber_id' and channel_id = '$channel_id'";
	$result = mysql_query( $query );

	if (!$result)
	{
	   die ("rmChannel() failed. Could not query the database: <br />". mysql_error());
	}
    return 1;
}
//unit test
//echo rmChannel('fangyu1', 'xiaoqi1');

// get all subscriptions of $user_id
function getChannels($user_id) {
    $query = "select * from subscription where subscriber_id= '$user_id'";
	$result = mysql_query( $query );
	if (!$result){
		die ("getChannels() failed. Could not query the database: <br />". mysql_error());
	}
    $storeArray = Array();
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $storeArray[] =  $row['channel_id'];
    }
    return $storeArray;
}

//////////////////addition--friendship parts
function getContacts ($userid1){
	$query = "select userid2 from contact where userid1='$userid1' and type = 3";
	$result = mysql_query( $query );
	if (!$result){
		die ("getContacts() failed. Could not query the database: <br />". mysql_error());
	}
    $storeArray = Array();
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $storeArray[] =  $row['userid2'];
    }
    return $storeArray;
}
//unit test
//foreach (getContacts(4) as $id) {
//    echo $id;
//}

function getFoes ($userid1){
	$query = "select userid2 from contact where userid1='$userid1' and type = 1";
	$result = mysql_query( $query );
	if (!$result){
		die ("getFoes() failed. Could not query the database: <br />". mysql_error());
	}
    $storeArray = Array();
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $storeArray[] =  $row['userid2'];
    }
    return $storeArray;
}
//unit test
//foreach (getFoes(fangyu1) as $id) {
//    echo $id;
//}

function getFriends ($userid1){
	$query = "select userid2 from contact where userid1='$userid1' and type = 2";
	$result = mysql_query( $query );
	if (!$result){
		die ("getFriends() failed. Could not query the database: <br />". mysql_error());
	}
    $storeArray = Array();
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $storeArray[] =  $row['userid2'];
    }
    return $storeArray;
}
//unit test
//foreach (getFriends('fangyu1') as $id) {
//    echo gettype($id);
//}

function existType($userid1, $userid2) {
	$query = "select type from contact where userid1='$userid1' and userid2='$userid2' limit 1";
	$result = mysql_query( $query );
	if (!$result){
		die ("friendship_exist_check() failed. Could not query the database: <br />". mysql_error());
	}
    $row = mysql_fetch_assoc($result);
    if ($row == 0) {
        return 0;
    }
    $value=$row['type'];
    switch($value) {
        case 3:
            return 3;
        case 1:
            return 1;
        case 2:
            return 2;
        default:
            return 0;
    }
}

function rmExist($userid1, $userid2) {
	$query = "select * from contact where userid1='$userid1' and userid2='$userid2'";
	$result = mysql_query( $query );
	if (!$result){
		die ("friendship_exist_check() failed. Could not query the database: <br />". mysql_error());
	}

    $row = mysql_fetch_assoc($result);
    if($row == 0){
        return;
    }
	$query = "delete from contact where  userid1 = '$userid1' and userid2 = '$userid2'";
	$result = mysql_query( $query );
	if (!$result){
		die ("friendship_exist_check() failed. Could not query the database: <br />". mysql_error());
    }
}

function addFriend($userid1, $userid2){
    if (existType($userid2, $userid1) == 1) {
        return 0;
    }
    rmExist($userid1, $userid2);
    $query = "insert into contact values ('$userid1','$userid2', 2)";//num 2 means friend

    $insert = mysql_query( $query );
    if(!$insert) {
        die ("Could not insert into the database: <br />". mysql_error());
    }
    return 1;
}
//unit test
//echo addFriend('fangyu1', 'xiaoqi4');

function addFoe($userid1, $userid2){
    rmExist($userid1, $userid2);
    $query = "insert into contact values ('$userid1','$userid2', 1)";

    $insert = mysql_query( $query );
    if(!$insert) {
        die ("Could not insert into the database: <br />". mysql_error());
    }
    return 1;
}
//unit test
//echo addFoe('fangyu1', 'xiaoqi3');

function addContact($userid1, $userid2){
    if (existType($userid2, $userid1) == 1) {
        return 0;
    }
    rmExist($userid1, $userid2);
    $query = "insert into contact values ('$userid1','$userid2', 3)";

    $insert = mysql_query( $query );
    if(!$insert) {
        die ("Could not insert into the database: <br />". mysql_error());
    }
    return 1;
}
//unit test
//echo addContact('1', '3');

//$db->sql_close();
?>
