<?php

// BASE URL

$base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != "off") ? "https" : "http");
$base_url .= "://".$_SERVER['HTTP_HOST'];
$base_url .= dirname($_SERVER['SCRIPT_NAME']);
$base_dir = dirname($_SERVER['SCRIPT_NAME']);

define('BASE_URL', $base_url);
define('BASE_DIR', $base_dir);

// const BASE_URL= 'http://localhost/mvc';
// const BASE_DIR=  '/mvc';

// DB

 const DB_HOST= 'localhost';
 const DB_NAME= 'mvc';
 const DB_USER= 'root';
 const DB_PASS= '';

// IMPUESTOS

 const IVA= .21;

 ?>