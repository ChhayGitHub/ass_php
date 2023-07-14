<?php
if (isset($_POST['btnDelete'])) {
    include("../../component/connection.php");
    extract($_POST);

    $sql = "delete from category where id = $id";

    $result = $con->query($sql);

    if ($result) {
        header("Location: ../category.php");
    }
}
