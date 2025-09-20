<?php
    include("partials/menu.php")
?>

<!-- Main Content Section Starts -->
<div class="main-content">
         <div class="wrapper text-center">
            <h3 class="text-center all-caps">Manage Category</h3>
            <br> 
            


             <!-- Button for new admin -->
         <a href="<?php echo SITEURL ;?>admin/add-category.php" class="btn-primary">Add Category</a>
         <br><br>
         <?php
            if(isset($_SESSION['add-cat']))
            {
               print("\n");
               echo $_SESSION['add-cat'] ;
               unset($_SESSION['add-cat']); //removing session
               
            }
            

            if(isset($_SESSION['delete']))
            {
               print("\n");
               echo $_SESSION['delete'] ;
               unset($_SESSION['delete']); //removing session
               
            }
            if(isset($_SESSION['img-delete']))
            {
               print("\n");
               echo $_SESSION['img-delete'] ;
               unset($_SESSION['img-delete']); //removing session
               
            }
            if(isset($_SESSION['update-cat']))
            {
               print("\n");
               echo $_SESSION['update-cat'] ;
               unset($_SESSION['update-cat']); //removing session
               
            }

            


            ?>
         <br>
            <table class="tbl-full">
         <tr>
            <th>SI</th>
            <th>Title</th>
            <th>Image</th>
            <th>Featured</th>
            <th>Active</th>
            <th>Actions</th>

         </tr>

         <?php
         $sql="SELECT * FROM tbl_category ";
         $res= mysqli_query($conn,$sql); //$conn is described in constants
               if($res==true)
               {
                  $count = mysqli_num_rows($res);
                  $sn=1;
                  if($count>0)
                  {
                     while($rows=mysqli_fetch_assoc($res)){

                        $id= $rows['id'];
                        $title=  $rows['title'];
                        $image_name= $rows['image_name'];
                        $featured= $rows['featured'];
                        $active=$rows['active'];

                        ?>

                     <tr>
                                  <td><?php echo $sn++ ?></td>
                                  <td><?php echo $title ?></td>
                                  <td><?php 
                                  if($image_name!="")
                                  {

                                    ?>
                                    <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name;?>" width="150px" height="100px" >


                                    <?php

                                  }
                                  else
                                  {
                                    echo "<div class='error'>No image selected </div>" ;
                                  }
                                  
                                  
                                  
                                  ?></td>

                                 <td><?php echo $featured ?></td>
                                 <td><?php echo $active ?></td>
                                 <td>
                     
                     <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>" class="btn-secondary">Update Category</a>
                     <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>& image_name=<?php echo $image_name;?>" class="btn-ter" >Delete Category</a>
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
                     <td colspan="6">No category</td>
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