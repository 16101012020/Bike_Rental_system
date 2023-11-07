<?php
session_start();
if(!isset($_SESSION['mobile']))
{
    $output="
    <div class='config'  style=' display:flex; align-items:center;flex-direction:column; justify-content:center; border:2px solid grey;
        padding: 2%;margin:auto;width:40%;line-height:10px'>
    <h1>You are not logged in!!!</h1>
    <div class='click' style='display:flex;align-items:center;gap:15px;'>
        <p>Click here to login</p>
        <a href='login.html'>Login</a>
    </div>
</div>";
   echo $output;
    exit;
}
else{
    $user_id=$_SESSION['userId'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/x-icon" href="https://graphicriver.img.customer.envatousercontent.com/files/320839090/preview.jpg?auto=compress%2Cformat&fit=crop&crop=top&w=590&h=590&s=ddbebeaf4d813e7877dc66f2f629f1ac">
    <link rel="stylesheet" href="css/payment_success.css">
    <title>Payment Successful</title>
</head>
<body>
    <div class="main">
        <div class="main_container">
        <?php include 'header.php' ?>
        <div class="success">
           
        </div>
        </div>
        <?php include 'footer.php' ?>
        </div>
</body>
<script>
    var userId = <?php echo json_encode($user_id); ?>;
    
  //Fetchs the Last transaction the the user
    let url="payment_json.php";
    let response=fetch(url);
    response.then((v)=>{
        return v.json();
    }).then((payments)=>{
       let n=payments.length;
       let ihtml="";
       ihtml+= `<h1>Paid Successfully</h1>
            <div class="success_container">
                <h2>Amount</h2>
                <div class="amount">
                <h2>Rs ${payments[n-1].amount}</h2><i class="fa-solid fa-circle-check" style="color: #8cb62f;background-color: white;border-radius: 100%;"></i>
                </div>
                <p>Payment Id :${payments[n-1].payment_id}</p>
                <p>${payments[n-1].date}, ${payments[n-1].time}</p>
                <p>Paid using ${payments[n-1].payment_mode}</p>
            </div>
            <div class="click">
            <a href="#" class="okay">Click on OK</a>
            </div>`;
        document.getElementsByClassName("success")[0].innerHTML=ihtml;
    });
    $(document).on("click",".profile",function(e){
      window.location.href="profile.php";
    });
    $(document).on("click",".wallet",function(e){
      window.location.href="wallet_history.php";
    });
    $(document).on("click",".okay",function(e){
      window.location.href="thank_you.php";
    });
    $(document).on("click",".rental",function(e){
      window.location.href="rental_history.php";
    });
    $(document).on("click",".ham",function(e){
        $(".dropdown-content").toggleClass("active");
 });
 $(document).on("click",".logOut",function(e){
        $.ajax({
            url:"logOut.php",
            type:"POST",
            data:{flag:1},
            success:function(data)
            {
                window.location.href="index.html";
            }
        })
    });
</script>
</html>