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
    <body>
       <?php
   function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }
          
    ?>
        
        <?php
        require('db.php');
        if (isset($_REQUEST['username']))
        {   
           $username= test_input($_REQUEST['username']);
           $username = mysqli_real_escape_string($con,$username);
           $password= test_input($_REQUEST['password']);
           $password = mysqli_real_escape_string($con,$password);
           $query = "SELECT * FROM `users` WHERE username='$username'and password='".md5($password)."'";
           $result = mysqli_query($con,$query) or die(mysql_error());
            $rows = mysqli_num_rows($result);
            if($rows==1){
            // Redirect user to index.php
	    header("Location: index.php");
         }else{
             echo "<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
	}
    }else{
         
?>
        <form action="home.php" method="POST">
            
            Username: <input type="text" name="username" value="" /><br/>
            Password: <input type="password" name="password" value="" />
            
            <input type="submit" value="login" name="login" />
            
            
            
        </form>
        
        
        
        
         <?php }?>
        
    </body>
</html>
