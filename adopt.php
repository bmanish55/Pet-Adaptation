<?php
include('partials-front/menu.php');
?>

<!-- adopt code goes here -->
<!-- --x-- -->
<?php
// check whether pet-id is set or not
if (isset($_GET['pet_id'])) {
    // get the pet id and details of the pet
    $pet_id = $_GET['pet_id'];

    // get the details of the selected pet
    $sql = "SELECT * FROM tbl_pet WHERE id=$pet_id";
    // execute the query
    $res = mysqli_query($conn, $sql);
    // count the rows
    $count = mysqli_num_rows($res);
    // check whether data avaiable or not
    if ($count == 1) {
        // we have the pet data avaiable
        // get the data from database
        $row = mysqli_fetch_assoc($res);
        // get all the details
        $title = $row['title'];
        $location = $row['location'];
        $image_name = $row['image_name'];
        $description = $row['description'];
    } else {
        // redirect to the homeage
        header('location:' . SITEURL);
    }
} else {
    // redirected to the homepage
    header('location:' . SITEURL);
}
?>
<div class="clearfix"></div>
<!-- </div>
</section> -->
<!--HTML Navbar Section Ends here  -->

<!-- form -->
<div>
    <h2 class="text-center text-orange">Fill This Form To Confirm The Adoption Process.</h2>
</div>

<section class="pet-search">
    <div class="container">
        <!-- it needs to be blank -- error -->
        <form action="" method="POST" class="adopt">
            <legend class="text-center text-orange">Selected Pet</legend>
            <fieldset>
                <!-- <legend>Selected Pet</legend> -->

                <section class="pet-menu">
                    <!-- <div class="container"> -->
                    <!-- <div class="pet-menu-box"> -->
                    <div class="pet-menu-img">
                        <?php
                        // check whether image avaiable or not
                        if ($image_name == "") {
                            // image not avaiable
                            echo '<div class="error">Image not avaiable</div>';
                        } else {
                        ?>
                            <br>
                            <img src="<?php echo SITEURL; ?>images/pet/<?php echo $image_name; ?>" alt="" class="img-curve img-responsive">
                        <?php
                        }
                        ?>
                    </div>
                    <div class="pet-menu-desc">
                        <br>
                        <h4><?php echo $title; ?></h4>
                        <input type="hidden" name="pet" value="<?php echo $title; ?>">
                        <p class="pet-status"><?php echo $location; ?></p>
                        <input type="hidden" name="location" value="<?php echo $location; ?>">
                        <p class="pet-desc"><?php echo $description; ?></p>
                        <br>
                    </div>
                    <!-- </div> -->
                    <!-- </div> -->
                    <div class="clearfix"></div>
                </section>
            </fieldset>
            <fieldset>
                <legend class="text-center text-orange">Details Info</legend>
                <div class="order-label">Full Name</div>
                <input type="text" name="full-name" placeholder="E.g. Manish Uttam Bhavar" class="input-responsive" required>

                <div class="order-label">Phone Number</div>
                <input type="tel" name="contact" placeholder="E.g. +91 8459059460" class="input-responsive" required>

                <div class="order-label">Email</div>
                <input type="email" name="email" placeholder="E.g. mbhavar2121@gmail.com" class="input-responsive" required>

                <div class="order-label">Address</div>
                <textarea name="address" rows="2" placeholder="E.g. Flat No, House No, House, Area, City" class="input-responsive" required></textarea>

                <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-center">
            </fieldset>
        </form>
        <?php
        if (isset($_POST['submit'])) {
            // get all the details from the form
            // id,pet,location,adoption_date,status,adoptee_name,adoptee_contact,adoptee_email,adoptee_address

            $pet = $_POST['pet'];
            $location = $_POST['location'];
            $adoption_date = date("Y-m-d"); //  cause sevire error and destroyed my 2 hours before deadline
            $status = "Requested"; // Requested, Approved, Done, Cancelled
            $adoptee_name = $_POST['full-name'];
            $adoptee_contact = $_POST['contact'];
            $adoptee_email = $_POST['email'];
            $adoptee_address = $_POST['address'];

            // save the data in the database
            // create sql to save the data
            $sql2 = "INSERT INTO tbl_adopt SET
                pet = '$pet',
                location = '$location',
                adoption_date = '$adoption_date',
                status = '$status',
                adoptee_name = '$adoptee_name',
                adoptee_contact = '$adoptee_contact',
                adoptee_email = '$adoptee_email',
                adoptee_address = '$adoptee_address'
            ";

            // echo $sql2; die();

            // exectue the query
            $res2 = mysqli_query($conn, $sql2);
            // check whether query is executed successfully or not
            if ($res2 == true) {
                // query executed
                $_SESSION['adopt'] = "<div class='success text-center'>Pet Adoption Request Successful</div>";
                header('location:' . SITEURL);
            } else {
                // failed to exectute
                $_SESSION['adopt'] = "<div class='error text-center'>Pet Adoption Request Failed</div>";
                header('location:' . SITEURL);
            }
        }
        ?>
    </div>
</section>








<!-- FORM -->

<!-- Social Section Starts Here -->
<!-- <section class="social">
    <div class="container text-center">
        <ul type="none">
            <li>
                <a href="#"><img src="images/facebook.png" alt="facebook" class="social-img img-responsive"></a>
            </li>
            <li>
                <a href="#"><img src="images/instagram.png" alt="instagram" class="social-img img-responsive"></a>
            </li>
            <li>
                <a href="#"><img src="images/twitter.png" alt="twitter" class="social-img img-responsive"></a>
            </li>
        </ul>
    </div>
</section> -->
<!-- Social Section Ends Here -->
<!-- Footer Section Starts Here
    <section class="footer">
        <div class="container text-center">
            <p>All rights reserved. Designed By <a href="#">MASPJ</a></p>
        </div>
    </section>
     Footer Section Ends Here-->
<!-- </body>

</html> -->
<?php
include('partials-front/footer.php');
?>