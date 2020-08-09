<?php
$router->define([
    '' => 'database/redirect.php',
    'read-task' => 'database/read-task.php',
    'create-task' => 'database/create-task.php',
    'delete-task' => 'database/delete-task.php',
    'completion-task' => 'database/completion-task.php',
    'edit-task' => 'database/edit-task.php',
]);
