<?php
if (!(isset($_SESSION['user']) && !empty($_SESSION['user']))) {
    wp_redirect('login');
    die;
}
get_header();
get_template_part('inc/parts/navs/nav', '1');


$page_format = $_GET['p'];
global $wpdb;
$student_data = $wpdb->get_results('SELECT * FROM ' . $wpdb->prefix . 'joswor_students WHERE userName = "' . $_SESSION['user'] . '"')[0];

$status_color = '';
$status_titel = '';
switch ($student_data->status) {
    case 'L1':
        $status_color = 'success';
        $status_titel = 'Ok';
        $is_account_active = true;
        break;
    case 'L2':
        $status_color = 'warning';
        $status_titel = 'Not enabled';
        $is_account_active = false;
        break;
}


function render_countries($x)
{
    global $countries;
    foreach ($countries as $country) {
        if ($country == $x) {
            $selected = 'selected';
        } else {
            $selected = '';
        }
        echo '<option value="' .  $country . '" ' . $selected . '>' . $country . '</option>';
    }
}
function status_page()
{
    global $student_data;
?>
    <div>
        <form action="<?php echo get_template_directory_uri() ?>/actions.php" method="post" id="status_page_form">
            <input type="hidden" value="FZEBEan7f7kmJ7z0" name="acthion_id">
            <div>
                <label>
                    User Name:
                </label>
                <input type="text" name="userName" class="w-100 form-control" placeholder="User Name required" value="<?php echo $student_data->userName; ?>" required disabled>
            </div>
            <div>
                <label>
                    Email:
                </label>
                <input type="email" name="email" class="w-100 form-control" placeholder="Email required" value="<?php echo $student_data->email; ?>" required disabled>
            </div>
            <div>
                <label>
                    Phone:
                </label>
                <input type="tel" name="phone" class="w-100 form-control" placeholder="Phone required" value="<?php echo $student_data->phone; ?>" required disabled>
            </div>

            <div>
                <div class="row">
                    <div class="col-4">
                        <label>
                            First Name:
                        </label>
                        <input type="text" name="firstName" id="xkiocs" class="w-100 form-control" placeholder="First Name required" value="<?php echo $student_data->firstName; ?>" required disabled>
                    </div>
                    <div class="col-4">
                        <label>
                            Father Name:
                        </label>
                        <input type="text" name="fatherName" id="xkiocs" class="w-100 form-control" placeholder="Father Name required" value="<?php echo $student_data->fatherName; ?>" required disabled>
                    </div>
                    <div class="col-4">
                        <label>
                            Family Name:
                        </label>
                        <input type="text" name="familyName" id="xkiocs" class="w-100 form-control" placeholder="Family Name required" value="<?php echo $student_data->familyName; ?>" required disabled>
                    </div>
                </div>
                <div>
                    <label>
                        Mother Name:
                    </label>
                    <input type="text" name="motherName" id="xkiocs" class="w-100 form-control" placeholder="Mother Name required" value="<?php echo $student_data->motherName; ?>" required disabled>
                </div>
                <div>
                    <label>
                        Native language:
                    </label>
                    <select name="language" id="xkiocs" class="w-100 form-control" disabled>
                        <option value="" disabled selected>Select your Native language</option>
                        <option value="en" <?php if ($student_data->language == 'en') {
                                                echo 'selected';
                                            } ?>>English</option>
                        <option value="ar" <?php if ($student_data->language == 'ar') {
                                                echo 'selected';
                                            } ?>>Arabic</option>
                        <option value="tu" <?php if ($student_data->language == 'tu') {
                                                echo 'selected';
                                            } ?>>Turkish</option>
                    </select>
                </div>
                <div>
                    <label>
                        Your Nationality:
                    </label>
                    <select name="nationality" id="xkiocs" class="w-100 form-control" disabled>
                        <option value="" disabled selected>Choose your nationality</option>
                        <?php render_countries($student_data->nationality) ?>
                    </select>
                </div>
                <div>
                    <label>
                        Choose your place of residence:
                    </label>
                    <select name="residence" id="xkiocs" class="w-100 form-control" disabled>
                        <option value="" disabled selected>Choose your residence</option>
                        <?php render_countries($student_data->residence) ?>
                    </select>
                </div>
                <div>
                    <label>
                        Choose your current certification:
                    </label>
                    <select name="current_degree" id="xkiocs" class="w-100 form-control" disabled>
                        <option value="" disabled selected>Select your Native language</option>
                        <option value="High School" <?php if ($student_data->degree == 'High School') {
                                                        echo 'selected';
                                                    } ?>>High School</option>
                        <option value="Master" <?php if ($student_data->degree == 'Master') {
                                                    echo 'selected';
                                                } ?>>Master</option>
                        <option value="PhD" <?php if ($student_data->degree == 'PhD') {
                                                echo 'selected';
                                            } ?>>PhD</option>
                    </select>
                </div>
            </div>
            <div class="mt-3">
                <button class="btn btn-primary" id="form-activation-button">Edit<i class="bi bi-pencil-fill"></i></button>
                <button class="btn btn-success" id="form-save-button">Save<i class="bi bi-download"></i></button>
            </div>
        </form>
    </div>

<?php
}


function requests()
{

    global $is_account_active;
    if ($is_account_active) {
        function echo_universitise()
        {
            // global $wpdb;
            // $student_data = $wpdb->get_results('SELECT * FROM ' . $wpdb->prefix . 'joswor_students WHERE userName = "' . $_SESSION['user'] . '"')[0];
            // $files_values = ['BIOMETRIC' => $student_data->BIOMETRIC_img, 'PASSPORT' => $student_data->PASSPORT_img, 'OTHER' => $student_data->OTHER_img];
            global $universities;
            $res = '';
            foreach ($universities as $x) {
                $res = $res . '
                <option value="' . $x['name'] . '">' . $x['name'] . '</option>
                ';
            }
            return $res;
        }
        echo '
        <h3>Register at a university</h3>
    <form action="' . get_template_directory_uri() . '/actions.php" method="post" enctype="multipart/form-data">
    <input type="hidden" value="u3psW0m49wLiy69x" name="acthion_id">    
    <div>
                    <label>
                    University name:
                    </label>
                    <select name="university" class="w-100 form-control">
                        <option value="" selected>Choose a university</option>
                        ' . echo_universitise() . '
                    </select>
                    <label>
                        Language teaching:
                    </label>
                    <select name="language" id="xkiocs" class="w-100 form-control">
                        <option value="" selected>Choose a language</option>
                        <option value="en">English</option>
                        <option value="Tu">Turkish</option>
                    </select>
                    <label>
                        Department:
                    </label>
                    <select name="department" id="xkiocs" class="w-100 form-control">
                        <option value="" selected>Choose department</option>
                        <option value="engineering">Engineering</option>
                        <option value="medicine">Medicine</option>
                    </select>
        <div class="p-3 mb-3 mt-3 border">
            <label for="BIOMETRIC_img"><b>BIOMETRIC</b></label>
            <input type="file" id="BIOMETRIC_img" name="BIOMETRIC_img" class="form-control">
        </div>
        <div class="p-3 mb-3 border">
            <label for="PASSPORT_img"><b>PASSPORT</b></label>
            <input type="file" id="PASSPORT_img" name="PASSPORT_img" class="form-control">
        </div>
        <div class="p-3 mb-3 border">
            <label for="OTHER_img"><b>OTHER</b></label>
            <input type="file" id="OTHER_img" name="OTHER_img" class="form-control">
        </div>
        <textarea name="note" class="w-100 form-control mb-3" rows="8"></textarea>
        <button class="btn btn-success">Save<i class="bi bi-download"></i></button>
    </form>
                </div>
                ';
    } else {
        echo '
            <div class="y34no">
            <h2>You cannot apply now.</h2>
            <p>
            Please complete your information and upload all required files
            After that, send an activation request for your account, and you will be answered soon</p>
            </div>
        ';
    }
}

?>



<div class="container">
    <?php show_alert() ?>
    <div class="row studint-model">
        <div class="col-3 text-center">
            <span class="user-img position-relative" style="background-image: url('<?php echo get_template_directory_uri() ?>/assets/img/defulte_profile_img.svg');">
                <span class="position-absolute top-0 start-100 translate-middle p-2 bg-<?php echo $status_color ?> border border-light rounded-circle" title="Status: <?php echo $status_titel ?>" data-bs-toggle="tooltip" data-bs-placement="top">
                </span>
            </span>
            <h3><?php echo $student_data->userName ?></h3>
            <ul>
                <li>
                    <a href="<?php echo esc_url(add_query_arg('p', 'status')) ?>">Status</a>
                </li>
                <li>
                    <a href="<?php echo esc_url(add_query_arg('p', 'requests')) ?>">Registration</a>
                </li>
            </ul>
        </div>
        <div class="col-9">



            <?php
            if ($page_format == null) {
                $page_format = 'status';
            }
            if ($is_account_active) {
            }
            switch ($page_format) {
                case 'status':
                    status_page();
                    break;
                    // case 'files_page':
                    //     files_page();
                    //     break;
                case 'requests':
                    requests();
                    break;
                    // default:
                    //     wp_redirect(site_url());
                    //     break;
            }
            ?>



        </div>
    </div>
</div>
</div>
<?php get_template_part('inc/parts/footers/footer', '1'); ?>
<?php
get_footer();
?>