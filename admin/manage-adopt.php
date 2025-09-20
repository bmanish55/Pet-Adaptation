<?php
include("partials/menu.php")
?>

<!-- Main Content Section Starts -->
<div class="main-content">
   <div class="wrapper text-center">
      <h3 class="text-center all-caps">Manage Adopt</h3>
      <br>
      <br>
      <br>
      <?php
      if (isset($_SESSION['update'])) {
         echo $_SESSION['update'];
         unset($_SESSION['update']);
      }
      ?>
      <br>
      <br>



      <!-- 	id	pet	location	adoption_date	status	adoptee_name	adoptee_contact	adoptee_email	adoptee_address -->

      <table class="tbl">
         <tr>
            <th>SI</th>
            <th>Pet</th>
            <th>Location</th>
            <th>Adoption Date</th>
            <th>Status</th>
            <th>Adoptee Name</th>
            <th>Adoptee Contact</th>
            <th>Adoptee Email</th>
            <th>Adoptee Address</th>
            <th>Actions</th>
         </tr>

         <?php
         // get all orders from database
         // display at descending order
         $sql = "SELECT * FROM tbl_adopt ORDER BY id DESC";
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
               $pet = $row['pet'];
               $location = $row['location'];
               $adoption_date = $row['adoption_date'];
               $status = $row['status'];
               $adoptee_name = $row['adoptee_name'];
               $adoptee_contact = $row['adoptee_contact'];
               $adoptee_email = $row['adoptee_email'];
               $adoptee_address = $row['adoptee_address'];
         ?>

               <tr>
                  <td class="tbl-adopt"><?php echo $sn++; ?></td>
                  <td class="tbl-adopt"><?php echo $pet; ?></td>
                  <td class="tbl-adopt"><?php echo $location; ?></td>
                  <td class="tbl-adopt"><?php echo $adoption_date; ?></td>
                  <td class="tbl-adopt">
                     <?php
                        if($status=="Requested"){
                           echo "<label style='color:blue;'>$status</label>";
                        } else if($status=="Approved"){
                           echo "<label style='color:orangered;'>$status</label>";
                        } else if($status=="Cancelled"){
                           echo "<label style='color:red;'>$status</label>";
                        } else if($status=="Done"){
                           echo "<label style='color:green;'>$status</label>";
                        }
                     ?>
                  </td>
                  <td class="tbl-adopt"><?php echo $adoptee_name; ?></td>
                  <td class="tbl-adopt"><?php echo $adoptee_contact; ?></td>
                  <td class="tbl-adopt"><?php echo $adoptee_email; ?></td>
                  <td class="tbl-adopt"><?php echo $adoptee_address; ?></td>
                  <td>
                     <a href="<?php echo SITEURL; ?>admin/update-adopt.php?id=<?php echo $id; ?>" class="btn_update"> Update </a>
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