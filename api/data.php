<?php

function data_countries()
{
    global $countries;
    return $countries;
}
function data_universities()
{
    global $universities;
    return $universities;
}

add_action('rest_api_init', function () {
    register_rest_route('joswor/v1/data', 'countries', [
        'methods' => 'GET',
        'callback' => 'data_countries'
    ]);
    register_rest_route('joswor/v1/data', 'universities', [
        'methods' => 'GET',
        'callback' => 'data_universities'
    ]);
});
