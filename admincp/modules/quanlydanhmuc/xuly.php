
<?php
    include("../../config/config.php");
    $tendanhmuc=$_POST["tendanhmuc"];
    $thutu=$_POST["sothutu"];
    if (isset($_POST["themdanhmuc"]))
    {
        $sql_them = "INSERT INTO bang_danh_muc(ten_danh_muc, thu_tu) VALUE('".$tendanhmuc."','".$thutu."')";
        mysqli_query($conn, $sql_them);
    }
    elseif (isset($_POST["suadanhmuc"]))
    {
        $sql_sua = "UPDATE bang_danh_muc SET ten_danh_muc='".$tendanhmuc."', thu_tu='".$thutu."' WHERE id_danh_muc='$_GET[iddm]'";
        mysqli_query($conn, $sql_sua);
    }
    else
    {
        $id = $_GET["iddm"];
        $sql_xoa = "DELETE FROM bang_danh_muc WHERE id_danh_muc = '".$id."'";
        mysqli_query($conn, $sql_xoa);
    }
    header("Location: ../../index.php?trangden=qldm&query=them");
?>