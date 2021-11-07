<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require_once "../../../vendor/autoload.php";

$app = AppFactory::create();
$app->setBasePath('/slimapi/v1');
$app->addErrorMiddleware(   true, true, true);


$app->get('/test', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
});

$app->run();

