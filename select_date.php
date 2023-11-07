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
else
{
    $user_id=$_SESSION['userId'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/select_date.css">
    <link rel="icon" type="image/x-icon" href="https://graphicriver.img.customer.envatousercontent.com/files/320839090/preview.jpg?auto=compress%2Cformat&fit=crop&crop=top&w=590&h=590&s=ddbebeaf4d813e7877dc66f2f629f1ac">
    <title>Select Date</title>

</head>
<body>
    <div class="main">
        <div class="main_container">
            <?php include 'header.php'?>
        <div class="select">
            <h1 class="heading">Select date</h1>
            <div class="img_wrap">
                <img src="" class="myImage">
                <div class="container">

                <!-- Date Form -->
            <div class="date_container">
                <div class="select_container">
                    <input type="text" class="pick" placeholder="Enter Pick Up Date" onfocus="(this.type='date')">
                    <input type="text" class="return" placeholder="Enter Return Date" onfocus="(this.type='date')">
                </div>
                <div class="amount">
                    
                    <div class="pay" onclick="proceed()">
                        <h2>Proceed To Pay</h2>
                    </div>
                </div>
            </div>
                <div class="options">
                    <div class="options_container">
                    <div class="box2">
                        <input type="radio" name="payment_select">
                        <img src="img/bhim_logo_2.png"> 
                        <p id="mode">UPI</p>
                    </div>
                    <div class="box2">
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
                    <div class="box2">
                        <input type="radio" name="payment_select">
                        <img src="img/e-wallet-logo-design-vector-template_567288-269.jpg"> 
                        <p id="mode">Wallet</p>
                    </div>
                    </div>
                    <div class="btn">
                    <a href="#" class="pay_mode">Proceed</a>
                    </div>
                </div>
</div>
            </div>
        </div>
    </div>
         <?php include 'footer.php'?>
    </div>
    <script>

    // Fetch bike images
let url1="bike_json.php";
let response1=fetch(url1);
response1.then((v)=>{
   return v.json();
}).then((bikes)=>{
    let ihtml="";
   for(item in bikes)
   {
      if(bikes[item].bike_id==bikeId)
      {
         ihtml=bikes[item].bike_img;
         break;
      }
   }
const imgElements = document.getElementsByClassName('myImage')[0];
imgElements.src = `${ihtml}`;
});
        var date_container= document.getElementsByClassName("date_container")[0];
        var option = document.getElementsByClassName("options")[0];
        var pay = document.getElementsByClassName("pay")[0];
        var pick = document.getElementsByClassName("pick")[0];
        var returnDate = document.getElementsByClassName("return")[0];
        var heading=document.getElementsByClassName("heading")[0];
        var total;
        var pdate;
        var rdate;
        var totalDays;
        var sign;

        const urlParams = new URLSearchParams(window.location.search);
        var userId = <?php echo json_encode($user_id); ?>;
        const bikeId = urlParams.get("bike_id");
        function proceed() {
            var today = new Date().toISOString().split('T')[0];
            console.log(today);
            var pickDate = pick.value;
            var selectedReturnDate = returnDate.value;
    
            var pickDateObj = new Date(pickDate);
            var returnDateObj = new Date(selectedReturnDate);
           console.log(pickDateObj);
           console.log(returnDateObj)
           // isValid(date)    
            if (pickDate && selectedReturnDate && pickDate >= today && selectedReturnDate >= today && pickDateObj < returnDateObj) {
                heading.innerHTML="Payment Options";
                //Getting time difference in milliseconds
                var timeDiff = returnDateObj.getTime() - pickDateObj.getTime();
                console.log(timeDiff);             
                pick.readOnly=true;
                returnDate.readOnly=true;
                // Convert the time difference to days
                var daysDiff = parseInt(timeDiff / (1000 * 60 * 60 * 24));
                
                //Fetch the bike price/day to calculate the total amount
                let url="bike_json.php";
                let response=fetch(url);
                response.then((v)=>{
                    return v.json();
                }).then((bikes)=>{
                    let ihtml="";
                   for(item in bikes)
                   {
                      if(bikes[item].bike_id==bikeId)
                      {
                        total=(bikes[item].price_day)*daysDiff;
                          ihtml+=`<div class="amount_container">
                                <h2>Proceed to pay</h2>
                                <h3>Rs ${total}</h3>
                                </div>`
                      }
                      document.getElementsByClassName("amount")[0].innerHTML=ihtml;
                   }
                });
            } else {
                alert("Please select valid date");
                pick.value="";
                returnDate.value!="";
            }
           

            pdate=pickDate;
            rdate=selectedReturnDate;
            totalDays=daysDiff;
        }
        //Displays the Payment options and date section disappears
        $(document).on("click",".amount_container",function(e){
            option.style.display = "block";
            if(pick.value!="" && returnDate.value!="")
            {
               date_container.style.display="none";         
            }
        });
        //Click on proceed after choosing the payment options
        $(document).on("click",".pay_mode",function(e){
    var radioButtons = document.getElementsByName("payment_select"); 
        for (var i = 0; i < radioButtons.length; i++) {
            if (radioButtons[i].checked) {
            var parentDiv = radioButtons[i].closest(".box2");
            var pElement = parentDiv.querySelector("p#mode");
            var innerText = pElement.innerText;
            break;
            }
        }
        //If the payment option is WALLET, then it fetchs the user's wallet balance
        if(innerText=="Wallet")
        {
            let url="user_json.php";
            let response=fetch(url);
            response.then((v)=>{
                return v.json();
            }).then((users)=>{
               for(item in users)
               {
                if(userId==users[item].user_id)
                {
                    //If user's balance is less than total amount
                    if(users[item].wallet_balance<total)
                    {
                        sign=0;
                        alert("Insufficient balance in wallet");
                        if(confirm("Do u want to add money?"))
                        {
                            var link="wallet_history.php";
                            window.open(link, "_blank");
                        }
                    }
                    //If user's balance is more than or equal to total amount
                    else
                    {
                        sign=1;
                        var flag=0;
                        $.ajax({
                        url:"add_wallet.php",
                        type:"POST",
                        data:{money:total,mode:innerText,id:userId,type:flag},
                        success:function(data)
                        {
                            //Debit amount from the wallet and update the balance
                            $.ajax({
                                url:"update_wallet.php",
                                type:"POST",
                                success:function(data)
                            {
                                //Update the payment table
                                $.ajax({
                                url:"update_payment.php",
                                type:"POST",
                                data:{u_id:userId, b_id:bikeId, money:total,mode:innerText},
                                success:function(data)
                                {
                                    //Update the booking table
                                    $.ajax({
                                    url:"update_booking.php",
                                    type:"POST",
                                    data:{u_id:userId, b_id:bikeId,pick_date:pdate,return_date:rdate,days:totalDays,amount:total},
                                    success:function(data)
                                    {
                                        window.location.href="payment_success(1).php";  
                                    }
                                });
                                }
                            });
                            }
                                });
                            } 
                        });
                    }
                }
               }
            });
        }
    // if the choosen payment option is not WALLET
    if(innerText!="Wallet"){
        $.ajax({
            //Update the payment table
             url:"update_payment.php",
             type:"POST",
             data:{u_id:userId, b_id:bikeId, money:total,mode:innerText},
             success:function(data)
             {
                //Update the booking table
                $.ajax({
                url:"update_booking.php",
                type:"POST",
                data:{u_id:userId, b_id:bikeId,pick_date:pdate,return_date:rdate,days:totalDays,amount:total},
                success:function(data)
                {
                    
                }
            });
                window.location.href="payment_success(1).php";
             }
        });
    }
        });
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