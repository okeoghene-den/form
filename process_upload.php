<?php
// session_start();
// // $nameErr =  "";

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//   if (empty($_SESSION["name"])) {
//     $nameErr = "Name is required";
//   } else {
//     $name = test_input($_SESSION["name"]);
//   }
// }

// // $fullname = trim($_POST['fullname']);
// $file = $_FILES['profile_picture'];
// $allowed_types = ['image/jpeg', 'image/png'];
// $max_size = 2 * 1024 * 1024; // 2MB

// // Validate file type and size
// if (
//     !in_array($file['type'], $allowed_types) ||
//     $file['size'] > $max_size
// ) {
//     echo "Invalid input or file.";
//     exit;
// }

// function test_input($data) {
//   $data = trim($data);
//   $data = stripslashes($data);
//   $data = htmlspecialchars($data);
//   return $data;
// }

// // Redirect to profile page
// header("Location: profile.php");
// exit;
session_start(); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $profile_picture = $_FILES['profile_picture'] ?? null;

    if ($name && $profile_picture && $profile_picture['error'] === UPLOAD_ERR_OK) {
        $target_dir = "uploads/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir);
        }
        $target_file = $target_dir . basename($profile_picture["name"]);
        move_uploaded_file($profile_picture["tmp_name"], $target_file);

        // Save to session
        $_SESSION['name'] = $name;
        $_SESSION['profile_picture'] = $target_file;

        // Optionally save to profiles.txt
        file_put_contents('profiles.txt', "$name: $target_file\n", FILE_APPEND);

        header("Location: profile.php");
        exit();
    } else {
        echo "File upload failed or name missing.";
    }
}
?>