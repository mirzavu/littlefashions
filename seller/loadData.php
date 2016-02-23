<?php
include('includes/db.php');

$loadType=$_POST['loadType'];
$loadId=$_POST['loadId'];

if($loadType=="state"){
	$sql="select id,subcat_name from sub_categories where cat_id='".$loadId."' order by subcat_name desc";
}else{
	$sql="select id,menu_name from menu where subcat_name='".$loadId."' order by menu_name desc";
}
$res=mysql_query($sql);
$check=mysql_num_rows($res);
if($check > 0){
	$HTML="";
	while($row=mysql_fetch_array($res)){
		$HTML.="<option value='".$row['id']."'>".$row['1']."</option>";
	}
	echo $HTML;
}
?>