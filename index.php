<?php

    require_once __DIR__ . '/bootstrap.php';
    require_once __DIR__ . '/navbar.php';

    //Render view
    echo $twig->render('index.html', ['foodTypes' => $foodTypes]);

?>