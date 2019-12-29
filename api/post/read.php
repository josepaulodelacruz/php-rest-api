<?php

/**
 * create header
 * include databases and post
 * instantiate dabase connection
 * pass $db to post
 * check if theres an item 
 * maka array
 */ 

//header

header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Post.php';

$database = new Database();
$db = $database->connect();

$post = new Post($db);

$result = $post->read();

$num = $result->rowCount();

if($num > 0) {
    $post_arr = array();
    $post_arr['data'] = array();

    //loop through all the items
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $post_item = array(
            'id' => $id,
            'category_name' => $category_name,
            'category_id' => $category_id,
            'title' => $title,
            'body' => $body,
            'author' => $author
        );

        array_push($post_arr['data'], $post_item);

    }

    echo json_encode($post_arr);


} else {
    echo json_encode(array('message' => 'No items'));
}




























// header('Access-Control-Allow-Origin: *');
// header('Content-type: application/json');

// include_once '../../config/Database.php';
// include_once '../../models/Post.php';

// // instantiate dabase
// $database = new Database();
// $db = $database->connect();

// //instantiate blog post object
// $post = new Post($db);

// // blog post query
// $result = $post->read();
// //get row count 
// $num = $result->rowCount();

// if($num > 0) {
//     // pst array
//     $posts_arr = array();
//     $posts_arr['data'] = array();

//     while($row = $result->fetch(PDO::FETCH_ASSOC)){
//         extract($row);

//         $post_item = array(
//             'id' => $id,
//             'title' => $title,
//             'body' => html_entity_decode($body),
//             'author' => $author,
//             'category_id' => $category_id,
//             'category_name' => $category_name 
//         );

//         array_push($posts_arr['data'], $post_item);

//     }

//     //json 
//     echo json_encode($posts_arr);
    
// } else {
//     // echo out
//     echo json_encode( array('message' => 'No post are found'));
// }

