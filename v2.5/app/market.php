
 <?php include'../../api/token.php';
$t=$_GET['t'];
if($t==''){ $t=$_COOKIE['dormtoken'];}
$userid=validatetoken($t);

if($userid=='null'){
 header('Location: https://dorm.com.ng/v2.5/app');
}
?>
     <?php include'../connect.php';

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
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="theme-color" content="#1597E2">
   
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <title>Dorm - full or grid</title>
        
    <link rel="stylesheet" href="css/markettype.css">

 
     <!--=============== CSS ===============-->
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script>
        function listen(can) {
    var userid= can.id;
     var activity =document.getElementById('acti').value;
    var xhttps= new XMLHttpRequest();
xhttps.onreadystatechange= function(){
	if(xhttps.readyState == 4 && xhttps.status == 200){
 

}
};

xhttps.open("GET", "listen.php?u="+userid+"&a="+activity, true);
xhttps.send();
     }
    </script>


</head>
<body>
 
<div class="container">
    <div class="grid box">
        <div class="box-content">
        <div class="box-content-text">
            <h2>Grid View</h2>
            <p>Conventional online shoping user interface used by jumia and ali express.</p>
            <a href="marketgrid.php?t=<?php echo$t; ?>"><button class="select">Select</button></a>
        
        </div>   
        </div>
    </div>
    <div class="full-view box">
        <div class="box-content">
            <div class="box-content-text">
                <h2>Full screen View</h2>
                <p>A titok like user interface to give an immersive shoping experence.</p>
            <a href="#"><button class="select full-screen-market" id="<?php echo $userid; ?>" onclick="listen(this)">Coming soon</button></a>
            <input type="text" id="acti" value="market full screen button" style="display:none;" />
            </div>   
            </div>
    </div>

</div>
    
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
          direction: "vertical",
          pagination: {
            el: ".swiper-pagination",
            clickable: true,
          },
        });



      </script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <script src="https://unpkg.com/tippy.js@6"></script>
     
</body>
</html>