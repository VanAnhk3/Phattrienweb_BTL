
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Admincp</title>
</head>

<body>
    <style>
        body{
            background-color: #f2f2f2;
        }
    </style>
    <h2 class="title">Phạm Văn Anh</h2>
    <h2 class="title">Phạm Ngọc Anh</h2>
    <div class="wrapper">
    <?php
     include("connect.php");
    include("header.php");
    include("menu.php");
    include("main.php");
    include("footer.php");

    ?>
    </div>
</body>
</html>