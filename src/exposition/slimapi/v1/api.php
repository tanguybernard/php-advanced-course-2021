<?php

namespace Course\Exposition\SlimApi\v1;


use Course\App\Controller\MovieControllerForSlimApi;
use Course\App\EntityService;
use Course\Exposition\SlimApi\Controller\HomePageHandler;
use Course\Infrastructure\Typeorm\Entities\Product;
use DI\ContainerBuilder;
use Fig\Http\Message\StatusCodeInterface;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;


require_once "../../../vendor/autoload.php";
AppFactory::setContainer(require '../../../config/dependencies.php');
$app = AppFactory::create();
$app->setBasePath('/slimapi/v1');
$app->addErrorMiddleware(   true, true, true);


$app->get('/movies', function (Request $request, Response $response, $args) {
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

$app->post('/products', function (Request $request, Response $response, $args) {

    $entityService = new EntityService();
    $entityManager = $entityService->getEntityManager();


    $json = $request->getBody();
    $data = json_decode($json, true);
    $product = new Product();
    $product->setName($data['title']);

    $entityManager->persist($product);
    $entityManager->flush();

    return $response->withStatus(StatusCodeInterface::STATUS_CREATED);

});

$app->post('/test', function (Request $request, Response $response, $args) {

    $data = array('name' => 'Rob', 'age' => 40);
    $payload = json_encode($data);

    $response->getBody()->write($payload);
    return $response
        ->withHeader('Content-Type', 'application/json')
        ->withStatus(201);
});


$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world from root / !");
    return $response;
});

$app->get('/mocked/movies', function (Request $request, Response $response, array $args) {
    $c = new MovieControllerForSlimApi();
    return $c->getMovies($response);
});


$app->get('/template', function (Request $request, Response $response, array $args) {
    $loader = new FilesystemLoader(__DIR__ . '/../../twig_templates');
    $twig = new Environment($loader);


    $response->getBody()->write(
    $twig->render('home/index.html.twig', [
        'words' => ['voiture', 'camion', 'epicerie']
    ])
    );
     return $response;
});

$app->get('/template2',HomePageHandler::class);


$app->run();

