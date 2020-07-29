<?php


define("name", 'mytodo');
define("username", 'root');
define("password", '');
define("connection", 'localhost');
// create connection between mariadb & php
$config = new mysqli(connection, username, password, name);

// Check connection
if ($config->connect_error) {
    die("Connection failed: " . $config->connect_error);
}
