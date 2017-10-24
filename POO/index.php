<?php

require_once 'factory.php';

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
    
        <main>
            <div class="container">
                <h2>Test Connexion avec POO</h2>
                
            </div>

             <?php
        		$essai1 = new factory;
        		$essai1->getConnection("essai1");
        		$essai2 = new factory;
        		$essai2->getConnection("essai2");
    		?>

        </main>

    </body>
</html>

