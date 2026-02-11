<main class="pr">
<?php
    if(isset($_GET['dieuhuong'])){
        $dich = $_GET['dieuhuong'];
    }
    else{
        $dich = '';
    }if($dich=='danhmuc'){
        include('pages/danhmuc.php');
    }
    elseif($dich=='newpr'){
        include('pages/newpr.php');
    }
    elseif($dich=='hotdeals'){
        include('pages/hotdeals.php');
    }
    elseif($dich=='bestsale'){
        include('pages/bestsale.php');
    }
    elseif($dich=='hang'){
        include('pages/hang.php');
    }
    elseif ($dich == 'thanhtoan'){
        include('pages/thanhtoan.php');
    }
    else{
        include('pages/home.php');
    }
?>
</main>