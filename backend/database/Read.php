<?php
header(("Access-Control-Allow-Origin: *"));
header("Content-type:application/json; charset=UTF-8");

require_once "./config.php";
$sql = "SELECT *  FROM todos";
$result = $config->query($sql);
$tasks = array();

if ($result->num_rows >0) {

  foreach ($result as $key => $value) {
    settype($value["id"], "integer");
    settype($value["completed"], "boolean");

    http_response_code(200);

        $tasks[$value["id"]] = array(
      'id' => $value["id"],
      'description' => $value["description"],
      "completed" => $value["completed"]
    );
  }
  
   echo json_encode($tasks);
} else {
  http_response_code(404);
  echo json_encode(array("message" => "Product does not exist."));
}

