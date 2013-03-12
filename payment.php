<?php
include 'conn/config.php';
session_start();

$errmsg_arr = array();
$errflag = false;

	$arival = $_SESSION['arrival'];
	$departure = $_SESSION['departure'];
	$adults = $_SESSION['adults'];
	$child = $_SESSION['child'];
	$nroom = $_SESSION['no_rooms'];
	$roomid =$_SESSION['roomid'];
	$result = $_SESSION['result'];
	$eta = $_SESSION['eta'];
	
	
	$name = $_POST['name'];
	$last = $_POST['last'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$email = $_POST['email'];
	$cnumber = $_POST['cnumber'];
	$stat= 'Active';		
	$depositDate = $_POST['depositDate'];
	$depositAmount = $_POST['depositAmount'];
	$depositBranch = $_POST['depositBranch'];
	
	if($depositDate == "Date of Deposit") {
		$depositDate = "";
	}
	if($depositAmount == "Amount of Deposit") {
		$depositAmount = "";
	}
	if($depositBranch == "BDO Branch") {
		$depositBranch = "";
	}
	
	if(empty($_SESSION['6_letters_code'] ) ||
	  strcmp($_SESSION['6_letters_code'], $_POST['6_letters_code']) != 0)
	{
	//Note: the captcha code is compared case insensitively.
	//if you want case sensitive match, update the check above to
	// strcmp()
	$errmsg_arr[] = 'INVALID CONFIRM CODE';
		$errflag = true;
	}
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: reservation2-personnalinfo.php?firstname=$name&lastname=$last&address=$address&city=$city&email=$email&contactNum=$cnumber&depostAmount=$depositAmount&depositDate=$depositDate&depositBranch=$depositBranch");
		exit();
	}

if (!isset($_POST['submit'])) {

$errmsg_arr = array();
$errflag = false;


	function createRandomPassword() {
    $chars = "abcdefghijkmnopqrstuvwxyz023456789";
    srand((double)microtime()*1000000);
    $i = 0;
    $pass = '' ;
    while ($i <= 7) {
        $num = rand() % 33;
        $tmp = substr($chars, $num, 1);
        $pass = $pass . $tmp;
        $i++;
		}
    return $pass;
	}//createRandomPassword
	
	
	$confirmation = createRandomPassword();

	
	
	
	$result1 = mysql_query("SELECT * FROM room where room_id='$roomid'");
	while($row = mysql_fetch_array($result1))  {
	$rate=$row['rate'];
	$type=$row['type'];
	 }
	$payable= $rate*$result*$nroom;
	
		$sql="INSERT INTO reservation (arrival, departure, adults, child, result, room_id, no_room, firstname, lastname, city, zip, province, country, email, contact, password, payable, confirmation, depositDate,depositAmount,depositBranch,eta)
		VALUES ('$arival','$departure','$adults','$child','$result','$roomid','$nroom','$name','$last','$city','$zip','$address','$country','$email','$cnumber','$password','$payable','$confirmation','$depositDate','$depositAmount','$depositBranch','$eta')";
		
		if (!mysql_query($sql,$con)) {
		  die('Error: ' . mysql_error());
		  }		
		  
		$sql = "INSERT INTO roominventory (arrival, departure, qty_reserve, room_id, confirmation, status,eta) VALUES ('$arival','$departure','$nroom','$roomid','$confirmation','$stat','$eta')";
		if (!mysql_query($sql,$con)) {
		  die('Error: ' . mysql_error());
		} //end of mysql query
		
		mysql_close($con);
	
	
	//send the email
		$to = $email;
		$subject="Reservation notification From Tamera Plaza Inn";
		$from = 'tameraplazainn@gmail.com';
		$body = "First Name: $name\n".
		"Last Name: $last\n".
		"Email: $email \n".
		"City: $city \n".
		"Zip Code: $zip \n".
		"Country: $country \n".
		"Contact Number: $cnumber \n".
		"Password: $password \n".
		"Check In: $arival\n ".
		"Check Out: $departure\n ".
		"Number of Adults: $adults\n ".
		"Number of child: $child\n ".
		"Total nights of stay: $result\n ".
		"Room Type: $type\n ".
		"Number of rooms: $nroom\n ".
		"Payable amount: $payable\n ".
		"Confirmation Number: $confirmation\n ";	
		
		$headers = "From: $from \r\n";
		$headers .= "Reply-To: $$from \r\n";
		mail($to, $subject, $body,$headers);
		
		
		}//end of post submit

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>tameraplazainn</title>
<link href="css/main.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="mainwrapper">
  <div class="leftother">
    <div class="l"></div>
	<div class="r">
	<div class="right3">
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr"  method="post">
        <!-- the cmd parameter is set to _xclick for a Buy Now button -->
        
	 <div class="reservation" style="margin-left: 176px; width: 400px;">
	  <div align="center" style="padding-top: 7px; font-size:24px;"><strong>RESERVATION  DETAILS</strong></div>
	  <center><b><span style="color:red;font-size:14px">
	   Please be Advice that you are given an hour base on you time preferences to show up , otherwise your reservation will be nulled.</span></b></center>
	<div style="margin-top: 14px;">
    Confirmation Number :  <?php echo $confirmation;?> <br>
<label style="margin-left: 73px;">Check In Date : <?php echo $arival; ?></label><br />
<label style="margin-left: 58px;">Check Out Date : <?php echo $departure; ?></label><br />
<label style="margin-left: 130px;">Adults : <?php echo $adults; ?></label><br />
<label style="margin-left: 137px;">Child : <?php echo $child; ?></label><br />
<label style="margin-left: 42px;">Number of Rooms : <?php echo $nroom; ?></label><br />
<label style="margin-left: 110px;">Room ID : <?php echo $roomid; ?></label><br />
<label style="margin-left: 52px;">Number of nights : <?php echo $result; ?></label><br />
<label style="margin-left: 101px;">Firstname : <?php echo $name; ?></label><br />
<label style="margin-left: 102px;">Lastname : <?php echo $last; ?></label><br />
<label style="margin-left: 114px;">Address : <?php echo $address; ?></label><br />
<label style="margin-left: 146px;">City : <?php echo $city; ?></label><br />
<!--
<label style="margin-left: 108px;">ZIP Code : <?php echo $zip; ?></label><br />
<label style="margin-left: 117px;">Country : <?php echo $country; ?></label><br />
-->
<label style="margin-left: 133px;">Email : <?php echo $email; ?></label><br />
<label style="margin-left: 56px;">Contact Number : <?php echo $cnumber; ?></label><br />      <BR />
  </div>
  
	<!--
	
	<input type="hidden" name="cmd" value="_xclick" />
        <input type="hidden" name="business" value="jpabs78@gmail.com" />
        <input type="hidden" name="item_name" value="<?php echo $type; ?>" />
        <input type="hidden" name="item_number" value="<?php echo $nroom; ?>" />
        <input type="hidden" name="amount" value="<?php echo $payable; ?>" />
        <input type="hidden" name="no_shipping" value="1" />
        <input type="hidden" name="no_note" value="1" />
        <input type="hidden" name="currency_code" value="PHP" />
        <input type="hidden" name="lc" value="GB" />
        <input type="hidden" name="bn" value="PP-BuyNowBF" />
        <input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but23.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!" style="margin-left: 157px;" />
        <img alt="fdff" border="0" src="https://www.paypal.com/en_GB/i/scr/pixel.gif" width="1" height="1" />
        <!-- Payment confirmed 
        <input type="hidden" name="return" value="https://www.chmscians.com/paypal/showconfirm.php" />
        <!-- Payment cancelled -
        <input type="hidden" name="cancel_return" value="http://www.chmscians.com/paypal/cancel.php" />
        <input type="hidden" name="rm" value="2" />
        <input type="hidden" name="notify_url" value="http://www.chmscians.com/paypal/ipn.php" />
        <input type="hidden" name="custom" value="any other custom field you want to pass" />
		-->
 </form>
	</div> 
</div>
	
	
	
	
	
	
	
	
	
	</div>
  </div>
  
  
  
  
  
  
  <div class="rightother">
  
  
  
  
  </div>
  
  
  
  
  
  
</div>
<div class="footer" style="text-align:center; font-family:Arial, Helvetica, sans-serif; font-size:12px;">copyright © tameraplazainn 2011 - 2012 All Rights reserved</div>




</body>
</html>
