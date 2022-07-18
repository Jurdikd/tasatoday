<?php
header($_SERVER['SERVER_PROTOCOL'] . "404 Not Found", true, 404);
header("HTTP/1.0 404 Not Found");
echo "error 404";