<?php
function user_auth_pages_link()
{
    $if_logout = '
        <span>
            <a href="' . SITE_URL . '/login' . '" class="nav-link">Login</a>
        </span>
    ';

    $if_login = '
        <div>
            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                My Account
            </button>
            <ul class="dropdown-menu">
                <li>
                    <a href="' . esc_url(add_query_arg('p', 'status', site_url('/student-dashboard/'))) . '" class="dropdown-item">Dashboard</a>
                </li>
                <li>
                    <form action="' . get_template_directory_uri() . '/actions.php" method="post">
                        <input type="hidden" value="0QK8hkHIct3GhxVw" name="acthion_id">
                        <button class="dropdown-item" type="submit">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    ';
    if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
        $value = $if_login;
    } else {
        $value = $if_logout;
    }

    return $value;
}

echo '
<nav class="navbar navbar-expand-lg bg-body-tertiary main-nav">
    <div class="container-fluid">
    <a class="navbar-brand" href="' . get_home_url() . '"><img src="' . get_theme_file_uri() . '/assets/img/logo2.png" height="70"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>';

wp_nav_menu([
    'theme_location' => 'L1',
    'container' => 'div',
    'container_class' => 'main_navbar collapse navbar-collapse',
    'container_id' => 'navbarNav',
    'menu_class' => 'main_menu navbar-nav'
]);

echo '  
<div class="user_auth_pages_link">
' .  user_auth_pages_link() . '
</div>
</div>
</nav>
';
// var_dump($_SESSION);
