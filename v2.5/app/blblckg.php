<?php include '../connect.php';
$time=date("h:i:s A");
$date=date("l jS \of F Y");



$u=$_REQUEST['u'];
 $userid=$_REQUEST['a'];
$username=$_REQUEST['b'];

$rselr="SELECT * FROM ".$u." WHERE id='".$userid."'";
$result= $conn5->query($rselr);
  If ($result->num_rows>0){
While ($row=$result->fetch_assoc()){
  $lcolor=$row["color"];
  $lll="red";
 
 if($lcolor=="steelblue" OR $lcolor=="liked"  OR $lcolor=="" OR $lcolor=="red" OR $lcolor=="nlike"){$lll="black";
  	$updc="DELETE FROM ".$u."  WHERE id='".$userid."'";
if ($conn5->query($updc)===true) {}

  }
 
 
$upd="UPDATE ".$u." SET color='nlike' where id='".$userid."'";
    mysqli_query($conn5,$upd);
        if ($conn5->query($upd) === TRUE) {
            
           
        }else {}
  
  
  }}else{$iin = "INSERT INTO ".$u." (id, color, tagname, date, time, username, userid, comment, title) VALUES ( '$userid','nlike', 'tagname','$date','$time','$username','$userid','nocomment','notitle')";




		
if ($conn5->query($iin)===false) {
}
      
  }
  
		$r="red";$s="nlike";
$suql = "SELECT * FROM ".$u." WHERE color like '%{$r}%' OR color like '%{$s}%'";
 $connStatus = $conn5->query($suql); 
 $numberOfRows= mysqli_num_rows($connStatus); 
  $numberOfRow='<span style="color:'.$lll.';" >   '.$numberOfRows.' </span>';
echo $numberOfRow;
  
  
  
?>
