<?php
include("partials/menu.php")
?>

<!-- Main Content Section Starts -->
<div class="main-content">
    <div class="wrapper text-center">
        <h3 class="text-center all-caps">Helpline</h3>
        <br>
        <br>
        <br>
        <?php
        //   if (isset($_SESSION['update'])) {
        //      echo $_SESSION['update'];
        //      unset($_SESSION['update']);
        //   }
        ?>
        <br>
        <br>



        <!-- 	id	pet	location	adoption_date	status	adoptee_name	adoptee_contact	adoptee_email	adoptee_address -->

        <table class="tbl">
            <tr>
                <th>SI</th>
                <th>Person's Name</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Pet Type</th>
                <th>Details</th>
                <th>Actions</th>
            </tr>

            <?php
            // get all orders from database
            // display at descending order
            $sql = "SELECT * FROM tbl_vc ORDER BY id DESC";
            // execute query
            $res = mysqli_query($conn, $sql);
            // count the rows
            $count = mysqli_num_rows($res);

            $sn = 1; // create a serial number and it's inital value is 1

            if ($count > 0) {
                // order avaiable
                while ($row = mysqli_fetch_assoc($res)) {

                    // get all the adopt request details
                    // id	pet	location	adoption_date	status	adoptee_name	adoptee_contact	adoptee_email	adoptee_address

                    $id = $row['id'];
                    $name = $row['name'];
                    $phone_number = $row['phone_number'];
                    $email = $row['email'];
                    $pet_type = $row['pet_type'];
                    $details = $row['address'];
            ?>

                    <tr>
                        <td class="tbl-adopt"><?php echo $sn++; ?></td>
                        <td class="tbl-adopt"><?php echo $name; ?></td>
                        <td class="tbl-adopt"><?php echo $phone_number; ?></td>
                        <td class="tbl-adopt"><?php echo $email; ?></td>
                        <td class="tbl-adopt"><?php echo $pet_type; ?></td>
                        <td class="tbl-adopt"><?php echo $details; ?></td>
                        <td>
                            <!-- rooms.php?phone_number=0187093418 -->
                            <a href="<?php echo SITEURL; ?>rooms.php?phone_number=<?php echo $phone_number; ?>" class="btn_primary"> Chat</a>
                        </td>
                    </tr>

            <?php
                }
            } else {
                // order not avaiable
                echo "<tr><td colspan='12' class='error'>Order not Avaialable</td></tr>";
            }
            ?>



        </table>
    </div>
</div>
<!-- Main Content Section Ends -->

<?php
include("partials/footer.php")
?>