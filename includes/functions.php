<?
session_start();
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
	
	
	
	/***** Add Cart *****/

	function addtocart($product_id,$q,$ps,$age){
		
		if($product_id<1 or $q<1) return;
		
		if(is_array($_SESSION['cart'])){
			if(product_exists($product_id,$age)) return;
			$max=count($_SESSION['cart']);
			$_SESSION['cart'][$max]['product_id']=$product_id;
			$_SESSION['cart'][$max]['qty']=$q;
                        $_SESSION['cart'][$max]['ps']=$ps;
                         $_SESSION['cart'][$max]['age']=$age;
		}
		else{
			$max=count($_SESSION['cart']);
			$_SESSION['cart']=array();
			$_SESSION['cart'][$max]['product_id']=$product_id;
			$_SESSION['cart'][$max]['qty']=$q;
                        $_SESSION['cart'][$max]['ps']=$ps;
                        $_SESSION['cart'][$max]['age']=$age;
		}
	}
	function product_exists($product_id,$age){
		$product_id=intval($product_id);
                $age=  intval($age);
		$max=count($_SESSION['cart']);
		$flag=0;
		for($i=0;$i<$max;$i++){
			if($product_id==($_SESSION['cart'][$i]['product_id']) and $age==($_SESSION['cart'][$i]['age']))
                        {
				$flag=1;
				break;
			}
		}
		return $flag;
	}
	
	
	function get_price($product_id){
		$result=mysql_query("select * from products where id = '$product_id' ");
		$row=mysql_fetch_array($result);
		$list = explode(',',$row['price']);$price = $list[0];
		return $price;
	}
	
	

	function remove_product($product_id){
		$product_id=intval($product_id);
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			if($product_id==$_SESSION['cart'][$i]['product_id']){
				unset($_SESSION['cart'][$i]);
				break;
			}
		}
		$_SESSION['cart']=array_values($_SESSION['cart']);
	}
	function get_order_total(){
            
		$max=count($_SESSION['cart']);
		$sum=0;
		for($i=0;$i<$max;$i++){
			$product_id=$_SESSION['cart'][$i]['product_id'];
			$q=$_SESSION['cart'][$i]['qty'];
			
                        $price=$_SESSION['cart'][$i]['ps'];
                        
                        
                        //$orignalprice=$_SESSION['getorignalprice'];
                        $offer=$_SESSION['per'];
                        if($offer>0)
                        {
                            
                            
                            
                            //unset($_SESSION['psdtl']);
                            $proid=$_SESSION['id'];
                           // $sum=$_SESSION['my_choice'];
                            if($_SESSION['full']>0)
                            {
                                $old=$_SESSION['oldprice'];
                                $new=$_SESSION['psdtl'];
                        
                       $prices =$price-($offer/100*$price);
                        
			$sum+=$prices*$q;
                        
                        
                        }
                        else
                        {
                            $prices =$price-($offer/100*$price);
                        
			$sum+=$prices*$q;
                        
                        }
                        }
                        else
                        {
                          $prices=$price;
                        
			$sum+=$prices*$q;   
                        }
                }
		return $sum;
	}
	
	function get_product_name($product_id){
		$result=mysql_query("select * from products where id = '$product_id' ");
		$row=mysql_fetch_array($result);
		return $row['product_name'];
	}
	
	function get_product_image($product_id){
		$result=mysql_query("select * from products where id = '$product_id' ");
		$row=mysql_fetch_array($result);
		$pid = $row['product_id'];
		$result_image =mysql_query("select * from product_images where product_id = '$pid' ");
		$row_images=mysql_fetch_array($result_image);
		
		return $row_images['image'];
	}
	
	function product_name($product_id){
		$result=mysql_query("select * from products where product_id = '$product_id' ");
		$row=mysql_fetch_array($result);
		return $row['product_name'];
	}
	
	function product_image($product_id){
		
		$pid = $product_id;
		$result_image =mysql_query("select * from product_images where product_id = '$pid' ");
		$row_images=mysql_fetch_array($result_image);
		
		return $row_images['image'];
	}
	
	
	function get_product_color($product_id){
		$result=mysql_query("select * from products where id = '$product_id' ");
		$row=mysql_fetch_array($result);
		$color = $row['color'];
		$result_color = mysql_query("select * from colors where id = '$color' ");
		$row_color = mysql_fetch_array($result_color);
		
		return $row_color['color'];
	}
	
	
	function get_product_price($product_id){
		$result=mysql_query("select * from products where id = '$product_id' ");
		$row=mysql_fetch_array($result);
		$list = explode(',',$row['price']);$price = $list[0];
		return $price;
	}
	
	
	
	function order_id(){
		$result=mysql_query("select * from orders order by id DESC ");
		$row=mysql_fetch_array($result);
		return $row['txnid'];
	}
        
        function get_couponcode_name($catds,$brandsq,$me,$subcateg,$menuitem){
		
	$result=mysql_query("select * from coupons where coupon='$me' and (brand='$brandsq' or my_choice='c' and category='$catds' or my_choice='m' and category='$catds' and sub_category='$subcateg' and menu_items='$menuitem' )");
		$count=mysql_num_rows($result);
		if($count>0)
		{
		$row=mysql_fetch_array($result);
		
		return $row['percentage'];
		}
		
	}
	
        
        function get_brandcategcouponpercent($me,$brandsq,$catds){
            
           
		
	$result=mysql_query("select * from coupons where coupon='$me' and category ='$catds' and brand='$brandsq')  ");
		$count=mysql_num_rows($result);
		if($count>0)
		{
		$row=mysql_fetch_array($result);
		
		return $row['percentage'];
		}
           	
	}
        
        function get_brandcouponpercent($me,$brandsq){
		
	$result=mysql_query("select * from coupons where coupon='$me' and brand='$brandsq')  ");
		$count=mysql_num_rows($result);
		if($count>0)
		{
		$row=mysql_fetch_array($result);
		
		return $row['percentage'];
		}
		
	}
        
        function get_categorycouponpercent($me,$catds){
		
	$result=mysql_query("select * from coupons where coupon='$me' and category='$catds'");
		$count=mysql_num_rows($result);
		if($count>0)
		{
		$row=mysql_fetch_array($result);
		
		return $row['percentage'];
		}
		
	}
        
        
        function get_originalprice($brandsq,$catds){
		
	$result=mysql_query("select * from products where category='$catds' and brand='$brandsq'");
		$count=mysql_num_rows($result);
		if($count>0)
		{
		$row=mysql_fetch_array($result);
		
		return $row['price'];
		}
		
	}
        
        
        function get_brandcoupontimesapply($me){
		
	$result=mysql_query("select * from coupons where coupon='$me'");
		$count=mysql_num_rows($result);
		if($count>0)
		{
		$row=mysql_fetch_array($result);
		
		return $row['times_apply'];
		}
		
	}
	
	function get_universal_couponcode($me){
		
	$result=mysql_query("select * from coupons where coupon='$me' and category='global' ");
		$count=mysql_num_rows($result);
		if($count>0)
		{
		$row=mysql_fetch_array($result);
		
		return $row['percentage'];
		}
		
	}
        
        
        
        function get_signup_couponcode($me){
		
	$result=mysql_query("select * from coupons where coupon='$me' and my_choice='signupcoup' ");
		$count=mysql_num_rows($result);
		if($count>0)
		{
		$row=mysql_fetch_array($result);
		
		return $row['percentage'];
		}
		
	}
        
        
        
        function get_global_couponcode($me){
		
	$result=mysql_query("select * from coupons where coupon='$me' and category='global' ");
		$count=mysql_num_rows($result);
		if($count>0)
		{
		$row=mysql_fetch_array($result);
		
		return $row['percentage'];
		}
		
	}
	
function get_couponname($me){
		
	$result=mysql_query("select * from coupons where coupon='$me' ");
		$count=mysql_num_rows($result);
		if($count>0)
		{
		$row=mysql_fetch_array($result);
		
		return $row['coupon'];
		}
		
	}
        
        function get_propercent($getprice){
		
	$result=mysql_query("select * from products where id='$getprice' ");
		$count=mysql_num_rows($result);
		if($count>0)
		{
		$row=mysql_fetch_array($result);
		
		return $row['offerprice'];
		}
		
	}

                                   function order_itemcode_id()
                                                     {

                                                  $unique_number = rand(10000,99999);
                                                  $it_code="LFOD".$unique_number ;
         $exists =mysql_num_rows(mysql_query("SELECT *  FROM orders where order_itemcode='$it_code'"));


                                                      if ($exists >0)
                                                                  {
                                                          $results =order_itemcode_id();
                                                                 }
                                                                else{
                                                                      $results =$it_code;
                                                                          return $results;
                                                                    }


                                                  }
  

                            function user_cutomercode_id()
                                                     {

                                                  $unique_number = rand(10000,99999);
                                                  $it_code="LFUD".$unique_number ;
         $exists =mysql_num_rows(mysql_query("SELECT * FROM users where cutomercode_id='$it_code'"));


                                                      if ($exists >0)
                                                                  {
                                                          $results =user_cutomercode_id();
                                                                 }
                                                                else{
                                                                      $results =$it_code;
                                                                          return $results;
                                                                    }


                                                  }








	
        
?>