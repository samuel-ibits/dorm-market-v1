<?php include '../connect.php';
$time=date("h:i:s A");
$date=date("l jS \of F Y");

 $userid=$_REQUEST['u'];
  $pctid=$_REQUEST['p'];


$rselr="SELECT * FROM profile WHERE Id='".$userid."'";
$result= $conn6->query($rselr);
  If ($result->num_rows>0){
While ($row=$result->fetch_assoc()){
    $name=$row["name"];
  $pic=$row["ppic"];
  $userschool=$row["school"];
  $usercourse=$row["course"];
  $username=$row["username"];
  $ppic=$row["ppic"];
  if($ppic=="media/"){$ppic="media/ppic/pro.png";
  }else{ $ppic=$row["ppic"];}
 
}}
?>
<?php

$selr="SELECT * FROM product where productid='".$pctid."'";
$result= $conn14->query($selr);
  If ($result->num_rows>0){
While ($row=$result->fetch_assoc()){
$agentid=$row["userid"];  
}}

?>

<?php 
$selr="SELECT * FROM agent where id='".$agentid."'";
$result= $conn14->query($selr);
  If ($result->num_rows>0){
While ($row=$result->fetch_assoc()){
$agentid=$row["id"]; 
$agentname=$row["fullname"]; 
$agentimage=$row["ppic"]; 
}}

$meetid="mtz".rand();

$in = "INSERT INTO inspect VALUES ('$meetid', '$pctid', '$agentid', '$agentname', '$agentimage', '$userid', '$name', '$ppic', '$date', '$time', 'pending', 'processing')";

if ($conn14->query($in) === TRUE) {
  
    
$ale1 = "Agent has been contacted check back later for the time and place'";
echo " <script type='text/javascript'>alert('$ale1'); </script>";

}else{
    
    
    
$selr="SELECT * FROM inspect where buyerid='".$userid."' and productid='".$pctid." ";
$result= $conn14->query($selr);
  If ($result->num_rows>0){
While ($row=$result->fetch_assoc()){
$astatus=$row["status"]; 

if($astatus=='processing'){
   $ale1 = "Agent appointment is awaiting approval. Check back later'";
echo " <script type='text/javascript'>alert('$ale1'); </script>";

}else{
    echo'<script>
    
     document.getElementById("inspect").style.display = "block";
    document.getElementById("accomodia-card-holder").style.display = "none";</script>
     <div class="meeting-card">
                        <span class="remove-card">
                            <ion-icon name="close"></ion-icon>
                        </span>
                    <div class="meeting-card-profile-pic">
                        <img src="'.$row["agentimage"].'" alt="">
                    </div>

                    <div class="meeting-card-info">
                        <p class="meeting-card-user-name">'.$row["agentname"].'</p>
                        <p class="meeting-sub">DORM meeting card</p>
                    </div>

                    <div class="meeting-qr">
                        <div class="print-meeting-card" onclick="window.print()">
                            <ion-icon name="print"></ion-icon>
                        </div>
                    </div>

                    <div class="meeeting-id">
                        <div>ID: <span class="id">'.$row["meetingid"].'</span></div>
                    </div>

                    <div class="date-and-time">
                        <p class="meeting-date">
                           Date: <span>'.$row["date"].'</span> 
                        </p>
                        <p class="meeting-time">
                           time: <span>'.$row["time"].'</span>
                        </p>
                        <p class="meeting-location">
                            location: <span>'.$row["location"].'</span>
                        </p>
                    </div>

                    <div class="meeting-card-warning">
                        <p>Your ID code is private. Do not share it with anyone, they can impersonate you. always keep it between you and the agent youre meeting for safety. Without booking a meeting, avoid meeting with agents from Dorm, dorm willl not be accountable for the act of victimization against you.</p>
                    </div>

                </div>

            </div>
            <div class="meeting-card-holder-dark-bg" >

            </div>';
}
}}


 
}

?>