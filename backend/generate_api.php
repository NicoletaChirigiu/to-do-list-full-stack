<?php

// $api = "SELECT *  FROM api_keys";

$user_id = $_GET['id'];
$api_key = $_GET['api_key'];
$fields = $_GET['fields'];

var_dump("teste", $api_key);

// if (!isset($api_key)) {
    //     echo json_encode(array(
        //         'code' => 404,
        //         'message' => 'API KEY is required',
        //     ));
        //     die();
        // }
        
        // if (strlen($api_key) != 12) {
            //     echo json_encode(array(
                //         'code' => 404,
                //         'massage' => 'API KEY is invalid.'
                //     ));
                //     die();
                // }
include $_SERVER['DOCUMENT_ROOT'] . './config.php';
                