<?php
require "./config.php";
require "./controllers/router.php";
require "./controllers/Request.php";
require Router::load('routes.php')
    ->direct(Request::uri());
