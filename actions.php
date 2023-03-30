<?php
require_once("../../../wp-load.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $acthion_id = $_POST['acthion_id'];


    function signup()
    {
        global $wpdb;
        $prefix = $wpdb->prefix;
        $dataToInsert = [
            'userName' => $_POST['user'],
            'email' => $_POST['email'],
            'password' => sha1($_POST['password']),
            'phone' => $_POST['phone'],
            'status' => 'L1',
        ];
        $wpdb->insert($prefix . 'joswor_students', $dataToInsert);
        $new_user_id = $wpdb->get_col('SELECT id FROM ' . $wpdb->prefix . 'joswor_students WHERE (status = "L1" OR status = "L2" AND userName = "' . $_POST['user'] . '")')[0];
        mkdir(__DIR__ . '/file_storage/BIOMETRIC_img/' . $new_user_id);
        mkdir(__DIR__ . '/file_storage/PASSPORT_img/' . $new_user_id);
        mkdir(__DIR__ . '/file_storage/OTHER_img/' . $new_user_id);
        $_SESSION['registration_done'] = 'yes';
        wp_redirect(get_site_url() . '/login');
    }




    function login()
    {
        global $wpdb;
        $userDB = $wpdb->get_results('SELECT * FROM ' . $wpdb->prefix . 'joswor_students WHERE (status ,userName) IN ( ("L1","' . $_POST['user'] . '"),("L2","' . $_POST['user'] . '") )');
        $h_pass = sha1($_POST['password']);
        if (!empty($userDB)) {
            if ($h_pass === $userDB[0]->password) {
                $user = $userDB[0]->userName;

                $_SESSION['user'] = '' . $user;
                wp_redirect(home_url());
            } else {
                $_SESSION['joswor_error'] = 'loginError';
                wp_redirect(get_site_url() . '/login');
                die;
            }
        } else {
            $_SESSION['joswor_error'] = 'loginError';
            wp_redirect(get_site_url() . '/login');
        }
    }


    function logout()
    {
        $_SESSION['user'] = '';
        wp_redirect(home_url());
    }
    function update_account_information()
    {
        global $wpdb;
        $userName = $_SESSION['user'];
        $firstName = $_POST['firstName'];
        $fatherName = $_POST['fatherName'];
        $familyName = $_POST['familyName'];
        $motherName = $_POST['motherName'];
        $language = $_POST['language'];
        $nationality = $_POST['nationality'];
        $residence = $_POST['residence'];
        $current_degree = $_POST['current_degree'];
        $x = $wpdb->update($wpdb->prefix . 'joswor_students', array(
            'userName' => $userName,
            'firstName' => $firstName,
            'fatherName' => $fatherName,
            'familyName' => $familyName,
            'motherName' => $motherName,
            'language' => $language,
            'nationality' => $nationality,
            'residence' => $residence,
            'degree' => $current_degree

        ), array('userName' => $_SESSION['user']));
        if ($x) {
            // $_SESSION['user'] = '' . $userName;
            wp_redirect(esc_url(add_query_arg('p', 'status', site_url('/student-dashboard/'))));
        } else {
            wp_redirect(esc_url(add_query_arg('p', 'status', site_url('/student-dashboard/'))));
        }
    }

    function add_new_request()
    {
        $dataToInsert = [];
        global $wpdb;
        $userDB = $wpdb->get_results('SELECT * FROM ' . $wpdb->prefix . 'joswor_students WHERE (status = "L1" OR status = "L2" AND userName = "' . $_SESSION['user'] . '")')[0];

        $dataToInsert['student_id'] = $userDB->id;
        $dataToInsert['university'] = $_POST['university'];
        $dataToInsert['language'] = $_POST['language'];
        $dataToInsert['department'] = $_POST['department'];
        $dataToInsert['note'] = $_POST['note'];


        $names = ['BIOMETRIC_img', 'PASSPORT_img', 'OTHER_img'];
        foreach ($names as $y) {
            if ($_FILES[$y]['error'] == 0) {
                $file_data = $_FILES[$y];
                $new_img_name = uniqid() . '.' . pathinfo($file_data['name'])['extension'];
                $destination = __DIR__ . '/file_storage/' . $y . '/' . $userDB->id . '/' . $new_img_name;
                if (move_uploaded_file($file_data['tmp_name'], $destination)) {
                    $dataToInsert[$y] = $new_img_name;
                }
            } else {
                echo 'smsm';
            }
        }
        // var_dump($dataToInsert);
        $x = $wpdb->insert($wpdb->prefix . 'joswor_requests', $dataToInsert);
        if ($x) {
            set_alert('s', 'Your request has been sent successfully and we will contact you soon');
        } else {
            set_alert(
                'd',
                'There is a problem, some data seems to be invalid.
            Repeat the ball and if you encounter a problem contact customer service'
            );
        }
        wp_redirect(esc_url(add_query_arg('p', 'requests', site_url('/student-dashboard/'))));
    }

    function transfer_request()
    {
        global $wpdb;
        $reqId = $_POST['id'];
        $table = $wpdb->prefix . 'joswor_requests';
        $x = $wpdb->update($table, ['checking' => $_POST['transfer_request_value']], ['id' => $reqId]);

        wp_redirect(esc_url(site_url() . '/dashboard'));
    }

    switch ($acthion_id) {
        case '1OU69fnTP5DyNCRY':
            signup();
            break;
        case 'ya6r4o6ZKpJ1u80k':
            login();
            break;
        case '0QK8hkHIct3GhxVw':
            logout();
            break;
        case 'FZEBEan7f7kmJ7z0':
            update_account_information();
            break;
        case 'u3psW0m49wLiy69x':
            add_new_request();
            break;
        case 'u3NO0se2gq1e00va':
            transfer_request();
            break;
        default:
            echo 'acthion id not found';
    }
}
