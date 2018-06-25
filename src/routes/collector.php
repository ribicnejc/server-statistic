<?php

use Slim\Http\Request;
use Slim\Http\Response;


// Collect request data
$app->get('/collect/request', function (Request $request, Response $response) {
//    $USER = $_SERVER['USER'];
//    $HOME = $_SERVER['HOME'];
    $HTTP_ACCEPT_LANGUAGE = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
    $HTTP_ACCEPT_ENCODING = $_SERVER['HTTP_ACCEPT_ENCODING'];
    $HTTP_ACCEPT = $_SERVER['HTTP_ACCEPT'];
    $HTTP_USER_AGENT = $_SERVER['HTTP_USER_AGENT'];
    $HTTP_UPGRADE_INSECURE_REQUESTS = $_SERVER['HTTP_UPGRADE_INSECURE_REQUESTS'];
    $HTTP_CONNECTION = $_SERVER['HTTP_CONNECTION'];
    $HTTP_HOST = $_SERVER['HTTP_HOST'];
    $REDIRECT_STATUS = $_SERVER['REDIRECT_STATUS'];
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
//    $DOCUMENT_URI = $_SERVER['DOCUMENT_URI'];
    $REQUEST_URI = $_SERVER['REQUEST_URI'];
    $SCRIPT_NAME = $_SERVER['SCRIPT_NAME'];
//    $CONTENT_LENGTH = $_SERVER['CONTENT_LENGTH'];
//    $CONTENT_TYPE = $_SERVER['CONTENT_TYPE'];
    $REQUEST_METHOD = $_SERVER['REQUEST_METHOD'];
    $QUERY_STRING = $_SERVER['QUERY_STRING'];
    $SCRIPT_FILENAME = $_SERVER['SCRIPT_FILENAME'];
//    $PATH_INFO = $_SERVER['PATH_INFO'];
//    $FCGI_ROLE = $_SERVER['FCGI_ROLE'];
    $PHP_SELF = $_SERVER['PHP_SELF'];
    $REQUEST_TIME_FLOAT = $_SERVER['REQUEST_TIME_FLOAT'];
    $REQUEST_TIME = $_SERVER['REQUEST_TIME'];


//    TODO timestamp MUST BE... or at least convert float to date and time string

    $first_name = $request->getParam('first_name');
    $last_name = $request->getParam("last_name");
    $phone = $request->getParam("phone");
    $email = $request->getParam("email");
    $address = $request->getParam("address");
    $city = $request->getParam("city");
    $state = $request->getParam("state");

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
        $REQUEST_TIME
        );";

//    $sql = "INSERT INTO customers (first_name, last_name, phone, email, address, city, state)
//    VALUES (:first_name, :last_name, :phone, :email, :address, :city, :state)";
    try {
        // Get DB Object
        $db = new db();
        //Connect
        $db = $db->connect();
        $stmt = $db->prepare($sql);
//        $stmt->bindParam(':first_name', $first_name);
//        $stmt->bindParam(':last_name', $last_name);
//        $stmt->bindParam(':phone', $phone);
//        $stmt->bindParam(':email', $email);
//        $stmt->bindParam(':address', $address);
//        $stmt->bindParam(':city', $city);
//        $stmt->bindParam(':state', $state);
        $stmt->execute();

//        echo $sql;

//        echo '{"notice": {"text": "Customer Added"}}';
    } catch (PDOException $e) {
//        echo '{"error": {"text": ' . $e->getMessage() . '}}';
    }
});
