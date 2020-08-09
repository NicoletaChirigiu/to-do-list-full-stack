<?php
require_once "./config.php";

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: POST");
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $json = file_get_contents('php://input');
    $data = json_decode($json);
    if (!empty($data->id) && is_integer($data->id)) {
        $sqlSelect = "SELECT * FROM todos WHERE id = $data->id";
        $result = $config->query($sqlSelect);
        if ($result->num_rows > 0) {
            $sql = "DELETE from todos WHERE id = $data->id";
            if ($config->query($sql) === true) {
                echo "Records deleted successfully.";
                http_response_code(200);
            } else {
                http_response_code(404);
                echo ("ERROR: Records could not be deleted.");
                die();
            }
        } else {
            http_response_code(404);
            echo "0 results";
            die();
        }
    } else {
        http_response_code(404);
        echo "Your id is not an integer or you do not have an id";
        die();
    }
    $config->close();
}
