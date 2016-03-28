<?php
include "mysqlClass.inc.php";


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

function upload_error($result)
{
	//view erorr description in http://us2.php.net/manual/en/features.file-upload.errors.php
	switch ($result){
	case 1:
		return "UPLOAD_ERR_INI_SIZE";
	case 2:
		return "UPLOAD_ERR_FORM_SIZE";
	case 3:
		return "UPLOAD_ERR_PARTIAL";
	case 4:
		return "UPLOAD_ERR_NO_FILE";
	case 5:
		return "File has already been uploaded";
	case 6:
		return  "Failed to move file from temporary directory";
	case 7:
		return  "Upload file failed";
	}
}

function other()
{
	//You can write your own functions here.
}

?>
