<?php
 include_once('includes/db.php');
 include_once('includes/functions.php');
 session_start();
 unset($_SESSION['remainamount']);
if(!isset($_SESSION['user_id']) || (trim($_SESSION['user_id']) == '')) {
	header("location: login.php");
	exit();
}
 $uid = $_SESSION['user_id'];
$txnid = $_SESSION['order_id'];
 

$MERCHANT_KEY = "cHZKBz";

// Merchant Salt as provided by Payu
$SALT = "BiRkTa4W";

// End point - change to https://secure.payu.in for LIVE mode
$PAYU_BASE_URL = "https://secure.payu.in";

$action = '';


$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
	
  }
}

$formError = 0;

$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
		  || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
	  
	  $name = $posted['firstname'];
	  $email = $posted['email'];
	  $phone = $posted['phone'];
        
	  $address = $posted['address'];
          
           $finalamount=$posted['amount'];
         
          $finalamount=  round($finalamount);
          
         $coupcode=$posted['coupcode'];
       
           $coupgiftamount=$posted['coupgiftamount'];
          
           
           $selwallet=  mysql_query("select * from orders where txnid='$txnid' and uid='$uid'");
           $getroworder=  mysql_fetch_assoc($selwallet);
           
           $getwallet=  mysql_query("select * from wallet where user_id='$uid'");
           $getrowwallet=  mysql_fetch_assoc($getwallet);
           $getwalletprice=$getrowwallet['points'];
           $getloyalitycash=$getrowwallet['loyality_cash'];
           $getwallettotoal=$getwalletprice+$getloyalitycash;
           
           
           if($getroworder['amount']>$getwallettotoal)
           {
                $getroworder['amount']-$getwallettotoal;
                $walletprice=0;
                $loyalitycash=0;
                $update=  mysql_query("update wallet set `points`='$walletprice',`loyality_cash`='$loyalitycash',`txid`='$txnid' where `user_id`='$uid' ");
               
           }
           
           
	  
	  $update_sql = mysql_query("UPDATE orders SET `name` = '$name',`email` = '$email', `phone` = '$phone', `address` = '$address',`amount`='$finalamount',`gift_couponcode`='$coupcode',`giftcard_amount`='$coupgiftamount',`payment-mode` = 1  WHERE txnid = '$txnid' ");
	 
          /*$subject = "Thankyou for Placing your Order with littlefashions";
		$emailTo = $email;
		$emailfrom = "info@littlefashions.in"; 
		$body = "Dear $name, \n\nThank you for placing your Order with Little Fashions with Order ID: $txnid. \n\n\n\nWith Regards,\nLittle Fashions.";
		$headers = 'From: Little Fashions <'.$emailfrom.'>' . "\r\n" . 'Reply-To: ' . $emailfrom;

		mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
		
		*/
	$msg = "Thank you for placing your Order with Little Fashions with Order ID:".$txnid;
								
							
	$request = "";
	$param["username"] = "littlefashions"; 
	$param["password"] = "228800"; 
	$param["from"] = "LTLFHN"; 
	$param["to"] = "";
	$param["text"] = $msg;
	
	foreach($param as $key=>$val){
		$request.= $key."=".urlencode($val);
		$request.= "&";
	}
	
	$request = substr($request, 0, strlen($request)-1); 
	$url = "https://202.62.67.34/smpp.sms?".$request;
	$load = file_get_contents("https://202.62.67.34/smpp.sms?".$request);
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}

unset($_SESSION['walletcash']);
?>


<?php
if(isset($_POST['submitgift']))
{
   // unset($_SESSION['disablecod']);
     $giftcouponcode=$_POST['giftcode'];
     
     $_SESSION['giftcardcoup']=$_POST['giftcode'];
 
     
     
     $selgift=  mysql_query("select * from gift_coupon where coup_hint='$giftcouponcode' and status='1'");
     $row=  mysql_fetch_assoc($selgift);
      $giftcard_totalamount= $row['amount'];
      $_SESSION['amount']=$row['amount'];
      
      if($row>0)
      {
          $_SESSION['disablecod']=1;
      }
      
}

?>

<!DOCTYPE html>

<html>

<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<title>Check Out</title>



	<!-- Google Font -->

	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,700,400' rel='stylesheet' type='text/css'>



	<!-- Library CSS -->

	<link rel="stylesheet" href="css/library/font-awesome.min.css">

	<link rel="stylesheet" href="css/library/bootstrap.min.css">

	<link rel="stylesheet" href="css/library/owl.carousel.css">

	<link rel="stylesheet" href="css/library/jquery-ui.min.css">

	<link rel="stylesheet" href="css/library/jquery.fancybox.css">
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
	<link rel="stylesheet" href="css/style.css"><link rel="shortcut icon" href="https://www.littlefashions.in/images/favicon.png">
<link rel="stylesheet" href="css/color-pink.css">


        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js">

<script>

    $(document).ready(function() {
        function disableBack() { window.history.forward() }

        window.onload = disableBack();
        window.onpageshow = function(evt) { if (evt.persisted) disableBack() }
    });
    
</script>

        <!--<script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>

        <script src="https://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>-->

    <![endif]-->
	<script>
		 var hash = '<?php echo $hash ?>';
		 function submitPayuForm() {
		  if(hash == '') {
			return;
		  }
		  var payuForm = document.forms.payuForm;
		  payuForm.submit();
		 }
    </script>
    <?php include_once('includes/analytics.php'); ?>
</head>

<body onLoad="submitPayuForm()">



	<!-- LOADING -->


	<!-- END LOADING -->



	<div class="wrap-page">



        <nav class="navigation_top ">

            <?php include_once('top.php');?>


        </nav>		

        <header class="header _1">

            <?php include_once('header.php');?>

        </header>

        <header class="header _1">

            <?php include_once('menu.php');?>

        </header>

		

		<!-- BREAKCRUMB -->


		<!-- END BREAKCRUMB -->

		

		<!-- CHECK OUT -->

		<section class="check-out">

    <div class="container main-container">
        <div class="row">
        	<div class="col-lg-12 col-md-12 col-sm-12">

        		<div class="col-lg-12 col-sm-12">
                            <span class="title"><font style="color: navy"><strong>Confirm Shipping Address</strong></font></span>
				</div>

	            <div class="col-lg-12 col-sm-12 hero-feature">

                    <?php if($formError) { ?>
	
                      <span style="color:red">Please fill all mandatory fields.</span>
                      <br/>
                      <br/>
                    <?php } 
                    
                   
                    
                    $sql_order = mysql_query("SELECT * FROM `orders` WHERE `txnid` = '$txnid' ");
                    $row_order = mysql_fetch_array($sql_order);
                    
                    $gifname= $row_order['giftcard_name'];
                    
      
                    
                    
                    
                    ?>
                    
                    <form action="<?php echo $action; ?>" method="post" name="payuForm" enctype="multipart/form-data" class="form-horizontal">
                        <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
                        <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
                        <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
                        <input type="hidden"  name="amount"  readonly="readonly" value="<?=$row_order['amount'];?>" />
                        
                        <textarea hidden="hidden" name="productinfo"><?=$row_order['productinfo'];?></textarea>
                        <input type="hidden" name="surl" value="https://www.littlefashions.in/success.php" size="64" />
                        <input type="hidden" name="furl" value="https://www.littlefashions.in/failure.php" size="64" />
                        <input type="hidden" name="service_provider" value="payu_paisa" size="64" />	
                        
                        
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-4">
                            <input type="text" name="firstname" id="firstname" value="<?=$row_order['name'];?>" required class="form-control" />
                            </div>
                        </div>
                        
                        
                        
                        <div class="clearfix"></div>
                        
                        <div class="form-group top10">
                            <label for="email" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-4">
                            <input type="text" name="email" id="email" value="<?=$row_order['email'];?>" required class="form-control" />
                            </div>
                        </div>
                        
                        <div class="clearfix"></div>
                        
                        <div class="form-group top10">
                            <label for="phone" class="col-sm-2 control-label">Phone</label>
                            <div class="col-sm-4">
                            <input type="text" name="phone" value="<?=$row_order['phone'];?>" required class="form-control" />
                            </div>
                        </div>
                        
                         
                        
                        <div class="clearfix"></div>
                        
                        <div class="form-group top10">
                            <label for="address" class="col-sm-2 control-label">Address</label>
                            <div class="col-sm-4">
                            
                            <textarea name="address" required class="form-control"><?=$row_order['address'];?></textarea>
                            </div>
                        </div>
                        
                       
                        
                        
                        
                          <div class="form-group top10">
                            <label for="amount" id="totalhide" class="col-sm-2 control-label">Total Amount Rs To Paid</label>
                            <div class="col-sm-4">
                                <?php
                                /*Code to get Shipping Extra Charges*/
                                $sel=  mysql_query("select * from shipping_charges");
                                $shipcahrges=  mysql_fetch_assoc($sel);
                                 $shipcharges=$shipcahrges['shipping_charges'];
                                 
                                
                                /*Code to get Cutoff price range Charges*/
                                $selcharges=  mysql_query("select * from cutoff_priceshipping");
                                $cutofprice=  mysql_fetch_assoc($selcharges);
                                 $cutofprice['cutoff_price'];
                               
                                ?>
                                
                                <?php
                                
                               
                                
                                $selgiftcoup=  mysql_query("select * from orders where gift_couponcode='$giftcouponcode' and giftcard_amount='$giftcard_totalamount' and status='1' and (`delivery-status`='2' or `delivery-status`='1' or `delivery-status`='3' )");
                               //$getrow= mysql_num_rows($selgiftcoup);
                                $getrow= mysql_fetch_assoc($selgiftcoup);
                                
      
                               if($getrow['gift_couponcode']==$giftcouponcode)
                               {
                                   unset($_SESSION['giftcardcoup']);
                                   unset($_SESSION['amount']);

                                   ?>
                                <h4><font style="color: red">Sorry,No Gift Card Is Applied. </h4></font>
                                <?php
                                   //echo "<script>alert('You Have Already Used This Coupon');</script>";
                                   
                                /*if($row_order['amount']<499)
                                  {*/
                                      $gifempt=$row_order['amount'];
                                      //echo "Shipping Charges Extra ".$shipcharges;
                                 // }
                                //  else
                                 // {
                                      $gifempt=$row_order['amount'];
                                 // }
                                  ?>
                                     <input type="text" name="amount" readonly id="amountnochange"  value="<?= $_SESSION['tot']=$tot=$gifempt;?>" required class="form-control" />
                              <?php } 
                               else
                               {
                                   if($giftcard_totalamount < $row_order['amount'])
                                   {
                                       if($row_order['amount']<$cutofprice['cutoff_price'])
                                       {
                                           $totamoun= $row_order['amount']-$giftcard_totalamount;
                                   
                                   $gifempt=$totamoun;//+$shipcharges;
                                   
                                //   echo " <h4><font style='color: green'>This Gift Coupon Is Applied</h4></font>";
                                  
                                 
                                   
                                   ?>
                                      
                                     
                                     <p>Shipping Charges Extra :<?= $shipcahrges['shipping_charges'];?> </p>
                                   <?php  } 
                                       else
                                       {
                                   $totamoun= $row_order['amount']-$giftcard_totalamount;
                                   
                                   $gifempt=$totamoun;  
                                 $_SESSION['amountrupees']=  $gifempt; 
                                  //echo " <h4><font style='color: green'>This Gift Coupon Is Applied</h4></font>";
                                  
                                 /* if($gifempt<499)
                                  {*/
                                      $gifempt=$gifempt;//+$shipcharges;
                                     // echo "Shipping Charges Extra ".$shipcharges;
                                //  }
                                //from here remain amount should go to payment
                                       }
                                   ?>
                   <input type="text" name="amount" readonly id="puramount"  value="<?= $_SESSION['tot']=$gifempt;  ?>" required class="form-control" />
                                  
                                   
                                  <?php  }
                                   if($giftcard_totalamount>$row_order['amount'])
                                   {
                                       
                                   $totprice= $giftcard_totalamount-$row_order['amount'];
                                   
                                   $gifempt=0;
                                   $_SESSION['amountrupees']=$gifempt;
                                   echo " <h4><font style='color: green'>This Gift Coupon Is Applied</h4></font>";
                                   //Here amount should go to wallet
                                   
                                   
                                  
                                   ?>
                    
                                     
                              <input type="text" name="amount" readonly id="noamount"  value="<?= $_SESSION['tot']=$gifempt; ?>" required class="form-control" />
                            <?php                                   
                             }   
                                        
                                ?>
                               
                              <input type="hidden" name="coupcode" id="coupcode" value="<?php echo $giftcouponcode; ?>">
                               <?php 
                               if($giftcard_totalamount>$row_order['amount'])
                                   {
                                  
                                   ?>
                              
                              <p>Remain Amount :<font style="color: red"> <?php echo $_SESSION['remainamount']= $totprice; ?> Rupees </font> Will Be Credited To Your Wallet Account</p>
                              <?php } } 
                              ?>
                              <input type="hidden" name="coupgiftamount" id="coupgiftamount" value="<?php echo $giftcard_totalamount; ?>">
                              
                                
                               
                            </div>
                            
                            
                            
                        </div>
                          
                        
                        <div class="clearfix"></div>
                        
                        
                        
                         <div class="clearfix"></div>
                         
                          <?php
                                $sqlmyal= mysql_query("SELECT *  FROM `wallet` WHERE `user_id` = '$uid' ");
                                $sqlnum=mysql_num_rows($sqlmyal);
                                if($sqlnum > 0)
                                {
                                    $sqlwalt=mysql_query("SELECT * FROM wallet WHERE `user_id` ='$uid'");
                                        
                                    $row2 =mysql_fetch_assoc($sqlwalt); 
                                          
                                    $sumwallet =$row2['points']; 
                                  $loyalitycash=$row2['loyality_cash'];
                                  $_SESSION['loyal']=$loyalitycash;
                                    $sum520=$sumwallet+$loyalitycash;
                                    if($sum520 > 0)
                                    {
                                ?>
                                            
                                             <label for="address" class="col-sm-2 control-label">&nbsp;</label>
                                            <div class="col-sm-6 col-md-4" >
							
                                                <h4 id="wallmsg">You Have <font style="color: blue"> <?php echo $_SESSION['walletcash']= $sum520 ; ?> &nbsp;Points </font> in your <font style="color: darkred"><strong> Wallet With Your Loyality Cash</font></strong></h4>
                                                      <div class="form-group top10">
                                                      
                                                              <!-- <input type="hidden" name='useridkd' value="<?php echo $mywalusers ; ?>">
                                                              <input type="hidden" name='allmntsper' value="<?=$row_order['amount'];?>">-->
                                                              
                                                              <?php 
                                                              $metot=$_SESSION['tot'];
                                                                if($metot>0)
                                                 {
                                                              ?>
                                                              <label class="radio-inline" id="mywallabel"><input type="checkbox" name="paymentrd" id="mywallet" value="walletcash" >Wallet Cash</label>  
                                                 <?php } ?>
                                                              
                                                              <input type="button" name="walletpay" id="walletpay" class="btn btn-primary" value="Confirm" onclick="window.location.href='walletcash_deduct.php?tnxids=<?=$txnid?>';">
                                                              
                                                   <!--  <input type="button" name="wallcash" id="wallcash" class="btn btn-primary" value="Confirm Pay Wallet" onclick="window.location.href='walletcash_deduct.php?tnxids=<?=$txnid?>';">-->
                                                        
                                                      
                                                       </div>
							
						</div>
                                             
                                            
                                               <label for="address" class="col-sm-2 control-label">&nbsp;</label>
                                               <div class="col-sm-6 col-md-4" ><br><br/>
                                                
                                                <?php
                                                
                                                $_SESSION['tot'];
                                                
                                                 $metot=$_SESSION['tot'];echo "<br/>";
                                                 
                                                 if($metot>0)
                                                 {
                                                if($metot>$sum520)
                                                {
                                                     $gifempt=$metot-$sum520;
                                                    
                                                    
                                                    
                                                   // echo "need to pay in online";
                                                   
                                                    ?>
                                                
                               <input type="text" name="amount" readonly id="toponline"  value="<?= $_SESSION['tot']=$gifempt; ?>" required class="form-control" />
                                                
                                                <p><font style="color: red">Info: </font><font style="color: blue"><strong>If You Pay Through Wallet Points . Rest Of The Amount From The Total &nbsp&nbsp;Rs &nbsp;&nbsp;<span id='amountdata'> <?= $gifempt; ?></span>&nbsp;&nbsp;You Need to pay</strong></font> </p>
                                                <?php
                                                }
                                                else
                                                {
                                                    $amounttowallet= $sum520-$metot;
                                                    "send remain to wallet";
                                                    ?>
                                                <p><font style="color: red">Info: </font><font style="color: green"><strong> If You Pay Through Wallet Points Remain Cash Will Be Added To Your Wallet &nbsp&nbsp;Rs <?= $amounttowallet; ?> &nbsp;&nbsp;<span id='amountdata'> </span>&nbsp;&nbsp;</strong></font></p>
                                               
                                             <?php
                                                }  }
                                                ?>
							
							
                                                      
							
						</div>
                                            
                                            
                               <?php
                                    }   
                                
                                
                                }  
                               ?>
                                               <span id="cashondelmsg" name="cashondelmsg"><font style="color: red"><strong>Wallet Amount Cannot Be Used For COD</font><font style="color: blue "></strong></font></span>
                        <div class="clearfix"></div>
                        
                        
                        
                        <div class="form-group top10">
                           
                            <div class="col-sm-4">
                                
                                
                            <!--    <p>After Gift Coupon Applied  <font style="color: red">The Total Amount To Pay Is :Rs.  </font></p>-->
                            </div>
                            
                            
                            
                        </div>
                          
                          <div class="clearfix"></div>
                        
                        <div class="form-group top10">
                            <label for="address" class="col-sm-2 control-label">&nbsp;</label>
                            
                            <?php
                            if($totprice>0)
                            {
                                 $_SESSION['remainamount'];
                                ?>
                            <!-- Button For Wallet Pay -->   
                                  <input type="button" name="cashdelv" class="btn btn-primary" value="Confirm" onclick="window.location.href='cashondelivery-thanks.php?tnxids=<?=$txnid?>';">
                            <?php }
                            else
                            {
                            ?>
                           
                             <label class="radio-inline" id="cashmsg1"><input type="radio" name="paymentrd" value="cashondel" id="cashrd">Cash On delivery </label>
                            <label class="radio-inline" id="cashmsg2"><input type="radio" name="paymentrd" value="onlinepay" id="onlinerd">Online Payment</label>  
                            <?php } ?>
                            
                           
                         <!--  <label class="radio-inline"><input type="radio" name="paymentrd" value="onlinepay" id="onlinerd">Online Payment</label> -->
                           
                          
   
                          <!-- 
                            <label class="radio-inline"><input type="radio" name="paymentrd" value="cashondel" id="cashrd">Cash On delivery </label>
                            <label class="radio-inline"><input type="radio" name="paymentrd" value="onlinepay" id="onlinerd">Online Payment</label> -->
                            
                         
                        </div>
                          
                          
                             
                        
                       
                        <div class="clearfix"></div>
                        
                        <div class="form-group col-lg-4 col-sm-4 text-right top10" id="cashdel" style="display:none">
                            
                            <span id="msg" align="center"><font style="color: red">For COD Extra 60 Rs Will Be Charged</font></span>
                            <div class="btn-group btns-cart">
                            
                           
                             <!-- Button For COD -->   
                            <input type="button" name="cashdelv" class="btn btn-primary" value="Confirm" onclick="window.location.href='cod.php?tnxids=<?=$txnid?>';">
                           
                            </div>
                        </div>
                        
                        <div class="form-group col-lg-4 col-sm-4 text-right top10" id="cashonline" style="display:none">
                            <div class="btn-group btns-cart">
                                
                            <?php if(!$hash) { ?>
          <!-- Button For Online Pay -->   
                            <input type="submit" name="submit" class="btn btn-primary" value="Confirm">
                            <?php } ?>
                            </div>
                        </div>
                    </form>
                    
                       <form id="form" name="form" method="POST" action="">
                        <div class="cart-collaterals">
                            <div class="row">
                               
                                <div class="col-sm-6 col-md-4">
                                    <h2>Have a Gift Card?</h2>
                                    <input type="text" name="giftcode" class="input-text" placeholder="Enter gift code...">
                                    <div id="getgift">
                                    </div>
                                    
                                    <input type="submit" class="btn btn-13" name="submitgift" id="submitgift" value="Apply">
                                </div>
                              
                                </form>
                      
	            </div>
        	</div>

                           
        	<!-- End Cart -->
            
<?php
//unset($_SESSION['giftname']);
?>


        </div>
	</div>


		</section>

		<!-- END CHECK OUT -->



		<!-- PARTNER -->


		<!-- END PARTNER -->

		

		<!-- FOOTER -->

		<footer class="dark">

        	<?php include_once('footer.php');?>

		</footer>

		<!-- END FOOTER -->



		<!-- SCROLL TOP -->

		<div id="scroll-top" class="_1">Scroll Top</div>

		<!-- END SCROLL TOP -->



	</div>



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
        
        
        
         <script>
        $(document).ready(function(){
            $('#wallcash').hide();
            $('#toponline').hide();
            $('#walletpay').hide();
            $('#cashondelmsg').hide();
            
            <?php
            if($gifname!="")
                    {
                ?>
                        $("#cashrd").hide();
                        $('#cashdel').hide();
                        $('#cashondelmsg').hide();
                        $('#msg').hide();
                        $('#cashmsg1').hide();
                        <?php
                       
                    }
            ?>
            
           
  $("#cashrd").click(function() {
    
      $('#cashonline').hide();
	  $('#cashdel').show();
          $('#msg').show();
          $('#wallcash').hide();
          $('#mywallet').hide();
          $('#mywallabel').hide();
          $('#onlinerd').hide();
          $('#cashmsg2').hide();
          $('#cashondelmsg').show();
          $('p').hide();
          $('#wallmsg').hide();
          
         
	  
   });

  $("#onlinerd").click(function() {
    
       $('#cashonline').show();
	  $('#cashdel').hide();
          $('#wallcash').hide();
	  
   });
   
   
   
   $('input[type="checkbox"]').click(function() {
       
      
               
    
       $('#noamount').hide();
       $('#totalhide').hide();
	  $('#puramount').hide();
           $('#cashdel').hide();
           $('#cashrd').hide();
           $('#cashmsg1').hide();
          
          <?php
          if($metot<=$sum520)
                                                {
          ?>
          
          $('#onlinerd').hide();$('#cashrd').hide();
          $('#cashmsg1').hide();$('#cashmsg2').hide();
          
          $('#walletpay').show();
          
          
          
            <?php } ?>
          $('#amountnochange').hide();
          $('#toponline').show();
      
      <?php
          if($metot>$sum520)
                                                {
              
              echo "sajgdjgass";
          echo $metot;
          echo $sum520;
              
      
      } ?>
      
   });


			
            
            
        });
        </script>
        
        
        <script>
      
     $(document).ready(function(){

         $('input[type="checkbox"]').click(function(){
    
        var form_data = $('form').serialize();
        form_data['ajax'] = 1 ;
      
    $.ajax({
        url: "waletpay.php",
        type: 'POST',
        data: form_data,
        cache: false ,
        success: function(data) {
           alert(data);
            //alert(data);
            $('#amountdata').text(data);
            $('#walamnttxt2').val(data);
            
         
         
        
      
        
          
         
        }
    });
       
       
       
       
       
       
       
       
       
       
       
       
            
      });      
        
});
    
    </script>
        
        

</body>

</html>