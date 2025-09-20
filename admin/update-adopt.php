<?php
include('partials/menu.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h3>Update Adopt Request</h3>
        <br><br>

        <?php

        if (isset($_GET['id'])) {
            // get the adopt details
            $id = $_GET['id'];
            // sql query tp get adopt details
            $sql = "SELECT * FROM tbl_adopt WHERE id=$id";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);

            if ($count == 1) {

                $row = mysqli_fetch_assoc($res);

                $pet = $row['pet'];
                $location = $row['location'];
                $status = $row['status'];
                $adoptee_name = $row['adoptee_name'];
                $adoptee_contact = $row['adoptee_contact'];
                $adoptee_email = $row['adoptee_email'];
                $adoptee_address = $row['adoptee_address'];
            } else {
                // details not avaible
                // redirect to manage adopt
                header('location:' . SITEURL . 'admin/manage-adopt.php');
            }
        } else {
            // redirect to manage adopt page 
            header('location:' . SITEURL . 'admin/manage-adopt.php');
        }

        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Pet Name</td>
                    <td> <b><?php echo $pet; ?></b> </td>
                </tr>
                <tr>
                    <td>Location</td>
                    <td>
                        <input type="text" name="location" value="<?php echo $location; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Adoptee Name:</td>
                    <td>
                        <input type="text" name="adoptee_name" value="<?php echo $adoptee_name; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Adoptee Contact:</td>
                    <td>
                        <input type="text" name="adoptee_contact" value="<?php echo $adoptee_contact; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Adoptee Email:</td>
                    <td>
                        <input type="text" name="adoptee_email" value="<?php echo $adoptee_email; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Adoptee Adress:</td>
                    <td>
                        <textarea name="adoptee_address" cols="30" rows="5"><?php echo $adoptee_address; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>
                        <select name="status">
                            <option <?php if ($status == "Requested") {
                                        echo "selected";
                                    } ?> value="requested">Requested</option>
                            <option <?php if ($status == "Approved") {
                                        echo "selected";
                                    } ?> value="approved">Approved</option>
                            <option <?php if ($status == "Done") {
                                        echo "selected";
                                    } ?> value="done">Done</option>
                            <option <?php if ($status == "Cancelled") {
                                        echo "selected";
                                    } ?> value="cancelled">Cancelled</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="update request" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

        <?php
        // checked whether update button is clicked or not
        if (isset($_POST['submit'])) {

            // get all the values from form
            $id = $_POST['id'];
            // $pet = $_POST['pet'];
            $location = $_POST['location'];
            $status = $_POST['status'];
            $adoptee_name = $_POST['adoptee_name'];
            $adoptee_contact = $_POST['adoptee_contact'];
            $adoptee_email = $_POST['adoptee_email'];
            $adoptee_address = $_POST['adoptee_address'];

            // update all the values

            $status = ucwords($status);

            $sql2 = "UPDATE tbl_adopt SET
                /* pet = '$pet', */
                location = '$location',
                /* adoption_date = '$adoption_date', */
                status = '$status',
                adoptee_name = '$adoptee_name',
                adoptee_contact = '$adoptee_contact',
                adoptee_email = '$adoptee_email',
                adoptee_address = '$adoptee_address'
                WHERE id=$id
            ";
            // exectue the query
            $res2 = mysqli_query($conn, $sql2);
            // check whether query is executed successfully or not
            if ($res2 == true) {
                // query executed
                $_SESSION['update'] = "<div class='success text-center'>Pet Adoption Request Updated Successfully.</div>";
                header('location:' . SITEURL . 'admin/manage-adopt.php');
            } else {
                // failed to exectute
                $_SESSION['update'] = "<div class='error text-center'>Failed To Update Pet Adoption Request.</div>";
                header('location:' . SITEURL / 'admin/manage-adopt.php');
            }
            // redirect to manage-adopt with message
        }
        ?>


    </div>
</div>

<?php
include('partials/footer.php');
?>