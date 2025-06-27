<?php
session_start();
include 'header.php';

?>
<h2>Welcome,<?php echo htmlspecialchars($_SESSION['name']) . '!'; ?></h2>
<p>Your profile picture:</p>
<img src="<?php echo htmlspecialchars($_SESSION['profile_picture']);?>"  alt="Profile Picture" style="max-width:200px;">


<pre>
    
    <ul>
        <?php
        if (file_exists('profiles.txt')) {
    $lines = file("profiles.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        list($name, $filename) = explode(':', $line, 2);
        echo "<li>" . htmlspecialchars($name) . ": <img src='" . htmlspecialchars(trim($filename)) . "' alt='profile' style='max-width:100px;'></li>";
    }
} else {
    echo "<li>No profiles saved yet.</li>";
}
// if (file_exists('profiles.txt')) {
//     echo htmlspecialchars(file_get_contents('profiles.txt'));
// } else {
//     echo "No profiles saved yet.";
// }

// if (file_exists('profiles.txt')) {
//     $lines = file("profiles.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    // foreach ($lines as $line) {
        // If your profiles.txt contains both name and filename, split them:
//        list($name, $filename) = explode(':', $line, 2);
// echo "<li>" . htmlspecialchars($profile_picture) . ": <img src='uploads/" . htmlspecialchars(trim($filename)) . "' alt='profile' style='max-width:100px;'></li>";
// list($name, $filename) = explode(':', $line, 2);
// echo "<li>" . htmlspecialchars($name) . ": <img src='uploads/" . htmlspecialchars(trim($filename)) . "' alt='profile' style='max-width:100px;'></li>";

        // If your profiles.txt contains only the filename:
// list($name, $filename) = explode(':', $line, 2);
// echo "<li>" . htmlspecialchars($name) . ":<img src='uploads/" . htmlspecialchars(trim($filename)) . "' alt='profile' style='max-width:100px;'></li>";
//     }
//  else {
//     echo "<li>No profiles saved yet.</li>";
// }
?>

    </ul>
</pre>
