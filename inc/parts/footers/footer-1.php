<footer>
    <div class="J_footer">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <h3><b>About Us</b></h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus iusto natus neque aliquid qui saepe quam autem reprehenderit, dignissimos voluptatibus.</p>
                    <a class="navbar-brand" href="<?php echo get_home_url() ?>"><img src="<?php echo get_theme_file_uri() ?>/assets/img/logo2.png" height="200"></a>
                </div>
                <div class="col-4">
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'L2',
                        'container' => 'div',
                        'container_class' => 'main_navbar collapse navbar-collapse',
                        'container_id' => 'navbarNav',
                        'menu_class' => 'main_menu navbar-nav'
                    ]);
                    ?>
                </div>
                <div class="col-4">
                    <?php
                    if (is_user_logged_in()) {
                        echo '
                    <ul>
                        <li><a href="' . site_url() . '/dashboard/">Dashboard</a></li>
                    </ul>
                ';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="auther">
    <div class="container">
        <div class="row">
            <div class="col-10">
                <p>
                    copyright &copy;2023 All rights reserved | This templat is made by E477
                </p>
            </div>
            <div class="col-2">
                <a href="https://www.facebook.com/EslamE477" target="_blank"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/eslam_477_e" target="_blank"><i class="bi bi-instagram"></i></a>
                <a href="https://twitter.com/EElnemery" target="_blank"><i class="bi bi-twitter"></i></a>
                <a href="https://www.linkedin.com/in/samex-e477" target="_blank"><i class="bi bi-linkedin"></i></a>
            </div>
        </div>
    </div>
</div>