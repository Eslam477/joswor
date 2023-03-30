<?php

function test()
{
    global $universities;

    return $universities;
}


add_action('rest_api_init', function () {
    register_rest_route('joswor/v1/test', 'test', [
        'methods' => 'GET',
        'callback' => 'test'
    ]);
});
