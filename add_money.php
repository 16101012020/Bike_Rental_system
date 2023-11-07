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
    <link rel="stylesheet" href="css/add_money.css">
    <link rel="icon" type="image/x-icon" href="https://graphicriver.img.customer.envatousercontent.com/files/320839090/preview.jpg?auto=compress%2Cformat&fit=crop&crop=top&w=590&h=590&s=ddbebeaf4d813e7877dc66f2f629f1ac">
    <title>Add Money</title>
</head>
<body>
    <div class="main">
        <div class="main_container">
          <?php include 'header.php' ?>
        <div class="add">
            <h1>Add Money To Wallet</h1>
            <div class="add_conatiner">
                <div class="enter">
              <input type="number" placeholder="Enter Amount" id="money">
                <p id="ent" onclick="show()">Enter</p>
                </div>
                <div class="amount">
                    <p onclick="add_100()">100</p>
                    <p onclick="add_200()">200</p>
                    <p onclick="add_500()">500</p>
                    <p onclick="add_1000()">1000</p>
                    <p onclick="add_2000()">2000</p>
                </div>
                <div class="pay" onclick="proceed()">
                    <a  id="pro" style="display: none;"><h2>Proceed To Pay</h2>
                    <p id="payment">Rs 250</p></a>
                </div>
                <div class="options">
                    <h2>Payment Methods</h2>
                    <div class="box2">
                        <input type="radio" name="payment_select">
                        <img src="img/bhim_logo_2.png"> 
                        <p id="mode">UPI</p>
                    </div>
                    <div class="box2" >
                        <input type="radio" name="payment_select">
                        <img src="img/image_-_2020-11-05T095740.083_1604550459365_1604550465218_1604550598928.jpg"> 
                        <p id="mode">Google Pay</p>
                    </div>
                    <div class="box2">
                        <input type="radio" name="payment_select">
                        <img src="img/Paytm_Logo.jpg"> 
                        <p id="mode">Paytm</p>
                    </div>
                    <div class="box2">
                        <input type="radio" name="payment_select">
                        <img src="img/phonepe-logo-icon-180x180.jpg"> 
                        <p id="mode">Phone pe</p>
                    </div>
                    <div class="box2">
                        <input type="radio" name="payment_select">
                        <img src="img/paypal-3384015_1280.webp"> 
                        <p id="mode">Pay Pal</p>
                    </div>
                    <div class="box2">
                        <input type="radio" name="payment_select">
                        <img src="img/internet-banking-line-icon-png_233993.jpg"> 
                        <p id="mode">Net Banking</p>
                    </div>
                    <div class="btn">
                    <a href="#" onclick="getSelectedOption()">Proceed</a>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <?php include 'footer.php' ?>
    </div>
    <script>
        const urlParams = new URLSearchParams(window.location.search);
        var userId = <?php echo json_encode($user_id); ?>;
        
        var money=document.getElementById("money");
        var pay=document.getElementById("pro");
        var payment=document.getElementById("payment");
        var option=document.getElementsByClassName("options")[0];

    // Proceed function displays Proceed button and total amount
    function proceed(){
         pay.style.display="none";
         document.getElementsByClassName("amount")[0].style.display="none";
         option.style.display="block"; 
         money.readOnly = true;  
         document.getElementById("ent").style.pointerEvents = "none";
    }  
    // Show function displays payment options :
    function show()
    {
        if(money.value=="")
        {
           money.style.borderColor="red";   
        }
        else
        {
            pay.style.display="flex";
            payment.innerHTML="Rs "+money.value;
            money.style.borderColor="grey";   
        }
    }
    //Click buttons to add money
    function add_100(){
        money.value=100;
        if(pay.style.display=="flex")
        {
            payment.innerHTML="Rs "+money.value;
        }
    }
    function add_200(){
        money.value=200;
        if(pay.style.display=="flex")
        {
            payment.innerHTML="Rs "+money.value;
        }
    }
    function add_500(){
        money.value=500;
        if(pay.style.display=="flex")
        {
            payment.innerHTML="Rs "+money.value;
        }
    }
    function add_1000(){
        money.value=1000;
        if(pay.style.display=="flex")
        {
            payment.innerHTML="Rs "+money.value;
        }
    }
    function add_2000(){
        money.value=2000;
        if(pay.style.display=="flex")
        {
            payment.innerHTML="Rs "+money.value;
        }
    }

     

    //function to add the money in wallet :
    function getSelectedOption() {
    var radioButtons = document.getElementsByName("payment_select");
    
    //InnerText gets the payment option that user has selected :
    for (var i = 0; i < radioButtons.length; i++) {
        if (radioButtons[i].checked) {
        var parentDiv = radioButtons[i].closest(".box2");
        var pElement = parentDiv.querySelector("p#mode");
        var innerText = pElement.innerText;
        break;
        }
    }
    //flag=1 means the money is adding to the wallet using add_wallet.php :
    //flag=0 means the user is paying for renting a bike using add_wallet.php :
    var flag=1;
        $.ajax({
           url:"add_wallet.php",
           type:"POST",
           data:{money:money.value,mode:innerText,id:userId,type:flag},
           success:function(data)
           {
            if(data==1)
            {
               $.ajax({
                  url:"update_wallet.php",
                  type:"POST",
                  success:function(pdata)
                  {
                   if(pdata==1)
                   {
                   window.location.href="payment_success.php";
                   }
                  }
                });
            }
            } 
        });
    }
    $(document).on("click",".profile",function(e){
      window.location.href="profile.php";
    });
    $(document).on("click",".bikePage",function(e){
      window.location.href="bike.php";
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