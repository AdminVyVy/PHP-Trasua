<?php
require_once('..database/dbhelper.php');
?>
<?php
if (isset($POST['id_user'])) {
    $id = $POST['id_user'];


$sql = 'delete from user where id_user=' . $id;
execute($sql);
header('Location: customer.php');
die();
}

?>