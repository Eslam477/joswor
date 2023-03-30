<?php


if (!defined("SITE_URL")) {
    define("SITE_URL", site_url());
}
function dir_is_empty($dir)
{
    $handle = opendir($dir);
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
            closedir($handle);
            return false;
        }
    }
    closedir($handle);
    return true;
}

function set_alert($a = 's', $msg)
{
    $_SESSION['joswor_alert_' . $a] = $msg;
}
function show_alert()
{
    if (isset($_SESSION['joswor_alert_s']) && $_SESSION['joswor_alert_s'] != '') {
        echo '
        <div class="alert alert-success m-3" role="alert">
            ' . $_SESSION['joswor_alert_s'] . '
        </div>
        ';
    }
    if (isset($_SESSION['joswor_alert_d']) && $_SESSION['joswor_alert_d'] != '') {
        echo '
        <div class="alert alert-danger m-3" role="alert">
            ' . $_SESSION['joswor_alert_d'] . '
        </div>
        ';
    }
    unset_alert();
}
function unset_alert()
{
    $_SESSION['joswor_alert_s'] = '';
    $_SESSION['joswor_alert_d'] = '';
}

function DB_setup()
{
    global $wpdb;
    $wpdb->show_errors();
    $table_name = $wpdb->prefix . 'joswor_requests';
    $query_requests = '
    CREATE TABLE IF NOT EXISTS ' . $table_name . '(
        id int NOT NULL AUTO_INCREMENT,
        student_id int NOT NULL,
        checking varchar(10) NOT NULL DEFAULT "false",
        studyCountrt  varchar(50),
        department  varchar(50),
        university  varchar(50),
        language  varchar(5),
        BIOMETRIC_img  varchar(20) NOT NULL,
        PASSPORT_img  varchar(20) NOT NULL,
        OTHER_img  varchar(20) NOT NULL,
        note  varchar(255),
        PRIMARY KEY(id)
        )';
    $table_name = $wpdb->prefix . 'joswor_students';

    $query_students = '
        CREATE TABLE IF NOT EXISTS ' . $table_name . '(
            id int NOT NULL AUTO_INCREMENT,
            userName varchar(100) UNIQUE,
            email varchar(40),
            phone varchar(25),
            password varchar(200),
            firstName  varchar(200),
            fatherName  varchar(200),
            familyName  varchar(200),
            motherName  varchar(200),
            language  varchar(5),
            nationality  varchar(50),
            residence  varchar(50),
            degree  varchar(20),
            status varchar(50),
            PRIMARY KEY(id)
            )';

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($query_requests);
    dbDelta($query_students);
}
function session_setup()
{
    session_start();
}
function js_setup()
{
    $myThemeParams = [
        'home_URL' => home_url(),
        'COOKIEPATH' => COOKIEPATH,
    ];
    echo '
        <script>
            var themeParams =  ' . wp_json_encode($myThemeParams) . ' 
        </script>
    ';
}

function pages_setup()
{
    $pages = ['about us', 'blog', 'dashboard', 'home', 'login', 'register', 'signup', 'student dashboard'];

    foreach ($pages as $page) {
        if (!post_exists($page)) {
            wp_insert_post([
                'post_title' => $page,
                'post_type' => 'page',
                'post_status' => 'publish'
            ]);
        }
    }
}

add_action('init', 'DB_setup');
add_action('init', 'session_setup');
add_action('init', 'pages_setup');

// add_action('template_redirect', 'unset_alert');
