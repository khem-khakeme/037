<?php
require '../connect.php';
$username = $_GET['username'];
$sql = "DELETE FROM khem WHERE username = '$username'";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo "<script>alert('Can not delete')</script>";
} else {
    echo "<script>window.location.href='index.php?page=users_list'</script>";
}
?>