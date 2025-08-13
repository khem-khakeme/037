<?php
require '../connect.php';
$pro_id = $_GET["pro_id"];
//นำข้อมูลเดิมมาจากdatabase
$sql = "SELECT * FROM products WHERE pro_id='$pro_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if (isset($_POST['save'])) {//ถ้ามีการกดปุ่ม save ให้ทำคำสั่งต่อไปนี้ 
    $pro_id = $_POST['pro_id'];
    $pro_name = $_POST['pro_name'];
    $pro_price = $_POST['pro_price'];
    $pro_amount = $_POST['pro_amount'];
    $pro_status = $_POST['pro_status'];
    
    if (!empty($_FILES['product_img']['name'])) {
        $filename = $_FILES['product_img']['name']; /* อัปรูปใหม่ */
        move_uploaded_file($_FILES['product_img']['tmp_name'],'assets/product_img/' .$filename);
    } else {
        $filename = $row['image'];
    }
    $sql = "UPDATE products SET pro_id='$pro_id' , pro_name='$pro_name' , pro_price='$pro_price' , pro_amount='$pro_amount' , pro_status='$pro_status' , image='$filename' WHERE pro_id='$pro_id'";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo "<script>alert('บันทึกข้อมูลผิดพลาด');history.back();</script>";
    } else {
        echo "<script>window.location.href='index.php?page=products'</script>";
    }
}
?>

<!--begin::App Content Header-->
<div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Edit Products</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">edit_products</li>
                </ol>
            </div>
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
<!--end::App Content Header-->
<!--begin::App Content-->
<div class="app-content">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row g-4">
            <!--begin::Col-->
            <div class="col-md-12">
                <!--begin::Quick Example-->
                <div class="card card-primary card-outline mb-4">
                    <!--begin::Header-->
                    <div class="card-header bg-primary text-white">
                        <div class="card-title">Edit Products</div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Form-->
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                        <!--begin::Body-->
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Products</label>
                                <input type="text" name="pro_id" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="<?php echo $row['pro_id'] ?>" readonly />
                                <div id="emailHelp" class="form-text">
                                    Products ID ต้องไม่ซ้ำ
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">ชื่อสินค้า</label>
                                <input type="text" name="pro_name" class="form-control" id="exampleInputPassword1"
                                    value="<?php echo $row['pro_name'] ?>" />
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">ราคา</label>
                                <input type="text" name="pro_price" class="form-control" id="exampleInputPassword1"
                                    value="<?php echo $row['pro_price'] ?>" />
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">จำนวนสินค้า</label>
                                <input type="text" name="pro_amount" class="form-control" id="exampleInputPassword1"
                                    value="<?php echo $row['pro_amount'] ?>" />
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Status</label>
                                <input type="text" name="pro_status" class="form-control" id="exampleInputPassword1"
                                    value="<?php echo $row['pro_status'] ?>" />
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">รูปภาพเดิม</label>
                                <img src="assets/product_img/<?php echo $row['image'] ?>" alt="" class="mb-3" width="150">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">รูปภาพใหม่</label>
                                <input type="file" name="product_img" class="form-control">
                            </div>
                        </div>
                        <!--end::Body-->
                        <!--begin::Footer-->
                        <div class="card-footer">
                            <button type="submit" name="save" class="btn btn-primary">บันทึกข้อมูล</button>
                        </div>
                        <!--end::Footer-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Quick Example-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>