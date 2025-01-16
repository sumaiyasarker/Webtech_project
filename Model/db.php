<?php

$conn = mysqli_connect('localhost', 'root', '', 'cus');

if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}





function registerCustomer($f_name, $l_name, $email, $phone, $address, $delivery_address, $password) 
{
    global $conn;

    
    $email = $conn->real_escape_string($email);
    $query = "SELECT * FROM customer WHERE email = '$email'";
    $result = $conn->query($query);//query result stored //flase

    
    if ($result && $result->num_rows > 0)
    {
        return "This email is already registered.";
    }

    
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    
    $insertUserSQL = "INSERT INTO customer (f_name, l_name, email, phone, address, delivery_address, password)
                      VALUES ('$f_name', '$l_name', '$email', '$phone', '$address', '$delivery_address', '$hashed_password')";
    
    if ($conn->query($insertUserSQL)) 
    {
        return "Registration successful";
    } 
    else 
    {
        return "Error inserting into customer: " . $conn->error;
    }
}





function verifyLogin($email, $password) 
{
    global $conn;

    
    $email = $conn->real_escape_string($email);

    
    $query = "SELECT * FROM customer WHERE email = '$email'";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) 
    {
        $user = $result->fetch_assoc();

        
        if (password_verify($password, $user['password']))
        {
            return ['success' => true, 'user' => $user]; //asso arr// key->value
        } 
        else 
        {
            return ['success' => false, 'message' => "Invalid password."];
        }
    } 
    else 
    {
        return ['success' => false, 'message' => "No account found with this email."];
    }
}


function profile($email)
 {
    global $conn;

    $email = $conn->real_escape_string($email);

    $query = "SELECT f_name FROM customer WHERE email = '$email'";

    $result = $conn->query($query);

    if ($result && $result->num_rows > 0)
     {
        $user = $result->fetch_assoc();
        return $user['f_name'];
    } 
    else
     {
        return null;
    }
}



function updatePasswordById($cus_id, $new_password) 
{
    global $conn;
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    $sql = "UPDATE customer SET password = '$hashed_password' WHERE id = $cus_id";
    return $conn->query($sql);
}

function deleteProfileById($cus_id) 
{
    global $conn;

    
    $deleteOrdersSQL = "DELETE FROM orders WHERE id = $cus_id";
    if (!$conn->query($deleteOrdersSQL)) 
    {
        return false;
    }

    
    $deleteCustomerSQL = "DELETE FROM customer WHERE id = $cus_id";
    return $conn->query($deleteCustomerSQL);
}



function getPasswordById($cus_id) 
{
    global $conn;

    $sql = "SELECT password FROM customer WHERE id = $cus_id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) 
    {
        $user = $result->fetch_assoc();
        return $user['password']; // Return the hashed password
    }
    
    return false; 
}



function getDishes() 
{
    global $conn;

    $sql = "SELECT * FROM Dishes";
    return $conn->query($sql);
}

function getDishById($dish_id)
 {
    global $conn;
    $sql = "SELECT * FROM Dishes WHERE d_id = $dish_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) 
    {
        return $result->fetch_assoc();
    }
    return null;  
}






function insertOrder($cust_id, $quantity, $price) 
{
    global $conn;
    $total_price = $price * $quantity;
    $date = date('Y-m-d');  // Current date
    $delivery_status = 'Pending';  

   $sql = "INSERT INTO orders (id, delivery_status, total_price, date) 
            VALUES ($cust_id, '$delivery_status', $total_price, '$date')";

    if ($conn->query($sql) === TRUE) 
    {
        return true;  
    } 
    else 
    {
        return false; 
    }
}


//////////////////////////////RAfi
function verifyUserLogin($email, $password) 
{
    global $conn;

    
    $email = $conn->real_escape_string($email);

    
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($query);

    
    if ($result && $result->num_rows > 0)
     {
        $user = $result->fetch_assoc();

        
        if (password_verify($password, $user['password'])) 
        {
            return ['success' => true, 'user' => $user];
        }
        
        else 
        {
            return ['success' => false, 'message' => "Invalid password."];
        }
    }
     else 
    {
        return ['success' => false, 'message' => "No account found with this email."];
    }
}



function closeCon($conn)
 {
    $conn->close();
}

?>
