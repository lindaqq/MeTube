<?php
include "mysqlClass.inc.php";
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

function addUser($username, $password)
{
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
//echo addUser('xiaoqi', '2017');

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
//echo existChannel('1', '1');

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
//echo rmChannel('1', '1');

//////////////////addition--friendship parts
function getFriends ($userid1){
	$query = "select * from contact where userid1='$userid1' and type = 2";
	$result = mysql_query( $query );
	if (!$result){
		die ("friendship_exist_check() failed. Could not query the database: <br />". mysql_error());
	}
	else {
        return result;
	}
}

function getFoes ($userid1){
	$query = "select * from contact where userid1='$userid1' and type = 1";
	$result = mysql_query( $query );
	if (!$result){
		die ("friendship_exist_check() failed. Could not query the database: <br />". mysql_error());
	}
	else {
        return result;
	}
}

function addFriend ($userid1, $userid2){
	$query = "select * from contact where userid1='$userid1' and userid2='$userid2'";
	$result = mysql_query( $query );
	if (!$result){
		die ("friendship_exist_check() failed. Could not query the database: <br />". mysql_error());
	}
	else {
		$row = mysql_fetch_assoc($result);
		if($row == 0){
			$query1 = "insert into contact values ('$userid1','$userid2', 2)";//num 2 means friend
			$query2 = "insert into contact values ('$userid2','$userid1', 2)";//num 2 means friend
			echo "insert query:" . $query;
			$insert = mysql_query( $query1 );
            $insert = mysql_query( $query2 );
			if($insert)
				return 1;
			else
				die ("Could not insert into the database: <br />". mysql_error());
		}
		else{
			return 2;
		}
	}
}

function addFoe ($userid1, $userid2){
	$query = "select * from contact where userid1='$userid1' and userid2='$userid2'";
	$result = mysql_query( $query );
	if (!$result){
		die ("friendship_exist_check() failed. Could not query the database: <br />". mysql_error());
	}
	else {
		$row = mysql_fetch_assoc($result);
		if($row == 0){
			$query = "insert into contact values ('$userid1','$userid2', 1)";//num 1 means foe
			echo "insert query:" . $query;
			$insert = mysql_query( $query );
			if($insert)
				return 1;
			else
				die ("Could not insert into the database: <br />". mysql_error());
		}
		else{
			return 2;
		}
	}
}

function rmFoe ($userid1, $userid2){
	$query = "delete from contact where userid1='$userid1' and userid2='$userid2' and type = 1";
	$result = mysql_query( $query );
}

function rmFriend ($userid1, $userid2){
	$query = "delete from contact where userid1='$userid1' and userid2='$userid2' and type = 2";
	$result = mysql_query( $query );
    $query = "delete from contact where userid1='$userid2' and userid2='$userid1' and type = 2";
	$result = mysql_query( $query );
}


?>
