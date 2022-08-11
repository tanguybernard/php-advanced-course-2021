<?php

use Course\App\Controller\MovieControllerForSlimApi;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require_once "../../../vendor/autoload.php";

$app = AppFactory::create();
$app->setBasePath('/slimapi/v1');
$app->addErrorMiddleware(   true, true, true);

$app->get('/movie', function (Request $request, Response $response, $args) {
    // $controller = new Controller();
    // return $controller->getAllMovie($request, $response); //retourne Réponse

    $response->getBody()->write("Hello world /movie !");
    return $response;
});

$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");
    return $response;
});

$app->post('/movie', function (Request $request, Response $response, $args) {
    // $controller = new Controller();
    // return $controller->getAllMovie($request, $response); //retourne Réponse

    $json = $request->getBody();
    $data = json_decode($json, true);
    $objet = new Film();
    $objet->setTitre($data['titre']);
    $entityManager->persist($objet);
    $entiyManager->flush();

    $response->withStatus("201 Created");
    return $response;
    //$response->getBody()->write("Hello, ${data['name']}");
    //return $response;
});

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world from root / !");
    return $response;
});

$app->get('/test', function (Request $request, Response $response, array $args) {
    $c = new MovieControllerForSlimApi();
    return $c->getMovies($response);
});

$app->run();

