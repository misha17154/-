<?php
session_start();
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location:http://localhost/Final_Prodject/pages/");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/ui.css">
</head>
<body>
<?php
       include_once('../component/header.php');
    ?>
    <form action="">
        <button name = "logout" value="1">Выйти</button>
    </form>

    <?php
     include_once('../component/footer.php');
    ?>
   

</body>
</html>