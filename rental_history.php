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

<!-- Fetch Booking Data and Pagination -->
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "two_wheel";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if ($conn) {
        $user_id=$_SESSION['userId'];
        $limit=5;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page - 1) * $limit;
        $sql1="SELECT * FROM booking where user_id=$user_id ORDER BY booking_id DESC";
        $sql="SELECT * FROM booking where user_id=$user_id ORDER BY booking_id DESC 
        LIMIT {$offset},{$limit}";
        $sqlBikeName="SELECT * FROM bike_table";
        $result=mysqli_query($conn,$sql);
        $result1=mysqli_query($conn,$sql1);
        $resultBikeName=mysqli_query($conn,$sqlBikeName);

        $output="";
        $total_bookings=mysqli_num_rows($result1);
        if(mysqli_num_rows($result)>0)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                while($num=mysqli_fetch_assoc($resultBikeName))
                {
                    if($row['bike_id']==$num['bike_id'])
                    {
                        $bikeName=$num['bike_name'];
                        break;
                    }
                }
                $output.= "<div class='box1'>
                <h2>{$bikeName}</h2>
                <div class='booking_content'>
                    <div class='box5'>
                        <div class='box2'>             
                            <h3>Booking id :</h3>&ensp;
                            <p>{$row['booking_id']}</p>
                        </div>
                        <div class='box2'>             
                            <h3>Pick Up Date :</h3>&ensp;
                            <p>{$row['pickup_date']}</p>
                        </div>
                        <div class='box2'>             
                            <h3>Return Date :</h3>&ensp;
                            <p>{$row['return_date']}</p>
                        </div>
                    </div>
                    <div class='box4'>
                        <div class='box2'>             
                            <h3>Payment :</h3>&ensp;
                            <p>Rs {$row['total_amount']}</p>
                        </div>
                        <div class='box2'>             
                            <h3>Total Days : </h3>&ensp;
                            <p> {$row['total_days']}</p>
                        </div>
                    </div>
                </div>
                </div>";
            }
        }
        $paginationLinks = "";
        $total_records = mysqli_num_rows($result1);
        if($total_records>$limit)
        {
        $total_page = ceil($total_records / $limit);
        for ($i = 1; $i <= $total_page; $i++) {
            $active = ($page == $i) ? "active" : "";
            $paginationLinks .= "<a class='{$active}' href='?page={$i}'>{$i}</a>";
        }
    }
    }
    else{
        echo "Connection Failed";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/rental_history.css">
    <link rel="icon" type="image/x-icon" href="https://graphicriver.img.customer.envatousercontent.com/files/320839090/preview.jpg?auto=compress%2Cformat&fit=crop&crop=top&w=590&h=590&s=ddbebeaf4d813e7877dc66f2f629f1ac">
    <title>My Bookings</title>
</head>
<body>
    <div class="main">
        <div class="main_container">
        <?php include 'header.php' ?>
        <div class="booking">
            <div class="first">
                <h1>My Bookings</h1>
                <div class="box2">
                <h3>Total Bookings :</h3>
                <h3><?php echo $total_bookings ?></h3>
            </div>
            </div>
            <div class="booking_container">
               <?php echo $output ?>
            </div>
        </div>
        <div id="pagination">
        <?php echo $paginationLinks ?>
       </div>
    </div>
            <?php include 'footer.php' ?>
        </div>
        <script>

$(document).on("click",".profile",function(e){
    window.location.href="profile.php";
});
$(document).on("click",".wallet",function(e){
    window.location.href="wallet_history.php";
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

