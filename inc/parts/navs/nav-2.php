<?php

echo '
<nav class="navbar navbar-expand-lg bg-body-tertiary main-nav">
    <div class="container-fluid">
    <a class="navbar-brand" href="' . get_home_url() . '"><img src="' . get_theme_file_uri() . '/assets/img/logo2.png" height="70"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="main_navbar collapse navbar-collapse" id="navbarNav">
        <ul class="main_menu navbar-nav">
            <li class="nav-item">
                <a href="' . site_url() . '">Home</a>
            </li>
            <li class="nav-item">
            <a href="' . site_url() . '/dashboard">Dashboard</a>
            </li>
        </ul>
    </div>
    ';

echo '  
</div>
</nav>
';
