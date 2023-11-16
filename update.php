<?php
// Assuming you have a database connection established

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the user is logged in and get the user's ID
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];

        // Handle password update
        if (!empty($_POST['new_password'])) {
            $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
            mysqli_query($conn, "UPDATE codemaster.lms SET password = '$new_password' WHERE id = $user_id");
        }

        // Handle profile picture upload if a file is selected
        if ($_FILES['profile_picture']['error'] == 0) {
            $uploadDir = 'uploads/'; // specify the directory where you want to store uploaded profile pictures
            $uploadFile = $uploadDir . basename($_FILES['profile_picture']['name']);

            // Move the uploaded file to the specified directory
            if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $uploadFile)) {
                // Update the profile picture file path in the lms table
                $profilePicturePath = mysqli_real_escape_string($conn, $uploadFile);
                mysqli_query($conn, "UPDATE codemaster.lms SET profile_picture = '$profilePicturePath' WHERE id = $user_id");
            } else {
                echo "Error uploading file.";
            }
        }

        // Close the database connection (if needed, depending on your overall structure)
        // mysqli_close($conn);
    } else {
        echo "User not logged in.";
    }
}
?>