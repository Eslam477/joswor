<?php

function all_posts()
{
    global $wpdb;
    $prefix = $wpdb->prefix;
    $posts = $wpdb->get_results('SELECT * FROM ' . $prefix . 'posts  WHERE (post_type = "post" AND post_status = "publish")');
    $res = [
        'status' => 200,
        'posts' => []
    ];

    if (!empty($posts)) {
        foreach ($posts as $post) {
            $post_id = $post->ID;
            $post_title = $post->post_title;
            $post_content = $post->post_content;
            $post_thumbnail = get_the_post_thumbnail_url($post->ID);
            $post_date = $post->post_date;
            $new_post = [
                'id' => $post_id,
                'titel' => $post_title,
                'content' => $post_content,
                'thumbnail_url' => $post_thumbnail,
                'date' => $post_date
            ];
            array_push($res['posts'], $new_post);
        }
    } else {
        $res = [
            'status' => 400
        ];
    }

    return $res;
}
function single_post()
{
    global $wpdb;
    $prefix = $wpdb->prefix;
    $postID = $_GET['id'];
    $posts = $wpdb->get_results('SELECT * FROM ' . $prefix . 'posts  WHERE (post_type = "post" AND post_status = "publish" AND ID = "' . $postID . '")');
    $res = [
        'status' => 200,
        'posts' => []
    ];

    if (!empty($posts)) {
        foreach ($posts as $post) {
            $post_id = $post->ID;
            $post_title = $post->post_title;
            $post_content = $post->post_content;
            $post_thumbnail = get_the_post_thumbnail_url($post->ID);
            $post_date = $post->post_date;
            $new_post = [
                'id' => $post_id,
                'titel' => $post_title,
                'content' => $post_content,
                'thumbnail_url' => $post_thumbnail,
                'date' => $post_date
            ];
            array_push($res['posts'], $new_post);
        }
    } else {
        $res = [
            'status' => 400
        ];
    }
    return $res;
}

add_action('rest_api_init', function () {
    register_rest_route('joswor/v1', 'posts', [
        'methods' => 'GET',
        'callback' => 'all_posts'
    ]);
    register_rest_route('joswor/v1', 'post/', [
        'methods' => 'GET',
        'callback' => 'single_post'
    ]);
});
