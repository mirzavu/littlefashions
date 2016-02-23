<?php
 include_once('includes/db.php');
 include_once('includes/functions.php');
 session_start();
 
 if (isset($_GET['id']) && is_numeric($_GET['id']))
 {
 $id = $_GET['id'];
 
 
  $sql_getdata=mysql_query("select * from products where id = '$id'");

 $sql_rowsa=mysql_fetch_array($sql_getdata);

 $collections=$sql_rowsa['collection_type'];

 $offerid=$sql_rowsa['offers_type'];
 
 $toprttyperd=$sql_rowsa['toprated_type'];

 $trdtyperd=$sql_rowsa['trending_type']; 
  
 $result = mysql_query("UPDATE products SET flag = '0' where id = '$id' ")
 or die(mysql_error()); 
 
if($collections !=0)
                                                                        {
									echo "<script type='text/javascript'>window.location='view-collection-products.php'</script>";
                                                                        }
                                                                        elseif($offerid !=0)
                                                                        {
                                                                        echo "<script type='text/javascript'>window.location='view-offer-products.php'</script>";    
                                                                        }
                                                                       elseif($toprttyperd !=0)
                                                                        {
                                                                    echo "<script type='text/javascript'>window.location='viewtoprated.php'</script>";             
                                                                        }
                                                                        elseif($trdtyperd !=0)
                                                                        {
                                                                    echo "<script type='text/javascript'>window.location='view-trending.php'</script>";             
                                                                        }

                                                                       else
                                                                          {
                                      echo "<script type='text/javascript'>window.location='view-products.php'</script>";             
                                                                           }
 exit();
 }
 else
 {
 header("Location: view-products.php");
 exit();
 }
 
?>