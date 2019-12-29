<?php

//header

header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Post.php';

$database = new Database();
$db = $database->connect();

$post = new Post($db);


//get the id from the url
$post->id = isset($_GET['id']) ? $_GET['id'] : die();

//get post method
$post->read_single();

//create an array 
$post_arr = array(
    'id' => $post->id,
    'title' => $post->title,
    'body' => $post->body,
    'author' => $post->author,
    'category_id' => $post->category_id,
    'category_name' => $post->category_name
);

//make json

print_r(json_encode($post_arr));


