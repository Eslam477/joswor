<?php

if (is_user_logged_in()) {
    get_header();
    get_template_part('inc/parts/navs/nav', '2');


    global $wpdb;
    $data = $wpdb->get_results('SELECT * FROM ' . $wpdb->prefix . 'joswor_requests WHERE checking = "false"');
    if (!empty($data)) {
        $index = 1;
        function note_state($note)
        {
            if (!empty($note)) {
                return '
                <p>' . $note . '</p>
                ';
            } else {
                return '
                <h4>No Notes</h4>
                ';
            }
        }


        echo '
        <div class="container mt-4">
        <nav class="nav">
        <h3>Request list</h3>

        </nav>
        <div class="accordion accordion-flush" id="requests">
        ';
        foreach ($data as $x) {
            if ($index === 1) {
                $showClass = 'show';
            } else {
                $showClass = '';
            }

            $user_data = $wpdb->get_results('SELECT * FROM ' . $wpdb->prefix . 'joswor_students WHERE (status = "L1" OR status = "L2" AND userName = "' . $x->id . '")')[0];
            echo '
            <div class="accordion-item mt-4">
                <h2 class="accordion-button" data-bs-target="#d' . $x->id . '" data-bs-toggle="collapse">' . $index . '</h2>
                <div id="d' . $x->id . '" class="accordion-collapse collapse ' . $showClass . '">
                    <div class="accordion-body border rounded">
                        <div class="container">
                                <div>
                                    <p><strong>#ID:</strong> ' . $x->id . '</p>
                                </div>
                            <div class="row">
                                <div class="col-4">
                                    <p><strong>First Name</strong>: ' . $user_data->firstName . '</p>
                                </div>
                                <div class="col-4">
                                    <p><strong>Father Name</strong>: ' . $user_data->fatherName . '</p>
                                </div>
                                <div class="col-4">
                                    <p><strong>Family Name</strong>: ' . $user_data->familyName . '</p>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-4">
                                    <p><strong>Mother Name</strong>: ' . $user_data->motherName . '</p>
                                </div>
                                <div class="col-4">
                                    <p><strong>Nationality</strong>: ' . $user_data->nationality . '</p>
                                </div>
                                <div class="col-4">
                                    <p><strong>Residence</strong>: ' . $user_data->residence . '</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                        <p><strong>Email</strong>: ' . $user_data->email . '</p>
                                </div>
                                <div class="col-4">
                                        <p><strong>Phone</strong>: ' . $user_data->phone . '</p>
                                </div>
                                <div class="col-4">
                                        <p><strong>Degree</strong>: ' . $user_data->degree . '</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                        <p><strong>Study Countrt</strong>: ' . $x->studyCountrt . '</p>
                                </div>
                                <div class="col-4">
                                        <p><strong>Department</strong>: ' . $x->department . '</p>
                                </div>
                                <div class="col-4">
                                        <p><strong>language</strong>: ' . $x->language . '</p>
                                </div>
                            </div>
                            
                            <h4>Note:</h4><br>
                            ' . note_state($x->note) . '
                            <div class="actions bg-light p-3">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Transfer
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Transfer to the completed list</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                This request will be transferred to the completed list. Make sure that you have completed all the appropriate procedures before completing the process
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form action="' . get_theme_file_uri() . '/actions.php" method="POST">
                                    <input type="hidden" value="u3NO0se2gq1e00va" name="acthion_id">
                                    <input type="hidden" name="id" value="' . $x->id . '">
                                    <input type="hidden" name="transfer_request_value" value="acceptable">
                                    <button type="supmet" class="btn btn-success">Acceptable</button>
                                </form>
                                <form action="' . get_theme_file_uri() . '/actions.php" method="POST">
                                    <input type="hidden" value="u3NO0se2gq1e00va" name="acthion_id">
                                    <input type="hidden" name="id" value="' . $x->id . '">
                                    <input type="hidden" name="transfer_request_value" value="rejected">
                                    <button type="supmet" class="btn btn-danger">Rejected</button>
                                </form>
                                </div>
                            </div>
                            </div>
                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            ';
            $index++;
        }

        echo '

        </div>
        </div>
        ';
    } else {
        echo '
        <h1 class="text-center p-5">There are no requests</h1>
        ';
    }
    get_footer();
} else {
    wp_redirect(get_home_url());
    exit;
}
