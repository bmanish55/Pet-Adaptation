<?php
include('partials-front/menu.php');
?>

<!--HTML Pet Search Section Starts here  -->
<section class="pet-search text-center">
  <div class="container">

    <form action="<?php echo SITEURL; ?>pet-search.php" method="POST">
      <input type="search" name="search" placeholder="Search for pet..." />
      <input type="submit" name="submit" value="search" class="btn btn-primary" />
    </form>
  </div>

</section>
<!--HTML Pet Search Section Ends here  -->

<!-- 
 -->
 <br>
 <br>
 <?php
  if(isset($_SESSION['adopt'])){
    echo $_SESSION['adopt'];
    unset($_SESSION['adopt']);
  }
 ?>


<!--HTML Pet Categories Section Starts here  -->
<section class="categories">
  <div class="container">
    <h2 class="text-center">Categories</h2>

    <?php
    // create a sql query to display the categories from database
    $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 3";
    // execute query
    $res = mysqli_query($conn, $sql);
    // count rows to check whether the category is avaiable or not
    $count = mysqli_num_rows($res);

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
            if ($image_name == "") {
              // display message
              echo "<div class='error'>Category not Added.</div>";
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
      echo "<div class='error'>Image not avaiable.</div>";
    }

    ?>


    <!-- <a href="">
      <div class="box-3">
        <img src="images/cat.png" alt="cat" class="img-responsive img-curve img-bg categories-img" />
        <h3 class="text-center text-orange">Cat</h3>
      </div>
    </a>
    <a href="">
      <div class="box-3 ">
        <img src="images/fish.png" alt="fish" class="img-responsive img-curve img-bg categories-img" />
        <h3 class="text-center text-orange">Fish</h3>
      </div>
    </a> -->
    <!-- clear floating -->
    <div class="clearfix"></div>
  </div>
</section>
<!--HTML Pet Categories Section Ends here  -->
<!--HTML Pet Menu Section Starts here  -->
<section class="pet-menu">
  <div class="container">
    <h2 class="text-center">Explore Pets</h2>
    <!-- <br> -->
    <!-- pet menu box start here -->
    <!-- <div class="pet-menu-box">
      <div class="pet-menu-img">
        <img src="images/menu-dog-1.png" alt="" class="img-curve img-responsive">
      </div>
      <div class="pet-menu-desc">
        <h4>Pet Title</h4>
        <p class="pet-status">Location</p>
        <p class="pet-desc">Health condition is perfect</p>
        <br>
        <a href="adopt.html" class="btn btn-primary">Adopt</a>
         
      </div>
    </div> -->
    <!-- pet menu box ends here  -->
    <!-- <div class="pet-menu-box">
      <div class="pet-menu-img">
        <img src="images/menu-dog-2.png" alt="" class="img-curve img-responsive">
      </div>
      <div class="pet-menu-desc">
        <h4>Pet Title</h4>
        <p class="pet-status">Location</p>
        <p class="pet-desc">Health condition is perfect</p>
        <br>
        <a href="#" class="btn btn-primary">Adopt</a>
         
      </div>
    </div>
    <div class="pet-menu-box">
      <div class="pet-menu-img">
        <img src="images/menu-dog-3.png" alt="" class="img-curve img-responsive">
      </div>
      <div class="pet-menu-desc">
        <h4>Pet Title</h4>
        <p class="pet-status">Location</p>
        <p class="pet-desc">Health condition is perfect</p>
        <br>
        <a href="#" class="btn btn-primary">Adopt</a>
         
      </div>
    </div>-->

    <?php

    // getting pets from database that are actiavte and featured
    // sql query

    $sql2 = "SELECT * FROM tbl_pet WHERE active='Yes' AND featured='Yes' LIMIT 6";

    // execute the query
    $res2 = mysqli_query($conn, $sql2);

    // count rows
    $count2 = mysqli_num_rows($res2);

    // check whether pets are avaiable or not

    if ($count2 > 0) {

      // food avaiable
      while ($row = mysqli_fetch_assoc($res2)) {
        // get all the values
        $id = $row['id'];
        $title = $row['title'];
        $location = $row['location'];
        $description = $row['description'];
        $image_name = $row['image_name'];
    ?>
        <!-- add html -->

        <!--  -->

        <div class="pet-menu-box">
          <div class="pet-menu-img">
            <!-- check image avaiable or not -->
            <?php
            if ($image_name == "") {
              echo "<div class='error'>Image not avaiable.</div>";
            } else {
            ?>
              <img src="<?php echo SITEURL; ?>images\pet\<?php echo $image_name; ?>" alt="" class="img-curve img-responsive">
            <?php
            }
            ?>
          </div>
          <div class="pet-menu-desc">
            <h4><?php echo $title; ?></h4>
            <p class="pet-status"><?php echo $location; ?></p>
            <p class="pet-desc"><?php echo $description; ?></p>
            <br>
            <a href="<?php echo SITEURL; ?>adopt.php?pet_id=<?php echo $id; ?>" class="btn btn-primary">Adopt</a>

          </div>
        </div>

        <!--  -->

    <?php
      }
    } else {
      echo "<div class='error'>Pets not Added.</div>";
    }


    ?>





    <!-- <div class="pet-menu-box">
      <div class="pet-menu-img">
        <img src="images/menu-cat-1.png" alt="" class="img-curve img-responsive">
      </div>
      <div class="pet-menu-desc">
        <h4>Pet Title</h4>
        <p class="pet-status">Location</p>
        <p class="pet-desc">Health condition is perfect</p>
        <br>
        <a href="#" class="btn btn-primary">Adopt</a>
        
      </div> 
    </div>
    <div class="pet-menu-box">
      <div class="pet-menu-img">
        <img src="images/menu-dog-6.png" alt="" class="img-curve img-responsive">
      </div>
      <div class="pet-menu-desc">
        <h4>Pet Title</h4>
        <p class="pet-status">Location</p>
        <p class="pet-desc">Health condition is perfect</p>
        <br>
        <a href="#" class="btn btn-primary">Adopt</a> 
      </div>
    </div> -->
    <div class="clearfix"></div>
  </div>
  <p class="text-center mp-21">
    <a href="<?php echo SITEURL;?>pets.php">See All Pets</a>
  </p>
</section>

<!--HTML Pet Menu Section Ends here  -->

<?php
include('partials-front/footer.php');
?>