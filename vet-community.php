<?php
include('partials-front/menu.php');
?>


<!-- form start -->

<div>
    <h2 class="text-center text-orange">Fill This Form To Chat With A Vet For Free</h2>
</div>

<section class="pet-search">
    <div class="container">
        <form action="claim.php" method="POST" class="adopt">

            <fieldset>
                <legend class="text-center text-orange">User & Pet Details Info</legend>
                <div class="order-label">Full Name</div>
                <input type="text" name="full-name" placeholder="E.g. Manish Bhavar" class="input-responsive" required>

                <div class="order-label">Phone Number</div>
                <input type="tel" name="contact" placeholder="E.g. +91 8459059460" class="input-responsive" required>

                <div class="order-label">Email</div>
                <input type="email" name="email" placeholder="E.g. mbhavar2121@gmail.com" class="input-responsive" required>


                <div class="order-label">Pet Type</div>
                <input type="text" name="pet-type" placeholder="E.g. Cat" class="input-responsive" required>


                <div class="order-label">Pet Details</div>
                <textarea name="address" rows="2" placeholder="E.g. Pet Problems, Syndromes, Duration " class="input-responsive" required></textarea>

                <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-center">
            </fieldset>

        </form>
        <!-- form -->


        <!-- code goes here for collecting form data into the ,ysql database -->


        <!-- code goest here for collecting form data into the mysql database -->

        <!-- after that we will also fetch the data here from the mysql database -->



        <!-- after that we will also fetch the data here from the mysql database -->

    </div>
</section>


<!-- form ends -->

<?php
include('partials-front/footer.php');
?>