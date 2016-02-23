<?php
 include_once('includes/db.php');
 include_once('includes/functions.php');
 session_start();

$getcouponcateg= $_GET['q'];


?>

<?php
if($getcouponcateg=='1')
{
	?>
    <input type="hidden" name="brands" id="brands" value="0">
   
<?php } ?>
<?php
if($getcouponcateg=='2')
{
	?>
    <select id="brands" name="brands" class="form-control">
    <?php
	
	$result=mysql_query("select * from brands");
		while($row=mysql_fetch_array($result))
		{
?>
<option value="<?php echo $row['id']; ?>"><?php echo $row['brand_name']; ?></option>

<?php } ?>
</select>
<?php } ?>

<?php
if($getcouponcateg=='3')
{
	?>
    <select id="category" name="category" class="form-control">
    <?php
	
	$result=mysql_query("select * from categories");
		while($row=mysql_fetch_array($result))
		{
?>
<option value="<?php echo $row['id']; ?>"><?php echo $row['category_name']; ?></option>

<?php } ?>
</select>
<?php } ?>