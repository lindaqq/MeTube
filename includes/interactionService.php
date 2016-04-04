<?php
include_once ("mysqlClass.inc.php");
include_once ("accountService.php");
$db = new mysql_db(SERVER, USERNAME, PASSWORD, DATABASE);

function sendMessage($sender, $receiver, $message)   {
    if (existType($receiver, $sender) == 1) {
        return 0;
    }
	$query = "insert into message (sender, receiver, content) values ('$sender', '$receiver', '$message')";
	$result = mysql_query( $query );

	if (!$result)
	{
	   die ("sendMessage() failed. Could not query the database: <br />". mysql_error());
	}
    return 1;
}
//unit test
//echo sendMessage('fangyu', 'xiaoqi', 'aasdfa');

function getMessages($username) {
    $query = "select messageid, sender, receiver,  content, posttime from message where sender = '$username' or receiver = '$username' order by posttime desc";
    $result = mysql_query($query) or die("getMessages fails". mysql_error());

    $storeArray = Array();
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $storeArray[] = $row;
        continue;
    }
    return $storeArray;
}
//unit test
//echo '<pre>'; print_r(getMessages('fangyu')); echo '</pre>';

function addComment($username, $mediaid, $content) {
	$query = "insert into comment (username, mediaid, content) values ('$username', '$mediaid', '$content')";
	$result = mysql_query( $query );

	if (!$result)
	{
	   die ("addComment() failed. Could not query the database: <br />". mysql_error());
	}
    return 1;
}
//unit test
//echo addComment('fangyu', '1', 'aasdfa');

function getComments($mediaid) {
    $query = "select commentid, username,   content, posttime from comment where mediaid = '$mediaid' order by posttime desc";
    $result = mysql_query($query) or die("getComments fails". mysql_error());

    $storeArray = Array();
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $storeArray[] = $row;
    }
    return $storeArray;
}
//unit test
//echo '<pre>'; print_r(getComments('1')); echo '</pre>';

function rmComment($commentid) {

}
