
<?php require_once('layout/header.php'); ?>
<?php
session_start();
require_once('database/config.php');
require_once('database/dbhelper.php');
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
</head>
<style>

    form {
        display: flex;
        flex-flow: column;
        justify-content: center;
        align-items: center;
    }

    .form-group {
        padding: 10px;
        width: 650px;
    }

    .form-group input {
        padding: 5px 0;
        width: 100%;
    }

    textarea {
        width: 100%;
    }

    button {
        padding: 10px 50px;
        border-radius: 5px;
        color: white;
        background-color: red;
        border: none;
        outline: 0;
    }

    button:hover {
        opacity: 0.7;
        cursor: pointer;
    }

    center {
        font-size: 20px;
        font-weight: bold;
        color: green;
        padding: 20px;
    }
</style>

<body>
    <?php
                if (isset($_GET['action']) && ($_GET['action'] == 'add')) {
                    ?>
               
    <h2 style="text-align: center;">Please contact us if you have problems on the Website</h2>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
        <div class="form-group">
            <label>Your name:</label>
            <input required="true" type="text" class="form-control" name="fullname" required="required" />
        </div>
        <div class="form-group">
            <label>Send to gmail:</label>
            <input required="true" type="email" class="form-control" name="sendto" required="required" />
        </div>
        <div class="form-group">
            <label>Email Name:</label>
            <input required="true" type="email" class="form-control" name="email" required="required" />
        </div>
        <div class="form-group">
            <label>Email content:</label>
            <textarea required="true"  name="contact" id="" cols="30" rows="10"></textarea>
        </div>
        <input class="btn btn-danger" type="submit" value="send" name="send">
    </form>
                <?php } ?>
    <?php
    //nhúng thư viện vào để dùng
//    require "PHPMailer-master/src/PHPMailer.php";
//    require "PHPMailer-master/src/SMTP.php";
//    require 'PHPMailer-master/src/Exception.php';

    if (isset($_POST['send']) && ($_POST['send'])) {
        $fullname = $_POST['fullname']; // lấy ra tên của bạn
        $sendto = $_POST['sendto']; // Email cần gửi đến
        $email = $_POST['email']; // Tiêu đề email
        $contact = $_POST['contact']; // Nội dung email
          //true: cho phép các trường hợp ngoại lệ
         
//                if (isset($_POST['create']) && ($_POST['create'])) {
//                    $title = $_POST['title'];
//                    $price = $_POST['price'];
//                    $number = $_POST['number'];
//                    $thumbnail = $_POST['thumbnail'];
//                    $content = $_POST['content'];
//                    $id_category = $_POST['id_category'];

                    $sql = "insert into contact(fullname,sendto,email,contact) values('$fullname','$sendto','$email','$contact')";
                    $result = execute($sql);
//                    require_once '../database/config.php';
//                    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
//                    $result = mysqli_query($conn, $sql);
//                    echo '<script>alert("Add Product Successfully")</script>';
//                    echo '<script>window.location = "./index.php";</script>';
                }?>
                

       
    
</body>

                <?php require_once('layout/footer.php'); ?>


</html>