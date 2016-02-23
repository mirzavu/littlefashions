<?php
 include_once('includes/db.php');

 session_start();
//$_POST["offer_id"];
 if(!empty($_POST["offer_id"])) {
	$query1 ="select * from offers WHERE id = '" . $_POST["offer_id"] . "'";
	$results =mysql_query($query1);
       $rownum=  mysql_num_rows($results);
        if($rownum > 0)
        {
          $rows=mysql_fetch_array($results);
          echo $rows['offerpercent'];
        }

	}

?>
