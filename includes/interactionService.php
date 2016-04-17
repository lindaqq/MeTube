<?php
include_once ("mysqlClass.inc.php");
include_once ("accountService.php");
//$db = new mysql_db(SERVER, USERNAME, PASSWORD, DATABASE);

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

function existComment($commentid) {
  $query = "select * from comment where commentid = '$commentid'";
  $result = mysql_query($query) or die("existComment() fails". mysql_error());

  $row = mysql_fetch_assoc($result);
  if($row == 0){
    return 0;
  }
  return 1;
}
//unit test
//echo existComment(4);

function rmComment($commentid) {
  if (!existComment($commentid)) {
    return 0;
  }
  $query = "delete from comment where commentid = '$commentid'";
  $result = mysql_query( $query );

  if (!$result)
  {
    die ("rmComment() failed. Could not query the database: <br />". mysql_error());
  }
  return 1;
}
//unit test
//echo rmComment(1);

function existRate($mediaid, $username) {
  $query = "select * from rate where mediaid = '$mediaid' and username = '$username'";
  $result = mysql_query($query) or die("existRate() fails". mysql_error());

  $row = mysql_fetch_assoc($result);
  if($row == 0){
    return 0;
  }
  return 1;
}
//unit test
//echo existRate(1, 'fangyu');

function rmRate($mediaid, $username) {
  if (!existRate($mediaid, $username)) {
    return 0;
  }
  $query = "delete from rate where mediaid = '$mediaid' and username = '$username'";
  $result = mysql_query( $query );

  if (!$result)
  {
    die ("rmRate() failed. Could not query the database: <br />". mysql_error());
  }
  return 1;
}
//unit test
//echo rmRate(1, 'fangyu');

function rateMedia($mediaid, $username, $score) {
  rmRate($mediaid, $username);
  $query = "insert into rate (username, mediaid, score) values ('$username', '$mediaid', '$score')";
  $result = mysql_query( $query );

  if (!$result)
  {
    die ("rateMedia() failed. Could not query the database: <br />". mysql_error());
  }
  return 1;
}
//unit test
//echo rateMedia('1', 'fangyu', 5);

function createGroup($groupname, $topic, $detail) {
  $query = "insert into groups (groupname, topic, detail) values ('$groupname', '$topic', '$detail')";
  $result = mysql_query( $query );
  if (!$result)
  {
    die ("createGroup() failed. Could not query the database: <br />". mysql_error());
  }
  return mysql_insert_id();
}
//unit test not passed
//echo createGroup('asd', 'sdf','asdfasd');
function showGroups() {
  $query = "select groupid, groupname,   topic, detail from groups";
  $result = mysql_query($query) or die("showGroups() fails". mysql_error());
  $storeArray = Array();
  while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    $storeArray[] = $row;
  }
  return $storeArray;
}
//unit test
//echo '<pre>'; print_r(showGroups()); echo '</pre>';
function getDiscusses($groupid) {
  $query = "select * from discuss where groupid = '$groupid' order by posttime desc";
  $result = mysql_query($query) or die("getDiscusses fails". mysql_error());
  $storeArray = Array();
  while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    $storeArray[] = $row;
  }
  return $storeArray;
}
//unit test
//echo '<pre>'; print_r(getDiscusses(1)); echo '</pre>';
function addDiscuss( $username, $groupid, $content) {
  $query = "insert into discuss (username, groupid, content) values ('$username', '$groupid', '$content')";
  $result = mysql_query( $query );
  if (!$result)
  {
    die ("addDiscuss() failed. Could not query the database: <br />". mysql_error());
  }
  return 1;
}
//unit test
//echo addDiscuss('fangyu', 2, 'aasdfass');
