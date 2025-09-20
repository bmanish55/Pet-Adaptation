<?php
include('partials-front/menu.php');
?>

<!-- HTML category  -->
<section class="pet-search text-center">
    <br>
    <br>
    <br>
</section>

<!--HTML Pet Menu Section Starts here  -->
<section class="pet-menu">
    <div class="container">

        <?php
        $search = $_POST['search'];
        ?>

        <h2 class="text-center">You serched for <a href="#" class="text-orange text-center"><?php echo $search; ?></a></h2>

        <?php
        // get the search keyword
        $search = $_POST['search'];
        // sql query to get pet based on search

        // find data based on search keyword*
        $sql = "SELECT * FROM tbl_pet WHERE title LIKE '%$search%' OR description LIKE '%$search%' OR location LIKE '%$search%'";

        // execute the query
        $res = mysqli_query($conn, $sql);
        // count rows
        $count = mysqli_num_rows($res);

        // check whether pet available or not
        if ($count > 0) {
            // food avaiable
            while ($row = mysqli_fetch_assoc($res)) {
                $id = $row['id'];
                $title = $row['title'];
                $location = $row['location'];
                $description = $row['description'];
                $image_name = $row['image_name'];
        ?>

                <!-- pet menu box start here -->
                <div class="pet-menu-box">
                    <div class="pet-menu-img">
                        <?php

                        // check whether image avaiable or not
                        if ($image_name == "") {
                            // image avaiable
                            echo '<div class="error">Image not found</div>';
                        } else {

                        ?>
                            <img src="<?php echo SITEURL; ?>images/pet/<?php echo $image_name; ?>" alt="" class="img-curve img-responsive">
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
                <!-- pet menu box ends here  -->

        <?php
            }
        } else {
            // food not avaiable
            echo '<div class="text-orange">Pet not found</div>';
        }
        ?>



        <!-- <br> -->
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
                <img src="images/menu-dog-5.png" alt="" class="img-curve img-responsive">
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
<div class="mp-21"></div>
<!--HTML Pet Menu Section Ends here  -->

<?php
include('partials-front/footer.php');
?>