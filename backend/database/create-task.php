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
    if (!empty($data->description)) {
        $description = test_input($data->description);
        $sql = "INSERT INTO todos (description) VALUES(?)";
        if ($stmt = $config->prepare($sql)) {
            if (!empty($description)) {
                $stmt->bind_param("s", $description);
                $stmt->execute();
                $stmt->fetch();
                $stmt->close();
            } else {
                http_response_code(204);
                echo " Something went wrong! Check description";
                die();
            }
        } else {
            http_response_code(204);
            echo "Statement incorrect";
            die();
        }
    } else {
        http_response_code(204);
        echo json_encode(array("message" => "Description empty."));
        die();
    }
    echo $description;
    http_response_code(200);
    $config->close();
}
