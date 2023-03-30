<?php

function joswor_auth_login()
{

    $userName = $_POST['userName'];
    $password = $_POST['password'];
    if (empty($userName) || empty($password)) {
        $res = [
            'status' => 400,
            'msg' => 'There are required fields'
        ];
    } else {
        global $wpdb;
        $userDB = $wpdb->get_results('SELECT * FROM ' . $wpdb->prefix . 'joswor_students WHERE (status = "L1" OR status = "L2" AND userName = "' . $userName . '")');
        $h_pass = sha1($password);
        if (!empty($userDB)) {
            if ($h_pass === $userDB[0]->password) {
                $user = $userDB[0]->userName;
                $res = [
                    'status' => 200,
                    'user' => $user,
                    'msg' => 'Signed in successfully'
                ];
            } else {
                $res = [
                    'status' => 400,
                    'msg' => 'Wrong password'
                ];
            }
        } else {
            $res = [
                'status' => 400,
                'msg' => 'This account does not exist'
            ];
        }
    }

    return $res;
}



function joswor_auth_reg()
{
    $user = $_POST['userName'];
    $email = $_POST['email'];
    $password = sha1($_POST['password']);
    $phone =  $_POST['phone'];

    if (empty($user) || empty($email) || empty($password) || empty($phone)) {
        $res = [
            'status' => 400,
            'msg' => 'Error . All fields must be completed'
        ];
    } else {
        global $wpdb;
        $prefix = $wpdb->prefix;
        $user_exist = $wpdb->get_results('SELECT userName FROM ' . $wpdb->prefix . 'joswor_students WHERE (userName = "' . $user . '")');
        if (!empty($user_exist)) {
            $res = [
                'status' => 400,
                'msg' => 'This user already exists'
            ];
        } else {
            $dataToInsert = [
                'userName' => $user,
                'email' => $email,
                'password' => $password,
                'phone' => $phone,
                'status' => 'L2',
            ];
            $result_check = $wpdb->insert($prefix . 'joswor_students', $dataToInsert);
            if ($result_check) {
                $res = [
                    'status' => 200,
                    'user' => $user,
                    'msg' => 'Signup in successfully'
                ];
            } else {
                $res = [
                    'status' => 400,
                    'msg' => 'Unknown error'
                ];
            }
        }
    }
    return $res;
}



add_action('rest_api_init', function () {
    register_rest_route('joswor/v1', 'auth', [
        'methods' => 'POST',
        'callback' => 'joswor_auth_login'
    ]);
});
add_action('rest_api_init', function () {
    register_rest_route('joswor/v1', 'reg', [
        'methods' => 'POST',
        'callback' => 'joswor_auth_reg'
    ]);
});
