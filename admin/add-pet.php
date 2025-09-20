<?php
    include("partials/menu.php");
    ?>
    <div class="main-content">
         <div class="wrapper text-center">
            <h1 class="org-color">Add Pet</h1>
            <br>

            <br>
            <br>
            <?php
            if(isset($_SESSION['add-pet1']))
            {
               echo $_SESSION['add-pet1'] ;
               unset($_SESSION['add-pet1']); //removing session
               
            }
            /*
            if(isset($_SESSION['upload']))
            {
            print("\n");
            echo $_SESSION['upload'] ;
            unset($_SESSION['upload']); //removing session
            
            
            }
            */


            ?>


            

            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-30">
                    <tr>
                        <td>Pet Title </td>
                        <td><input type="text" name="title" placeholder="Enter Pet Title"></td>

                        
                        
                    </tr>

                    <tr>
                        <td>Description</td>
                        <td> <input type="text" name="description" cols="30" rows="7" placeholder="Pet Description"> </td>
                    </tr>

                    <tr>
                        <td>Image</td>
                       <td> <input type="file" name="image" > </td>



                    </tr>
                    <tr>
                        <td>Location </td>
                        <td><input type="text" name="location" placeholder="Enter Pet Location"></td>

                        
                        
                    </tr>


                    <tr>
                        <td>Category</td>
                       <td> <select name="category">


                       <?php
                       /* now fun time
                       get category from data base and use them here*/
                       $sql="SELECT * FROM tbl_category ";
         $res= mysqli_query($conn,$sql); //$conn is described in constants
               if($res==true)
               {
                  $count = mysqli_num_rows($res);
                  $sn=1;
                  if($count>0)
                  {
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $id= $row['id'];
                            $title=$row['title'];
                        
                        ?>
                        <option value="<?php echo $id; ?>"><?php echo $title; ?></option>

                        <?php
                        }
                  }
                  else
                  {
                    ?>
                    <option value="0">No Category</option>

                    <?php

                  }
               }

               ?>

                        <?php 

                        ?>
                            
                        </select>
                       </td>

                    </tr>



                    <tr>

                    <td>Featured:</td>
                    <td>
                        <input type="radio" name="featured" value="Yes">Yes
                         <input type="radio" name="featured" value="No">No</td>
                    </tr>


                    

                    <tr>
                    <td>Active</td>
                    <td><input type="radio" name="active" value="Yes">Yes
                         <input type="radio" name="active" value="No">No</td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Pet"  class="btn-secondary">
                        </td>
                    </tr>

                </table>



            </form>
         </div>
</div>

<?php



               
                if(isset($_POST['submit']))
                {
                   
                //value ano
                $title = $_POST['title'];
                $description = $_POST['description'];
                $location= $_POST['location'];
                $category=$_POST['category'];
            
                if(isset($_POST['featured']))
               {
                $featured = $_POST['featured'];
               }
               else
               {
                $featured="No";
               }

               if(isset($_POST['active']))
               {
                $active= $_POST['active'];
               }
               else
               {
                $active="No";
               }


               /* to check img name
               print_r($_Files['image']);

               */

               ///to upload image
              
              if(isset($_FILES['image']['name']))
              {
                    // image name, source, destination, here we are checking if we clicked the add image button or nots
                    $image_name = $_FILES['image']['name'];
                   

                    //we can add category even if we don't upload an image
                    if($image_name!="")
                    
                    {
                        //this means image is available
                        //get extention
                        $ext2= (explode('.',$image_name));//jpg,png
                        $ext= end($ext2);
                    
                    $image_name="Pet_name".rand(0,99999).'.'.$ext;
                    $source= $_FILES['image']['tmp_name'] ;
                    $destination ="../images/pet/".$image_name ;




                    $upload = move_uploaded_file($source,$destination);

                    //checking upload
                    if($upload==false)
                    {
                        //if we don't select an imag
                        $_SESSION['upload']= "<div class='error' >Please Select an Image </div>" ;
                        header('location:'.SITEURL.'admin/add-pet.php');
                        die(); //process will be stopped

                    }
                    }
                    
                       
                    
              }
              else
              {
                $image_name="" ; 
              }





                $sql2= "INSERT into tbl_pet SET
                         	title ='$title',location='$location',description='$description',
                             image_name='$image_name',category_id=$category,
                            featured='$featured', active='$active' " ;

                          //  echo $sql ;

               //now execute
               $res2 = mysqli_query($conn,$sql2);
               if($res2==true)
               {
                    $_SESSION['add-pet'] = "<div class='success' >Pet Added </div>" ;
                    header("location:".SITEURL.'admin/manage-pet.php');

               }
               else
               {
                $_SESSION['add-pet1'] = "<div class='error' >Something went wrong </div>" ;
                header("location:".SITEURL.'admin/add-pet.php');

               }

                



                }


?>




<?php
        include("partials/footer.php")
     ?>