<?php
if (isset($_GET['role']))
 {
    $role = $_GET['role'];

   
    if ($role == 'customer') 
    {
        header("Location: ../view/registration_form.php?role=customer");
    } elseif ($role == 'admin') 
    {
        header("Location: ../view/adminlogin.php?role=admin");
    } elseif ($role == 'user') 
    {
        header("Location: ../control/user.php?role=user");
    } 
    elseif ($role == 'rider')
    {
        header("Location: ../view/rider_reg.php?role=rider");  
    } 
    else 
    {
       
        header("Location:../view/home.php");
    }
    exit();  
} 

else 
{

    header("Location: ../view/home.php");
    exit();
}
