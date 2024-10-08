<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sale</title>
    <link rel="stylesheet" href="../styles/ui.css">
    <link rel="stylesheet" href="../styles/sale.css">
</head>
<body>
<?php
     include_once('../component/header.php');
    ?>

        <h2 id="Sale">Акции</h2>

        <div class="category_names">
            
             <div class="Sale_name">  
        <a href="Sale-list.html">Скидка в ДЕНЬ РОЖДЕНИЯ (неделя до/после)</a> 
        <img src="../Img/Торт.png" alt=""> 
        </div>
        </div>
       
        <div class="category_names-2">

             <div class="Sale_name-2">  
            <p>Распродажа до — 30%</p> 
            <img src="../Img/сигвей.png" alt=""> 
            </div>

            <div class="Sale_name-2">  
                <p>Распродажа до — 50%</p> 
                <img src="../Img/percent.png" alt=""> 
                </div>

                <div class="Sale_name-2">  
                    <p>Неделя смарт часов</p> 
                    <img src="../Img/smart wath.png" alt=""> 
                    </div>

                    <div class="Sale_name-2">  
                        <p>Распродажа до — 50%</p> 
                        <img src="../Img/percent.png" alt=""> 
                        </div>

                        <div class="Sale_name-2">  
                            <p>Неделя смарт часов</p> 
                            <img src="../Img/smart wath.png" alt=""> 
                            </div>

                            <div class="Sale_name-2">  
                                <p>Smart Balance Premium по специальной цене</p> 
                                <img src="../Img/Smart Balance.png" alt=""> 
                                </div>

                                
                                     <div class="Sale_name-2">  
                                    <p>Smart Balance Premium по специальной цене</p> 
                                    <img src="../Img/Smart Balance.png" alt=""> 
                                     </div>
        </div>
       
        <?php
    include_once('../component/footer.php');
    ?>

</body>
</html>