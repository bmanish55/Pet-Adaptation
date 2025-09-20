<?php
    include("partials/menu.php")
?>

<!-- Main Content Section Starts -->
<div class="main-content">
         <div class="wrapper text-center">
            <h3 class="text-center all-caps">Manage Pet</h3>
            <br>

            <br>
            
            <!-- Button for new admin -->
         <a href="<?php echo SITEURL; //option use of siteurl?>admin/add-pet.php" class="btn-primary">Add Pet</a>
         <br>
         <br>
         
            <?php
            if(isset($_SESSION['add-pet']))
            {
               echo $_SESSION['add-pet'] ;
               unset($_SESSION['add-pet']); //removing session
               
            }
            if(isset($_SESSION['update-pet']))
            {
               echo $_SESSION['update-pet'] ;
               unset($_SESSION['update-pet']); //removing session
               
            }
            if(isset($_SESSION['delete']))
            {
               echo $_SESSION['delete'] ;
               unset($_SESSION['delete']); //removing session
               
            }
            ?>
            


            <table class="tbl-full">
         <tr>
            <th>SI</th>
            <th>Title</th>
            <th>Location</th>
            <th>Image</th>
            <th>Featured</th>
            <th>Active</th>
            <th>Actions</th>

         </tr>

         <?php
         $sql="SELECT * FROM tbl_pet ";
         $res= mysqli_query($conn,$sql); //$conn is described in constants
               if($res==true)
               {
                  $count = mysqli_num_rows($res);
                  $sn=1;
                  if($count>0)
                  {
                     while($rows=mysqli_fetch_assoc($res)){

                        $id= $rows['id'];
                        $description = $rows['description'];
                        $location= $rows['location'];
                        $title=  $rows['title'];
                        $image_name= $rows['image_name'];
                       
                        $featured= $rows['featured'];
                        $active=$rows['active'];

                        ?>

                     <tr>
                                  <td><?php echo $sn++ ?></td>
                                  <td><?php echo $title ?></td>
                                  <td><?php echo $location ?></td>
                                  <td><?php 
                                  if($image_name!="")
                                  {

                                    ?>
                                    <img src="<?php echo SITEURL;?>images/pet/<?php echo $image_name;?>" width="150px" height="100px" >


                                    <?php

                                  }
                                  else
                                  {
                                    echo "<div class='error'>No image selected for pet </div>" ;
                                  }
                                  
                                  
                                  
                                  ?></td>

                                 <td><?php echo $featured ?></td>
                                 <td><?php echo $active ?></td>
                                 <td>
                     
                     <a href="<?php echo SITEURL; ?>admin/update-pet.php?id=<?php echo $id; ?>" class="btn-secondary">Update Pet</a>
                     <a href="<?php echo SITEURL; ?>admin/delete-pet.php?id=<?php echo $id; ?>& image_name=<?php echo $image_name;?>" class="btn-ter" >Delete Pet</a>
               </td>
                     </tr>


                     <?php


                     }
                  }
               }
               else
               {
                  
                  



            
               ?>

                  <tr>
                     <td colspan="7">No Pets</td>
                  </tr>
                  <?php
                  
               }



         ?>


         


            </table>
         </div>
</div>
<!-- Main Content Section Ends -->

<?php
    include("partials/footer.php")
?>