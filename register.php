<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <link rel="stylesheet" href="css/style.css" />
    <?php
   function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }
          
    ?>
    <body>
        <?php
        require('db.php');
        if (isset($_REQUEST['username']))
        {   
           $username= test_input($_REQUEST['username']);
           $username = mysqli_real_escape_string($con,$username);
           $email=test_input($_REQUEST['email']);
           $email = mysqli_real_escape_string($con,$email);
           $password= test_input($_REQUEST['password']);
           $password = mysqli_real_escape_string($con,$password);
           $trn_date = date("Y-m-d H:i:s");
           $query = "INSERT into `users` (username, password, email, trn_date) VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
           $result = mysqli_query($con,$query);
            if($result){
            echo "
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
        }
   } else{
       
        ?>
        
        <form action="" method="POST">
            UserName:<input type="text" name="username" value="" /></br>
            Email:<input type="text" name="email" value="" /></br>
            Password:<input type="password" name="password" value="" /></br>
            <input type="submit" value="Submit" />
        </form>
        <?php }?>
    </body>
</html>
