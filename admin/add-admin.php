<?php
    include("partials/menu.php");
    ?>

<div class="main-content">
         <div class="wrapper text-center">
            <h1>Add Admin</h1>
            <br>


            <?php
            if(isset($_SESSION['add']))
            {
                                echo $_SESSION['add'] ; // display session message
                                unset($_SESSION['add']);
            }

            ?>

            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Full Name </td>
                        <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
                        
                        
                    </tr>
                    <tr>
                    <td>UserName</td>
                    <td><input type="text" name="username" placeholder="Enter Your UserName"></td>
                    </tr>

                    <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" placeholder="Enter Your Password"></td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Admin"  class="btn-secondary">
                        </td>
                    </tr>

                </table>



            </form>
         </div>
</div>































<?php
//form to database
//checking first
if(isset($_POST['submit']))
{

    //get data
    $full_name= $_POST["full_name"];
    $username= $_POST["username"];
    $password= md5($_POST["password"]); //md5 for encryption

    //query
    $sql= "INSERT INTO tbl_admin SET full_name= '$full_name', username= '$username', password= '$password' " ;

    
    //Execute query
    $res= mysqli_query($conn,$sql) ;

    //Data insertion Checking
    if($res==true)
    {
       //create a session variable
       $_SESSION['add']= "<div class='success'>Admin Added</div>" ;
       //redirect to manage admin page
       header("location:".SITEURL.'admin/manage-admin.php');


    }
    else
    {
        //failure will return to add admin
        $_SESSION['add']= "Failed to add Admin" ;
       //redirect to manage admin page
       header("location:".SITEURL.'admin/add-admin.php');

    }


    

}



?>


<?php
        include("partials/footer.php")
     ?>