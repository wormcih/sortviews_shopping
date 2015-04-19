<?php
defined('BASEPATH') OR exit('No direct script access allowed');

header('Content-Type: application/json');

echo json_encode($json, JSON_PRETTY_PRINT);
