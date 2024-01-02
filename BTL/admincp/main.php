<div class="clear"></div>
<div class="main">
    <?php
    if (isset($_GET['action']) && isset($_GET['query'])) {
        $tam = $_GET['action'];
        $query = $_GET['query'];
    } else {
        $tam = '';
        $query = '';
    }

    if ($tam == 'quanlydanhmucsanpham') {
        if ($query == 'them') {
            include("quanlydanhmucsanpham/them.php");
            include("quanlydanhmucsanpham/lietke.php");
        } elseif ($query == 'sua') {
            include("quanlydanhmucsanpham/sua.php");
        }
    } elseif ($tam == 'quanlysp') {
        if ($query == 'them') {
            include("quanlysp/them.php");
            include("quanlysp/lietke.php");
        } elseif ($query == 'sua') {
            include("quanlysp/sua.php");
        }
    } else {
        include("dashboard.php");
    }
    ?>
</div>
