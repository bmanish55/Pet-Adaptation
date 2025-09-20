<?php
 include("partials/menu.php");
?>

<!-- Main Content Section Starts -->
    <div class="main-content">
        <div class="wrapper">
            <h3 class="text-center all-caps">Dashboard</h3>
            <br>
            <?php 
                    if(isset($_SESSION['login']))
                    {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                    
                ?>
                <br>
                
            <div class="col-4 text-center">
            <?php
                       /* now fun time
                       get category from data base and use them here*/
                       $sql="SELECT * FROM tbl_category ";
         $res= mysqli_query($conn,$sql); //$conn is described in constants
               if($res==true)
               {
                  $count = mysqli_num_rows($res);
                  $sn=0;
                  ?>
                  
                  
                    

               






                <h2 class="text-white"><?php echo $count; ?></h2>
                <?php } ?>
                <p class="text-white">Categories</p>
            </div>
            <div class="col-4 text-center">
            <?php
                       /* now fun time
                       get category from data base and use them here*/
                       $sql2="SELECT * FROM tbl_pet ";
         $res2= mysqli_query($conn,$sql2); //$conn is described in constants
               if($res2==true)
               {
                  $count2 = mysqli_num_rows($res2);
                  $sn=0;
                  ?>
                  
                  
                    

               






                <h2 class="text-white"><?php echo $count2; ?></h2>
                <?php } ?>
                <p class="text-white">Pets</p>
            </div>
            <div class="col-4 text-center">
            <?php
                       /* now fun time
                       get category from data base and use them here*/
                       $sql3="SELECT * FROM tbl_category where featured='yes' ";
         $res3= mysqli_query($conn,$sql3); //$conn is described in constants
               if($res==true)
               {
                  $count3 = mysqli_num_rows($res3);
                  $sn=0;
                  ?>
                  
                  
                    

               






                <h2 class="text-white"><?php echo $count3; ?></h2>
                <?php } ?>
                <p class="text-white">Featured Categories</p>
            </div>
            <div class="col-4 text-center">
            <?php
                       /* now fun time
                       get category from data base and use them here*/
                       $sql3="SELECT * FROM tbl_pet where featured='yes' ";
         $res3= mysqli_query($conn,$sql3); //$conn is described in constants
               if($res==true)
               {
                  $count3 = mysqli_num_rows($res3);
                  $sn=0;
                  ?>
                  
                  
                    

               






                <h2 class="text-white"><?php echo $count3; ?></h2>
                <?php } ?>
                <p class="text-white">Featured Pets</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- Main Content Section Ends -->

<?php
    include("partials/footer.php");
?>