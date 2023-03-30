<?php




function joswor_student_request()
{
    $dataToInsert = [];
    global $wpdb;
    global $dir;
    $userDB = $wpdb->get_results('SELECT * FROM ' . $wpdb->prefix . 'joswor_students WHERE (status = "L1" OR status = "L2" AND userName = "' . $_POST['userName'] . '")')[0];

    $dataToInsert['student_id'] = $userDB->id;
    $dataToInsert['university'] = $_POST['university'];
    $dataToInsert['language'] = $_POST['language'];
    $dataToInsert['department'] = $_POST['department'];
    $dataToInsert['note'] = $_POST['note'];


    $names = ['BIOMETRIC_img', 'PASSPORT_img', 'OTHER_img'];
    $i = 0;
    var_dump($names);
    foreach ($names as $y) {
        if ($_FILES[$y]['error'] == 0) {
            $file_data = $_FILES[$y];
            $new_img_name = uniqid() . '.' . pathinfo($file_data['name'])['extension'];
            $destination = $dir . '/file_storage/' . $y . '/' . $userDB->id . '/' . $new_img_name;
            if (move_uploaded_file($file_data['tmp_name'], $destination)) {
                $dataToInsert[$y] = $new_img_name;
                $i = 1;
            }
        } else {
            echo 'err';
        }
    }
    if ($i == 1) {
        $x = $wpdb->insert($wpdb->prefix . 'joswor_requests', $dataToInsert);
        if ($x) {
            $res = [
                'status' => 200,
                'msg' => 'sent succesfully'
            ];
        } else {
            $res = [
                'status' => 400,
                'msg' => 'Unknown error'
            ];
        }
    } else {
        $res = [
            'status' => 400,
            'msg' => 'Unknown error'
        ];
    }
    return $res;
}











add_action('rest_api_init', function () {
    register_rest_route('joswor/v1', 'request', [
        'methods' => 'POST',
        'callback' => 'joswor_student_request'
    ]);
});
