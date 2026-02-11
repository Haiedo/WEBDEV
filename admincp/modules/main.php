<?php
    if(isset($_GET['trangden']) && $_GET['query']) {
        $dichden = $_GET['trangden'];
        $query = $_GET['query'];
    }
    else{
        $dichden = '';
        $query = '';
    }
    if ($dichden =='qldm' && $query == 'them') {
        include('modules/quanlydanhmuc/them.php');
        include('modules/quanlydanhmuc/thongke.php');
    }
    elseif ($dichden =='qldm' && $query == 'sua') {
        include('modules/quanlydanhmuc/sua.php');
    }
    elseif ($dichden == 'qlsp'&& $query == 'them')
    {
        include('modules/quanlysanpham/them.php');
        include('modules/quanlysanpham/thongke.php');
    }
    elseif ($dichden =='qlsp' && $query == 'sua') {
        include('modules/quanlysanpham/sua.php');
    }else{
        include('modules/home.php');
    }
?>