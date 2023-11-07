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
    <link rel="stylesheet" href="css/thank_you.css">
    <title>Thank You!</title>
</head>
<body>
    <div class="main">
        <div class="main_container">
        <?php include 'header.php' ?>
        <div class="thank">
            <p>Dear Customer,</p>
            <p ><strong id="book"> </strong></p><br>
            <p>Thank you for choosing our website and renting a bike! We appreciate your business and trust in our services.</p>
            <p>Your decision to rent a bike from our website means a lot to us, and we will do everything possible to ensure that your experience is a memorable one. </p>
            <p>Our team is dedicated to providing top-notch service to our customers. We have carefully selected and maintained our bike fleet to ensure their quality, performance, and safety. We have also implemented processes and procedures to make your rental experience seamless and convenient.</p>
            <p>If you have any questions or need further assistance, please feel free to contact us. </p>
            <br><p>Warm regards,</p>
            <strong><p>Parul Singh</p></strong>
        </div>
        </div>
        <?php include 'footer.php' ?>
    </div>
<script>
    const urlParams = new URLSearchParams(window.location.search);
    var userId = <?php echo json_encode($user_id); ?>;
    const bikeId = urlParams.get("bike_id");

    //Fetchs the booking id of the user to display in the message
    let url="booking_json.php";
    let response=fetch(url);
    let n;
    response.then((v)=>{
     return v.json();
    }).then((bookings)=>{
        n=bookings.length;
        document.getElementById("book").innerHTML=`Booking Id : ${bookings[n-1].booking_id},`;
    })
    $(document).on("click",".profile",function(e){
      window.location.href="profile.php";
    });
    $(document).on("click",".wallet",function(e){
      window.location.href="wallet_history.php";
    });
    $(document).on("click",".rental",function(e){
      window.location.href="rental_history.php";
    });
    $(document).on("click",".ham",function(e){
        $(".dropdown-content").toggleClass("active");
 });
 $(document).on("click",".bikePage",function(e){
      window.location.href="bike.php";
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
</body>
</html>