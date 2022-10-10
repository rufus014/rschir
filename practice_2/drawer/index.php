<!DOCTYPE html>
<html lang="en">
<head>
    <title>Drawer</title>
</head>
<body>
    <?php 
        require 'drawer.php';
        if ($_GET['num'] == 1){
            echo circle();
        } elseif ($_GET['num'] == 2){
            echo star();
        }
    ?>
</body>
</html>