<?php

    // configuration
    require("../includes/config.php"); 
    require("../includes/sharingService.php"); 
    require("../includes/accountService.php"); 
    require("enum.php");
    $db = new mysql_db(SERVER, USERNAME, PASSWORD, DATABASE);
    $errortext = "";
    
if (isset($_GET["drop"])) {
  $mediaid = $_GET["mediaid"];
  $friend = $_GET["drop"];
  rmBlock($mediaid, $friend);
}
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        //Create Directory if doesn't exist
if(!file_exists('uploads/')){
	mkdir('uploads/');
	chmod('uploads', 0755);
}
$dirfile = 'uploads/'.$_SESSION["username"].'/';
if(!file_exists($dirfile))
	mkdir($dirfile);
	chmod($dirfile, 0755);
	if($_FILES["file"]["error"] > 0 )
	{ 	$result=$_FILES["file"]["error"]; //error from 1-4
        $errortext = "failed to upload file, error code is $result";
    }
	else
	{
		$upfile = $dirfile.urlencode($_FILES["file"]["name"]);
	  
	  //if(file_exists($upfile))
	  //{
	  //	$result="5"; //The file has been uploaded.
	  //}
	  //else{
			if(is_uploaded_file($_FILES["file"]["tmp_name"]))
			{
				if(!move_uploaded_file($_FILES["file"]["tmp_name"],$upfile))
				{
					$result="6"; //Failed to move file from temporary directory
                    $errortext = "failed to upload file, error code is $result";
				}
				else /*Successfully upload file*/
				{
          $title = $_POST['title'];
          $username = $_SESSION["username"];
          $type = $_POST['type'];
          $catetory = $_POST['category'];
          $sharetype = $_POST['share'];
          
          $sharedfriends = array();
          if ($sharetype == 1) {
            $arrBlock = split(',' , str_replace(' ', '', $_POST['block']));
            $friends = getFriends($username);
            foreach ($friends as $friend) {
              if (in_array($friend, $arrBlock)) {
                continue;
              }
              $sharedfriends[] = $friend;
            }
          }

          $path = $upfile;
          $detail = $_POST['description'];
          $candiscuss = isset($_POST['discuss']) ? 1 : 0;
          $canrate = isset($_POST['rate']) ? 1 : 0;

          $keywords = preg_replace('/\s+/', '', $_POST['keywords']);
          //$keywords = '';
          //foreach( $_POST['keyword'] as $word) {
          //  $keywords .= $Keywords[$word]. ',';
          //}

		     	//insert into media table
          addMedia($title, $username, $type, $catetory, $sharetype, $sharedfriends, $path, $detail, $candiscuss, $canrate, $keywords);
					$result="0";
                    $errortext = "successfully uploaded file";
					chmod($upfile, 0644);
				}
			}
			else  
			{
					$result="7"; //upload file failed
                    $errortext = "failed to upload file, error code is $result";
			}
		//}
	}
	
	//You can process the error code of the $result here.
        $myUploads = getUploads($_SESSION["username"]);
        
        render("upload_template.php", ["errortext" => $errortext,"titile" => "Uploads", "keywords" => $Keywords, "myuploads" => $myUploads]);
        
    }else{
        $myUploads = getUploads($_SESSION["username"]);
        
        render("upload_template.php", ["errortext" => $errortext,"titile" => "Uploads", "keywords" => $Keywords, "myuploads" => $myUploads ]);
    }
    $db->sql_close();

?>

