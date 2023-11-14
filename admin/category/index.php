<?php
require_once('../../database/dbhelper.php');
?>
<!DOCTYPE html>
<html>

    <head>
        <title>Category Management</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </head>

    <body>
<!--        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="../index.php">Statistical</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="../category/">Manage categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../product/">Product Management</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../dashboard.php">Manage shopping cart</a>
            </li>
        </ul>-->
           <div id="wrapper">
          
            <!-- END HEADR -->
            <main style="padding-bottom: 4rem;">
                <section class="cart">
                    <div class="container-top">
                        <div class="panel panel-primary">
                            <div class="panel-heading" style="padding: 1rem 0;">
<ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Statistical</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../product/">Product Management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../customer/customer.php">Customer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="../category/index.php">Directory Management</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="../dashboard.php">Manage shopping cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../contact.php">Contact</a>
                    </li>
        
                </ul>
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="text-center">Manage categories</h2>
                </div>
                <div class="panel-body"></div>
                <a href="add.php">
                    <button class=" btn btn-success" style="margin-bottom:20px">Add Category</button>
                </a>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <td width="70px">Numerical order</td>
                            <td>Name list</td>
                            <td width="50px"></td>
                            <td width="50px"></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Lấy danh sách danh mục
                        $sql = 'select * from category';
                        $categoryList = executeResult($sql);
                        $index = 1;
                        foreach ($categoryList as $item) {
                            echo '  <tr>
                    <td>' . ($index++) . '</td>
                    <td>' . $item['name'] . '</td>
                    <td>
                        <a href="add.php?id=' . $item['id'] . '">
                            <button class=" btn btn-warning">Edit</button> 
                        </a> 
                    </td>
                    <td>            
                    <button class="btn btn-danger" onclick="deleteCategory(' . $item['id'] . ')">Delete</button>
                    </td>
                </tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function deleteCategory(id) {
            var option = confirm('Are you sure you want to delete this category?')
            if (!option) {
                return;
            }
            console.log(id)
            $.post('ajax.php', {
                'id': id,
                'action': 'delete'
            }, function (data) {
                location.reload()
            })
        }
    </script>
</body>

</html>