<?php
if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
    wp_redirect(get_site_url());
    die;
}
get_header();
?>
<style>
    body {
        margin: auto;
        font-family: -apple-system, BlinkMacSystemFont, sans-serif;
        overflow: auto;
        background: linear-gradient(315deg, rgba(250, 223, 123, 1) 0%, rgba(83, 104, 65, 1) 100%);
        animation: gradient 15s ease infinite;
        background-size: 400% 400%;
        background-attachment: fixed;
        overflow: hidden;
    }

    @keyframes gradient {
        0% {
            background-position: 0% 0%;
        }

        50% {
            background-position: 100% 100%;
        }

        100% {
            background-position: 0% 0%;
        }
    }

    .wave {
        background: rgb(255 255 255 / 25%);
        border-radius: 1000% 1000% 0 0;
        position: fixed;
        width: 200%;
        height: 12em;
        animation: wave 10s -3s linear infinite;
        transform: translate3d(0, 0, 0);
        opacity: 0.8;
        bottom: 0;
        left: 0;
        z-index: -1;
    }

    .wave:nth-of-type(2) {
        bottom: -1.25em;
        animation: wave 18s linear reverse infinite;
        opacity: 0.8;
    }

    .wave:nth-of-type(3) {
        bottom: -2.5em;
        animation: wave 20s -1s reverse infinite;
        opacity: 0.9;
    }

    @keyframes wave {
        2% {
            transform: translateX(1);
        }

        25% {
            transform: translateX(-25%);
        }

        50% {
            transform: translateX(-50%);
        }

        75% {
            transform: translateX(-25%);
        }

        100% {
            transform: translateX(1);
        }
    }
</style>
<div>
    <div class="wave"></div>
    <div class="wave"></div>
    <div class="wave"></div>
</div>
<section class="login_section text-center">
    <form action="<?php echo get_template_directory_uri() ?>/actions.php" method="post" class="p-5">
        <?php
        if (isset($_SESSION['joswor_error']) && $_SESSION['joswor_error'] == 'loginError') {
            echo '
            <div class="alert alert-danger" role="alert">
                Something seems to be wrong.<br>
                Ensure that the user and password are correct.
            </div>
            ';
            $_SESSION['joswor_error'] = null;
        }

        if (isset($_SESSION['registration_done']) && $_SESSION['registration_done'] == 'yes') {
            echo '
            <div class="alert alert-success" role="alert">
                successfully registered.<br>
                You can login now.
            </div>
            ';
            $_SESSION['registration_done'] = null;
        }
        ?>
        <h2>Welcome Back</h2>
        <input type="hidden" value="ya6r4o6ZKpJ1u80k" name="acthion_id">
        <input type="text" class="btn form-control" placeholder="User" name='user'>
        <input type="password" class="btn form-control" placeholder="Password" name="password">
        <button type="submit" class="btn w-100">Login</button>
        <a href="<?php echo site_url() . '/signup'; ?>">Create a new account</a>
    </form>
</section>


<?php get_footer() ?>