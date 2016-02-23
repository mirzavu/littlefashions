<?php
include_once('includes/db.php');
include_once('includes/functions.php'); 
session_start();

if (!isset($_SESSION['user_id']) || (trim($_SESSION['user_id']) == '')) {
    header("location: login.php");
    exit();
}

unset($_SESSION['times_msessage']);

$uid = $_SESSION['user_id'];
$mywalusers = $_SESSION['user_id'];

$sql_user = mysql_query("select * from users where id = '$uid' ");
$row_user = mysql_fetch_array($sql_user);

if ($_REQUEST['command'] == 'delete' && $_REQUEST['product_id'] > 0) 
    
    {
    
  
    remove_product($_REQUEST['product_id']);
  
} 


else if ($_REQUEST['command'] == 'clear') {
    unset($_SESSION['cart']);
    unset($_SESSION['finalprice']);
    
} else if ($_REQUEST['command'] == 'update') {
    $max = count($_SESSION['cart']);
    for ($i = 0; $i < $max; $i++) {
        $product_id = $_SESSION['cart'][$i]['product_id'];
        $q = intval($_REQUEST['product' . $product_id]);
        if ($q > 0 && $q <= 999) {
            $_SESSION['cart'][$i]['qty'] = $q;
        } else {
            $msg = 'Some proudcts not updated!, quantity must be a number between 1 and 999';
        }
    }
} else if ($_REQUEST['command'] == 'order') {

    $pro_ids = "";
    $max = count($_SESSION['cart']);
    for ($i = 0; $i < $max; $i++) {
        $product_id = $_SESSION['cart'][$i]['product_id'];
        $q = $_SESSION['cart'][$i]['qty'];
        $ppage = $_SESSION['cart'][$i]['age'];
        $listall = $_SESSION['cart'][$i]['ps'];


        $price = $_SESSION['finalprice'];
        
      
        $getgiftcouponquery=mysql_fetch_array(mysql_query("select * from gift_coupon where gid='$product_id'"));
        
        $giftfinalid=array();
        $giftfinalid[]=$getgiftcouponquery['gid'];
        $_SESSION['finalidgidt']=$getgiftcouponquery['gid'];
        $giftprice=array();
        $giftprice[]=$getgiftcouponquery['amount'];
        
        foreach ($giftprice as $giftamountitem)
    {
        $amounts[]=$giftamountitem;
    }
    
     $giftamounts=  implode(',',$amounts);   //gift amount price multiple
     
     
     foreach ($giftfinalid as $giftitemid)
    {
        $giftitem[]=$giftitemid;
    }
        $giftids=implode(',', $giftitem);
        
        
        $giftname=$getgiftcouponquery['category'];
        
        $_SESSION['giftamount']=$getgiftcouponquery['amount'];
        
      
   


        $pro_all.=$product_id . ",";
        $pro_qtall.=$q . ',';
        $age_all.=$ppage . ',';
        $price_all.=$listall . ',';
    }

    $pro_ids = rtrim($pro_all, ", ");
    $qtntys = rtrim($pro_qtall, ",");
    $ageall = rtrim($age_all, ",");
    $price_all = rtrim($price_all, ",");
    $orderid = order_id() + 1;
    $_SESSION['order_id'] = $orderid;
    $name = $row_user['name'];
    $email = $row_user['email'];
    $phone = $row_user['mobile'];
    $address = $row_user['address'];
    $productinfo = $pro_ids;
    $order_itemcode=order_itemcode_id();// ***** ex LFOD101010
    $amount = $_SESSION['finalprice'];
    
    /*  ************* Code for cutoff price  */
    $sel=  mysql_query("select * from cutoff_priceshipping");
    $get_cutoff= mysql_fetch_array($sel);
    $cutoff_pricing=$get_cutoff['cutoff_price'];
    
     /*  ************* Code for cutoff price  Ends */
    
    /* ***** Code for Shipping Charges*/
    $select=  mysql_query("select * from shipping_charges");
    $get_shipping= mysql_fetch_array($select);
    $shipping_charges=$get_shipping['shipping_charges'];
    
    /* ***** Code for Shipping Charges Ends*/
    
 
 
    $cutoff_pricing;
     $shipping_charges;
    
    if($amount <= $cutoff_pricing)
    {
        $amount=$amount+$shipping_charges;
    }
  else
  {
        
     $amount = $_SESSION['finalprice'];
 }
    
    
    
    
    $status = 2; // 2-Payment Pending, 1- Order Process, 0- Delivered
       //$gifname=$_SESSION['giffname'];
        
    $price=array();
     $getproductsprice=$_SESSION['mob'];
    
    foreach ($getproductsprice as $item)
    {
        $price[]=$item;
    }
    
     $price_products=  implode(',', $price);
   
    
   
    
    $timezone = "Asia/Calcutta";
    date_default_timezone_set($timezone);
    $added = date('d-m-Y');
    $coupontype = $_SESSION['mycoupontype'];
    $timescoupon=$_SESSION['times'];
    
    if($timescoupon=='1')
    {
        $timecoup=0;   //0-> 1 time coupon applied
    }
    else
    {
        $timecoup=2;  //2->multi times coupon
    }

    $order_sql = mysql_query("INSERT INTO orders (uid, txnid,order_itemcode, name, email, phone, address, productinfo, amount, status, added,pqunty,dresssize,priceall,coupontype,coupon_times,giftcard_name,giftcard_amount,gift_card_id) VALUES ('$uid', '$orderid','$order_itemcode','$name', '$email', '$phone', '$address', '$productinfo', '$amount', '$status', '$added','$qtntys','$ageall','$price_products','$coupontype','$timecoup','$giftname','$giftamounts','$giftids')");

    if (!$order_sql) {
        die('Error: ' . mysql_error());
    } else {
        $phone=$row_user['mobile'];
      
        $msg = "Hello,".$row_user['name']."Thank you for placing your Order with Little Fashions with Order ID:".$orderid;
								
							
	$request = "";
	$param["username"] = "littlefashions"; 
	$param["password"] = "228800"; 
	$param["from"] = "LTLFHN"; 
	$param["to"] = "91".$phone;
	$param["text"] = $msg;
	
	foreach($param as $key=>$val){
		$request.= $key."=".urlencode($val);
		$request.= "&";
	}
	
	$request = substr($request, 0, strlen($request)-1); 
	$url = "https://202.62.67.34/smpp.sms?".$request;
	$load = file_get_contents("https://202.62.67.34/smpp.sms?".$request);
        
        
        
        echo "<script type='text/javascript'>window.location='checkout.php'</script>";
        exit();
    }
}

unset($_SESSION['mob']);
unset($_SESSION['getgiftcardprice']);
unset($_SESSION['getorigninalprice']);
//unset($_SESSION['giftamount']);
?>



<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <title>Shop Cart</title>

        <!-- Google Font -->
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,700,400' rel='stylesheet' type='text/css'>

        <!-- Library CSS -->
       <link rel="stylesheet" href="css/library/font-awesome.min.css">
	<link rel="stylesheet" href="css/library/bootstrap.min.css">
	<link rel="stylesheet" href="css/library/owl.carousel.css">
	<link rel="stylesheet" href="css/library/jquery-ui.min.css">
	<link rel="stylesheet" href="css/library/jquery.fancybox.css">
    <link rel="stylesheet" href="css/library/font-awesome.css">
	<link rel="stylesheet" href="css/library/colio.css">
	<link rel="stylesheet" href="css/library/isotope.css">

        <!-- MAIN STYLE -->
        <!-- MAIN STYLE -->
	<link rel="stylesheet" href="css/style.css"><link rel="shortcut icon" href="http://littlefashions.in/images/favicon.png">
<link rel="stylesheet" href="css/color-pink.css">

<style>
    #coupon{
    color: #fff;
    
    
        
        
    }
</style>
        <style>
.divider{
    width:5px;
    height:auto;
    display:inline-block;
}
</style>
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

        <?php include_once('includes/analytics.php'); ?>

        <script language="javascript">
            function del(product_id) {
                if (confirm('Do you really mean to delete this item')) {
                    document.form1.product_id.value = product_id;
                    document.form1.command.value = 'delete';
                    document.form1.submit();
                    <?php 
                   
                    ?>
                    
                }
            }
            function clear_cart() {
                if (confirm('This will empty your shopping cart, continue?')) {
                    document.form1.command.value = 'clear';
                    document.form1.submit();
                }
            }
            function update_cart() {
                document.form1.command.value = 'update';
                document.form1.submit();
            }

            
            function verify_pincode() {
            console.log('saf');  
            var reg = /^[0-9]+$/;

            var pin = $('#verifypin').val();
            $('p.error').css({"color":"red"});
            $.get("pin-verify.php?pincode="+pin, function(data, status){

                if(data=='1')
                {
                    $('p.error').html('Delivery Service Available');
                    $('p.error').css({"color":"#03FF03"});
                    $('#checkoutbtn').css({"background-color":"#F67D00","cursor":"pointer"});
                }
                else
                {
                    if (!reg.test(pin) || (pin.length)< 6 || (pin.length)>6)
                    {
                        $('p.error').html('Enter a valid pincode');
                        $('#checkoutbtn').css({"background-color":"#ccc","cursor":"default"});
                    }

                    else
                    {
                        $('p.error').html('Service is not available in the your area');
                        $('#checkoutbtn').css({"background-color":"#ccc","cursor":"default"});
                    }
                        
                }
                    
            $('p.error').show();
            }); 
            }

            function place_order() {
                if($('p.error').html()!="Pincode verified")
                {
                    $('p.error').css({"color":"red"});
                    $('p.error').html('Please verify pincode');
                    $('p.error').show();
                    return
                }
                document.form1.command.value = 'order';
                document.form1.submit();
<?php ?>
            }


        </script>
    </head>
    <body onload="noBack();" onpageshow="if (event.persisted) noBack();" onunload="">

        <!-- LOADING 
        <div class="loading-container" id="loading">
                <div class="loading-inner">
                        <span class="loading-1"></span>
                        <span class="loading-2"></span>
                        <span class="loading-3"></span>
                </div>
        </div>-->
        <!-- END LOADING -->

        <div class="wrap-page">

            <!-- HEADER -->
            <nav class="navigation_top ">
                <?php include_once('top.php'); ?>
            </nav>		
            <header class="header _1">
                <?php include_once('header.php'); ?>
            </header>
            <header class="header _1">
                <?php include_once('menu.php'); ?>
            </header>
            <!-- BREAKCRUMB -->

            <!-- BREAKCRUMB -->
            <section class="breakcrumb bg-grey">
                <div class="container">
                    <h3 class="pull-left"><font style="color: navy"><strong>Shopping Cart </strong></font><span></span></h3>

                </div>
            </section>
            <!-- END BREAKCRUMB -->

            <?php
              /*  ************* Code for cutoff price  */
    $sel=  mysql_query("select * from cutoff_priceshipping");
    $get_cutoff= mysql_fetch_array($sel);
    $cutoff_pricing=$get_cutoff['cutoff_price'];
    
     /*  ************* Code for cutoff price  Ends */
    
    /* ***** Code for Shipping Charges*/
    $select=  mysql_query("select * from shipping_charges");
    $get_shipping= mysql_fetch_array($select);
    $shipping_charges=$get_shipping['shipping_charges'];
    
    /* ***** Code for Shipping Charges Ends*/
            
            ?>
         
            
            <!-- SHOP CART -->
            <section class="shop-cart">
                <div class="container">

                    <!-- TABLE CART -->
                    <div class="table-cn ">
                        <form name="form1" method="post">

                            <input type="hidden" name="product_id" />
                            <input type="hidden" name="command" />

                            <div style="color:#F00"><?= $msg ?></div>

                            <table class="table table-cart">
                                <?
                                $categoryid = array();
                                $brandprid = array();

                                if (is_array($_SESSION['cart'])) {

                                    // $_SESSION['cart'][1]['ps'];
                                    echo '<thead>
								<tr>
									<th>Sno</th>
									<th>Item (s)</th>
									<th>Quantity</th>
									<th>Subtotal</th>
                                                                       <!-- <th>Original Price</th>-->
									<th>GrandTotal</th>
									<th>Options</th>
								</tr>
							</thead><tbody>';
                                    $max = count($_SESSION['cart']);
                                    for ($i = 0; $i <= $max; $i++) {
                                        $product_id = $_SESSION['cart'][$i]['product_id'];
                                     $_SESSION['pro_id']= $product_id;
                                        $q = $_SESSION['cart'][$i]['qty'];
                                        
                                        $uid= $_SESSION['user_id'];

                                        $pricelist = $_SESSION['cart'][$i]['ps'];
                                        
                                        $getneworiginal=array();
                                        $getneworiginal=$pricelist;
                                        $ppage = $_SESSION['cart'][$i]['age'];
                                        
                                        /*Query Starts For gift coupon data*/
                                          $getgiftcoupon=mysql_fetch_array(mysql_query("select * from gift_coupon where gid='$product_id'"));
                                            $giftids=$getgiftcoupon['gid'];
                                            $_SESSION['giffname']=$getgiftcoupon['category'];
                                            
                                            $_SESSION['giftamount']=$getgiftcoupon['amount'];
                                            
                                            /*Query Ends For gift coupon data*/
                                            
                                        if ($q == 0)
                                            continue;
                                        ?>

                                        <tr>
                                            <td width="5%"><?= $i + 1 ?></td> <?php // Code for quantity ?>
                                            
                                            
                                            <td class="td-item">
                                                 
                                                <div class="img">
                                                    <?php 
                                                   //code for gift coupon image starts
                                                    ?>
                                                     <?php if($product_id==$giftids)
                                                      {
                                                          
                                                          ?>
                                                        <img src="images/<?php echo 'giftcard1.png';?>" width="150" height="118" alt="">
                                                        
                                                      <?php } /* Gift Cooupn image ends*/ else { ?>
                                                    
                                                    <a href="product-detail.php?id=<?= $product_id; ?>">
                                                        
                                                        <img src="images/products/<?= get_product_image($product_id);  ?>" width="100" height="118" alt="">
                                                        
                                                     

                                                        <?php
                                                        
                                                        /*

                                                          $sqlrowscq=mysql_fetch_array(mysql_query("select image from product_images  where product_id='$product_id'"));
                                                          $pimg=$sqlrowscq['image'];
                                                          if($pimg !='')
                                                          {
                                                          ?>
                                                          <img src="images/products/<?=$pimg;?>" width="100" height="118" alt="">

                                                          <?php
                                                          }

                                                         */
                                                        ?>
                                                    </a>
                                                </div>
                                                      <?php } ?>

                                                
                                                   <?php
                                                   unset($_SESSION['my_choice']); //Unsetting Category sessionvalue
                                                if (isset($_POST['sub'])) {
                                                    extract($_POST);
                                                     /*Query starts for coupons data */
                                                    $sel = mysql_query("select * from coupons where coupon='$coupon'");
                                                      $row=  mysql_fetch_assoc($sel);
                                                      $timesapply= $row['times_apply'];
                                                     $_SESSION['my_choice']=$row['my_choice'];
                                                      
                                                      if($timesapply=='2')
                                                      {
                                                     
                                   $sel=  mysql_query("select * from orders where uid='$uid' and coupontype='$coupon' and coupon_times='2'");
                                   $row= mysql_num_rows($sel);
                                   $_SESSION['times']=$timesapply;
                                   if($row>=0)
                                   {
                                                     $me = $coupon;
                                              }
                                                      }
                                                }
                                                
                                                if($timesapply=='1')
                                                {
                       $sel=  mysql_query("select * from orders where uid='$uid' and coupontype='$coupon' and coupon_times='0' and (`delivery-status`='2' or `delivery-status`='3' or status='1') ");
                       $row=  mysql_num_rows($sel);
                        $_SESSION['times']=$timesapply;
                       if($row>0)
                       {
                           $_SESSION['times_msessage']=1;
                           ?>
                           
                 
<?php                          
                       }
                       if($row<=0)
                       {
                            
                            echo $me = $coupon;
                            
                             $_SESSION['times_msessage']=0;
                           
                       }
                                                }
                                                ?>
            
                                                
                                                
                                                <div class="info">
                                                    <a href="#">
                                                       
                                                        <?php // getting data from different tables ?>
                                                        <?= get_product_name($product_id); ?>
                                                        <?php
                                                        $pids = $product_id;
                                                        /* Getting Category products data from products table*/
                                                        $swal = mysql_fetch_array(mysql_query("select * from products where id='$pids'"));
                                                        $pids = $product_id;
                                                        
                                                        /* Getting Brand products data from products table*/
                                                        $swalbrand = mysql_fetch_array(mysql_query("select * from products where id='$pids'"));
                                                       $quy=$swalbrand['quantity'];

                                                 $getgiftcoupon=mysql_fetch_array(mysql_query("select * from gift_coupon where gid='$pids'"));
                                                        
                                                        echo $catds = $swal['category'];            //value for category this will be useful for coupons
                                                        echo $brandsq = $swalbrand['brand'];        //value for Brand this will be useful for coupons
                                                        echo $subcateg = $swalbrand['subcategory']; //value for Sub-category this will be useful for coupons
                                                        echo $menuitem = $swalbrand['menu'];        //value for Menu this will be useful for coupons
                                                        
                                                        
                                                        
                                                        
                                                         $giftcouprecpname=$getgiftcoupon['recipient_name']; //value for Gift Recipient Name this will be useful for coupons
                                                         
                                                        // $_SESSION['gifname']=$getgiftcoupon['category'];
                                                       
                                                        $giftcateg=$getgiftcoupon['category'];               //value for category this will be useful for coupons
                                                         $giftcoupimage=$getgiftcoupon['gift_image'];        //value for Gift Image this will be useful for coupons
                                                        $giftid=$getgiftcoupon['gid'];                        //value for Gift Id this will be useful for coupons
                                                        ?>
                                                        <?php // $brandname=get_category_name($catds); ?>

                                                        <?php
                                                        
                                                        /* Function for getting coupon percentage for all category,brands,Menu Items */
                                           $bcouponval = get_couponcode_name($catds, $brandsq, $me,$subcateg,$menuitem);
                                                        //$bcouponval = get_couponcode_name($brandsq, $me);
                                                        // echo get_brandcoupon($me);
                                                        //  $getbrandfullcoup=get_brandcouponpercent($me,$brandsq);
                                                      // echo $bcouponval = get_brandcategcouponpercent($me, $brandsq, $catds); //for brands
                                                        //  $catcoupval= get_categorycouponpercent($me,$catds);// for category
                                                        //$gettimesapply= get_brandcoupontimesapply($me);


                                          /* Code for Getting Universal Coupon Code */                  
                                          
                                                        $getuniversal = get_universal_couponcode($me);
                                                        $couponnamess = get_couponname($me);
                                                        IF ($couponnamess != '') {

                                                            $_SESSION['mycoupontype'] = $couponnamess;
                                                        } else {
                                                            $_SESSION['mycoupontype'] = 0;
                                                        }
                                                        ?>


                                                        <?php
                                                        /*
                                                          $sqlrows=mysql_fetch_array(mysql_query("select product_name from products where product_id='$product_id'"));
                                                          echo $sqlrows['product_name'];
                                                         * */
                                                        ?>

                                                    </a><br/>
                                                    
                                                   <?php /* Showing All Category,brand,Menu Items names*/ ?> 
                                                    <span><?= get_category_name($catds); ?><?php echo $giftcateg; ?>/<?= get_brand_name($brandsq); ?><?php if($product_id==$giftids) {  echo "Recipient: ". $giftcouprecpname; }  ?></span>
                                                    
                                                    <?php
                                                    //If conditiion for giftcard 
                                                    if($product_id==$giftids)
                                                    {
                                                        ?>
                                                    
                                                    <?php } /*Code for Normal Products except gift card*/ else { ?>
                                                    <span class="attr">Color : <span>
                                                            <?= get_product_color($product_id); ?>



                                                            <?php
                                                            /*
                                                              $sqlrowsc=mysql_fetch_array(mysql_query("select color from products where product_id='$product_id'"));
                                                              $colorpr=$sqlrowsc['color'];

                                                              $sqlrowscq2=mysql_fetch_array(mysql_query("select color from colors where id='$colorpr'"));
                                                              echo  $colorprW=$sqlrowscq2['color'];
                                                             */
                                                            ?>  </a>   



                                                        </span></span>
                                                    <?php } ?>
                                                    <?php
                                                    //If conditiion for giftcard 
                                                    if($product_id==$giftids)
                                                    {
                                                        ?>
                                                    <span class="attr">Coupon Validity : One Time Only  <span>
                                                            
                                                    <?php } else { ?>
                                                            <span class="attr">Age : <span>
                                                    <?php } ?>
                                                            <?php
                                                            $ageid = $ppage;
                                                            if ($ageid != '') {
                                                                $sqlrowsc = mysql_fetch_array(mysql_query("select age from age where id='$ageid'"));
                                                                echo $agerange = $sqlrowsc['age'];
                                                            }
                                                            ?>

                                                        </span></span>

                                                </div>
                                            </td>
                                            <td class="td-qty text-center">
                                                <div class="qty">
                                                     <?php
                                                     
                                                    
                                                    if($product_id==$giftids)
                                                    {
                                                    ?>
                                                    <input type="text" readonly class="input-text" name="product<?= $product_id ?>" value="<?= $q ?>" maxlength="3" size="5" />
                                                    <?php } else { ?>

       <input type="text" class="input-text actqt" name="product<?= $product_id ?>" value="<?= $q ?>" maxlength="3" size="5" id="productqt<?=$product_id?>"/>

  <span class="productqt<?=$product_id?>" style='display:none;'> <?=$quy?> </span>


                                                    <?php } ?>
                                                   
                                                </div>
                                            </td>
                                            
                                            <?php //Code for offer price getting offer percentage from products table ?>
                                            <td class="td-sub text-center"> Rs.<?php  $getprice=$_SESSION['pro_id']; 
                                                                                    $percent= get_propercent($getprice);
                                                                                    $_SESSION['per']=$percent;
                                                                                    
                                                                                  /*  $getprivalue=array();
                                                                                    $getprivalue[]=$pricelist*/
                                                                                    //$_SESSION['getorigninalprice']=array();
                                                                                    $_SESSION['getorigninalprice'][]=$pricelist*$q;
                                                                                  
                                                                                    
                                                                                  echo $getdis= $pricelist-($percent/100*$pricelist)."<br/>"."-------"."<br/>Rs.<strike>".$pricelist."</strike>" ; 
                                                                                  $_SESSION['getdis']=$getdis;
                                                                                  
                                                                         
                                                                                   if($product_id==$giftids)
                                                    {                        
                                                         $getexludegiftprice=$pricelist;
                                                         
                                                         $_SESSION['getgiftcardprice'][]=$pricelist;
                                                          }
                                                                 
                                                                                  
                                                                                   
                                                                                   
                                                                                    ?>
                                                <br/>
                                               <!-- RS.<strike><?= $pricelist; ?></strike>-->
                                            
                                            
                                            </td>
                                           <!-- <td class="td-sub text-center"> Rs.<?= $pricelist; ?> </td>-->

                                            <?php
                                            if($bcouponval>0)
                                            {
                                            
                                          
                                         
                                          
                                            }
                                            else
                                            {
                                                $getofferprice=$getdis;
                                            }

                                          //  $disamountsubcateg = $pricelist * ($getbrandfullcoup / 100);
                                           // $minecategcoup = $disamountsubcateg;

                                            // $mine=$pricelist/100*$bcouponval;
                                            ?>

                                            <td class="td-sub text-center">

                                                <span id="subprice2">
                                                    
                                                    <?php
                                                    
                                                  /*  unset($_SESSION['id']);
                                                    unset($_SESSION['oldprice']);
                                                    unset($_SESSION['psdtl']);
                                                    unset($_SESSION['full']);*/
                                                    
                                                    //Code for Coupons Apply
                                                   
                                                    if($getfull=get_couponcode_name($catds,$brandsq,$me,$subcateg,$menuitem)>0)
                                                    {
                                                        $_SESSION['full']=$getfull;
                                                       $_SESSION['id']= $product_id;
                                                        $oldprice=$getdis*$q;
                                                        
                                                        if($product_id==$giftids)
                                                        {
                                                            echo $psdtl=$getdis*$q;
                                                            $_SESSION['mob'][] = $psdtl;
                                                        }
                                                        else
                                                        {
                                                        
                                                        $_SESSION['oldprice']=$oldprice;
                                        //  $ins=  mysql_query("insert into dummy (uid,old_price) values ('$product_id','$oldprice')");
                                                //  $disamountsub = $pricelist * ($bcouponval / 100);
                                            $minew = $disamountsub; //mine here
                                          //echo $newmenu=($pricelist * $q);
                                          $orignalprice_new=$pricelist * $q;
                                                    $minew = ($pricelist * $q)*($bcouponval / 100);
                                                   echo $psdtl=($pricelist * $q)-$minew;
                                                   
                                                 //  $_SESSION['originalprice']=array();
                                                   $_SESSION['originalprice_global'][]=$orignalprice_new;
                                                   
                                                  
                                                  //$_SESSION['psdtl']=$psdtl;
                                                   $_SESSION['mob'][] = $psdtl;
                                                   // echo $minew;
                                                     "ofer";
                                                      $totmims = $totmim + $minew ;
                                        //  $upadet=  mysql_query("update dummy set dis_price='$psdtl'");
                                               "tot";
                                                        
                                                    } }
                                                    
                                                    
                                                    else
                                                    {
                                                  echo $psdtl=$getdis*$q;
                                                   $_SESSION['mob'][] = $psdtl;
                                                   //$_SESSION['newpsdtl']=$psdtl;
                                                    "orignal";
                                                      $totmim = $totmim + 0 ;
                                               "tot";
                                                    }
                                                    
                                                     
                                                     
                                                    // echo $psdtl*$q;
                                                            
                                                  
                                                    ?></span>




                                                <input type="hidden" name="subamt" id="subamount" value="<?= $pricelist * $q; ?>" class="form-control" />     


                                            </td>
                                            <td class="td-remove text-center">
                                                <a href="javascript:del(<?= $product_id ?>)"><img src="images/icon-delete.png" alt=""></a>
                                            </td>
                                        </tr>
                                        </tbody>

                                        <?
                                        if($totmims>0)
                                        {
                                             $lastqt = $pricelist * $q;
                                         $totmims;
                                         "sddddasd";
                                       $orderttl = $orderttl + $lastqt -$totmims;
                                        }
                                        else
                                        {
                                        $lastqt = $getdis * $q;
                                         $totmims;
                                         "sddddasd";
                                       $orderttl = $orderttl + $lastqt -$totmims;
                                        }
                                   
                                        ?>
                                    <? } ?>

                                    <tfoot>
                                        <tr class="tr-f">
                                            <td></td>
                                            <td class="td-item">
                                                <p>Shipping: <span>Freeshipping For Above Rs.<?php echo $cutoff_pricing; ?><wbr>* </wbr></span></p>
                                            </td>
                                            <td></td>
                                            <td></td>
                                         
                                            <td class="td-sub text-center">
                                                Rs. <span id="totalamt">

                                                    <?php
                                                    
                                                    
                                                    
                                                    
                                                 $getsignupcode=get_signup_couponcode($me);
                                                    
                                                    
                                                    
                                                    $prices=array();
                                                  //  $oddl = get_order_total();
                                        $getpricefinal=$_SESSION['mob']; //price for offer and original price
                                                    foreach ($getpricefinal as $list)
                                                    {
                                                       //echo $oddl+= $list;
                                                       $prices[] = $list;
                                                    }
                                                        
                                                     $oddl= array_sum($prices);
                                                    
                                                     
                                                    if ($getuniversal) {
                                                        
                                                        
                                                        /*$nowgetnew=$getneworiginal;
                                                        foreach ($nowgetnew as $kick)
                                                        {
                                                            print_r($kick);
                                                        }*/
                                                        
                                                        
                                                        $giftprice=array();
                                                        
                                                        
                                                        $getorignial=  $_SESSION['getorigninalprice'];
                                                        
                                                        
                                                        foreach ($getorignial as $newme)
                                                        {
                                                            $neworoginal_price[]=$newme;
                                                        }
                                                        
                                                        $originalpricetotal=  array_sum($neworoginal_price);
                                                        
                                                        
                                                       // echo $getpri;
                                                    //    $getprivalue=array();
                                                                             //       $getprivalue[]=$pricelist*$q;
                                                      /*  foreach($getprivalue as $ragoriginal)
                                                        {
                                                           print_r($ragoriginal);
                                                        }*/
                                                        
                                                        //getting giftcard prices in session
                                                       $giftprices=$_SESSION['getgiftcardprice'];
                                                        
                                                        foreach ($giftprices as $list)
                                                    {
                                                       //echo $oddl+= $list;
                                                       $giftpricessarray[] = $list;
                                                    }
                                                       $getexludegiftprice= array_sum($giftpricessarray);
                                                        $exclude=$getexludegiftprice; //Get price from Gift Card
                                                        
                                                        $getfilteramount=$originalpricetotal-$exclude; //Excludeing price from tottal price
                                                        $disamount =  $getfilteramount * ($getuniversal / 100);
                                                         $tot = $getfilteramount - $disamount."<br/>";
                                                         
                                                         echo $final=$tot+$exclude;
                                                       
                                                       
                                                       if($final<=$cutoff_pricing)
                                                       {
                                                           echo "Shipping Charges Rs.".$shipping_charges;
                                                       }
                                                    } 
                                                    
                                                  else  if($getsignupcode>0)
                                                    {
                                                        $giftprice=array();
                                                        
                                                        
                                                        $getorignial=  $_SESSION['getorigninalprice'];
                                                        
                                                        
                                                        foreach ($getorignial as $newme)
                                                        {
                                                            $neworoginal_price[]=$newme;
                                                        }
                                                        
                                                        $originalpricetotal=  array_sum($neworoginal_price);
                                                        
                                                        
                                                        //getting giftcard prices in session
                                                       $giftprices=$_SESSION['getgiftcardprice'];
                                                    
                                                        
                                                        foreach ($giftprices as $list)
                                                    {
                                                       //echo $oddl+= $list;
                                                        $giftpricessarray[] = $list;
                                                    }
                                                        $getexludegiftprice= array_sum($giftpricessarray);
                                                        $exclude=$getexludegiftprice; //Get price from Gift Card
                                                        
                                                      $getfilteramount=$originalpricetotal-$exclude; //Excludeing price from tottal price
                                                       $disamount =  $getfilteramount * ($getsignupcode / 100);
                                                        $tot = $getfilteramount - $disamount."<br/>";
                                                         
                                                         echo $final=$tot+$exclude;
                                                         
                                                       
                                                    }else {
                                                        
                                                        
                                                        echo $final= array_sum($prices)."<br/>";
                                                        if($oddl<=$cutoff_pricing)
                                                       {
                                                           echo "Shipping Charges Extra Rs.".$shipping_charges;
                                                       }
                                                    }
                                                    //$coutot=($oddl/100*$getuniversal;
                                                    //  $final=$oddl-$coutot;
                                                    $_SESSION['finalprice'] = $final;
                                                    
                                                    
                                                    
                                                    /*Signup coupon*/
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    ?>
                                                    <?php
                                                    if($_SESSION['times_msessage']=='1')
                                                    {
                                                        ?>
                                                    <span><font style="color: red">Not Applied.This Coupon Is Already Used</font></span>
                                                    <?php
                                                    }
                                                    ?>
                                                     <?php
                                                    if($_SESSION['times_msessage']=='0')
                                                    {
                                                        ?>
                                                    <span><font style="color: green">Coupon Applied Successfully</font></span>
                                                    <?php
                                                    }
                                                    ?>
                                                    

                                                </span>
                                                <input type="hidden" name="amt" id="amount" value="<?= $tot; ?>" class="form-control" />
                                            </td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>

                        </div>
                        <!-- END TABLE CART -->

                        <!-- CART BUTTON -->
                        <div class="shop-button clearfix">
                            <input type="button" value="Continue Shopping" onclick="window.location = 'index.php'" class="cartbtn btn btn-13 pull-left" />
                            <input type="button" value="Clear Cart" onclick="clear_cart()" class="cartbtn btn btn-13 pull-left">
                            <input type="button" value="Update Cart" onclick="update_cart()" class="cartbtn btn btn-13 pull-left" style="float: center">
                            <input type="text" id="verifypin" class="input-text" name="pincode" value="" style="padding-right:8px" size="13" maxlength="6" placeholder="Enter the Pincode" >
                            <input type="button" value="Check Availability" style="background-color:#565656;color:white;" onclick="verify_pincode()" class="btn btn-13" style="float: center">
                            <input type="button" id="checkoutbtn" onclick="place_order()" style="border: 1px solid #D76E01;background:#F67D00 none repeat scroll 0%;border-radius:10px; " class="btn btn-3 text-uppercase pull-right" value="Proceed To Checkout">
                            <p class="error" style="display:none"></p>
                        </div>
                        <!-- END CART BUTTON -->

                        <?
                    } else {
                        echo "<tr><td>There are no items in your shopping cart!</td></tr></table>";
                    }
                    ?>

                    </form>

                    <!-- CART COLLATERALS -->





                    <form id="form" name="form" method="post" action="">
                        <div class="cart-collaterals">
                            <div class="row">
                               
                             <!--   <div class="col-sm-6 col-md-4">
                                    <h2>Have a Gift Card?</h2>
                                    <input type="text" onkeyup="showgift(this.value)" class="input-text" placeholder="Enter gift code...">
                                    <div id="getgift">
                                    </div>-->
                                    
                                   
                                    
                                    
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <h2>Got a Coupon? <?php echo $getcoup; ?></h2>
                                    <input type="text" class="input-text" name="coupon" onKeyUp="" id="coupon" placeholder="Enter coupon code...">
                                    
                                    
                                    <input type="submit" class="btn btn-13" name="sub" id="sub" value="Apply">

                                    </form>

                                    <div id="getcoup">
                                               
                                    </div>

                                </div>

                                <?php
                                $sqlmyal = mysql_query("SELECT *  FROM `wallet` WHERE `user_id` = '$mywalusers' ");
                                $sqlnum = mysql_num_rows($sqlmyal);
                                if ($sqlnum > 0) {
                                    $sqlwalt = mysql_query("SELECT SUM( points ) AS  points FROM wallet WHERE `user_id` ='$mywalusers'");

                                    $row2 = mysql_fetch_assoc($sqlwalt);

                                    $sum520 = $row2['points'];
                                    if ($sum520 > 0) {
                                        ?>


                                        <div class="col-sm-6 col-md-4" style="display:none">
                                            <h2>Pay In My Walets?</h2>
                                            <br/>
                                            <div class="form-group top10">
                                                <form  action="#" method="post">
                                                    <input type="hidden" name='useridkd' value="<?php echo $mywalusers; ?>">
                                                    <input type="hidden" name='allmntsper' value="<?php echo $tot; ?>">
                                                    <label class="radio-inline"><input type="checkbox" name="mywalet" value="<?= $sum520 ?>" id="cashrd"> &nbsp; &nbsp; pay from Walet &nbsp;&nbsp;</label>     

                                                </form>
                                            </div>

                                        </div>


                                        <?php
                                    }
                                }
                                ?>


                            </div>
                        </div>
                        <!-- END CART COLLATERALS -->

                </div>

            </section>
            <!-- END SHOP CART -->

            <!-- PARTNER -->
            <section class="partner partner-list">
                <?php include_once('partners.php'); ?>
            </section>
            <!-- END PARTNER -->

            <!-- FOOTER -->
            <footer class="dark">
                <?php include_once('footer.php'); ?>
            </footer>
            <!-- END FOOTER -->

            <!-- SCROLL TOP -->
            <div id="scroll-top" class="_1">Scroll Top</div>
            <!-- END SCROLL TOP -->

        </div>

        <script src="https://code.jquery.com/jquery-1.7.2.min.js"></script>

        <script>
            
     function showgift(str) {
    
    
     if (str.length == 0) { 
         document.getElementById("txtHint").innerHTML = "";
         return;
     } else {
         var xmlhttp = new XMLHttpRequest();
         xmlhttp.onreadystatechange = function() {
             
//             if (xmlhttp.readyState==1)
//                            {
//                            document.getElementById("bookasign").innerHTML = "<img src='img/ajax-loader.gif'/>";
//                            }
             
             if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                 
               
                    

                
                 document.getElementById("getgift").innerHTML = xmlhttp.responseText;
             }
         }
         xmlhttp.open("GET", "getgiftcoup_ajax.php?q="+str, true);
         xmlhttp.send();
     }
//   setTimeout('showHint(str)',10);
}


</script>


        <script>
                            $(document).ready(function () {

                                $('input[type="checkbox"]').click(function () {

                                    var form_data = $('form').serialize();
                                    form_data['ajax'] = 1;

                                    $.ajax({
                                        url: "waletpay.php",
                                        type: 'POST',
                                        data: form_data,
                                        success: function (data) {
                                            // alert(data);
                                            //alert(data);
                                            $('#amount').val(data);
                                        }
                                    });













                                });

                            });

        </script>






        <!-- Library JS -->
        <script src="js/library/jquery-1.11.0.min.js" type="text/javascript"></script>
        <script src="js/library/jquery-ui.min.js" type="text/javascript"></script>
        <script src="js/library/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/library/owl.carousel.min.js" type="text/javascript"></script>
        <script src="js/library/jquery.ui.touch-punch.min.js" type="text/javascript"></script>
        <script src="js/library/parallax.min.js" type="text/javascript"></script>
        <script src="js/library/jquery.countdown.min.js" type="text/javascript"></script>
        <script src="js/library/jquery.mb.YTPlayer.js" type="text/javascript"></script>
        <script src="js/library/jquery.responsiveTabs.min.js" type="text/javascript"></script>
        <script src="js/library/jquery.fancybox.js" type="text/javascript"></script>
        <script src="js/library/SmoothScroll.js" type="text/javascript"></script>
        <script src="js/library/isotope.min.js" type="text/javascript"></script>
        <script src="js/library/jquery.colio.min.js" type="text/javascript"></script>

        <!-- Main Js -->
        <script src="js/script.js" type="text/javascript"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="js/auto-product.js"></script>
      <script>
       $(document).ready(function(){
        $('.actqt').keyup(function(e){
        
            var axtqt=$(this).val();
            var spntx= $(this).attr('id');
           var datavls=$('.'+spntx).text();

               if(Math.abs(datavls) < Math.abs(axtqt))
            {
               
            alert("Only"+datavls+" pieces available ");
          
            $(this).val(datavls);
         
         event.preventDefault(); 
       
         }

        });   
           
           
       })
    </script>
    
    
    <script>
        $(document).ready(function () {
    setInterval(function () {
        $(".totlasds").load('cartses.php');
      
    }, 1000);
});

        
        </script>
    
        
        <script type="text/javascript">
window.history.forward(1);
function noBack(){
    
window.history.forward();
}
</script>
    </body>
</html>