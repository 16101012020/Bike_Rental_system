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
    <link rel="stylesheet" href="css/profile.css">
    <link rel="icon" type="image/x-icon" href="https://graphicriver.img.customer.envatousercontent.com/files/320839090/preview.jpg?auto=compress%2Cformat&fit=crop&crop=top&w=590&h=590&s=ddbebeaf4d813e7877dc66f2f629f1ac">
    <title>My Profile</title>
</head>
<body>
    <div class="main">
        <div class="main_container">
         <?php include 'header.php' ?>
        <div class="profile">
        <img src="img/male-portrait-people-profile-perfect-social-media-business-presentations-user-interface-ux-graphic-web-design-applications-interfaces-vector-illustration_501069-2.jpg">
        <div class="details">
        <div class="details_container">
        </div>
        </div>
        </div>
        </div>
    <?php include 'footer.php' ?>     
</div>
</div>
<script>
    const urlParams = new URLSearchParams(window.location.search);
    const bikeId = urlParams.get("bike_id");
    var userId = <?php echo json_encode($user_id); ?>;

// To show the edit box for updating the name or email Id :
    function showedit(s){
    var name_id=document.getElementById("name");
    var email_id=document.getElementById("email");

    var name_show=document.getElementById("name_show");
    var email_show=document.getElementById("email_show");

    if(s==name){
        var change=document.getElementsByClassName("name_change")[0];
        var edit=document.getElementsByClassName("name_edit")[0];
    if(name_show.style.display=="none")
    {
        name_id.style.display="none";
        name_show.style.display="flex";
    }
    else
    {       
            if(edit.value=="")
            {
                edit.style.border="2px solid red";
            } 
            else{
            $.ajax({
                url:"update_name.php",
                type:"POST",
                data:{name:edit.value,id:userId},
                success:function(data)
                {
                    if(data==1)
                    {
                    change.innerHTML=edit.value;
                    name_id.style.display="flex";
                    name_show.style.display="none";
                    }
                }
            });
            }
        }
    }
    else{
        var change=document.getElementsByClassName("email_change")[0];
        var edit=document.getElementsByClassName("email_edit")[0];
    if(email_show.style.display=="none")
    {
        email_id.style.display="none";
        email_show.style.display="flex";
    }
    else
    {
            if(edit.value=="")
            {
                edit.style.border="2px solid red";
            } 
            else{
                $.ajax({
                url:"update_email.php",
                type:"POST",
                data:{email:edit.value,id:userId},
                success:function(data)
                {
                    if(data==1)
                    {
                    change.innerHTML=edit.value;
                    email_id.style.display="flex";
                    email_show.style.display="none";
                    }
                }
            });
            }
        }
    }
}
//Fetchs the details of the user to display the updated name :

let url="user_json.php";
let response=fetch(url);
response.then((v)=>{
    return v.json();
}).then((users)=>{
    ihtml="";
    for(item in users)
    {
        if(userId==users[item].user_id)
        {
             ihtml+=`   
     <h1>Profile</h1>
    <div class="box1" id="name">
        <h4>Name</h4>
        <h3 class="name_change">${users[item].user_name}</h3>
        <p onclick="showedit(name)">Edit</p>
    </div>
    <div class="box2" style="display: none;" id="name_show">
    <h4>Edit Name</h4>
        <input placeholder="Enter your Name" type="text" class="name_edit">
        <p onclick="showedit(name)">Save</p>
    </div>
    <div class="box1" id="email">
        <h4>Email</h4>
        <h3 class="email_change">${users[item].user_email}</h3>
        <p onclick="showedit(email)">Edit</p>
    </div>
    <div class="box2" style="display: none;" id="email_show">
        <h4>Edit Email</h4>
            <input placeholder="Enter your Email" type="text" class="email_edit">
            <p onclick="showedit(email)">Save</p>
    </div>
    <div class="box1">
        <h4>Mobile No.</h4>
        <h3 class="change">${users[item].mobile_num}</h3>
    </div>
    <div class="box1">
        <h4>Identity No.</h4>
        <h3 class="change">${users[item].id_num}</h3>
    </div>`;
        }
    }
    document.getElementsByClassName("details_container")[0].innerHTML=ihtml;
});

$(document).on("click",".wallet",function(e){
      window.location.href="wallet_history.php";
    });
    $(document).on("click",".bikePage",function(e){
      window.location.href="bike.php";
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