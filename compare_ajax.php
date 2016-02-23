<?php
session_start();
include_once("includes/db.php");
include_once("includes/functions.php");	
//print_r($_POST);
 @$chkoid = $_POST['x'];
 @$array1=array();
  @$prdctsize=count($chkoid) ;
 
/* foreach ($chkoid as $asdf)
 {
     
    $array1=@$asdf ;
    $asd= implode(",",$chkoid);
 }*/
 
 $asd= implode(",",$chkoid);
 //print_r($asd);               
  $arrs=array();
                              echo"<form action='compare-productlist.php' method='GET'>";
                                $sql_products = mysql_query("select * from products WHERE flag = '1'and id in($asd) ORDER BY id DESC");
                                while($row_products = mysql_fetch_array($sql_products))
                                {
                                  //$arrs[]=$row_products['id'];
                                  echo '<input type="hidden" name="cmpval[]" value="'.$row_products['id']. '">';
				$product_id = $row_products['product_id'];
                                
				$sql_images = mysql_query("select * from product_images WHERE product_id = '$product_id'");
                                $row_images = mysql_fetch_array($sql_images);
                                ?>
<div class="col-lg-3"><img src="images/products/<?=$row_images['image'];?>"  alt="" style="height:75px !important;">
									</div>
                                  <?php  
                                     }
                                // print_r($arrs);
                                 echo "<br/><input type='submit' name='prd_cmp' value='compare'></form>";
                                      ?>
                   