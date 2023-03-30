<?php


function joswor_account_data()
{
    global $wpdb;
    $student_data = $wpdb->get_results('SELECT * FROM ' . $wpdb->prefix . 'joswor_students WHERE userName = "' . $_POST['userName'] . '"');
    return $student_data;
}


function joswor_account_update()
{
    global $wpdb;
    $firstName = $_POST['firstName'];
    $fatherName = $_POST['fatherName'];
    $familyName = $_POST['familyName'];
    $motherName = $_POST['motherName'];
    $language = $_POST['language'];
    $nationality = $_POST['nationality'];
    $residence = $_POST['residence'];
    $current_degree = $_POST['current_degree'];
    $x = $wpdb->update($wpdb->prefix . 'joswor_students', array(
        'firstName' => $firstName,
        'fatherName' => $fatherName,
        'familyName' => $familyName,
        'motherName' => $motherName,
        'language' => $language,
        'nationality' => $nationality,
        'residence' => $residence,
        'degree' => $current_degree

    ), array('userName' => $_POST['userName']));
    if ($x) {
        return [
            'status' => 200,
            'msg' => 'The data has been updated'
        ];
    } else {
        return [
            'status' => 400,
            'msg' => 'An error has been detected'
        ];
    }
}






add_action('rest_api_init', function () {
    register_rest_route('joswor/v1', 'account', [
        'methods' => 'POST',
        'callback' => 'joswor_account_data'
    ]);
    register_rest_route('joswor/v1', 'accountU', [
        'methods' => 'POST',
        'callback' => 'joswor_account_update'
    ]);
});
