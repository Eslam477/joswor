<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    wp_head();
    global $page_titel;
    ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="icon" href="<?php echo get_template_directory_uri() ?>/assets/favicon.ico">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">

    <title><?php echo get_bloginfo('name') ?></title>

</head>

<body>