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
    <link rel="stylesheet" href="css/know_more.css">
    <link rel="icon" type="image/x-icon" href="https://graphicriver.img.customer.envatousercontent.com/files/320839090/preview.jpg?auto=compress%2Cformat&fit=crop&crop=top&w=590&h=590&s=ddbebeaf4d813e7877dc66f2f629f1ac">
    <title>Know More</title>
</head>
<body>
    <div class="main">
        <div class="main_container">
        <?php include 'header.php' ?>
        <div class="know"></div>
    </div>
    <?php include 'footer.php' ?>
    </div>
    <script>
      const urlParams = new URLSearchParams(window.location.search);
        const bikeId = urlParams.get("bike_id");
        var userId = <?php echo json_encode($user_id); ?>;
    
        //Fetch the details of the bike using bikeId :
        let url="bike_json.php";
        let response=fetch(url);
        response.then((v)=>{
            return v.json();
        }).then((bikes)=>{
            ihtml="";
               for(item in bikes)
               {
                  if(item==bikeId-1)
                  {
                     ihtml+=`            
            <h1>${bikes[item].bike_name}</h1>
            <div class="know_container">
                <img src="${bikes[item].bike_img}">
                <div class="list">
                    <div class="list_items">
                        <h3>Model</h3>
                        <h4>${bikes[item].model}</h4>
                    </div>
                    <div class="list_items">
                        <h3 id="brand">Price / Day</h3>
                        <h4>Rs ${bikes[item].price_day}</h4>
                    </div>
                    <div class="list_items">
                        <h3>Rating</h3>
                        <div class="stars">
                            <i class="fa-solid fa-star" style="color: #FDCC0D"></i>
                            <i class="fa-solid fa-star" style="color: #FDCC0D"></i>
                            <i class="fa-solid fa-star" style="color: #FDCC0D"></i>
                            <i class="fa-solid fa-star" style="color: #FDCC0D"></i>
                            <i class="fa-solid fa-star" style="color: #FDCC0D"></i>
                        </div>
                    </div>
                    <div class="list_items">
                        <h3 id="feat">Features</h3>
                        <h4>This model is powered by a 346cc single-cylinder, air-cooled engine and features a retro design inspired by the motorcycles of the 1950s. It is known for its classic styling, thumping exhaust note, and comfortable riding experience.</h4>
                    </div>
                    <div class="links">
                    <a href="#" class="rent-btn">Rent Now</a>
                    <a href="#" class="go-back-btn">Go back</a>
                    </div>
                </div> 
            </div> `
                  } 
               }
               document.getElementsByClassName("know")[0].innerHTML=ihtml;
        });
       
        $(document).on("click",".go-back-btn",function(e){
           window.location.href="bike.php";
        });
        $(document).on("click",".bikePage",function(e){
      window.location.href="bike.php";
    });
        $(document).on("click",".rent-btn",function(e){
            window.location.href="select_date.php?bike_id=" + bikeId;
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