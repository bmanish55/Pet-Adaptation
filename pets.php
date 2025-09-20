<?php
  include('partials-front/menu.php');
?>

    <!--HTML Pet Search Section Starts here  -->
    <section class="pet-search text-center">
        <div class="container">
            <form action="<?php echo SITEURL;?>pet-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for pet..." />
                <input type="submit" name="submit" value="search" class="btn btn-primary" />
            </form>
        </div>
    </section>
    <!--HTML Pet Search Section Ends here  -->

    <!--HTML Pet Menu Section Starts here  -->
    <section class="pet-menu">
        <div class="container">
            <h2 class="text-center">Explore Pets</h2>

            <?php

// getting pets from database that are actiavte and featured
// sql query

$sql2 = "SELECT * FROM tbl_pet WHERE active='Yes' ";

// execute the query
$res2 = mysqli_query($conn, $sql2);

// count rows
$count2 = mysqli_num_rows($res2);

// check whether pets are avaiable or not

if ($count2 > 0) {

  // pet avaiable
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
            </div>
            <div class="pet-menu-box">
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
                    <img src="images/menu-bird-1.png" alt="" class="img-curve img-responsive">
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
            </div>
            <div class="pet-menu-box">
                <div class="pet-menu-img">
                    <img src="images/menu-bird-2.png" alt="" class="img-curve img-responsive">
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
                    <img src="images/menu-cat-2.png" alt="" class="img-curve img-responsive">
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
                    <img src="images/menu-dog-4.png" alt="" class="img-curve img-responsive">
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
                    <img src="images/menu-cat-3.png" alt="" class="img-curve img-responsive">
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
    </section>

    <!--HTML Pet Menu Section Ends here  -->
    <div class="mp-21"></div>

    <?php
  include('partials-front/footer.php');
?>