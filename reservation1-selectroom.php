<?php
include 'conn/config.php';
include 'functions.php';
//lotus.x10hosting.com:2083/frontend/x3/filemanager/editit.html?file=selectroom.php&fileop=&dir=%2Fhome%2Fargie%2Fpublic_html&dirop=&charset=&file_charset=windows-1252&baseurl=&basedir=
	
	$arival = $_POST['start'];
	$departure = $_POST['end'];
	$adults = $_POST['adult'];
	$child = $_POST['child'];	
	$time = $_POST['time'];	
	if($arival == ''){
	header("location: index.php#3");
	}

	if($departure == ''){
	header("location: index.php#3");
	}
	if($adults == ''){
	header("location: index.php#3");
	}
	if($child == ''){
	header("location: index.php#3");
	}
	
	$result = mysql_query("SELECT * FROM room ORDER BY room_id ASC");
	$array = array();
	while ($row = mysql_fetch_array($result,MYSQL_ASSOC)) {
    $array[] = $row;
	}
	//preprint($array);
	//$child = 1;
	//$adults = 7;
	$featured = getFeaturedRoom($adults,$child,$array);
	
	//preprint($featured);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Reservation Process 1</title>
<link href="css/main.css" rel="stylesheet" type="text/css" />

<!--sa pop up-->

 <link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
  
  <script src="lib/jquery.js" type="text/javascript"></script>
  <script src="src/facebox.js" type="text/javascript"></script>

  
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'src/loading.gif',
        closeImage   : 'src/closelabel.png'
      })


    jQuery('#room').submit(function() {

		var y=document.forms["room"]["no_rooms"].value;
		var a=document.forms["room"]["madult"].value;
		var b=document.forms["room"]["adult"].value;
		var fields = jQuery(this).find('input[name="roomid"]:checked');
        if (fields.length == 0) {
            alert('You must check at least one box!');
            return false; // The form will *not* submit
        }
		
		 if (fields.length >  1) {
            alert('Please check only 1 checkbox!');
            return false; // The form will *not* submit
        }
		if ((y==null || y==""))	{
		alert("Please type the number of Rooms you wish to reserve!");
		return false;
		}

		
		
		
    });




	
	});
	
  </script>


<!--sa error trapping-->
<script type="text/javascript">


  
  
function validateForm()
{

var y=document.forms["room"]["no_rooms"].value;
var a=document.forms["room"]["madult"].value;
var b=document.forms["room"]["adult"].value;
var fields = jQuery('#room').find('input[name="roomid"]:checked');



if ((y==null || y==""))
  {
  alert("Please type the number of Rooms you wish to reserve!");
  return false;
  }
  
	if (!fields.length) {
            alert('You must check at least one box!');
            return false; // The form will *not* submit
   }


/*if (b>a)
  {
  alert("dfdfdfdfdfdfdf");
  return false;
  }*/

}
</script>
<!--sa minus date-->
<script type="text/javascript">
	// Error checking kept to a minimum for brevity
 
	function setDifference(frm) {
	var dtElem1 = frm.elements['start'];
	var dtElem2 = frm.elements['end'];
	var resultElem = frm.elements['result'];
	 
// Return if no such element exists
	if(!dtElem1 || !dtElem2 || !resultElem) {
return;
	}
	 
	//assuming that the delimiter for dt time picker is a '/'.
	var x = dtElem1.value;
	var y = dtElem2.value;
	var arr1 = x.split('/');
	var arr2 = y.split('/');
	 
// If any problem with input exists, return with an error msg
if(!arr1 || !arr2 || arr1.length != 3 || arr2.length != 3) {
resultElem.value = "Invalid Input";
return;
	}
	 
var dt1 = new Date();
dt1.setFullYear(arr1[2], arr1[1], arr1[0]);
var dt2 = new Date();
dt2.setFullYear(arr2[2], arr2[1], arr2[0]);

resultElem.value = (dt2.getTime() - dt1.getTime()) / (60 * 60 * 24 * 1000);
}
</script>



<!--sa input that accept number only-->
<SCRIPT language=Javascript>
      <!--
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
      //-->
   </SCRIPT>

</head>

<body>
<div class="mainwrapper">
  <div class="leftother">
    <div class="l"></div>
	<div class="r">
	
	<div class="right3">
  <form action="reservation2-personnalinfo.php" method="post"  name="room" id="room">
  <input name="start" type="hidden" value="<?php echo $arival; ?>" />
  <input name="end" type="hidden" value="<?php echo $departure; ?>" />
  <input name="adult" type="hidden" value="<?php echo $adults; ?>" />
  <input name="child" type="hidden" value="<?php echo $child; ?>" />
   <input name="time" type="hidden" value="<?php echo $time; ?>" />
  
  <label style="margin-left: 119px;">Number of Rooms: </label><INPUT id="txtChar" onkeypress="return isNumberKey(event)" type="text" name="no_rooms" class="ed">
 <span id="errmsg"></span>
  <br>
  <b>Featured Room</b>
  <!------------Featured Room--------->
	  <?php 
		$a = $featured["room_id"];
	    $query = mysql_query("SELECT sum(qty_reserve) FROM roominventory where 	status='Active' and room_id='$a'");
		while($rows = mysql_fetch_array($query))  {
		$sumFeature=$rows['sum(qty_reserve)'];
		}
		$totalDiffFeature = $featured['qty'] - $sumFeature;
		if($totalDiffFeature < 0){
			$totalDiffFeature = 0;
		}
	  
	  echo '<div style="height: 117px;">';
	  echo '<div style="float: left; width: 100px; margin-left: 19px;">';
	  echo "<img width=92 height=72 alt='Unable to View' src='" . $featured["image"] . "'>";
	  echo '</div>';
	  echo '<div style="float: right; width: 575px; margin-top: -10px;">';
	  echo '<span class="style5">'.'Avalable Rooms: '.$totalDiffFeature.'</span>';
	  if ($totalDiffFeature > 0){
					echo '<input name="roomid" type="checkbox" value="' .$featured["room_id"]. '" />';
					echo '<input type="submit" name="Submit" value="reserve" onclick="setDifference(this.form);"/>';
					}
	  else if ($totalDiffFeature <= 0){
				echo '<span class="style5">'.'&nbsp&nbsp Sorry No More Rooms Available'.'</span>';
				}	
	  echo '<br>';		
	  echo '<span class="style5">'.'Room Type: '.$featured['type'].'</span><br>';
	  echo '<span class="style5">'.'Room Rate: '.$featured['rate'].'</span><br>';
      echo '<span class="style5">'.'Max Child: '.$featured['max_child'].'</span><br>';
      echo '<input name="mchild" type="hidden" value="' .$featured["max_child"]. '" />';
	  echo '<input name="avail" type="hidden" value="' .$angavil. '" />';
	  echo '<span class="style5">'.'Max Adult: '.$featured['max_adult'].'</span><br>';
      echo '<input name="madult" type="hidden" value="' .$featured["max_adult"]. '" />';
	  echo '<span class="style5">'.'Room Description: '.$featured['description'].'</span><br>';
	  echo '</div>';
     echo '</div>';
	 ?>
	 <!---------------End Featured Room------------->
  <hr>
  <b>Available Rooms</b>
  <br />
<?php

$result = mysql_query("SELECT * FROM room");

while($row = mysql_fetch_array($result))
  {
  $a=$row['room_id'];
  $query = mysql_query("SELECT sum(qty_reserve) FROM roominventory where status='Active' and room_id='$a'");
while($rows = mysql_fetch_array($query))
  {
  $inogbuwin=$rows['sum(qty_reserve)'];
  }
  $angavil = $row['qty'] - $inogbuwin;
  if($angavil < 0) { $angavil = 0; };
  echo '<div style="height: 117px;">';
	  echo '<div style="float: left; width: 100px; margin-left: 19px;">';
	  echo "<img width=92 height=72 alt='Unable to View' src='" . $row["image"] . "'>";
	  echo '</div>';
	  echo '<div style="float: right; width: 575px; margin-top: -10px;">';
	  echo '<span class="style5">'.'Avalable Rooms: '.$angavil.'</span>';
	  if ($angavil > 0){
					echo '<input name="roomid" type="checkbox" value="' .$row["room_id"]. '" />';
					echo '<input type="submit" name="Submit" value="reserve" onclick="setDifference(this.form);"/>';
					}
				if ($angavil <= 0){
				echo '<span class="style5">'.' &nbsp&nbspSorry No More Rooms Available'.'</span>';
				}	
	  echo '<br>';		
	  echo '<span class="style5">'.'Room Type: '.$row['type'].'</span><br>';
	  echo '<span class="style5">'.'Room Rate: '.$row['rate'].'</span><br>';
      echo '<span class="style5">'.'Max Child: '.$row['max_child'].'</span><br>';
      echo '<input name="mchild" type="hidden" value="' .$row["max_child"]. '" />';
	  echo '<input name="avail" type="hidden" value="' .$angavil. '" />';
	  echo '<span class="style5">'.'Max Adult: '.$row['max_adult'].'</span><br>';
      echo '<input name="madult" type="hidden" value="' .$row["max_adult"]. '" />';
	  echo '<span class="style5">'.'Room Description: '.$row['description'].'</span><br>';
	  echo '</div>';
     echo '</div>';
} // end while

mysql_close($con);
?> 
<input type="hidden" name="result" id="result" />
</form>
  </div>
	</div>
  </div>
  
  
  
  
  
  
 <div class="rightother">
  
  
  <div class="reservation">
	<div align="center" style="padding-top: 7px; font-size:24px;"><strong>RESERVATION  DETAILS</strong></div>
			<div style="margin-top: 14px;">
			<label style="margin-left: 16px;">Check In Date : <?php echo $arival; ?></label><br />
			<label style="margin-left: 3px;">Check Out Date : <?php echo $departure; ?></label><br />
				<label style="margin-left: 71px;">Time  : <?php echo $time; ?></label><br />
			<label style="margin-left: 71px;">Adults : <?php echo $adults; ?></label><br />
			<label style="margin-left: 78px;">Child : <?php echo $child; ?></label><br />
			<input name="" type="button" value="Cancel Reservation" id="button"  style="margin-left:55px !important" onclick="window.location = '<?php echo $homeLocation;?>';" />
		  </div>
	</div>
  </div><!--reservation-->
</div><!--rightother-->
<div class="footer" style="text-align:center; font-family:Arial, Helvetica, sans-serif; font-size:12px;">copyright © tameraplazainn 2011 - 2012 All Rights reserved</div>
</body>
</html>
