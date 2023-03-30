<?php
if (isset($_COOKIE['user'])) {
    wp_redirect(get_site_url());
    die;
}
?>
<?php get_header(); ?>
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
        <h2>Create an account</h2>
        <input type="hidden" value="1OU69fnTP5DyNCRY" name="acthion_id">
        <input type="text" class="btn form-control" placeholder="User" name='user'>
        <input type="email" class="btn form-control" placeholder="Email" name='email'>
        <input type="password" class="btn form-control" placeholder="Password" name="password">
        <input type="tel" class="btn form-control" placeholder="Phone" name="phone">
        <button type="submit" class="btn">Sign Up</button>
    </form>
</section>


<?php get_footer() ?>