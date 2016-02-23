<?
	/*FOR CATEGORY*/
	function get_category()
	{
		$result = mysql_query("SELECT * FROM categories");
		while($row = mysql_fetch_array($result))
		{
		echo '<option value="'.$row["id"].'">'.$row["category_name"].'</option> ';
		}	
	}
	
	function get_category_name($category){
		$result=mysql_query("select category_name from categories where id = '$category' ");
		$row=mysql_fetch_array($result);
		return $row['category_name'];
	}
	
	/* FOR SUB CATEGORY*/

	function get_subcat()
	{
		$result = mysql_query("SELECT * FROM sub_categories");
		while($row = mysql_fetch_array($result))
		{
		echo '<option value="'.$row["id"].'">'.$row["subcat_name"].'</option> ';
		}	
	}
	
	function get_sub_category_name($subcategory){
		$result=mysql_query("select subcat_name from sub_categories where id = '$subcategory' ");
		$row=mysql_fetch_array($result);
		return $row['subcat_name'];
	}

	/*FOR BRANDS*/
		
	function get_brand()
	{
		$result = mysql_query("SELECT * FROM brands");
		while($row = mysql_fetch_array($result))
		{
		echo '<option value="'.$row["id"].'">'.$row["brand_name"].'</option> ';
		}	
	}
	function get_brand_name($brand){
		$result=mysql_query("select brand_name from brands where id = '$brand' ");
		$row=mysql_fetch_array($result);
		return $row['brand_name'];
	}

	/* FOR COLORS*/

	function get_color()
	{
		$result = mysql_query("SELECT * FROM colors");
		while($row = mysql_fetch_array($result))
		{
		echo '<option value="'.$row["id"].'">'.$row["color"].'</option> ';
		}	
	}
	function get_color_name($color)
	{
		$result = mysql_query("select color from colors where id = '$color' ");
		$row=mysql_fetch_array($result);
		return $row['color'];
	}

     /* FOR AGE*/

	function get_age()
	{
		$result = mysql_query("SELECT * FROM age");
		while($row = mysql_fetch_array($result))
		{
		echo '<option value="'.$row["id"].'">'.$row["age"].'</option> ';
		}	
	}
	function get_age1($age)
	{
		$result = mysql_query("select age from age where id = '$age' ");
		$row=mysql_fetch_array($result);
		return $row['age'];
	}
	function get_menu()
	{
		$result = mysql_query("SELECT * FROM menu");
		while($row = mysql_fetch_array($result))
		{
		echo '<option value="'.$row["id"].'">'.$row["menu_name"].'</option> ';
		}	
	}
	function get_menu_name($menu)
	{
		$result = mysql_query("select menu_name from menu where id = '$menu' ");
		$row=mysql_fetch_array($result);
		return $row['menu_name'];
	}



                                                function user_sellercode_id()
                                                     {

                                                  $unique_number = rand(10000,99999);
                                                  $it_code="LFSL".$unique_number ;
         $exists =mysql_num_rows(mysql_query("SELECT *  FROM user_registration where user_sellercode='$it_code'"));


                                                      if ($exists >0)
                                                                  {
                                                          $results =user_sellercode_id();
                                                                 }
                                                                else{
                                                                      $results =$it_code;
                                                                          return $results;
                                                                    }


                                                  }














?>