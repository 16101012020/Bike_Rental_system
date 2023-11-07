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

<!-- Fetch Wallet Data and Pagination -->
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
        $sql1="SELECT * FROM wallet_transaction where user_id=$user_id ORDER BY transaction_id DESC";
        $sql="SELECT * FROM wallet_transaction where user_id=$user_id ORDER BY transaction_id DESC 
        LIMIT {$offset},{$limit}";
        $result=mysqli_query($conn,$sql);
        $result1=mysqli_query($conn,$sql1);
        $output="";
        if(mysqli_num_rows($result)>0)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                if ($row['transaction_type'] === "Credited") {
                    $amountClass = "credited-amount";
                    $amountSign = "+ ";
                } elseif ($row['transaction_type'] === "Debited") {
                    $amountClass = "debit-amount";
                    $amountSign = "- ";
                }

                $output.= "<div class='box1'>
                <div class='info'>
                <h2 id='information'>{$row['transaction_type']}</h2>
                <p>{$row['date']}, {$row['time']}</p>
                <p>Transaction id : {$row['transaction_id']}</p>
                <p>Current Balance : Rs {$row['current_balance']}</p>
                 </div>
                 <h2 class='{$amountClass}' id='amount'>{$amountSign}{$row['amount']}</h2>
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
    <link rel="stylesheet" href="css/wallet_history.css">
    <link rel="icon" type="image/x-icon" href="https://graphicriver.img.customer.envatousercontent.com/files/320839090/preview.jpg?auto=compress%2Cformat&fit=crop&crop=top&w=590&h=590&s=ddbebeaf4d813e7877dc66f2f629f1ac">
    <title>Wallet History</title>
</head>
<body>
    <div class="main">
        <div class="main_container">
           <?php include 'header.php' ?>
        <div id="wallet">
            <div class="wallet_container">
            <h1>Wallet</h1>
            <div class="balance">
                <h2>My Balance :</h2>
                <h2 class="balance_amount"></h2>
            </div>
            <a href="#" class="add_money"><h2>Add Money</h2></a>
            </div>
            <div id="history">
                <?php echo $output ?>
            </div> 
        </div>
        <div id="pagination">
        <?php echo $paginationLinks?>
        </div>
    </div>
     <?php include 'footer.php' ?>
    </div>
<script>
var userId = <?php echo json_encode($user_id); ?>;

//Fetchs the current balance of user :
 let url="user_json.php";
 let response=fetch(url);
 response.then((v)=>{
    return v.json();
 }).then((users)=>{
    ihtml="";
    for(item in users){
        if(users[item].user_id==userId)
        {
            ihtml+=`Rs ${users[item].wallet_balance}`;
        }
    }
    document.getElementsByClassName("balance_amount")[0].innerHTML=ihtml;
 });

 //Click buttons
 $(document).on("click",".profile",function(e){
      window.location.href="profile.php";
    });
 $(document).on("click",".add_money",function(e){
      window.location.href="add_money.php";
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