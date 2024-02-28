<?php
include '../koneksi.php';

// Check if the 'id' parameter is set in the URL
if(isset($_GET['id'])){
    $id_user = $_GET['id'];

    // Delete data from the database
    $result = mysqli_query($mysqli, "DELETE FROM user WHERE id_user = '$id_user'");

    // Check if the delete operation was successful
    if($result) {
        echo '<script>alert("User has been deleted successfully.");</script>';
    } else {
        echo '<script>alert("Failed to delete user. Please try again.");</script>';
    }

    // Redirect back to the user data page
    header('Location: user.php');
    exit;
} else {
    // Redirect to the user data page if 'id' parameter is not set
    header('Location: user.php');
    exit;
}
?>
