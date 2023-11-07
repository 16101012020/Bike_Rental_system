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
    $user_id = $_SESSION['userId'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">  
    <link rel="stylesheet" href="css/bike.css">
    <link rel="icon" type="image/x-icon" href="https://graphicriver.img.customer.envatousercontent.com/files/320839090/preview.jpg?auto=compress%2Cformat&fit=crop&crop=top&w=590&h=590&s=ddbebeaf4d813e7877dc66f2f629f1ac">
    <title>Select Bike</title>
</head>
<body>

    <div class="main">
        <div class="main_container">
           
            <?php include 'header.php' ?>

            <div class="bike">
                <div class="customerName">
                <img src="img/male-portrait-people-profile-perfect-social-media-business-presentations-user-interface-ux-graphic-web-design-applications-interfaces-vector-illustration_501069-2.jpg">
                <h2 id="customer_name"></h2>
                </div>
                <div class="heading">
                <h1>Select Your Bike</h1>
                </div>
                <div class="bike_container">
                    
                </div>
            </div>
        </div>
    <?php include 'footer.php' ?>
    </div>
    
<script>
  var userId = <?php echo json_encode($user_id); ?>;

    //Fetchs the name of the user :
    let userurl="user_json.php";
    let response2=fetch(userurl);
    response2.then((v)=>{
            return v.json();
        }).then((users)=>{
            let namehtml="";
            for(item in users){
            if(users[item].user_id==userId)
            {
                namehtml+=`Welcome to dashboard ${users[item].user_name} !`;
                break;
            }
        }
        document.getElementById("customer_name").innerHTML=namehtml;
    });

    //Fetchs the bike details :
    let url="bike_json.php";
    let response=fetch(url);
      response.then((v)=>{
          return v.json();  
      }).then((bikes)=>{
          ihtml="";
              for(item in bikes)
              {
                   var stat="Unavailable";
                   if(bikes[item].status==1)
                   {
                      stat="Available";
                   }
            ihtml+=`<div class="box1">
                            <div class="block">     
                                <p>${stat}</p>                 
                            </div>
                            <img src="${bikes[item].bike_img}">
                            <div class="cc">
                            <div class="name">
                                <p>Name :</p><h4>${bikes[item].bike_name}</h4>
                            </div>
                            <div class="name">
                                <p>CC Engine :</p><h4>${bikes[item].cc_engine}</h4>
                                </div>
                            </div>
                            <div class="name">
                                <p>Price / Day :</p><h4>Rs ${bikes[item].price_day}</h4>
                            </div>
                            <div class="name">
                            <p>Rating :</p>
                            <div class="stars">
                            <i class="fa-solid fa-star" style="color: #FDCC0D"></i>
                            <i class="fa-solid fa-star" style="color: #FDCC0D"></i>
                            <i class="fa-solid fa-star" style="color: #FDCC0D"></i>
                            <i class="fa-solid fa-star" style="color: #FDCC0D"></i>
                            <i class="fa-solid fa-star" style="color: #FDCC0D"></i>
                            </div>
                            </div>
                            <div class="links">
                            <a href="#" class="rent-now-btn" data-bikeid="${bikes[item].bike_id}">Rent Now</a>
                            <a href="#" class="know-more-btn" data-bikeid="${bikes[item].bike_id}">Know More</a>
                            </div>
                          </div>`;
                }
                document.getElementsByClassName("bike_container")[0].innerHTML = ihtml;
                const bikeContainer = document.querySelector(".bike_container");
    
                bikeContainer.addEventListener("click", function (event) {
                if (event.target.classList.contains("know-more-btn")) {
                    event.preventDefault();
                    const bikeId = event.target.dataset.bikeid;
                    window.location.href = "know_more.php?bike_id=" + bikeId;
                }
                else  if (event.target.classList.contains("rent-now-btn")){
                    event.preventDefault();
                    const bikeId = event.target.dataset.bikeid;
                    window.location.href="select_date.php?bike_id=" + bikeId;;
                }
        });
    });
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
    //session expired by clicking on logout :
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
