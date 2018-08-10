<?php

use Slim\Http\Request;
use Slim\Http\Response;


// Collect request data
//$app->get("/collect/position")

//TODO this is the link for scraping geolocation https://www.geoiptool.com/en/?ip=46.123.243.7A8

$app->get('/collect/request', function (Request $request, Response $response) {

    $HTTP_ACCEPT_LANGUAGE = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
    $HTTP_ACCEPT_ENCODING = $_SERVER['HTTP_ACCEPT_ENCODING'];
    $HTTP_ACCEPT = $_SERVER['HTTP_ACCEPT'];
    $HTTP_USER_AGENT = $_SERVER['HTTP_USER_AGENT'];
    $HTTP_UPGRADE_INSECURE_REQUESTS = $_SERVER['HTTP_UPGRADE_INSECURE_REQUESTS'];
    $HTTP_CONNECTION = $_SERVER['HTTP_CONNECTION'];
    $HTTP_HOST = $_SERVER['HTTP_HOST'];
    $REDIRECT_STATUS = "none";//$_SERVER['REDIRECT_STATUS'];
    $SERVER_NAME = $_SERVER['SERVER_NAME'];
    $SERVER_PORT = $_SERVER['SERVER_PORT'];
    $SERVER_ADDR = $_SERVER['SERVER_ADDR'];
    $REMOTE_PORT = $_SERVER['REMOTE_PORT'];
    $REMOTE_ADDR = $_SERVER['REMOTE_ADDR'];
    $SERVER_SOFTWARE = $_SERVER['SERVER_SOFTWARE'];
    $GATEWAY_INTERFACE = $_SERVER['GATEWAY_INTERFACE'];
    $REQUEST_SCHEME = $_SERVER['REQUEST_SCHEME'];
    $SERVER_PROTOCOL = $_SERVER['SERVER_PROTOCOL'];
    $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
    $REQUEST_URI = $_SERVER['REQUEST_URI'];
    $SCRIPT_NAME = $_SERVER['SCRIPT_NAME'];
    $REQUEST_METHOD = $_SERVER['REQUEST_METHOD'];
    $QUERY_STRING = $_SERVER['QUERY_STRING'];
    $SCRIPT_FILENAME = $_SERVER['SCRIPT_FILENAME'];
    $PHP_SELF = $_SERVER['PHP_SELF'];
    $REQUEST_TIME_FLOAT = $_SERVER['REQUEST_TIME_FLOAT'];
    $REQUEST_TIME = date('Y/m/d H:i:s',date_timestamp_get(date_create()));

    $sql = "INSERT INTO `test_application`( 
        `HTTP_ACCEPT_LANGUAGE`, 
        `HTTP_ACCEPT_ENCODING`, 
        `HTTP_ACCEPT`, 
        `HTTP_USER_AGENT`, 
        `HTTP_UPGRADE_INSECURE_REQUESTS`, 
        `HTTP_CONNECTION`, 
        `HTTP_HOST`, 
        `REDIRECT_STATUS`, 
        `SERVER_NAME`, 
        `SERVER_PORT`, 
        `SERVER_ADDR`, 
        `REMOTE_PORT`, 
        `REMOTE_ADDR`, 
        `SERVER_SOFTWARE`, 
        `GATEWAY_INTERFACE`, 
        `REQUEST_SCHEME`, 
        `SERVER_PROTOCOL`, 
        `DOCUMENT_ROOT`, 
        `REQUEST_URI`, 
        `SCRIPT_NAME`, 
        `REQUEST_METHOD`, 
        `QUERY_STRING`, 
        `SCRIPT_FILENAME`,  
        `PHP_SELF`, 
        `REQUEST_TIME_FLOAT`, 
        `REQUEST_TIME`) 
        VALUES (
        '$HTTP_ACCEPT_LANGUAGE',
        '$HTTP_ACCEPT_ENCODING',
        '$HTTP_ACCEPT',
        '$HTTP_USER_AGENT',
        '$HTTP_UPGRADE_INSECURE_REQUESTS',
        '$HTTP_CONNECTION',
        '$HTTP_HOST',
        '$REDIRECT_STATUS',
        '$SERVER_NAME',
        '$SERVER_PORT',
        '$SERVER_ADDR',
        '$REMOTE_PORT',
        '$REMOTE_ADDR',
        '$SERVER_SOFTWARE',
        '$GATEWAY_INTERFACE',
        '$REQUEST_SCHEME',
        '$SERVER_PROTOCOL',
        '$DOCUMENT_ROOT',
        '$REQUEST_URI',
        '$SCRIPT_NAME',
        '$REQUEST_METHOD',
        '$QUERY_STRING',
        '$SCRIPT_FILENAME',
        '$PHP_SELF',
        $REQUEST_TIME_FLOAT,
        '$REQUEST_TIME'
        );";
    try {
        // Get DB Object
        $db = new db();
        //Connect
        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->execute();
    } catch (PDOException $e) {

    }
});
