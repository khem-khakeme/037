<?php
require '../connect.php';
if (isset($_POST['save'])) {
    $pro_name = $_POST['proname'];
    $pro_price = $_POST['proprice'];
    $pro_amount = $_POST['proamount'];
    $pro_status = $_POST['prostatus'];
    if (empty($pro_name) || empty($pro_price) || empty($pro_amount) || empty($pro_status)) {
        echo "<script>alert('Please enter all data');history.back();</script>";
    } else {
        $exit_proname = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM products"));
        if ($pro_name == $exit_proname['pro_name']) {
            echo "<script>alert('id นี้มีผู้ใช้งานไปแล้ว');history.back();</script>";
        } else {
            $sql = "INSERT INTO products(pro_name,pro_price,pro_amount,pro_status) VALUES('$pro_name','$pro_price','$pro_amount','$pro_status')";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                echo "<script>alert('บันทึกข้อมูลผิดพลาด');history.back();</script>";
            } else {
                echo "<script>window.location.href='index.php?page=products'</script>";
            }
        }
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
                <h3 class="mb-0">Add Products</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">add_products</li>
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
                        <div class="card-title">Add products</div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Form-->
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                        <!--begin::Body-->
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">ชื่อสินค้า</label>
                                <input type="text" name="proname" class="form-control"
                                    id="exampleInputPassword1" />
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">ราคา</label>
                                <input type="text" name="proprice" class="form-control" id="exampleInputPassword1" />
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">จำนวนสินค้า</label>
                                <input type="text" name="proamount" class="form-control" id="exampleInputPassword1" />
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Status</label>
                                <input type="text" name="prostatus" class="form-control" id="exampleInputPassword1" />
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