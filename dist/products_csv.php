<?php
require '../connect.php';
$filecsv = $_FILES['filecsv']['name']; /* ได้ชื่อไฟล์ */
/* ย้ายไฟล์จากตำแหน่งชั่วคราวไปเก็บไว้ในโฟลเดอร์User_csv */
move_uploaded_file($_FILES['filecsv']['tmp_name'], 'assets/products_csv/'.$filecsv);
/* เปิดไฟล์csvขึ้นมาเพื่อเข้าไปอ่านข้อมูล */
$data_csv = fopen('assets/products_csv/'.$filecsv,'r'); /* rคืออ่านข้อมูล wคือเขียนข้อมูล */
/* แยกข้อมูลในcsvออกเป็นคอลัมน์และวนลูปจนกว่าจะถึงข้อมูลสุดท้าย */
while($array_csv = fgetcsv($data_csv)){
    $pro_name = $array_csv[0];
    $pro_price = $array_csv[1];
    $pro_amount = $array_csv[2];
    $pro_status = $array_csv[3];
    $sql = "INSERT INTO products(pro_name,pro_price,pro_amount,pro_status) VALUES('$pro_name','$pro_price','$pro_amount','$pro_status')";
    $result = mysqli_query($conn, $sql);
    if(!$result){
        echo "<script>alert('ไม่สามารถบันทึกข้อมูลได้')</script>";
    }else{
        echo "<script>window.location.href='index.php?page=products'</script>";
    }
}
?>