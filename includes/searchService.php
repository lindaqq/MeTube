<?php
include_once ("mysqlClass.inc.php");
//$db = new mysql_db(SERVER, USERNAME, PASSWORD, DATABASE);

//for keywords search and wordcloud search
function search($words) {
    if(empty($words)){
        return 0;
    }

    $parts = explode(" ",trim($words));
    $clauses = array();
    foreach ($parts as $part){
        $clauses[] = "keywords LIKE '%" . mysql_real_escape_string($part) . "%' or title like '%" . mysql_real_escape_string($part) . "%'";
    }
    $clause=implode(' OR ' ,$clauses);

    $sql="select mediaid, title, type, category, posttime from media WHERE ($clause) ";
    $result = mysql_query($sql);
     if(!$result){
        //redirect("errors/error_db.html");
         die("search() fails". mysql_error());
     }

    $storeArray = Array();
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $storeArray[] = $row;
        continue;
    }
    return $storeArray;
}
//unit test
echo '<pre>'; print_r(search('php asd')); echo '</pre>';

function recommend($mediaid, $num) {
    $query = "select title, keywords from media where $mediaid = '$mediaid'";
    $resWords = mysql_query($query) or die("recommend fails". mysql_error());
    $row = mysql_fetch_array($resWords, MYSQL_ASSOC);
    $words = $row['title']. ',' . $row['keywords'];

    $parts = explode(",",trim($words));
    $clauses = array();
    foreach ($parts as $part){
        $clauses[] = "keywords LIKE '%" . mysql_real_escape_string($part) . "%' or title like '%" . mysql_real_escape_string($part) . "%'";
    }
    $clause=implode(' OR ' ,$clauses);

    $sql="select mediaid, title from media
          WHERE mediaid != '$mediaid'
          and ($clause) limit $num";
    $result = mysql_query($sql);
     if(!$result){
        //redirect("errors/error_db.html");
         die("search() fails". mysql_error());
     }

    $storeArray = Array();
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $storeArray[] = $row;
        continue;
    }
    return $storeArray;
}
//unit test
//echo '<pre>'; print_r(recommend(2, 2)); echo '</pre>';

?>
