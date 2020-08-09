<?php
require_once "./config.php";

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $json = file_get_contents('php://input');
    $data = json_decode($json);
    foreach ($data as $value) {
        $task = test_input($value->description);
        $completion = $value->completed;
        if (is_bool($completion)) {
            settype($completion, "integer");
            $sql = "UPDATE todos SET completed = $completion WHERE id = $value->id";
            if ($config->query($sql) === true) {
             echo "Records were updated successfully.";
                http_response_code(200);
            } else {
                http_response_code(404);
                echo ("ERROR: Could not execute.");
                die();
            }
        } else if (empty($completion)) {
            http_response_code(404);
            echo  "Empty task completion";
            die();
        } else {
            http_response_code(404);
            echo  "Wrong task completion";
            die();
        }
    }
}
