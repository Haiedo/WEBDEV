
<?php
    include("../../config/config.php");
    $tensanpham = $_POST["tensanpham"];
    $masanpham = $_POST["masanpham"];
    $gia = $_POST["giasp"];
    $soluong = $_POST["soluong"];

    $hinhanh= $_FILES["hinhanh"]["name"];
    $hinhanh_tmp = $_FILES["hinhanh"]["tmp_name"];


    $tomtat = $_POST["tomtat"];
    $mota = $_POST["mota"];
    $tinhtrang = $_POST["tinhtrang"];
    $iddanhmuc = $_POST["iddanhmuc"];

    if (isset($_POST["themsanpham"]))
    {
        $hinhanh = time().'_'.$hinhanh;
        $sql_them = "INSERT INTO bang_san_pham(ten_san_pham, ma_san_pham, gia, so_luong, hinh_anh, tom_tat, noi_dung, tinh_trang, id_danh_muc) 
        VALUE('".$tensanpham."','".$masanpham."', '".$gia."', '".$soluong."', '".$hinhanh."', '".$tomtat."', '".$mota."', '".$tinhtrang."',  '".$iddanhmuc."')";
        mysqli_query($conn, $sql_them);
        move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
    }
    elseif (isset($_POST["suasanpham"]))
    {
        if ($hinhanh !="")
        {
            move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
            $sql = "SELECT * FROM bang_san_pham WHERE id_san_pham = '$_GET[idsp]' LIMIT 1";
            $query = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($query))
            {
                unlink('uploads/'.$row['hinh_anh']);
            }
            $sql_sua = "UPDATE bang_san_pham SET ten_san_pham='".$tensanpham."', ma_san_pham='".$masanpham."', gia = '".$gia."'
            , so_luong = '".$soluong."', hinh_anh = '".$hinhanh."', tom_tat = '".$tomtat."', noi_dung = '".$mota."'
            , tinh_trang = '".$tinhtrang."', id_danh_muc = '".$iddanhmuc."' WHERE id_san_pham='$_GET[idsp]'";
        }
        else
        {
            $hinhanh = time().'_'.$hinhanh;
            $sql_sua = "UPDATE bang_san_pham SET ten_san_pham='".$tensanpham."', ma_san_pham='".$masanpham."', gia = '".$gia."'
            , so_luong = '".$soluong."', tom_tat = '".$tomtat."', noi_dung = '".$mota."'
            , tinh_trang = '".$tinhtrang."', id_danh_muc = '".$iddanhmuc."' WHERE id_san_pham='$_GET[idsp]'";
        }
        mysqli_query($conn, $sql_sua);
    }
    else
    {
        $id = $_GET["idsp"];
        $sql = "SELECT * FROM bang_san_pham WHERE id_san_pham = '$id' LIMIT 1";
        $query = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($query))
        {
            unlink('uploads/'.$row['hinh_anh']);
        }
        $sql_xoa = "DELETE FROM bang_san_pham WHERE id_san_pham = '".$id."'";
        mysqli_query($conn, $sql_xoa);
    }
    header("Location: ../../index.php?trangden=qlsp&query=them");
?>