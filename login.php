<?php
session_start();

if(isset($_POST["login"])){

if(!empty($_POST['useremail']) && !empty($_POST['pass'])) {
    
	$useremail=$_POST['useremail'];
	$pass=$_POST['pass'];
    $db = mysqli_connect("localhost","root","","store");
    
	$query=mysqli_query($db,"SELECT * FROM customer WHERE email= '".$useremail."' AND pass='".$pass."'");
    
   	$numrows=mysqli_num_rows($query);
    
	if($numrows !=0)
	{
        while($row=mysqli_fetch_assoc($query))
        {
            $dbuseremail=$row['email'];
            $dbpass=$row['pass'];
            $dbusername=$row['name'];    
	    }

        
        if($useremail == $dbuseremail && $pass == $dbpass)
        {

            $_SESSION['s_name']= $dbusername;

            /* Redirect browser */
            header("Location: indexlogin.php");
        }
	} 
    else 
    {
	   $message = "Invalid credentials !";
        echo "<script type='text/javascript'>alert('$message');</script>";
	}

} 
    else {
	echo "All fields are required!";
        }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>carshowroom-home</title>
    <link rel="stylesheet" href="./asset/css/index.css">
    <script src="https://kit.fontawesome.com/12d8ee7d68.js"></script>
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
    href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
    .container-fluid{
        padding-top:50px;
        }
    .logo
    {
      width: 100px;
      height: 100px;
      background-color: black;
      
    }
    body
    {
        margin:0;
        padding: 0;
        background-image: url(./asset/pics/i8_1.jpg);
        background-size: cover;
        background-position: center;
        font-family: sans-serif;
        color: #eee;
        /* opacity: ; */
        
    }
        .text_design img
    {
        padding: 30px;
    margin: 50px;
    top: -50px;
    left: calc(50% -50px);
    flex: auto;
    color: #eee;
  margin-left: 100px;
    } 
    .text_design form
    {
        margin: 10px   ;
    }

</style>
</head>
<body> 
<div class="flex-container">  
    <img  class="logo"src="./asset/pics/carDealer.jpg"alt="">
    <ul >
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About</a></li> 
        <li><a href="cars.php">Brands</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="login.php">Login</a></li> 
        <li><a href="register.php">Signup</a></li> 
        
        <!-- <li><a href="login.php"><i class="fa-solid fa-user"></i></a></li>  -->
    </ul> 
</div>

<div class="text_design">
    
<img src="./asset/pics/login-icon-3048.png" width="100px" alt="">

<div class="header-bottom">
	<div class="wrap">
		<div class="page-not-found">
		<div class="text-center">
          <h2>SIGN IN
          </h2>
        </div>
      <section>
        <div class="container-fluid row">
          
            <div class="col-md-3"></div>
          
      
          <div class="col-md-6">
        <form class="text-center" action="login.php" method="post" >            
            <div ><br/>
               <label>Email</label>
      <input type="text" class="form-control transparent-input" size="50" placeholder="YOUR EMAIL" name="useremail" required >
             </div>
 
            <div ><br/>
               <label>PASSWORD</label>
      <input type="password" class="form-control transparent-input" size="50" placeholder="PASSWORD PLEASE" name="pass" required >
             </div> 
            <div><br/>
                <button type="submit" class="btn btn-warning" value="login" name="login">Sign in</button>
             </div>
         </form>     
          </div>
          
            <div class="col-md-3"></div>
        
        </div> 
		</div>
	</div>
    </div>
</div>
</section>
</body>
</html>