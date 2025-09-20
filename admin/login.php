<?php

include('../config/constants.php');

?>
<html>
    <head>
        <title>Pet Adoption</title>
        <link rel="stylesheet" href="../css/login-admin.css">
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    </head>



    <div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
               
               
				<form action="" method="POST">
					<label for="chk" aria-hidden="true">Login</label>
                    <input type="text" name="full_name" placeholder="Full name" required="">

					<input type="text" name="username" placeholder="Username" required="">
					
					<input type="password" name="password" placeholder="Password" required="">
					<input type="submit" name="submit" value="Login" class="btn-pri">
				</form> 
			</div>

			<div class="login">
				<form action="" method="POST">
					<label for="chk" aria-hidden="true">Sign Up</label>
					<input type="text" name="full_name" placeholder="Enter Your Name" required="">
                    <input type="text" name="username" placeholder="Enter Your UserName" required="">
					<input type="password" name="password" placeholder="Enter Your Password" required="">
					<input type="submit" name="submit2" value="Sign Up" class="btn-pri">
				</form>
			</div>
	</div>
    <?php 
                    if(isset($_SESSION['login']))
                    {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                    if(isset( $_SESSION['no-login']))
                    {
                        echo  $_SESSION['no-login'];
                        unset( $_SESSION['no-login']);
                    }
                    
                ?>

</html>
                <?php
                    if(isset($_POST['submit2']))
                    {
                    
                        //get data
                        //header("location:".SITEURL.'admin/add-admin.php');
                        $full_name= $_POST["full_name"];
                        $username= $_POST["username"];
                        $password= md5($_POST["password"]); //md5 for encryption
                    
                        //query
                        $sql2= "INSERT INTO tbl_admin SET full_name= '$full_name', username= '$username', password= '$password' " ;
                    
                        
                        //Execute query
                        $res2= mysqli_query($conn,$sql2) ;
                    
                        //Data insertion Checking
                        if($res2==true)
                        {
                           //create a session variable
                           $_SESSION['add']= "<div class='success'>Admin Added</div>" ;
                           $_SESSION['user'] = $username;
                           //redirect to manage admin page
                           header("location:".SITEURL.'admin/');
                    
                    
                        }
                        else
                        {
                            //failure will return to add admin
                            $_SESSION['add']= "Failed to add Admin" ;
                           //redirect to manage admin page
                           header("location:".SITEURL.'admin/login.php');
                    
                        }
                    
                    
                        
                    
                    }
                    
                    


                ?>

<?php
//here comes login checking
        if(isset($_POST['submit']))
        {
            //getting data
            $fullname = $_POST['full_name'];
           $username = $_POST['username'];
            $password = md5($_POST['password']); //encrypted


            $sql="SELECT * from tbl_admin WHERE username='$username' AND password='$password' ";
            $res= mysqli_query($conn,$sql) ;

            $count = mysqli_num_rows($res);

            if($count==1)
            {
                    $_SESSION['login'] = "<div class='success'>Login Successful </div>" ;
                    $_SESSION['user'] = $username;
                    header("location:".SITEURL.'admin/');
            }
            else
            {
                //user not available
                $_SESSION['login'] = "<div class='error' align='center'>Login Not Successful<br>Check Username and Password. </div>" ;
                header("location:".SITEURL.'admin/login.php');
            }


        }



?>


