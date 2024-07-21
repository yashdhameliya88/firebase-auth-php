<?php
require_once 'dbConn.php';

// Get the user ID from the query parameter
$user_id = $_GET['uid'];

// Validate the user ID to prevent SQL injection
$user_id = mysqli_real_escape_string($conn, $user_id);

// Fetch user data from the database
$query = "SELECT email, phone_number, display_name, photo_url FROM users WHERE firebase_user_id = '$user_id'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $user_data = $result->fetch_assoc();
} else {
    echo "No user data found";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <title>Code With Yash | Tricks 18</title>
    <link rel="stylesheet" href="profile.style.css" />
  </head>

  <body>
    <div class="container">
      <div class="profile">
        <img src="<?php echo $user_data['photo_url'];?>" />
        <div><a>20 </a><a>posts</a></div>
        <div><a>2,285 </a><a>followers</a></div>
        <div><a>4 </a><a>following</a></div>
      </div>
      <div class="my-title">
        <h4><?php echo $user_data['display_name'];?></h4>
        <h4><?php echo $user_data['email'];?></h4>
        <h4><?php echo $user_data['phone_number'];?></h4>
      </div>

      <!-- Pay now button start! -->
      <button onclick="payNow()">Pay Now</button>
      <!-- Pay now button end! -->

    </div>

    <!-- javascript start!-->
    <script>
      function payNow() {
        location.href = "https://rzp.io/i/QcY4aV4v";
      }
    </script>
    <!-- javascript end!-->
  </body>
</html>