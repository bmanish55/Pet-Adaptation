 <?php
    include("partials/menu.php")
 ?>
    <!-- Main Content Section Starts -->
    <div class="main-content">
         <div class="wrapper text-center">
            <h3 class="text-center all-caps">Manage Admin</h3>
            <br> 
            <br>
 <!-- Button for new admin -->
         <a href="add-admin.php" class="btn-primary">Add Admin</a>
         <br>
         <br>
         
            <?php
            if(isset($_SESSION['add']))
            {
               echo $_SESSION['add'] ;
               unset($_SESSION['add']); //removing session
               
            }
            if(isset($_SESSION['delete']))
            {
               echo $_SESSION['delete'] ;
               unset($_SESSION['delete']); //removing session
               
            }
            if(isset($_SESSION['update']))
            {
               echo $_SESSION['update'] ;
               unset($_SESSION['update']); //removing session
               
            }

            if(isset($_SESSION['no_user']))
            {
               echo $_SESSION['no_user'] ;
               unset($_SESSION['no_user']); //removing session
               
            }
            if(isset($_SESSION['password_user2']))
            {
               echo $_SESSION['password_user2'] ;
               unset($_SESSION['password_user2']); //removing session
               
            }
            
            if(isset($_SESSION['password_user']))
            {
               echo $_SESSION['password_user'] ;
               unset($_SESSION['password_user']); //removing session
               
            }

            ?>
         <br>


            <table class="tbl-full" >
         <tr>
            <th>SI</th>
            <th>FullName</th>
            <th>UserName</th>
            <th>Actions</th>

         </tr>

         <?php
         //displaying admins
               $sql = "SELECT * FROM tbl_admin ";
               //Execute query
               $res= mysqli_query($conn,$sql); //$conn is described in constants
               if($res==true)
               {
                  //check rows
                  $count = mysqli_num_rows($res);
                  $sn=1;
                  if($count>0) {
                     //data is available in db
                     while($rows=mysqli_fetch_assoc($res))
                     {
                        $id= $rows['id'];
                        $full_name = $rows['full_name'];
                        $username= $rows['username'];
                        //Display Time
                        ?>

            <tr>
               <td><?php echo $sn++ ?></td>
               <td><?php echo $full_name ?></td>
               <td><?php echo $username ?></td>
               <td>
                     <a href="<?php echo SITEURL; ?>admin/password-update.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                     <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                     <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-ter">Delete Admin</a>
               </td>

            </tr>


                        <?php
                     }
                  }
                  else
                  {
                     //no data in db
                  }
               }


         ?>
        

         


            </table>
         </div>
     </div>
     <!-- Main Content Section Ends -->

     <?php
        include("partials/footer.php")
     ?>
  </body>
  </html>