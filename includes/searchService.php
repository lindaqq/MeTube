<?php
include_once ("mysqlClass.inc.php");
//$db = new mysql_db(SERVER, USERNAME, PASSWORD, DATABASE);

//for keywords search and wordcloud search
function search($words) {
    $storeArray = Array();
    if(empty($words)){
        return $storeArray;
    }

    $parts = explode(" ",trim($words));
    $clauses = array();
    foreach ($parts as $part){
        $clauses[] = "keywords LIKE '%" . mysql_real_escape_string($part) . "%' or title like '%" . mysql_real_escape_string($part) . "%'";
    }
    $clause=implode(' OR ' ,$clauses);

    $sql="select mediaid, title, type, category, posttime,path from media WHERE ($clause)  and sharetype = 0";
    $result = mysql_query($sql);
     if(!$result){
        //redirect("errors/error_db.html");
         die("search() fails". mysql_error());
     }

    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $storeArray[] = $row;
        continue;
    }
    return $storeArray;
}
//unit test
//echo '<pre>'; print_r(search('php asd')); echo '</pre>';

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

    $sql="select mediaid, title,username, path,type from media
          WHERE mediaid != '$mediaid'
          and ($clause)  and sharetype = 0 limit $num";
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

function filterSearch($words, $type, $category, $starttime) {
    $clauses = array();
    if(!empty($words)){
        $parts = explode(" ",trim($words));
        $clauses = array();
        foreach ($parts as $part){
            $clauses[] = "keywords LIKE '%" . mysql_real_escape_string($part) . "%' or title like '%" . mysql_real_escape_string($part) . "%'";
        }
    }
    if (count($clauses) == 0) {
        $clause = "1=1 or 1=1";
    } else {
        $clause=implode(' OR ' ,$clauses);
    }

    if ($type == 0) {
        $typeClause = "1=1";
    } else {
        $typeClause = "type = $type";
    }

    if ($category == 0) {
        $cateClause = "1=1";
    } else {
        $cateClause = "category = $category";
    }

    if (empty($starttime)) {
        $timeClause = "1=1";
    } else {
        $timeClause = "posttime > '$starttime'";
    }

    $sql="select mediaid, title,type, path from media
        WHERE
        ($clause) and
        $typeClause and
        $cateClause and
        $timeClause  and sharetype = 0";
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
//echo '<pre>'; print_r(filterSearch('php asd', 0, 1, '2016-04-09 16:15:33')); echo '</pre>';
?>
