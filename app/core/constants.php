<?php

$scheme = $_SERVER['REQUEST_SCHEME'];
$host = $_SERVER['HTTP_HOST'];
$publicPath = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
define('PUBLIC_BASE_URL', $scheme . '://' . $host . $publicPath . '/');

