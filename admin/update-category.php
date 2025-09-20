<?php
    include("partials/menu.php");
    ?>




<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>
        <br> <br>

        <?php
        //get the id
        if(isset($_GET['id']))
        {
            $id= $_GET['id'];
       
        //sql query
        $sql = "SELECT * FROM tbl_category WHERE id=$id" ;
        $res= mysqli_query($conn,$sql);

        if($res==true)
        {

            //query is successful
       $count = mysqli_num_rows($res);
       if($count==1)
       {
        //get row
        $row= mysqli_fetch_assoc($res);
        
        $title = $row['title'];
        $featured = $row['featured'];
        $active= $row['active'];
            
        $cur_image_name=$row['image_name'];

               /* if(isset($row['feature']))
               {
                
               }
               else
               {
                $featured="No";
               }

               if(isset($row['active']))
               {
                
               }
               else
               {
                $active="No";
               }
*/


       }
        else{
            //redirect
        header("location:".SITEURL.'admin/manage-category.php');
        }


        }
        }
        else
        {
            header("location:".SITEURL.'admin/manage-category.php');

        }

?>


        
        <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-30">
                    <tr>
                        <td>Category Title </td>
                        <td><input type="text" name="title" value="<?php echo $title;?>"></td>

                        
                        
                    </tr>
                    <tr>
                        <td>Current Image</td>
                       <td>
                        <?php
                        if($cur_image_name!="")
                        {
                            ?>
                            <img src="<?php echo SITEURL;?>images/category/<?php echo $cur_image_name;?>" width="150px" height="100px">

                            <?php

                        }
                        else
                        {
                            echo "<div class='error' >No Image is selected </div>" ;
                        }


                    ?>
                       </td>



                    </tr>


                    <tr>
                        <td>New Image</td>
                       <td> <input type="file" name="image" > </td>



                    </tr>
                    <tr>
                    <td>Featured:</td>
                    <td>
                        <input <?php if($featured=="Yes") { echo "checked";}?> type="radio" name="feature" value="Yes">Yes
                         <input <?php if($featured=="No") { echo "checked";}?> type="radio" name="feature" value="No">No</td>
                    </tr>


                    

                    <tr>
                    <td>Active</td>
                    <td><input <?php if($active=="Yes") { echo "checked";}?>  type="radio" name="active" value="Yes">Yes
                         <input <?php if($active=="No") { echo "checked";}?> type="radio" name="active" value="No">No</td>
                    </tr>

                    <tr>
                        <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>"> 
                        <input type="hidden" name="cur_image" value="<?php echo $cur_image_name; ?>"> 
                            <input type="submit" name="submit" value="Add Category"  class="btn-secondary">
                        </td>
                    </tr>

                </table>



            </form>


    </div>

</div>

<?php 

        //updating in dbms
        if(isset($_POST['submit']))
        {
            $id = $_POST['id'];
            $title = $_POST['title'];
        
            
                if(isset($_POST['feature']))
               {
                $featured = $_POST['feature'];
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

               //if image is selected
               if(isset($_FILES['image']['name']))
              {
                    // image name, source, destination
                    $new_image_name = $_FILES['image']['name'];
                   

                    //we can add category even if we don't upload an image
                    if($new_image_name!="")
                    
                    {
                        //this means image is available
                        //get extention
                        $ext= end(explode('.',$new_image_name));//jpg,png
                    $image_name="Pet_Category".rand(0,9999).'.'.$ext;
                    $source= $_FILES['image']['tmp_name'] ;
                    $destination ="../images/category/".$image_name ;




                    $upload = move_uploaded_file($source,$destination);

                    //checking upload
                    if($upload==false)
                    {
                        $_SESSION['upload']= "<div class='error' >Please Select an Image </div>" ;
                        header('location:'.SITEURL.'admin/add-category.php');
                        die(); //process will be stopped

                    }
                    if($_POST['cur_image']!="")
                   {
                    $remove_path = "../images/category/".$_POST['cur_image'] ;
                    $remove = unlink($remove_path);

                   }


                    }
                    else
              {
                $image_name= $_POST['cur_image'] ; 
              }
              }
              else
              {
                $image_name= $_POST['cur_image'] ; 
              }
          

            $sql = "UPDATE tbl_category SET
            title ='$title', image_name='$image_name',
           featured='$featured', active='$active'  where id='$id' " ;

            //Execute query
            $res = mysqli_query($conn,$sql);
            if($res==true)
            {
                    $_SESSION['update-cat'] = "<div class='success'>Category Updated </div>" ;
                    header("location:".SITEURL.'admin/manage-category.php');
            }
            else
            {
                $_SESSION['update-cat'] = "<div class='error'>Category can not be Updated </div>" ;
                header("location:".SITEURL.'admin/manage-category.php');
            }
        }
        


?>




<?php
    include("partials/footer.php");
    ?>