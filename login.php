<?php
$login = 0;
$Invalid = 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connection.php'; 
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    echo $email;

    echo $password;



    //-------------user logging in-------
    $sql = "Select * from loginform where Email='$email' and Password='$password'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            $login = 1;
            session_start(); //need not to login always
            $_SESSION['Email'] = $email;
            header('location:home.php');

        } else {
            $Invalid = 1;
        }

    }
}
?>

<!DOCTYPE html>    
<html>    
<head>    
    <title>CUSAS Sign Up Form</title>
    
    <style>
        
body

{
    margin: 0;
    padding: 0;
    font-family: "sans-serif";
    background-image: url("image.jpg");
    background-size: cover;
    background-position: center;

}

.Login
{
   width: 400px;
   box-shadow: 0 0 3px 0 rgba(0,0,0,0.3);
   background: #fff;
   padding: 20px;
   margin: 8% auto 0;
   text-align: center;

}
.Login h1 
{
    color: blue;
    margin-bottom: 30px;

}
.input-box

{
    border-radius: 20px;
    padding: 10px;
    margin: 10px 0;
    width: 100%;
    border: 1px solid #999;
    outline:
}

button
{
    color: black;
    width: 100%;
    padding: 10px;
    border-radius: 20px;
    font-size: 15px;
    margin: 10px 0;
    border:none;
    cursor: pointer;
}

.signup-btn
{
    background-color: #1c8adb;
}
.google-btn
{
    background-color: #21afde;
}
a{
    text-decoration: none;
}
hr{
    margin-top: 20px;
    width: 80%;
}
    </style>   
    <link rel="stylesheet" href="style.css">    
</head>    
<body>
    
<!--failed login notification-->
<?php
    if ($Invalid) {
        echo "<script>alert('invalid');</script>";
    } 
    ?>
    <!-- after login , successfull notification-->
    <?php
    if ($login) {
        echo "<script>alert('successfull');</script>";
    }
    
    ?>
  
    <div class="Login">  
        <br>CUSAS-A Smart Attendance System</br> 
        <h1>Login Page</h1>
    <form method="POST"> 
         
        <label><b>User ID     
        </b>   
        </label>
        <input type="email" class="input-box" placeholder="Your Email" name="Email">    
        <br><br>    
        <label><b>Password     
        </b>    
        </label>    
        <input type="password" class="input-box" placeholder="Your Password" name="Password">    
        <br><br>    
        <button type="submit" class="signup-btn">Sign Up</button>      
      <br>
        <input type="checkbox" id="check">    
        <span>Remember me</span>    
        <br><br> 
         
        Forgot <a href="#">Password</a>  
         <hr>
        <p class="or">OR</p>
        <button type="button" class="google-btn">Login with Google</button>  
        <p> Do you have an account? <a href="#">Sign in</a></p>  

    </form>     
</div> 

<?php
        if(isset($_POST['Sign Up']))
        {
    
        //echo "clicked";
        $query = "SELECT * FROM loginform WHERE Email='$_POST[Email]' AND Password='$_POST[Password]' ";
        $result=mysqli_query($con, $query);
        if(mysqli_num_rows($result)==1)
        {
        echo "wegtrhfy";
            session_start();
            $_SESSION['AdminLoginId'] = $_POST['Email'];
            header("location:home.php");

       

        }
        else
        {
             
        echo"<script>alert('Incorrect Password')>;</script>" ;
        }
    }
        
     ?>
</body>    
</html>