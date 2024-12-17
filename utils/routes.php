<?php

// $router->define([
//     ''=>'controllers/index.php',
//     'about'=>'controllers/about.php',
//     'blog'=>'controllers/blog.php',
//     'contact'=>'controllers/contact.php',
//     'galeria'=>'controllers/galeria.php',
//     'partners'=>'controllers/partners.php',
//     'post'=>'controllers/single_post.php'
//     ])

$router->get([
    '' => '../controllers/index.php',
    'index'=> '../controllers/index.php',
    'about' => '../controllers/about.php',
    'blog' => '../controllers/blog.php',
    'contact' => '../controllers/contact.php',
    'galeria' => '../controllers/galeria.php',
    'partners' => '../controllers/partners.php',
    'single_post' => '../controllers/single_post.php'
]);

$router->post('gallery_new', '../controllers/gallery_new.php');

?>