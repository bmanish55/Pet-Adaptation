<?php
include('partials-front/menu.php');
?>
<!-- HTML category  -->
<section class="pet-search text-center">
    <br>
    <br>
    <br>
    <!-- <br> -->
</section>

<!--HTML Pet Categories Section Starts here  -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Categories</h2>


        <?php

        // display all the categories that are active
        // sql query
        $sql = "SELECT * FROM tbl_category WHERE active='YES'";
        // execute query
        $res = mysqli_query($conn, $sql);
        // count rows to check whether the category is avaiable or not
        $count = mysqli_num_rows($res);

        // check whether categories avaiable or not

        if ($count > 0) {
            // categories avaiable
            while ($row = mysqli_fetch_assoc($res)) {
              // get the title, image_name and id
              $id = $row['id'];
              $title = $row['title'];
              $image_name = $row['image_name'];
          ?>
              <!-- end - start -->
              <a href="<?php echo SITEURL; ?>category-pet.php?category_id=<?php echo $id;?>">
                <div class="box-3">
                  <?php
                  // check wheteher image is avaiable or not
                  if($image_name==""){
                    // display message
                    echo '<div class="error">Category not Added.</div>';
                  } else {
                    // image avaiable 
                    ?>
                    <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="dog" class="img-responsive img-curve img-bg categories-img" />
                    <?php
                  }
                  ?>   
                  <h3 class="text-center text-orange"><?php echo $title; ?></h3>
                </div>
              </a>
              <!-- end - start -->
          <?php
            }
          } else {
            // categories not avaiable
            echo '<div class="error">Category not Added.</div>';
          }
      
          ?>

        

        <!-- <a href="category-pet.html">
            <div class="box-3">
                <img src="images/dog.png" alt="dog-1" class="img-responsive img-curve img-bg categories-img" />
                <h3 class="text-center text-orange">Dog</h3>
            </div>
        </a>
        <a href="#">
            <div class="box-3">
                <img src="images/cat.png" alt="cat-1" class="img-responsive img-curve img-bg categories-img" />
                <h3 class="text-center text-orange">Cat</h3>
            </div>
        </a>
        <a href="#">
            <div class="box-3">
                <img src="images/bird.png" alt="bird-1" class="img-responsive img-curve img-bg categories-img" />
                <h3 class="text-center text-orange">Bird</h3>
            </div>
        </a>
        <a href="#">
            <div class="box-3">
                <img src="images/fish.png" alt="fish-1" class="img-responsive img-curve img-bg categories-img" />
                <h3 class="text-center text-orange">Fish</h3>
            </div>
        </a>
        <a href="#">
            <div class="box-3">
                <img src="images/duck.png" alt="dog-1" class="img-responsive img-curve img-bg categories-img" />
                <h3 class="text-center text-orange">Duck</h3>
            </div>
        </a> -->
        <!-- <a href="">
                <div class="box-3">
                    <img src="images/chicken.png" alt="dog-1" class="img-responsive img-curve img-bg categories-img" />
                    <h3 class="text-center text-orange">Chicken</h3>
                </div>
            </a> -->
        <!-- <a href="#">
            <div class="box-3 ">
                <img src="images/shrimp.png" alt="shrimp" class="img-responsive img-curve img-bg categories-img" />
                <h3 class="text-center text-orange">Shrimp</h3>
            </div>
        </a> -->
        <!-- clear floating -->
        <div class="clearfix"></div>
    </div>

</section>
<!--HTML Pet Categories Section Ends here  -->

<?php
include('partials-front/footer.php');
?>

</body>

</html>