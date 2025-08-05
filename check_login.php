<?php
 require 'connect.php';

$username = $_POST['username'];
$password = $_POST['password'];

if ($username == "" || $password == "") {
  echo "<script>
          alert('กรุณากรอก username หรือ password');
          location.href='login.php';
        </script>";
} 

  $sql = "SELECT * FROM khem WHERE username='$username' AND user_pass='$password'";
  $result = mysqli_query($conn, $sql);
  $rowcount = mysqli_num_rows($result);
  $row = mysqli_fetch_array($result);

  if ($rowcount >= 1) {
    $_SESSION['username'] = $row['username'];
    $_SESSION['fullname'] = $row['fullname'];
    header('location:dist/index.php');

  } else {
    echo "<script>
            alert('username or password invalid');
            location.href='login.php';
          </script>";
  }
?>