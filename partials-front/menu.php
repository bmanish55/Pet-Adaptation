<?php
    include('config/constants.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Adoptly: Pet Adoption</title>
  <link rel="stylesheet" href="css/style.css" />
  <link rel="icon" href="images/favicon-2.png" />
</head>

<body>
  <!--HTML Navbar Section Starts here  -->
  <section class="navbar">
    <div class="container">
      <div class="logo">
        <!-- Logo Image -->
        <a href="<?php echo SITEURL; ?>"><img src="images/logo-2.png" alt="Pet Adaptation Navbar Logo" class="img-responsive" id="logo_img"/></a>
      </div>
      <div class="menu text-right">
        <!-- Menu Will be displayed Here -->
        <ul type="none">
          <li><a href="<?php echo SITEURL; ?>">Home</a></li>
          <li><a href="<?php echo SITEURL; ?>categories.php">Categories</a></li>
          <li><a href="<?php echo SITEURL; ?>pets.php">Pets</a></li>
          <li>
            <a href="<?php echo SITEURL; ?>vet-community.php" class="btn btn-primary">Vet Community</a>
          </li>

        </ul>
      </div>
      <div class="clearfix"></div>
    </div>
  </section>
  <!--HTML Navbar Section Ends here  -->