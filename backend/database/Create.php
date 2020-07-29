<?php
require_once "./config.php";

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$description = "";
$description_err = $completed_err = "";

if(isset($_POST['submit'])){
    echo "khiuh";
}

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // $description = trim($_POST["description"]);
//     // if (empty($description)) {
//     //     $description_err = "Please enter a task";
//     // } else {
//     //     $description = test_input($_POST["description"]);
//     //     if (!preg_match("/^[a-zA-Z ]*$/", $description)) {
//     //         $description_err = "Only letters and white space allowed";
//     //     }
//     // }


// }

if (empty($description_err)) {
    $sql = "INSERT INTO todos (description) VALUES(?)";
    if ($stmt = $config->prepare($sql)) {
        if (!empty($description)) {
            $stmt->bind_param("s", $description);
            $stmt->execute();
            $stmt->fetch();
            $stmt->close();
        }
    }
    $config->close();
}
