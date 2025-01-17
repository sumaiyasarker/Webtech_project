<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cus";  // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Manually insert data into the dishes table
$sql = "INSERT INTO `dishes` (`d_id`, `title`, `slogan`, `price`, `img`) VALUES
        (1, 'Chicken Biryani', 'Rich and aromatic rice delicacy', 250.00, '../photos/chicken_biryani.jpg'),
        (2, 'Mutton Biryani', 'Tender mutton layered with flavorful rice', 300.00, '../photos/mutton_biryani.jpg'),
        (3, 'Chicken Seekh Kebab', 'Spiced and grilled to perfection', 150.00, '../photos/chicken_seekh_kebab.png'),
        (4, 'Mutton Shami Kebab', 'Delicate minced mutton patties', 200.00, '../photos/mutton_shami_kebab.jpg')
        (5, 'Chicken Dum Biryani', 'Flavorsome dum biryani cooked to perfection', 270.00, '../photos/chicken_dum_biriyani.png'),
        (6, 'Hyderabadi Biryani', 'Authentic spicy Hyderabadi biryani', 280.00, '../photos/hyderabadi_biriyani.png'),
        (7, 'Chicken Tikka Masala', 'Classic curry rich in spices', 250.00, '../photos/chiken_tikka_masala.png'),
        (8, 'Butter Chicken', 'Mild creamy chicken curry', 240.00, '../photos/butter_chicken.png'),
        (9, 'Pav Bhaji', 'Spiced vegetable mash served with buttered buns', 150.00, '../photos/pav_bhaji.png'),
        (10, 'Adana Kebab', 'A flavorful Turkish minced meat kebab', 400.00, '../photos/adana_kebab.png'),
        (11, 'Turkish Kofte', 'Delicious and tender meatballs', 300.00, '../photos/turkish_kofte.png'),
        (12, 'Chicken Shawarma', 'Succulent chicken in a flavorful wrap', 160.00, '../photos/chicken_shawarma.png'),
        (13, 'Baklava', 'Classic sweet dessert with layers of filo pastry', 450.00, '../photos/baklava.png')";

        

if ($conn->query($sql) === TRUE) 
{
    echo "New records created successfully";
} 
else
{
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>
