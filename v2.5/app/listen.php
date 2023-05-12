<?php include'../connect.php';


 $id=$_REQUEST['u'];

 $acti=$_REQUEST['a'];
 
 $date=date("Y/m/d");
$time=date("h:i:sa");


$in = "INSERT INTO click VALUES ('$id', '$date', '$time', '$acti')";

if ($conn17->query($in) === TRUE) {

 $ale1 = "You will be contacted when its ready";
echo " <script type='text/javascript'>alert('$ale1'); </script>";
}
?>