<?php
session_start();
require_once('../database/dbhelper.php');
//$id_user = $hoten = $username = $password = $phone = $email = $role = "";
//if (!empty($_POST['id_user'])) {
//    if (isset($_POST['id_user'])) {
//        $title = $_POST['id_user'];
//        $title = str_replace('"', '\\"', $id_user);
//    }
//    if (isset($_POST['hoten'])) {
//        $id = $_POST['hoten'];
//        $id = str_replace('"', '\\"', $hoten);
//    }
//    if (isset($_POST['username'])) {
//        $price = $_POST['username'];
//        $price = str_replace('"', '\\"', $username);
//    }
//    if (isset($_POST['password'])) {
//        $number = $_POST['password'];
//        $number = str_replace('"', '\\"', $password);
//    }
//    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
//        // Dữ liệu gửi lên server không bằng phương thức post
//        echo "Must Post Data";
//        die;
//    }
if (isset($_POST['save']) && ($_POST['save'])) {
    $name = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['pass'];
    $phone = $_POST['phone'];
    $role = $_POST['number'];
    $email = $_POST['email'];

    $sql = "update user set hoten='$name', username='$username', password='$password', phone='$phone', role='$role', email='$email' where id_user =".$_SESSION['id_user'];
    execute($sql);
    header('Location: customer.php');
}
// Kiểm tra có dữ liệu thumbnail trong $_FILES không
// Nếu không có thì dừng
//    if (!isset($_FILES["thumbnail"])) {
//        echo "Unstructured data";
//        die;
//    }
//
//    // Kiểm tra dữ liệu có bị lỗi không
//    if ($_FILES["thumbnail"]['error'] != 0) {
//        echo "Upload data error";
//        die;
//    }
//
//    // Đã có dữ liệu upload, thực hiện xử lý file upload
//
//    //Thư mục bạn sẽ lưu file upload
//    $target_dir    = "uploads/";
//    //Vị trí file lưu tạm trong server (file sẽ lưu trong uploads, với tên giống tên ban đầu)
//    $target_file   = $target_dir . basename($_FILES["thumbnail"]["name"]);
//
//    $allowUpload   = true;
//
//    //Lấy phần mở rộng của file (jpg, png, ...)
//    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
//
//    // Cỡ lớn nhất được upload (bytes) 
//    $maxfilesize   = 800000;
//
//    ////Những loại file được phép upload
//    $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');
//
//
//    if (isset($_POST["submit"])) {
//        //Kiểm tra xem có phải là ảnh bằng hàm getimagesize
//        $check = getimagesize($_FILES["thumbnail"]["tmp_name"]);
//        if ($check !== false) {
//            echo "This is an image file - " . $check["mime"] . ".";
//            $allowUpload = true;
//        } else {
//            echo "Not an image file.";
//            $allowUpload = false;
//        }
//    }
//    // Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
//    if ($_FILES["thumbnail"]["size"] > $maxfilesize) {
//        echo "Do not upload images larger than $maxfilesize (bytes).";
//        $allowUpload = false;
//    }
//
//    // Kiểm tra kiểu file
//    if (!in_array($imageFileType, $allowtypes)) {
//        echo "Only JPG, PNG, JPEG, GIF formats can be uploaded";
//        $allowUpload = false;
//    }
//
//    if ($allowUpload) {
//        // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
//        if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
//        } else {
//            echo "An error occurred while uploading the file.";
//        }
//    } else {
//        echo "Unable to upload the file, it may be because the file is large, the file type is not correct...";
//    }
//
//    if (isset($_POST['content'])) {
//        $content = $_POST['content'];
//        $content = str_replace('"', '\\"', $content);
//    }
//    if (isset($_POST['id_category'])) {
//        $id_category = $_POST['id_category'];
//        $id_category = str_replace('"', '\\"', $id_category);
//    }
//if (!empty($title)) {
//$created_at = $updated_at = date('Y-m-d H:s:i');
//// Lưu vào DB
//if ($id == '') {
//// Thêm danh mục
//$sql = 'insert into user( hoten, username, password, phone, role, email) 
//            values ( "'. $hoten . '","' . $username . '","' . $password . '","' . $phone . '","' . $role . '","' . $email . '")';
//} else {
//// Sửa danh mục
//$sql = 'update user set hoten="' . $hoten . '",username="' . $username . '",password="' . $password . '",phone="' . $phone . '",role="' . $role . '", email="' . $email . '" where id_user=' . $id_user;
//}
//execute($sql);
//header('Location: index.php');
//die();
//}


if (isset($_GET['id_user'])) {
    $id = $_GET['id_user'];
    $sql = 'select * from user where id_user=' . $id_user;
    $user = executeSingleResult($sql);
    if ($id_user != null) {
        $id_user = $user['id_user'];
        $hoten = $user['hoten'];
        $username = $user['username'];
        $password = $user['password'];
        $phone = $user['phone'];
        $role = $user['role'];
        $email = $user['email'];
//        $created_at = $product['created_at'];
//        $updated_at = $product['updated_at'];
    }
}
?>
<!DOCTYPE html>
<html>

    <head>
        <title>Add Customers</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

        <!-- summernote -->
        <!-- include summernote css/js -->
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    </head>

    <body>
        <!--    <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Statistical</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Manage categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../product/">Product Management</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Manage shopping cart</a>
                </li>
            </ul>-->
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="text-center">Add/Edit Customers</h2>
                    <?php
                    if (isset($_GET['action']) && ($_GET['action'] == 'edit')) {
                        $id = $_GET['id'];
                        $_SESSION['id_user'] = $id;
                        require_once '../database/config.php';
                        $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
                        $sql = "select * from user where id_user =" . $id;
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                            </div>
                            <div class="panel-body">
                                <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="name">Fullname:</label>
                                        <input required="true" type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $row['hoten'] ?>" >
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Username:</label>
                                        <input required="true" type="username" class="form-control" id="username" name="username" value="<?php echo $row['username'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Password:</label>
                                        <input required="true" type="password" class="form-control" id="pass" name="pass" value="<?php echo $row['password'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Phone:</label>
                                        <input required="true" type="number" class="form-control" id="phone" name="phone" value="<?php echo $row['phone'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Role:</label>
                                        <input required="true" type="number" class="form-control" id="number" name="number" value="<?php echo $row['role'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Email:</label>
                                        <input required="true" type="email" class="form-control" id="email" name="email" value="<?php echo $row['email'] ?>">
                                    </div>
                                    <input class="btn btn-success" type="submit" name="save" value="Save">
                                    <?php
                                    $previous = "javascript:history.go(-1)";
                                    if (isset($_SERVER['HTTP_REFERER'])) {
                                        $previous = $_SERVER['HTTP_REFERER'];
                                    }
                                    ?>
                                    <a href="<?= $previous ?>" class="btn btn-warning">Back</a>
                                </form>
                            </div>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>

                <?php
                if (isset($_POST['create']) && ($_POST['create'])) {
                    $name = $_POST['fullname'];
                    $username = $_POST['username'];
                    $password = $_POST['pass'];
                    $phone = $_POST['phone'];
                    $role = $_POST['number'];
                    $email = $_POST['email'];

                    $sql = "insert into user(hoten,username,password,phone,role,email) values('$name','$username','$password','$phone','$role','$email')";
//                    $ma = execute($sql);
                    require_once '../database/config.php';
                    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
                    $result = mysqli_query($conn, $sql);
                    echo '<script>alert("Add Customer Successfully")</script>';
                    echo '<script>window.location = "./customer.php";</script>';
                }
                ?>
                <?php
                if (isset($_GET['action']) && ($_GET['action'] == 'add')) {
                    ?>
                </div>
                <div class="panel-body">
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Fullname:</label>
                            <input required="true" type="text" class="form-control" id="fullname" name="fullname" >
                        </div>
                        <div class="form-group">
                            <label for="name">Username:</label>
                            <input required="true" type="username" class="form-control" id="username" name="username" >
                        </div>
                        <div class="form-group">
                            <label for="name">Password:</label>
                            <input required="true" type="password" class="form-control" id="pass" name="pass" >
                        </div>
                        <div class="form-group">
                            <label for="name">Phone:</label>
                            <input required="true" type="number" class="form-control" id="phone" name="phone" >
                        </div>
                        <div class="form-group">
                            <label for="name">Role:</label>
                            <input required="true" type="number" class="form-control" id="number" name="number" >
                        </div>
                        <div class="form-group">
                            <label for="name">Email:</label>
                            <input required="true" type="email" class="form-control" id="email" name="email" >
                        </div>
                        <input class="btn btn-success" type="submit" name="create" value="Create">
                        <?php
                        $previous = "javascript:history.go(-1)";
                        if (isset($_SERVER['HTTP_REFERER'])) {
                            $previous = $_SERVER['HTTP_REFERER'];
                        }
                        ?>
                        <a href="<?= $previous ?>" class="btn btn-warning">Back</a>
                    </form>
                </div>
            <?php } ?>
        </div>
    </div>
<!--    <script type="text/javascript">
        function updateThumbnail() {
            $('#img_thumbnail').attr('src', $('#thumbnail').val())
        }
        $(function() {
            //doi website load noi dung => xu ly phan js
            $('#content').summernote({
                height: 200
            });
        })
    </script>-->
</body>

</html>

