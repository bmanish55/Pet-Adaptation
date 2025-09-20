<?php
    include("partials/menu.php");
    ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Password</h1>
        <br> <br>

        <?php
            if(isset($_GET['id']))
            {
                $id= $_GET['id'];
            }


        ?>
        <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Current Password </td>
                        <td><input type="password" name="cur_password"  placeholder="Current password" ></td>
                        
                        
                    </tr>
                    <tr>
                    <td>New Password</td>
                    <td><input type="password" name="new_password"  placeholder="New password"></td>
                    </tr>

                    <tr>
                    <td>Confirm Password</td>
                    <td><input type="password" name="confirm_password"  placeholder="Confirm password"></td>
                    </tr>

                    

                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id; ?>"> 
                            <input type="submit" name="submit" value="Update Password"  class="btn-secondary">
                        </td>
                    </tr>

                </table>



            </form>


    </div>
</div>


<?php
            if(isset($_POST['submit']))
            {
                //getting info from page form
                $id = $_POST['id'];
                $cur_password= md5($_POST['cur_password']);
                $new_password= md5($_POST['new_password']);
                $confirm_password= md5($_POST['confirm_password']);

                //query time
                $sql= "SELECT * from tbl_admin Where id=$id AND password='$cur_password' ";

                //execution
                $res = mysqli_query($conn,$sql);

                if($res==true)
                {
                    $count = mysqli_num_rows($res);
                if($count==1)
                {
                 //get rows
                 $row= mysqli_fetch_assoc($res);
                 if($confirm_password==$new_password)
                {
                    $sql_pass = "UPDATE tbl_admin SET password='$new_password' WHERE id=$id" ;
                    //execute query
                    $res_pass = mysqli_query($conn,$sql_pass);

                   if($res_pass==true)
                   {
                    $_SESSION['password_user'] = "<div class='success'>Password Updated </div>" ;
                    header("location:".SITEURL.'admin/manage-admin.php');
                   }
                }
                else
                {
                    $_SESSION['password_user2'] = "<div class='error'>Try Again</div>" ;
                    header("location:".SITEURL.'admin/manage-admin.php');
                }
                 
                
         
                }
                 else{
                    //user doesn't exist
                     //redirect
                     $_SESSION['no_user'] = "<div class='error'>Information Incorrect </div>" ;
                 header("location:".SITEURL.'admin/manage-admin.php');
                 }
                }
                


            }



?>


<?php
        include("partials/footer.php")
     ?>
