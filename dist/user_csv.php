<?php
require '../connect.php';
$filecsv = $_FILES['filecsv']['name']; //ได้ชื่อไฟล์
//ย้ายไฟล์จากตำแหน่งชั่วคราวไปเก็บในโฟลเดอร์ assets/user_csv/
move_uploaded_file($_FILES['filecsv']['tmp_name'], 'assets/user_csv/' . $filecsv);
//เปิดไฟล์ csv อ่านเท่านั้นไปอ่านข้อมูลข้างใน
$data_csv = fopen('assets/user_csv/' . $filecsv, 'r');
//แยกข้อมูลใน csv ออกเป็นคอลัมน์ และ insert ข้อมูลลงใน database วนลูปจนถึงบรรทัดสุดท้าย
while ($array_csv = fgetcsv($data_csv)) {
    $username = $array_csv[0];
    $password = $array_csv[1];
    $fullname = $array_csv[2];
    $phone = $array_csv[3];
    $email = $array_csv[4];
    $sql = "INSERT INTO khem(username,user_pass,fullname,phone,email) VALUES('$username','$password','$fullname','$phone','$email')";
    $result = $conn->query($sql);
    if (!$result) {
        echo "<script>alert('ไม่สามารถบันทึกข้อมูลได้')</script>";
    } else {
        echo "<script>window.location.href='index.php?page=users_list'</script>";
    }
}