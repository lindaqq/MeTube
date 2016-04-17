<?php
require_once('mysqlClass.inc.php');
//$db = new mysql_db(SERVER, USERNAME, PASSWORD, DATABASE);

function browseByChannel($username) {
    $query = "select mediaid, title,type, username,  viewcount, posttime from media where username = '$username' and sharetype = 0";
    $result = mysql_query($query) or die("browseByChannel fails". mysql_error());

    $storeArray = Array();
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $storeArray[] = $row;
        continue;
    }
    return $storeArray;
}
//unit test
//echo '<pre>'; print_r(browseByChannel('fangyu1')); echo '</pre>';

function showPlaylists($username) {
    $query = "select playlistid, playlistname from playlist where username='$username'";
    $result = mysql_query($query) or die("showPlaylists fails". mysql_error());

    $storeArray = Array();
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $storeArray[] = $row;
        continue;
    }
    return $storeArray;
}
//unit test
//echo '<pre>'; print_r(showPlaylists('fangyu1')); echo '</pre>';

function browseByPlaylist($playlistid) {
    $query = "select mediaid, title,type, username from media where mediaid in (select mediaid from playlistmedia where playlistid='$playlistid')";
    $result = mysql_query($query) or die("browseByPlaylist fails". mysql_error());

    $storeArray = Array();
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $storeArray[] = $row;
        continue;
    }
    return $storeArray;
}
//unit test
//echo '<pre>'; print_r(browseByPlaylist('1')); echo '</pre>';

function addPlaylist($playlistname, $username) {
	$query = "insert into playlist (playlistname, username) values ('$playlistname', '$username')";
	$result = mysql_query( $query );

	if (!$result)
	{
	   die ("addPlaylist() failed. Could not query the database: <br />". mysql_error());
	}
    return 1;
}
//unit test
//echo addPlaylist('old', 'fangyu');

function existPlaylistMedia($playlistid, $mediaid) {
	$query = "select * from playlistmedia where playlistid='$playlistid' and mediaid = '$mediaid'";
	$result = mysql_query( $query );
	if (!$result){
        die ("existPlaylistMedia() failed. Could not query the database: <br />". mysql_error());
        return 1;
	}

    $row = mysql_fetch_assoc($result);
    if($row == 0){
        return 0;
    }
    return 1;
}
//unit test
//echo existPlaylistMedia(1, 8);

function rmPlaylistMedia($playlistid, $mediaid) {
    if (!existPlaylistMedia($playlistid, $mediaid)) {
        return 0;
    }
	$query = "delete from playlistmedia where  playlistid='$playlistid' and mediaid = '$mediaid'";
	$result = mysql_query( $query );

	if (!$result)
	{
	   die ("rmPlaylistMedia() failed. Could not query the database: <br />". mysql_error());
	}
    return 1;
}
//unit test
//echo rmPlaylistMedia('1', '9');

function addPlaylistMedia($playlistid, $mediaid) {
  if (existPlaylistMedia($playlistid, $mediaid)) {
        return 0;
    }
	$query = "insert into playlistmedia (playlistid, mediaid) values ('$playlistid', '$mediaid')";
	$result = mysql_query( $query );

	if (!$result)
	{
	   die ("addPlaylistMedia() failed. Could not query the database: <br />". mysql_error());
	}
    return 1;
}
//unit test
//echo addPlaylistMedia('1', '9');

function browseByFavorite($username) {
    $query = "select mediaid, title,type, username from media where mediaid in (select mediaid from favorite where username='$username')";
    $result = mysql_query($query) or die("browseByFavorite fails". mysql_error());

    $storeArray = Array();
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $storeArray[] = $row;
        continue;
    }
    return $storeArray;
}
//unit test
//echo '<pre>'; print_r(browseByFavorite('fangyu1')); echo '</pre>';

function existFavoriteMedia($username, $mediaid) {
	$query = "select * from favorite where username='$username' and mediaid = '$mediaid'";
	$result = mysql_query( $query );
	if (!$result){
        die ("existFavoriteMedia() failed. Could not query the database: <br />". mysql_error());
        return 1;
	}

    $row = mysql_fetch_assoc($result);
    if($row == 0){
        return 0;
    }
    return 1;
}
//unit test
//echo existFavoriteMedia('fangyu1', 9);

function rmFavoriteMedia($username, $mediaid) {
    if (!existFavoriteMedia($username, $mediaid)) {
        return 0;
    }
	$query = "delete from favorite where  username='$username' and mediaid = '$mediaid'";
	$result = mysql_query( $query );

	if (!$result)
	{
	   die ("rmFavoriteMedia() failed. Could not query the database: <br />". mysql_error());
	}
    return 1;
}
//unit test
//echo rmFavoriteMedia('fangyu1', '9');

function addFavoriteMedia($username, $mediaid) {
    if (existFavoriteMedia($username, $mediaid)) {
        return 0;
    }
	$query = "insert into favorite (username, mediaid) values ('$username', '$mediaid')";
	$result = mysql_query( $query );

	if (!$result)
	{
	   die ("addFavoriteMedia() failed. Could not query the database: <br />". mysql_error());
	}
    return 1;
}
//unit test
//echo addFavoriteMedia('fangyu1', '9');

function browseByViewcountAndType($type, $num) {
    $query = "select mediaid, title, username,  viewcount, posttime, path from media where type = '$type' and sharetype = 0  order by viewcount desc limit $num";
    $result = mysql_query($query) or die("browseByViewcountAndType fails". mysql_error());

    $storeArray = Array();
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $storeArray[] = $row;
        continue;
    }
    return $storeArray;
}
//unit test
//echo '<pre>'; print_r(browseByViewcountAndType('1', 3)); echo '</pre>';

function browseByUploadrecentAndType($type, $num) {
    $query = "select mediaid, title, username,  viewcount, posttime, path from media where type = '$type'  and sharetype = 0  order by posttime desc limit $num";
    $result = mysql_query($query) or die("browseByUploadrecentAndType fails". mysql_error());

    $storeArray = Array();
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $storeArray[] = $row;
        continue;
    }
    return $storeArray;
}
//unit test
//echo '<pre>'; print_r(browseByUploadrecentAndType('1', 3)); echo '</pre>';

function browseByFriendshare($username, $type) {
    $query = "select mediaid, title, username,  viewcount, posttime from media where mediaid in (select mediaid from sharedfriends where username='$username' and type='$type')";
    $result = mysql_query($query) or die("browseByFriendshare fails". mysql_error());

    $storeArray = Array();
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $storeArray[] = $row;
        continue;
    }
    return $storeArray;
}
//unit test
//echo '<pre>'; print_r(browseByFriendshare('xiao2')); echo '</pre>';

?>
