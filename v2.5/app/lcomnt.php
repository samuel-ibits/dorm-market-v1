<?php include '../connect.php';
$time=date("h:i:s A");
$date=date("l jS \of F Y");

$u=$_REQUEST['u'];
//  $userid=$_REQUEST['a'];
 
echo'
<head>
    <meta name="theme-color" content="#1597E2">
    <link rel="shortcut icon" href="images/dorm_icon.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Review</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="css/mynote.css">
    <link rel="stylesheet" href="css/studytools.css">
    <link rel="stylesheet" href="css/menucss.css">
    <link rel="stylesheet" href="css/coursereview.css">

     </head>';

$rselr="SELECT * FROM c".$u;
$result= $conn5->query($rselr);
  If ($result->num_rows>0){
    
While ($row=$result->fetch_assoc()){
  $lcomment=$row["comment"];
  $luname=$row["username"];
  $lsound=$row["sound"];
 if($row["sound"]=="media/" or $row["sound"]==""){$aud="none";}else{$aud="block";}
  $ltime=$row["time"];
  if($row["pic"]=="" or $row["pic"]=="pro.png"){$pic="https://dorm.com.ng/media/ppic/pro.png";}else{
    $pic="https://dorm.com.ng/".$row["pic"];}

  echo'
                        <div class="comment-card">
                            <div class="flexed">
                               <div class="comment-card-img">
                                   <img src="'.$pic.'" alt="">
                               </div>
                               <p>
                                   '.$lcomment.'
                               </p>
                            </div>
   
                           </div>
   
                                </div>                         
                   
                   
                
  ';
}}else{echo 'no comments';}
  
  echo '      
                    <div class="create-comment">
<input type="text" placeholder="My comment...">  <button>Send</button>
                    </div>
  </div>
            <form action="" method="post" enctype="multipart/form-data" >                                       
                 </form>'
              ;
  
  
?>