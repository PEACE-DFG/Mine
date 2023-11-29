<?php
require 'database/database.php';

// Function to display SweetAlert
function displaySweetAlert($icon, $title, $text) {
    echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
        <script>
            Swal.fire({
                icon: '$icon',
                title: '$title',
                text: '$text',
            });
        </script>";
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the email and new password are set
    if (isset($_SESSION['email']) && isset($_POST['new_password'])) {
        $email = $_SESSION['email'];
        $newPassword = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

        // SQL query to update the password
        $updatePasswordSQL = "UPDATE lms SET password = '$newPassword' WHERE email = '$email'";
        
        if ($conn->query($updatePasswordSQL) === TRUE) {
            echo "Password updated successfully";
        } else {
            echo "Error updating password: " . $conn->error;
        }
    } else {
        echo "Email or new password not provided.";
    }

    // Check if an image is uploaded
    if (isset($_FILES['profile_picture'])) {
        $targetDirectory = "uploads/";  // Change this to the directory where you want to store the uploaded images
        $targetFile = $targetDirectory . uniqid() . '_' . basename($_FILES['profile_picture']['name']);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if the file is an actual image
        if (getimagesize($_FILES['profile_picture']['tmp_name']) === false) {
            displaySweetAlert('error', 'Oops...', 'File is not an image.');
            $uploadOk = 0;
        }

        // Check file size (adjust as needed)
        if ($_FILES['profile_picture']['size'] > 500000) {
            displaySweetAlert('warning', 'Oops...', 'Sorry, the file is too large.');
            $uploadOk = 0;
        }

        // Allow certain file formats
        $allowedExtensions = array("jpg", "jpeg", "png", "gif");
        if (!in_array($imageFileType, $allowedExtensions)) {
            displaySweetAlert('error', 'Oops...', 'Sorry, only JPG, JPEG, PNG, and GIF files are allowed.');
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk === 0) {
            displaySweetAlert('error', 'Oops...', 'Sorry, your file was not uploaded.');
        } else {
            // Check if the user already has an image in the database
            $userIdQuery = "SELECT id FROM lms WHERE email = '$email'";
            $userIdResult = $conn->query($userIdQuery);

            if ($userIdResult->num_rows > 0) {
                $userIdRow = $userIdResult->fetch_assoc();
                $userId = $userIdRow['id'];

                // Check if the user already has an image record
                $existingImageQuery = "SELECT * FROM user_images WHERE user_id = $userId";
                $existingImageResult = $conn->query($existingImageQuery);

                if ($existingImageResult->num_rows > 0) {
                    // Update the existing image record
                    $updateImageSQL = "UPDATE user_images SET image_path = '$targetFile' WHERE user_id = $userId";
                    if ($conn->query($updateImageSQL) === TRUE) {
                        displaySweetAlert('success', 'Success!', 'Information inserted into the database.');
                    } else {
                        echo "Error updating existing image: " . $conn->error;
                    }
                } else {
                    // Insert image information into the user_images table
                    $insertImageSQL = "INSERT INTO user_images (user_id, image_path) VALUES ($userId, '$targetFile')";
                    if ($conn->query($insertImageSQL) === TRUE) {
                        displaySweetAlert('success', 'Success!', 'Information inserted into the database.');

                        // Fetch the user's image path for display
                        $userImageQuery = "SELECT ui.image_path FROM user_images ui WHERE ui.user_id = $userId";
                        $userImageResult = $conn->query($userImageQuery);

                        if ($userImageResult->num_rows > 0) {
                            $userImageRow = $userImageResult->fetch_assoc();
                            $userImagePath = $userImageRow['image_path'];

                            // Display the user's image path (you can store it in a variable for later use)
                            echo "User's Image Path: $userImagePath";
                        } else {
                            // Display a message indicating that the user doesn't have an existing image
                            echo "User doesn't have an existing image.";
                        }
                    } else {
                        echo "Error inserting image information: " . $conn->error;
                    }
                }
            }
            
            // Try to upload the file
            if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $targetFile)) {
                echo "The file " . htmlspecialchars(basename($_FILES['profile_picture']['name'])) . " has been uploaded.";
            } else {
                displaySweetAlert('error', 'Oops...', 'Sorry, there was an error uploading your file.');
            }
        }
    }
}

// Close connection
$conn->close();
?>