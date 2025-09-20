# Pet Adaptation

**Description**  
Pet Adaptation & Vet Community is a responsive web platform connecting pet lovers, adopters, and veterinarians. Users can browse pets, submit adoption requests, and access vet guidance. Built with PHP, MySQL, HTML, and CSS, it creates an interactive space for pets to find loving homes.

---

## Features

- **Pet Browsing:** View available pets with images and details.  
- **Categories:** Browse pets by type (Dog, Cat, Bird, etc.).  
- **Adoption Requests:** Submit and manage adoption applications.  
- **Vet Community:** Connect with vets for pet care advice.  
- **Admin Panel:** Manage pets, categories, and vet requests.  
- **Responsive Design:** Mobile-friendly layout for all devices.  

---

## Technologies Used

- **Frontend:** HTML5, CSS3  
- **Backend:** PHP  
- **Database:** MySQL  
- **Server:** XAMPP (Apache + MySQL)  

---

## Installation Steps

1. **Clone the repository**  
   ```bash
   git clone https://github.com/yourusername/pet-adaptation-vet-community.git

## Database Setup

``` Open phpMyAdmin
Create a new database:
CREATE DATABASE pet_adoption;
```
Select the database and import the pet_adoption.sql dump file.

-- All tables will be created:
-- tbl_admin → Admin users
-- tbl_adopt → Adoption requests
-- tbl_category → Pet categories
-- tbl_pet → Pet listings
-- tbl_vc → Vet community contacts
-- msgs → Chat/message logs

## Configuration

Edit config/constants.php to set your database credentials:

-- define('SITEURL', 'http://localhost/Pet-Adaptation-Vet-Community/');
-- define('LOCALHOST', 'localhost');
-- define('DB_USERNAME', 'root');
-- define('DB_PASSWORD', 'YOUR_PASSWORD'); // Change this
-- define('DB_NAME', 'pet_adoption');

$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD);
$db_select = mysqli_select_db($conn, DB_NAME);


## Steps to Run Locally

```Clone the repository:

git clone https://github.com/your-username/Pet-Adaptation-Vet-Community.git
```

Move the folder into htdocs (for XAMPP)
Start Apache & MySQL from XAMPP

Open your browser:
```
http://localhost/Pet-Adaptation-Vet-Community/
```
The homepage should load; you can now navigate through categories, pets, and vet community
